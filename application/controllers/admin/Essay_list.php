<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Essay_list extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
        // $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('mail_smtp');
        $this->load->model('Essay_model');
        $this->load->model('Editors_model');
        $this->load->model('Mentors_model');
        $this->load->model('Feedback_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }
    }

    public function index()
    {
        $data['essay'] = $this->Essay_model->getEssayList(); 
        $data['menus'] = 'essay-list';
        $data['submenus'] = 'ongoing';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/essay-list/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function verify($id='')
    {
        $data['essay'] = $this->Essay_model->getEssayVerifyList($id); 
        $data['menus'] = 'essay-list';
        $data['submenus'] = 'verified';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/essay-list/verify-list', $data);
        $this->load->view('templates/user/footer');
    }
        

    public function status($id)
    {
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $status = $data['essay']['status_essay_clients'];
        if(($status=='0') OR ($status=='4') OR ($status=='5')){redirect('admin/essay-list/views/'.$id); } else 
        if($status=='1'){ redirect('admin/essay-list/assigned/'.$id);} else   
        if(($status=='2') OR ($status=='3') OR ($status=='6') OR ($status=='8')){ redirect('admin/essay-list/accepted/'.$id);} else 
        if(($status=='7')){ redirect('admin/essay-list/verified/'.$id);}  
        else {
            $this->session->set_flashdata('error', 'Students Essay is not found.');
            redirect('admin/essay-list');
        }
    }

    public function views($id)
    {
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $status = $data['essay']['status_essay_clients'];
        if(($status!='0')AND($status!='4')AND($status!='5')){ redirect('admin/essay-list/status/'.$id); } 
        
        $this->form_validation->set_rules('editors','Editors', 'required');
    
        if($this->form_validation->run()==false) {
        $data['essay_editor'] = $this->Essay_model->getEssaybyEditors($id);
        $data['essay_reject'] = $this->Essay_model->getRejectedEssay($id);
        $data['editor'] = $this->Editors_model->getAllEditors();

        $data['menus'] = 'essay-list';
        $data['submenus'] = 'ongoing';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/essay-list/view-essay');
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
            $this->_sendEmail($type,'');
            $this->session->set_flashdata('success', 'Clients essay has been assigned to editors.');
            redirect('admin/essay-list/assigned/'.$id);
        }
    }

    public function assigned($id)
    {
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $status = $data['essay']['status_essay_clients'];
        if($status!='1'){ redirect('admin/essay-list/status/'.$id); } 

        $data['essay_editor'] = $this->Essay_model->getEssaybyEditors($id);
        $data['editor'] = $this->Editors_model->getAllEditors();
        $data['menus'] = 'essay-list';
        $data['submenus'] = 'ongoing';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/essay-list/assign-essay');
        $this->load->view('templates/user/footer');
    }

    public function accepted($id)
    {
        $id_essay_clients = $id;
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $data['revise'] = $this->Essay_model->getEssayReviseById($id);
        $status = $data['essay']['status_essay_clients'];
        // var_dump($data['revise']);
        if(($status!='2')AND($status!='3')AND($status!='6')AND($status!='8')){ redirect(admin/'essay-list/status/'.$id); } 

        $data['essay_editor'] = $this->Essay_model->getEssaybyEditors($id);
        $data['editor'] = $this->Editors_model->getAllEditors();
        $data['tags'] = $this->Essay_model->getEssayTags($id);
        $data['status'] = $this->Essay_model->getEssayStatus($id_essay_clients);
        $data['menus'] = 'essay-list';
        $data['submenus'] = 'ongoing';

        $this->form_validation->set_rules('notes_editors', 'Notes for Editors', 'required');

        if ($this->form_validation->run()==false){
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/essay-list/accept-essay');
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
        $editor = $this->Essay_model->getEssaybyEditors($id);
        $editors_mail = $editor['editors_mail'];
        
        $data = [
            'notes_editors' => $notes,
            'status_essay_editors' => '7'
        ];

        $status = [
            'id_essay_clients' => $id,
            'status' => '7',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        
        $type = 'verify';
        $this->_sendEmail($type, $editors_mail);

        $this->Essay_model->verifiedEssay($id, $data, $status);
        $this->session->set_flashdata('success', 'Editors essay has been verified.');
        redirect('admin/essay-list/verified/'.$id);
    }

    public function _revision()
    {
        $st = 'revision';
        $id = $this->input->post('id_essay_clients');
        $notes = $this->input->post('notes_editors');
        $editors_mail = $this->input->post('editors_mail');
        $role = 'admin';
        $date = date('Y-m-d H:i:s');
        $admin = $this->session->userdata('email');
        
        $revise = [
            'id_essay_clients' => $id,
            'editors_mail' => $editors_mail,
            'admin_mail' => $admin,
            'role' => $role,
            'notes' => $notes,
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
        
        $type = 'revise';
        $this->_sendEmail($type, $editors_mail);

        $this->Essay_model->revisionEssay($id, $data, $revise, $status);
        $this->session->set_flashdata('success', 'Editors essay must be corrected.');
        redirect('admin/essay-list/accepted/'.$id);
    }

    public function verified($id)
    {
        $id_essay_clients = $id;
        $data['essay'] = $this->Essay_model->getEssayClientsById($id);
        $status = $data['essay']['status_essay_clients'];
        
        if(($status!='7')){ redirect('admin/essay-list/status/'.$id); } 

        $data['essay_editor'] = $this->Essay_model->getEssaybyEditors($id);
        $data['editor'] = $this->Editors_model->getAllEditors();
        $data['tags'] = $this->Essay_model->getEssayTags($id);
        $data['status'] = $this->Essay_model->getEssayStatus($id_essay_clients);
        $data['feedback'] = $this->Feedback_model->getFeedbackById($id);
        $data['menus'] = 'essay-list';
        $data['submenus'] = 'verified';

        if($data['essay']['essay_deadline'] > $data['essay_editor']['uploaded_at']){
            $data['status'] = '<input type="text" readonly class="form-control form-control-sm border-success" value="&#xf058; &nbsp; Ontime">';
        } else {
            $data['status'] = '<input type="text" readonly class="form-control form-control-sm border-warning" value="&#xf017; &nbsp; Late">';
        }

        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/essay-list/verify-essay');
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
        $this->_sendEmail($type, $editors_mail);
        $this->Essay_model->cancelAssign($id, $status);
        $this->session->set_flashdata('success', 'Clients essay was canceled.');
        redirect('admin/essay-list/views/'.$id);
    }

    public function _sendEmail($type, $editors_mail=''){
        if($type == 'assign') {
            $email = $this->input->post('editors');
        } else if(($type == 'cancel')or($type == 'revise')or($type == 'verify')) {
            $email = $editors_mail;
        }

        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Editing System');
        $this->email->to($email);
        // $this->email->bcc('hafidz.bdt@gmail.com');

        if($type == 'assign') {
            $this->email->subject('Your Assignment');
            $bodyMail = $this->load->view('mail/assign-essay','',true);
        } else
        if($type == 'cancel') {
            $this->email->subject('Assignment Canceled');
            $bodyMail = $this->load->view('mail/cancel-assign','',true);
        } else
        if($type == 'revise') {
            $data['notes'] = $this->input->post('notes_editors');
            $this->email->subject('Revise Your Essay');
            $bodyMail = $this->load->view('mail/revise-essay',$data,true);
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

        $this->session->set_flashdata('success', 'Essays have been sent to students/mentors.');
        redirect('admin/essay-list/verified/'.$id);
    }

    public function send_essay($id){
        $student = $this->Essay_model->getEssayClientsById($id);
        $editor = $this->Essay_model->getEssaybyEditors($id);

        if($student['mentors_mail']){
            $email = $student['mentors_mail'];
        } else {
            $email = $student['email'];
        }

        $mentor = $this->Mentors_model->getMentorsMail($email);

        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Admin - Essay Editing Portal');
        $this->email->to($email);
        $this->email->cc('essay@all-inedu.com');

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
        
        $this->email->send();

        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
        
        
    }

}