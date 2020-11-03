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
        $this->load->library('notif_pusher');
        $this->load->model('Essay_model','essay');
        $this->load->model('Editors_model','editors');
        $this->load->model('Mentors_model','mentors');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'editors') {
            redirect('/');
        }
    }


    public function index()
    {
        $user = $this->session->userdata('email');
        $data['essay'] = $this->essay->getEssayEditorList($user); 
        $data['verified'] = $this->essay->getVerifiedEssayEditorList($user); 
        $data['menus'] = 'essay-list';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/essay-list/index', $data);
        $this->load->view('templates/user/footer');
    }
    

    public function view($id)
    {
        $this->essay->statusReadEditor($id);
        $data['essay_editor'] = $this->essay->getEssayEditorsById($id);
        if($data['essay_editor']) {
            $id_essay_client = $data['essay_editor']['id_essay_clients'];
            $data['essay'] = $this->essay->getEssayClientsById($id_essay_client);
            $data['tags'] = $this->essay->getEssayTopic();
            $data['tags_clients'] = $this->essay->getEssayTags($id_essay_client);
            $data['revise'] = $this->essay->getEssayReviseById($id_essay_client);
            // var_dump($data['revise']);
            $data['status'] = $this->essay->getEssayStatus($id_essay_client);
            $data['menus'] = 'essay-list';
            $data['submenus'] = '';

            $this->form_validation->set_rules('tags[]', 'Tags', 'required');

            if($this->form_validation->run()==false){        
                $this->load->view('templates/user/header');
                $this->load->view('templates/user/sidebar-editors', $data);
                $this->load->view('templates/user/topbar-editors');
                $this->load->view('user/editor/essay-list/view-essay', $data);
                $this->load->view('templates/user/footer');
                if($this->input->post('comments')){
                    $this->commentsEssay($id);
                }
            } else {
                if($this->input->post('upload')){
                    $this->updateEssayEditors();
                } else if($this->input->post('revision')){
                    $this->updateEssayEditorsRevision(); 
                } 
            }
        } else {
            $this->session->set_flashdata('error', 'Students Essay is not found.');
            redirect('editor/essay-list');
        }
    }

    public function commentsEssay($id){
        $id_essay = $this->input->post('id_essay_clients');
        $notes = $this->input->post('notes_editors');
        $editors_mail = $this->session->userdata('email');
        $role = 'editor';
        $date = date('Y-m-d H:i:s');

        $comments = [
            'id_essay_clients' => $id_essay,
            'editors_mail' => $editors_mail,
            'role' => $role,
            'notes' => $notes,
            'created_at' => $date
        ];
        // var_dump($comments);
        // $type = 'comments';
        // $this->_sendEmail($type);
        $this->essay->commentsEssay($comments);
        $this->essay->statusUnreadManagingEditor($id);
        redirect('editor/essay-list/view/'.$id);
    }

    public function updateEssayEditors()
    {
        $id_essay_clients = $this->input->post('id_essay_clients');
        $id_essay_editors = $this->input->post('id_essay_editors');
        $id = $id_essay_clients;
        $user = $this->session->userdata('email');
        $editors = $this->editors->getAllEditorsByEmail($user);
        $clients = $this->essay->getEssayClientsById($id);
        $file_name = 'Editing-'.$clients['first_name'].'-Essays-by-'.$editors['first_name'].'('.date('d-m-Y').')';
        
        $files = $_FILES['files']['name'];
        $tags = $this->input->post('tags[]');

        if($files){

            $config['upload_path'] = './upload_files/program/essay/editors/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048;
            $config['file_name'] = $file_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('files')) {
                $new_files = htmlspecialchars($this->upload->data('file_name'));
                
                $duration = [
                    'id_essay_editors' => $id_essay_editors,
                    'status' => 'Submitted',
                    'duration' => $this->input->post('work_duration'),
                    'date' => date('Y-m-d H:i:s'),
                ];
                
                $data = [
                    'attached_of_editors' => $new_files,
                    'uploaded_at' => date('Y-m-d H:i:s'),
                    'status_essay_editors' => '3',
                    'work_duration' => $this->input->post('work_duration'),
                    'notes_editors' => $this->input->post('notes'),
                ];
                
                $status = [
                    'id_essay_clients' => $id_essay_clients,
                    'status' => '3',
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $no=0;
                foreach ($tags as $i):
                    
                    $data_tags = [
                        'id_essay_clients' => $id_essay_clients,
                        'id_topic' => $tags[$no]
                    ];
                    $this->essay->insertEssayTags($data_tags);
    
                $no++;
                endforeach;

                $type = 'upload';
                $this->_sendEmail($type);
                $this->essay->updateEssayEditors($data, $status, $id_essay_clients);
                $this->essay->workDuration($duration);
                $this->essay->statusUnreadManagingEditor($id);
                $message = '<a href="'.base_url('editor/all-essay/lists/process').'" class="text-decoration-none text-muted">Editor has uploaded the essay.</a>';
                $role = 'managing';
                $this->notif_pusher->notif($message, $role);
                $this->session->set_flashdata('success', 'Your essay has been uploaded<br> Please waiting to verified.');
                redirect('editor/essay-list/view/'.$id_essay_editors);

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('editor/essay-list/view/'.$id_essay_editors);
            }

         } else {
            $this->session->set_flashdata('error', 'Please, you must upload your essay.');
            redirect('editor/essay-list/view/'.$id_essay_editors);
         }
    }

    public function updateEssayEditorsRevision()
    {
        $id_essay_clients = $this->input->post('id_essay_clients');
        $id_essay_editors = $this->input->post('id_essay_editors');
        $id = $id_essay_clients;
        $user = $this->session->userdata('email');
        $editors = $this->editors->getAllEditorsByEmail($user);
        $clients = $this->essay->getEssayClientsById($id);
        $file_name = 'Editing-'.$clients['first_name'].'-Essay-by-'.$editors['first_name'].'('.date('d-m-Y').')';

        $files = $_FILES['files']['name'];
        $tags = $this->input->post('tags[]');
        
        $this->essay->deleteEssayTagsById($id_essay_clients);

        if($files){

            $config['upload_path'] = './upload_files/program/essay/editors/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048;
            $config['file_name'] = $file_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('files')) {
                $essay_editor = $this->essay->getEssaybyEditors($id);
                $old_essay = $essay_editor['attached_of_editors'];
                $target = 'upload_files/program/essay/editors/'.$old_essay;
                unlink($target);
                

                $new_files = htmlspecialchars($this->upload->data('file_name'));
                $work_duration = $essay_editor['work_duration'] + $this->input->post('work_duration');
                $duration = [
                    'id_essay_editors' => $id_essay_editors,
                    'status' => 'Revised',
                    'duration' => $this->input->post('work_duration'),
                    'date' => date('Y-m-d H:i:s'),
                ];
                
                $data = [
                    'attached_of_editors' => $new_files,
                    'uploaded_at' => date('Y-m-d H:i:s'),
                    'status_essay_editors' => '8',
                    'work_duration' => $work_duration,
                    'notes_editors' => $this->input->post('notes'),
                ];
                
                $status = [
                    'id_essay_clients' => $id_essay_clients,
                    'status' => '8',
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $no=0;
                foreach ($tags as $i):
                    
                    $data_tags = [
                        'id_essay_clients' => $id_essay_clients,
                        'id_topic' => $tags[$no]
                    ];
                    $this->essay->insertEssayTags($data_tags);
    
                $no++;
                endforeach;

                $type = 'revised';
                $this->_sendEmail($type);
                $this->essay->updateEssayEditorsRevision($data, $status, $id_essay_clients);
                $this->essay->workDuration($duration);
                $this->essay->statusUnreadManagingEditor($id);
                $message = '<a href="'.base_url('editor/all-essay/lists/process').'" class="text-decoration-none text-muted">Editor has revised the essay.</a>';
                $role = 'managing';
                $this->notif_pusher->notif($message, $role);
                $this->session->set_flashdata('success', 'Your essay has been uploaded<br> Please waiting to verified.');
                redirect('editor/essay-list/view/'.$id_essay_editors);

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('editor/essay-list/view/'.$id_essay_editors);
            }

         } else {
            $this->session->set_flashdata('error', 'Please, you must upload your essay.');
            redirect('editor/essay-list/view/'.$id_essay_editors);
         }
    }
    

    public function accepted($id, $id_essay_editors)
    {
        $status = [
            'id_essay_clients' => $id,
            'status' => '2',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $type = 'accept';
        $this->_sendMentor($id, $type);
        $this->essay->acceptedEssay($id, $status);
        $this->essay->statusUnreadManagingEditor($id);

        $message = '<a href="'.base_url('editor/all-essay/lists/process').'" class="text-decoration-none text-muted">Editor accepted your assignment.</a>';
        $role = 'managing';
        $this->notif_pusher->notif($message, $role);

        $this->session->set_flashdata('success', 'Students essay was accepted.');
        redirect('editor/essay-list/view/'.$id_essay_editors);
    }

    public function rejected($id)
    {
        $id_essay_editors = $this->input->post('id_essay_editors');

        $this->form_validation->set_rules('notes', 'Notes', 'required|trim');

        if($this->form_validation->run()==false){
            $this->session->set_flashdata('error', 'Please fill in the notes field,<br> Why did you reject this essay?');
            redirect('editor/essay-list/view/'.$id_essay_editors);
        } else {
            $reject_check = count($this->essay->getRejectedEssay($id));
            if($reject_check<3){
                $data = [
                    'id_essay_clients' => $id,
                    'editors_mail' => $this->input->post('editors'),
                    'notes' => $this->input->post('notes'),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                
                $status = [
                    'id_essay_clients' => $id,
                    'status' => '5',
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $type = 'reject';
                $this->_sendEmail($type);
                $this->essay->rejectedEssay($id, $data, $status);
                $this->essay->statusUnreadManagingEditor($id);
                $message = '<a href="'.base_url('editor/all-essay/lists/student-essay').'" class="text-decoration-none text-muted">Editor rejected your assignment.</a>';
                $role = 'managing';
                $this->notif_pusher->notif($message, $role);
                $this->session->set_flashdata('success', 'Students essay was rejected.');
                redirect('editor/essay-list');
            } else {
                $this->session->set_flashdata('error', 'You cannot reject this essay !');
                redirect('editor/essay-list/view/'.$id_essay_editors);
            }
         }
    }

    public function _sendMentor($id, $type) {
        $email = $user = $this->session->userdata('email');
        $client = $this->essay->getEssayClientsById($id);
        $editor = $this->editors->getAllEditorsByEmail($email);
        $mentor = $client['mentors_mail'];
        
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from($email, $editor['first_name'].' '.$editor['last_name']);
        $this->email->to($mentor);
        $this->email->cc('essay@all-inedu.com');
        
        if($type == 'accept') {
            $data['editor'] = $editor;
            $data['client'] = $client;
            $data['mentor'] = $this->mentors->getMentorsMail($mentor);
            $this->email->subject($client['first_name'].' '.$client['last_name'].'`s essay, '.$client['essay_title'].', is in progress!');
            $bodyMail = $this->load->view('mail/accept-assign',$data,true);
        } 
        
        $this->email->message($bodyMail);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function _sendEmail($type){
        $email = $user = $this->session->userdata('email');
        $id = $this->input->post('id_essay_clients');
        $client = $this->essay->getEssayClientsById($id);
        $editor = $this->editors->getAllEditorsByEmail($email);
        $managing_editor = $this->editors->getAllManagingEditors();
        $col = array_column($managing_editor, 'email');
        $me_mail = implode(", ",$col);
 
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from($email, $editor['first_name'].' '.$editor['last_name']);
        $this->email->to($me_mail);
        $this->email->cc('essay@all-inedu.com');

        if($type == 'reject') {
            $mentors_mail = $client['mentors_mail'];
            $data['editor'] = $editor;
            $data['client'] = $client;
            $data['mentor'] = $this->mentors->getMentorsMail($mentors_mail);
            $data['notes'] = $this->input->post('notes');
            $this->email->subject($data['editor']['first_name'].' '.$data['editor']['last_name'].' has rejected an essay assignment');
            $bodyMail = $this->load->view('mail/reject-assign',$data, true);
        } else
        if($type == 'accept') {
            $this->email->subject('Assignment Accepted');
            $bodyMail = $this->load->view('mail/accept-assign','',true);
        }  else
        if($type == 'upload') {
            $mentors_mail = $client['mentors_mail'];
            $data['editor'] = $editor;
            $data['client'] = $client;
            $data['mentor'] = $this->mentors->getMentorsMail($mentors_mail);
            $this->email->subject($data['editor']['first_name'].' '.$data['editor']['last_name'].' has submitted an essay! ');
            $bodyMail = $this->load->view('mail/editor-upload',$data,true);
        } else
        if($type == 'revised') {
            $mentors_mail = $client['mentors_mail'];
            $data['editor'] = $editor;
            $data['client'] = $client;
            $data['mentor'] = $this->mentors->getMentorsMail($mentors_mail);
            $this->email->subject($data['editor']['first_name'].' '.$data['editor']['last_name'].' has submitted an essay revision!');
            $bodyMail = $this->load->view('mail/editor-revise',$data,true);
        } else
        if($type == 'comments') {
            $data['notes'] = $this->input->post('notes_editors');
            $this->email->subject('Editor Comments');
            $bodyMail = $this->load->view('mail/editor-comments',$data,true);
        }
        
        $this->email->message($bodyMail);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }



}