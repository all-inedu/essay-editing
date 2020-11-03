<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

    public function index()
    {
        $user = $this->session->userdata('email');
        $data['ongoing'] = count($this->Essay_model->getEssayList($user)); 
        $data['completed'] = count($this->Essay_model->getEssayByMentors($user));  
        $mentor = $this->mentors->getMentorsMail($user);
        $id = $mentor['id_mentors'];
        $data['students'] = count($this->Clients_model->getAllClientsByMentor($id));
        $data['menus'] = 'dashboard';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors');
        $this->load->view('user/mentor/index');
        $this->load->view('templates/user/footer');
    }

}