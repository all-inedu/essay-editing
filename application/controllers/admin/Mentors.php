<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mentors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Mentors_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }

    }

    public function index()
    {
        $data['mentors'] = $this->Mentors_model->getAllMentors();
        $data['menus'] = 'users';
        $data['submenus'] = 'mentors';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/mentors/index');
        $this->load->view('templates/user/footer');
    }

    public function sycnCRMMentors()
    {
        $dataCRM = $this->Mentors_model->getMentorsCRM();
        $no=0;  
        foreach($dataCRM as $d):
            $email = $dataCRM[$no]['email'];
            $data = $this->Mentors_model->getMentorsMail($email);
            
            if(empty($data)){
                $mentors = [
                    'id_mentors' => $dataCRM[$no]['id'],
                    'first_name' => $dataCRM[$no]['first_name'],
                    'last_name' => $dataCRM[$no]['last_name'],
                    'phone' => $dataCRM[$no]['phone'],
                    'email' => $email,
                    'graduated_from' => $dataCRM[$no]['graduated_from'],
                    'address' => $dataCRM[$no]['address'],
                    'status' => '1',
                    'password' => $dataCRM[$no]['password'],
                    'created_at' => date('Y-m-d H:i:s'),
                ];

               $this->Mentors_model->importMentorsCRM($mentors);

            }
        $no++;
        endforeach;

        $this->session->set_flashdata('success', '
        Mentors CRM data synchronization <br> has been successful');
        redirect('admin/mentors');
    }

}