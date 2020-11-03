<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->model('Transaction_model');
        $this->load->model('Clients_model');
        $this->load->model('Mentors_model');
        $this->load->model('Editors_model');
        $this->load->model('Essay_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }
    }
    
    public function index()
    {
        $data['paid'] = $this->Transaction_model->getAllTransactionPaid();
        $data['student'] = count($this->Clients_model->getAllClients());
        $data['mentors'] = count($this->Mentors_model->getAllMentors());
        $data['editors'] = count($this->Editors_model->getAllEditors());
        $data['ongoing'] = count($this->Essay_model->getEssayList());
        $data['completed'] = count($this->Essay_model->getEssayVerifyList());
        $data['menus'] = 'dashboard';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function pendingCountJson()
    {
        $pending = $this->Transaction_model->getAllTransactionPending();
        echo json_encode($pending);
    }

    public function verifyCountJson()
    {
        $verify = $this->Transaction_model->getAllTransactionVerify();
        echo json_encode($verify);
    }
}