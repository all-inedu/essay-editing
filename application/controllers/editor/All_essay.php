<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All_essay extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
        // $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('mail_smtp');
        $this->load->library('notif_pusher');
        $this->load->model('Essay_model');
        $this->load->model('Editors_model');
        $this->load->model('Mentors_model');
        $this->load->model('Feedback_model');

        $user = $this->session->userdata('email');
        $position = $this->Editors_model->getAllEditorsByEmail($user);
        if($position['position']!=3){
            $this->session->set_flashdata('error', 'Sorry, you can not access this page.');
            redirect('editor/essay-list');
        }

    }

    public function checkRole()
    {
        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'editors') {
            redirect('/');
        }
    }

    public function index(){
        $user = $this->session->userdata('email');
        $data['uploaded'] = count($this->Essay_model->getAllEssayNotAssign());
        $data['assigned'] = count($this->Essay_model->getAllEssayAssign($user='')); 
        $data['processed'] = count($this->Essay_model->getAllEssayProcess($user=''));
        $data['completed'] = count($this->Essay_model->getEssayVerifyList()); 
        $data['menus'] = 'all-essay';
        $data['submenus'] = 'ongoing';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/all-essay/menus', $data);
        $this->load->view('templates/user/footer');
    }

    public function lists($id)
    {
        $this->checkRole();
        $user = $this->session->userdata('email');
        if($id=='student-essay'){
            $data['title']='Not Assign List';
            $data['icon']='<i class="far fa-clock"></i>';
            $data['alert']='text-info';
            $data['essay'] = $this->Essay_model->getAllEssayNotAssign(); 
        } else if($id=='assign'){
            $data['title']='Assigned List';
            $data['icon']='<i class="fas fa-paper-plane"></i>';
            $data['alert']='text-primary';
            $data['essay'] = $this->Essay_model->getAllEssayAssign($user=''); 
        } else if($id=='process'){
            $data['title']='Ongoing List';
            $data['icon']='<i class="fas fa-edit"></i>';
            $data['alert']='text-info';
            $data['essay'] = $this->Essay_model->getAllEssayProcess($user=''); 
        } else if($id=='completed'){
            $data['title']='Completed List';
            $data['icon']='<i class="fas fa-check-circle"></i>';
            $data['alert']='text-success';
            $data['essay'] = $this->Essay_model->getEssayVerifyList(); 
        } else if($id=='1-days'){
            $data['title']='Do Tomorrow';
            $data['icon']='<i class="fas fa-check-circle"></i>';
            $data['alert']='text-success';
            $data['essay'] = $this->Essay_model->essayDeadline('-1', '1'); 
        } else if($id=='3-days'){
            $data['title']='Due Within 3 Days';
            $data['icon']='<i class="fas fa-check-circle"></i>';
            $data['alert']='text-success';
            $data['essay'] = $this->Essay_model->essayDeadline('1', '3'); 
        } else if($id=='5-days'){
            $data['title']='Due Within 5 Days';
            $data['icon']='<i class="fas fa-check-circle"></i>';
            $data['alert']='text-success';
            $data['essay'] = $this->Essay_model->essayDeadline('3', '5'); 
        }
        
        $data['menus'] = 'all-essay';
        $data['submenus'] = 'ongoing';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/all-essay/index', $data);
        $this->load->view('templates/user/footer');
    }
    
    public function status($id)
    {
        $this->Essay_model->statusReadManagingEditor($id);
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $status = $data['essay']['status_essay_clients'];
        if(($status=='0') OR ($status=='4') OR ($status=='5')){redirect('editor/all-essay/views/'.$id); } else 
        if($status=='1'){ redirect('editor/all-essay/assigned/'.$id);} else   
        if(($status=='2') OR ($status=='3') OR ($status=='6') OR ($status=='8')){ redirect('editor/all-essay/accepted/'.$id);} else 
        if(($status=='7')){ redirect('editor/all-essay/verified/'.$id);}  
        else {
            $this->session->set_flashdata('error', 'Students Essay is not found.');
            redirect('editor/all-essay');
        }
    }

    public function views($id)
    {
        $this->checkRole();
        $user = $this->session->userdata('email');
        $data['essay_editor'] = $this->Essay_model->getEssaybyEditors($id);

        // if($data['essay_editor']['editors_mail']==$user){
        //     $this->session->set_flashdata('error', 'Sorry, you can access this page.');
        //     redirect('editor/essay-list');
        // } 
        
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $status = $data['essay']['status_essay_clients'];
        if(($status!='0')AND($status!='4')AND($status!='5')){ redirect('editor/all-essay/status/'.$id); } 
        
        $this->form_validation->set_rules('editors','Editors', 'required');
    
        if($this->form_validation->run()==false) {
        $user = $this->session->userdata('email');
        $data['essay_reject'] = $this->Essay_model->getRejectedEssay($id);
        $data['editor'] = $this->Editors_model->getAllEditors();

        $data['menus'] = 'all-essay';
        $data['submenus'] = 'ongoing';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/all-essay/view-essay');
        $this->load->view('templates/user/footer');
        } else {
            $id_program = $this->input->post('id_program');
            $id_essay_clients = $this->input->post('id_essay_clients');
            $data = [
                'id_essay_clients' => $id_essay_clients,
                'editors_mail' => $this->input->post('editors'),
                'status_essay_editors' => '1',
            ];

            $status = [
                'id_essay_clients' => $id_essay_clients,
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->Essay_model->insertEssayEditors($data, $id_essay_clients, $status);
            $type = 'assign';
            
            $message = '<a href="'.base_url('editor/essay-list').'" class="text-decoration-none text-muted">You have a new assignment.</a>';
            $role = $this->input->post('editors');
            $this->notif_pusher->notif($message, $role);
            
            $editors_mail = $this->input->post('editors');
            $content['managing'] = $this->Editors_model->getAllEditorsById('',$user);
            $content['editor'] = $this->Editors_model->getAllEditorsById('',$editors_mail);
            $content['essay'] = $this->Essay_model->getEssayClientsById($id);
            $this->_sendEmail($type,'',$content);
            
            $this->session->set_flashdata('success', 'Student essay has been assigned to editors.');
            redirect('editor/all-essay/assigned/'.$id);
        }
    }

    public function assigned($id)
    {
        $this->checkRole();
        $user = $this->session->userdata('email');
        $data['essay_editor'] = $this->Essay_model->getEssaybyEditors($id);

        // if($data['essay_editor']['editors_mail']==$user){
        //     $this->session->set_flashdata('error', 'Sorry, you can access this page.');
        //     redirect('editor/essay-list');
        // } 

        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $status = $data['essay']['status_essay_clients'];
        if($status!='1'){ redirect('editor/all-essay/status/'.$id); } 

        $data['editor'] = $this->Editors_model->getAllEditors();
        $data['menus'] = 'all-essay';
        $data['submenus'] = 'ongoing';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/all-essay/assign-essay');
        $this->load->view('templates/user/footer');
    }

    public function accepted($id)
    {
        $this->checkRole();
        $user = $this->session->userdata('email');
        $data['essay_editor'] = $this->Essay_model->getEssaybyEditors($id);

        // if($data['essay_editor']['editors_mail']==$user){
        //     $this->session->set_flashdata('error', 'Sorry, you can access this page.');
        //     redirect('editor/essay-list');
        // } 
        
        $id_essay_clients = $id;
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $data['revise'] = $this->Essay_model->getEssayReviseById($id);
        $status = $data['essay']['status_essay_clients'];
        // var_dump($data['revise']);
        if(($status!='2')AND($status!='3')AND($status!='6')AND($status!='8')){ redirect(admin/'essay-list/status/'.$id); } 

        $data['editor'] = $this->Editors_model->getAllEditors();
        $data['tags'] = $this->Essay_model->getEssayTags($id);
        $data['status'] = $this->Essay_model->getEssayStatus($id_essay_clients);
        $data['menus'] = 'all-essay';
        $data['submenus'] = 'ongoing';

        $this->form_validation->set_rules('notes_editors', 'Notes for Editors', 'required');

        if ($this->form_validation->run()==false){
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/all-essay/accept-essay');
        $this->load->view('templates/user/footer');

        if($this->input->post('verify')){
            $this->_verify();
        }
        
        } else {
            if($this->input->post('revision')) {
            $this->_revision();
            }
        }
    }

    public function _verify()
    {
        $st = 'verify';
        $id = $this->input->post('id_essay_clients');
        $notes = $this->input->post('notes_editors');
        $check = $this->input->post('check_file');
        $editor = $this->Essay_model->getEssaybyEditors($id);
        $editors_mail = $editor['editors_mail'];
        $files = $_FILES['managingFile']['name'];
        
        if($check=='1'){
            if($files){
                $config['upload_path'] = './upload_files/program/essay/revised/';
                $config['allowed_types'] = 'doc|docx';
                $config['max_size'] = 2048;
                $config['file_name'] = 'Revised by '.$editor['first_name'].' '.$editor['last_name'].'('.date('d-m-Y').')';
        
                $this->load->library('upload');
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('managingFile')) {
                    $new_files = htmlspecialchars($this->upload->data('file_name'));
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('editor/all-essay/accepted/'.$id);
                }
            } else {
                $this->session->set_flashdata('error', 'Please, you must upload your essay.');
                redirect('editor/all-essay/accepted/'.$id);
            }
        } else {
            $new_files = '';
        }
        
        $data = [
            'managing_file' => $new_files,
            'notes_editors' => $notes,
            'status_essay_editors' => '7'
        ];

        $status = [
            'id_essay_clients' => $id,
            'status' => '7',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        

        $this->Essay_model->verifiedEssay($id, $data, $status);
        $this->send_essay($id);
        $this->Essay_model->statusUnreadEditor($id);
        $message = '<a href="'.base_url('editor/essay-list').'" class="text-decoration-none text-muted"><b>Congratulations</b>, your essay has completed.</a>';
        $role = $editors_mail;
        $this->notif_pusher->notif($message, $role);
        $this->session->set_flashdata('success', 'Editors essay has been verified.');
        redirect('editor/all-essay/verified/'.$id);
    }

    public function _revision()
    {
        $st = 'revision';
        $id = $this->input->post('id_essay_clients');
        $notes = $this->input->post('notes_editors');
        $editors_mail = $this->input->post('editors_mail');
        $role = 'managing_editor';
        $date = date('Y-m-d H:i:s');
        $admin = $this->session->userdata('email');
        
        $files = $_FILES['files']['name'];

        if($files){
            $config['upload_path'] = './upload_files/program/essay/revise/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048;
            $config['file_name'] = 'Revise-'.date('d-m-Y');
    
            $this->load->library('upload');
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('files')) {
                $new_files = htmlspecialchars($this->upload->data('file_name'));
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('editor/all-essay/accepted/'.$id);
            }
        } else {
            $new_files = '';
        }
        
        $revise = [
            'id_essay_clients' => $id,
            'editors_mail' => $editors_mail,
            'admin_mail' => $admin,
            'role' => $role,
            'notes' => $notes,
            'file' => $new_files,
            'created_at' => $date
        ];

        $data = [
            // 'notes_editors' => $notes,
            'status_essay_editors' => '6'
        ];

        $status = [
            'id_essay_clients' => $id,
            'status' => '6',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        
        
        $this->Essay_model->revisionEssay($id, $data, $revise, $status);
        $this->Essay_model->statusUnreadEditor($id);
        $message = '<a href="'.base_url('editor/essay-list').'" class="text-decoration-none text-muted"><b>Please</b>, revise your essay.</a>';
        $role = $editors_mail;
        $this->notif_pusher->notif($message, $role);
        
        $user = $this->session->userdata('email');
        $content['managing'] = $this->Editors_model->getAllEditorsById('',$user);
        $content['editor'] = $this->Editors_model->getAllEditorsById('',$editors_mail);
        $content['essay'] = $this->Essay_model->getEssayClientsById($id);
        $type = 'revise';
        $this->_sendEmail($type, $editors_mail, $content);
        
        $this->session->set_flashdata('success', 'Editors essay must be corrected.');
        redirect('editor/all-essay/accepted/'.$id);
    }

    public function verified($id)
    {
        $this->checkRole();
        $user = $this->session->userdata('email');
        $data['essay_editor'] = $this->Essay_model->getEssaybyEditors($id);

        // if($data['essay_editor']['editors_mail']==$user){
        //     $this->session->set_flashdata('error', 'Sorry, you can access this page.');
        //     redirect('editor/essay-list');
        // } 

        $id_essay_clients = $id;
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $status = $data['essay']['status_essay_clients'];
        
        if(($status!='7')){ redirect('editor/all-essay/status/'.$id); } 

        $data['editor'] = $this->Editors_model->getAllEditors();
        $data['tags'] = $this->Essay_model->getEssayTags($id);
        $data['status'] = $this->Essay_model->getEssayStatus($id_essay_clients);
        $data['feedback'] = $this->Feedback_model->getFeedbackById($id);
        $data['menus'] = 'all-essay';
        $data['submenus'] = 'verified';
        
        if($data['essay']['essay_deadline'] > $data['essay_editor']['uploaded_at']){
            $data['status'] = '<input type="text" readonly class="form-control form-control-sm border-success" value="&#xf058; &nbsp; Ontime">';
        } else {
            $data['status'] = '<input type="text" readonly class="form-control form-control-sm border-warning" value="&#xf017; &nbsp; Late">';
        }

        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/all-essay/verify-essay');
        $this->load->view('templates/user/footer');

        if($this->input->post('revision')) {
            $this->_revision();
        }
    }

    public function cancel($id)
    {
        $status = [
            'id_essay_clients' => $id,
            'status' => '4',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $essay = $this->Essay_model->getEssaybyEditors($id);
        $editors_mail = $essay['editors_mail'];
        $type = 'cancel';
        $user = $this->session->userdata('email');
        $content['managing'] = $this->Editors_model->getAllEditorsById('',$user);
        $content['editor'] = $essay;
        $content['client'] = $this->Essay_model->getEssayClientsById($id);
        $this->_sendEmail($type, $editors_mail, $content);
        $this->Essay_model->cancelAssign($id, $status);
        $message = '<a href="'.base_url('editor/essay-list').'" class="text-decoration-none text-muted">Your assignment was canceled.</a>';
        $role = $editors_mail;
        $this->notif_pusher->notif($message, $role);
        $this->session->set_flashdata('success', 'Clients essay was canceled.');
        redirect('editor/all-essay/views/'.$id);
    }

    public function _sendEmail($type, $editors_mail='', $content=''){
        $user = $this->session->userdata('email');
        
        if($type == 'assign') {
            $email = $this->input->post('editors');
        } else if(($type == 'cancel')or($type == 'revise')or($type == 'verify')) {
            $email = $editors_mail;
        }

        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from($user, 'Essay Editing Portal');
        $this->email->to($email);
        $this->email->cc('essay@all-inedu.com');

        if($type == 'assign') {
            // $this->email->cc($content['essay']['mentors_mail']);
            $this->email->subject('You have been assigned a new essay! ');
            $bodyMail = $this->load->view('mail/assign-essay',$content,true);
        } else
        if($type == 'cancel') {
            $this->email->subject('One of your assignments has been canceled ');
            $bodyMail = $this->load->view('mail/cancel-assign',$content,true);
        } else
        if($type == 'revise') {
            $content['notes'] = $this->input->post('notes_editors');
            $this->email->subject($content['essay']['first_name'].'`s essay, '.$content['essay']['essay_title'].', needs further revision');
            $bodyMail = $this->load->view('mail/revise-essay',$content,true);
        } else 
        if($type == 'verify') {
            $this->email->subject('Your Essay is Complete');
            $bodyMail = $this->load->view('mail/complete-essay','',true);
        }
        
        $this->email->message($bodyMail);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function send_email($id){
        $this->send_essay($id);
        $this->Essay_model->statusUnreadMentor($id);
        $this->session->set_flashdata('success', 'Essays have been sent to students/mentors.');
        redirect('editor/all-essay/verified/'.$id);
    }

    public function send_essay($id){
        $user = $this->session->userdata('email');
        $student = $this->Essay_model->getEssayClientsById($id);
        $editor = $this->Essay_model->getEssaybyEditors($id);
        

        if($student['mentors_mail']){
            $email = $student['mentors_mail'];
        } else {
            $email = $student['email'];
        }
        
        $mentor = $this->Mentors_model->getMentorsMail($email);

        $message = '<a href="'.base_url('mentor/essay-list').'" class="text-decoration-none text-muted"><b>Congratulations</b>, your essay has completed.</a>';
        $role = $email;
        $this->notif_pusher->notif($message, $role);

        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from($user, 'Essay Editing Portal');
        $this->email->to($email);
        $this->email->bcc('essay@all-inedu.com');

        $data['student'] = $student;
        $data['editor'] = $editor;
        $data['mentor'] = $mentor;

        $this->email->subject($student['first_name'].'`s essay, '.$student['essay_title'].', is ready! ');
        $bodyMail = $this->load->view('mail/sent-essay',$data,true);
        $this->email->message($bodyMail);
        if($editor['managing_file']){
            $this->email->attach('upload_files/program/essay/revised/' . $editor['managing_file']);
        }   else {
            $this->email->attach('upload_files/program/essay/editors/' . $editor['attached_of_editors']);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
        
        
    }

}