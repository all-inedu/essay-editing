<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'students') {
            redirect('/');
        }
        
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->model('Transaction_model');
        $this->load->model('Clients_model');
        $this->load->model('Program_model');
        $this->load->model('Essay_model');
        $this->load->library('mail_smtp');
    }


    public function index()
    {
        $user = $this->session->userdata('email');
        $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
        $data['user'] = $this->Clients_model->getAllClientsById($user);
        $data['menus'] = 'dashboard';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-students', $data);
        $this->load->view('templates/user/topbar-students', $data);
        $this->load->view('templates/user/dashboard');
        $this->load->view('templates/user/footer');
    }

}