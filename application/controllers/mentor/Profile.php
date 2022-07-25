<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Admin_model');
        $this->load->library('form_validation');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');
        $this->load->model('Essay_model');
        $this->load->model('Clients_model');
        $this->load->model('Mentors_model','mentors');

        if ($role != 'mentors') {
            redirect('/login');
        }
    }

    public function change_password()
    {
        $user = $this->session->userdata('email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password dont math.',
                'min_length' => 'Password too short.',
            ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            
        if($this->form_validation->run()==false){
        $data['menus'] = '';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors', $data);
        $this->load->view('user/mentor/profile/change-password');
        $this->load->view('templates/user/footer');
        } else {
            // echo $user;
            $data['password'] = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $this->mentors->updateMentors($user, $data);
            $this->session->set_flashdata('success', 'Your password has been changed.');
            redirect('mentor/dashboard');
        }

        
    }

    public function view()
    {
        $data['menus'] = '';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors', $data);
        $this->load->view('templates/error/404');
        $this->load->view('templates/user/footer');
    }


}