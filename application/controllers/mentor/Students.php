<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Clients_model');
        $this->load->model('Mentors_model','mentors');
        
        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'mentors') {
            redirect('/login');
        }

    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $mentor = $this->mentors->getMentorsMail($email);
        $id = $mentor['id_mentors'];
        $data['clients'] = $this->Clients_model->getAllClientsByMentor($id);
        $data['menus'] = 'students';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors');
        $this->load->view('user/mentor/students/index');
        $this->load->view('templates/user/footer');
    }

    public function view($id)
    {
        $data['user'] = $this->Clients_model->getAllClientsById("",$id);
        $data['id'] = $id;
        $data['menus'] = 'students';
        $data['submenus'] = '';
        $data['status'] = 'view';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors');
        $this->load->view('user/mentor/students/view');
        $this->load->view('templates/user/footer');       
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('personal_brand', 'Personal Brand Statement', 'trim');
        $this->form_validation->set_rules('interests', 'Interests', 'trim');
        $this->form_validation->set_rules('personalities', 'Personalities', 'trim');

        if ($this->form_validation->run() == false) {
            $data['id'] = $id;
            $data['user'] = $this->Clients_model->getAllClientsById("",$id);
            $data['menus'] = 'students';
            $data['submenus'] = '';
            $data['status'] = 'edit';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-mentors', $data);
            $this->load->view('templates/user/topbar-mentors');
            $this->load->view('user/mentor/students/view');
            $this->load->view('templates/user/footer');   
        } else {
            $this->update($id);
        }
            
    }

    public function update($id)
    {
        $user = $this->session->userdata('email');
        echo $id;
        
        $data['personal_brand'] = $this->input->post('personal_brand');
        $data['interests'] = $this->input->post('interests');
        $data['personalities'] = $this->input->post('personalities');

        $file_resume = $_FILES['resume']['name'];
        $file_questionnaire = $_FILES['questionnaire']['name'];
        $file_others = $_FILES['others']['name'];

        $students = $this->Clients_model->getAllClientsById("", $id);

        // Activity Resume
        if ($file_resume) {
            $config['upload_path'] = './upload_files/user/students/resume/';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size'] = 20048;
            $config['file_name'] = 'Resume-'.$students['first_name'].'('.date('d-m-Y').')';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('resume')) {
                $students = $this->Clients_model->getAllClientsById("", $id);
                $old_file = $students['resume'];
                $target = 'upload_files/user/students/resume/'.$old_file;
                    
                if ($old_file == '') {} else {
                        unlink($target);
                    }
                    
                $resume_name = htmlspecialchars($this->upload->data('file_name'));
                $data['resume'] = $resume_name;

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                 redirect('mentor/students/view/'.$id);
            }
        }

        // Questionnaire
        if ($file_questionnaire) {
            $config['upload_path'] = './upload_files/user/students/questionnaire/';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size'] = 20048;
            $config['file_name'] = 'Questionnaire-'.$students['first_name'].'('.date('d-m-Y').')';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('questionnaire')) {
                $students = $this->Clients_model->getAllClientsById("",$id);
                $old_file = $students['questionnaire'];
                $target = 'upload_files/user/students/questionnaire/'.$old_file;
                    
                if ($old_file == '') {} else {
                        unlink($target);
                    }
                    
                $questionnaire_name = htmlspecialchars($this->upload->data('file_name'));
                $data['questionnaire'] = $questionnaire_name;

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                 redirect('mentor/students/view/'.$id);
            }
        }

        // Others
        if ($file_others) {
            $config['upload_path'] = './upload_files/user/students/others/';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size'] = 20048;
            $config['file_name'] = 'Others-'.$students['first_name'].'('.date('d-m-Y').')';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('others')) {
                $students = $this->Clients_model->getAllClientsById("",$id);
                $old_file = $students['others'];
                $target = 'upload_files/user/students/others/'.$old_file;
                    
                if ($old_file == '') {} else {
                        unlink($target);
                    }
                    
                $others_name = htmlspecialchars($this->upload->data('file_name'));
                $data['others'] = $others_name;

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                 redirect('mentor/students/view/'.$id);
            }
        }

        
        $this->Clients_model->updateClientsById($id, $data);
        $this->session->set_flashdata('success', 'Profile has been updated');
        redirect('mentor/students/view/'.$id);
    }
}