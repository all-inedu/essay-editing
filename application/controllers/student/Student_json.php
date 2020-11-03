<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_json extends CI_Controller
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
        $this->load->model('Transaction_model');
        $this->load->model('Clients_model');
        $this->load->model('Program_model');
        $this->load->model('Essay_model');
    }

    public function programByIdJson($id){
        $prog = $this->Program_model->programById($id);
        echo json_encode($prog);
    }
    
}