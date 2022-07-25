<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');
        $this->load->library('form_validation');
        $this->load->library('mail_smtp');
        $this->load->library('notif_pusher');
        $this->load->model('Clients_model');
        $this->load->model('Mentors_model','mentors');
        $this->load->model('Editors_model','editors');
        $this->load->model('Program_model','program');
        $this->load->model('Essay_model','essay');

        if ($role != 'mentors') {
            redirect('/login');
        }
    }

    public function index(){
        $data['menus'] = 'program';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors', $data);
        $this->load->view('user/mentor/program/index');
        $this->load->view('templates/user/footer');
    }

    public function essay()
    { 
        // $lastEssay = $this->essay->lastEssay();
        // $last = $lastEssay['id_essay_clients'];
        // // $count = count($this->essay->countEssayList());
        // $id_essay = $last + 1;
        // echo $id_essay;
        $data['programs'] = $this->program->getAllEssayPrograms();
        $email = $this->session->userdata('email');
        $mentor = $this->mentors->getMentorsMail($email);
        $id = $mentor['id_mentors'];
        $data['students'] = $this->Clients_model->getAllClientsByMentor($id);
        $data['editor'] = $this->editors->getAllEditor();
        $data['univ'] = $this->essay->getAllUniv();
        $data['prompt'] = $this->essay->getAllEssayPrompt();
        $data['menus'] = 'program';
        $data['submenus'] = '';
        $data['essay_title'] = ['Common App','Coalition App', 'UCAS', 'Personal Statement', 'Supplemental Essay','Other'];

        $this->form_validation->set_rules('student', 'Students Name', 'required');
        $this->form_validation->set_rules('univ_name', 'Universities Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('words', '', 'required',[
            'required' => 'Fields is required'
        ]);

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors', $data);
        $this->load->view('user/mentor/program/essay');
        $this->load->view('templates/user/footer');
        } else {
            $today = date('Y-m-d');
            $date1 = $this->input->post('essay_deadline');
            $date2 = $this->input->post('app_deadline');
            
            if(strtotime($date1) < strtotime($today))
            {
                $this->session->set_flashdata('error', 'Essay deadline must be more than today');
                redirect('mentor/program/essay'); 
            } else 
            if(strtotime($date2) < strtotime($date1)) {
                $this->session->set_flashdata('error', 'Application deadline must be more than essay deadline');
                redirect('mentor/program/essay'); 
            }

            $this->uploadEssay();
        }
    }

    public function uploadEssay(){
        $email = $this->session->userdata('email');
        $mentor = $this->mentors->getMentorsMail($email);
        $student_mail = $this->input->post('student');
        $student_id = $this->input->post('student_id');
        $student = $this->Clients_model->getAllClientsById($student_mail, $student_id);
        $file_name = $student['first_name'].'\'s Essay by '.$mentor['first_name'].'('.date('d-m-Y').')';
        $lastEssay = $this->essay->lastEssay();
        $last = $lastEssay['id_essay_clients'];
        // $count = count($this->essay->countEssayList());
        $id_essay = $last + 1;

        $checked =  $this->input->post('title');
        if($checked!='Other'){
            $title = $this->input->post('title');
        } else {
            $title = $this->input->post('titleOther');
        }

        $code = '-';
        
        $files = $_FILES['files']['name'];
        if ($files) {
            $config['upload_path'] = './upload_files/program/essay/students/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048;
            $config['file_name'] = $file_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('files')) {
                $new_files = htmlspecialchars($this->upload->data('file_name'));
                $data = [
                    'id_essay_clients' => $id_essay,
                    'id_transaction' => $code,
                    'id_program' => $this->input->post('words'),
                    'id_univ' => $this->input->post('univ_name'),
                    'id_editors' => $this->input->post('id_editors'),
                    'essay_title' => $title,
                    'essay_prompt' => $this->input->post('essay_prompt'),
                    'id_clients' => $this->input->post('student_id'),
                    'email' => $student_mail,
                    'mentors_mail' => $this->session->userdata('email'),
                    'essay_deadline' => $this->input->post('essay_deadline'),
                    'application_deadline' => $this->input->post('app_deadline'),
                    'attached_of_clients' => $new_files,
                    'uploaded_at' => date('Y-m-d H:i:s'),
                ];

                $status = [
                    'id_essay_clients' => $id_essay,
                    'status' => '0',
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $this->essay->insertEssayClients($data, $status);
                $this->_sendEmailEssay($data);
                $message = '<a href="'.base_url('editor/all-essay/lists/student-essay').'" class="text-decoration-none text-muted">Mentor has uploaded the essay.</a>';
                $role = 'managing';
                $this->notif_pusher->notif($message, $role);
                $this->session->set_flashdata('success', 'Your essay has been uploaded<br> Please waiting to process.');
                redirect('mentor/dashboard');


            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('mentor/program/essay');
            }

        } else {
            $this->session->set_flashdata('error', 'You must upload your essay.');
            redirect('mentor/program/essay');
        }
    }

    private function _sendEmailEssay($data)
    {
        $managing_editor = $this->editors->getAllManagingEditors();
        $col = array_column($managing_editor, 'email');
        $email = implode(", ",$col);
        $id = $data['id_essay_clients'];
        $essay = $this->essay->getEssayClientsById($id);
        $mentors_mail = $essay['mentors_mail'];
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from($mentors_mail, 'Mentors - Essay Editing Portal');
        $this->email->to('essay@all-inedu.com');
        $this->email->bcc($email);

        $this->email->subject('An essay needs to be assigned!');

        $datas['detail'] = $essay;
        $datas['date'] = date('Y-m-d');
        $datas['mentor'] = $this->mentors->getMentorsMail($mentors_mail);
        $bodyMail = $this->load->view('mail/upload-essays-student', $datas, true);
        $this->email->message($bodyMail);
        $this->email->attach('upload_files/program/essay/students/' . $essay['attached_of_clients']);

            // Send Email
        $this->email->send();
        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
    }


public function resume()
{
$data['menus'] = 'program';
$data['submenus'] = '';
$this->load->view('templates/user/header');
$this->load->view('templates/user/sidebar-mentors', $data);
$this->load->view('templates/user/topbar-mentors', $data);
$this->load->view('templates/error/404');
$this->load->view('templates/user/footer');
}

public function cover_letter()
{
$data['menus'] = 'program';
$data['submenus'] = '';
$this->load->view('templates/user/header');
$this->load->view('templates/user/sidebar-mentors', $data);
$this->load->view('templates/user/topbar-mentors', $data);
$this->load->view('templates/error/404');
$this->load->view('templates/user/footer');
}
}