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
        $mentor = $this->Mentors_model->getMentorBigdata();
        $no=1;
        foreach($mentor as $mt):
            $id = $mt['mt_id'];
            $data = $this->Mentors_model->getMentorsID($id);
            if(empty($data) AND !empty($mt['mt_email'])){
                // echo $mt['mt_id'].". ".$mt['univ_name']." Belum ada di essay platform <br>";
                $mentors = [
                    'id_mentors' => $mt['mt_id'],
                    'first_name' => $mt['mt_firstn'],
                    'last_name' => $mt['mt_lastn'],
                    'phone' => $mt['mt_phone'],
                    'email' => $mt['mt_email'],
                    'graduated_from' => $mt['univ_name'],
                    'address' => $mt['mt_address'],
                    'status' => '1',
                    'password' => password_hash('all-in mentor', PASSWORD_DEFAULT),
                    // 'password' => $mt['mt_password'],
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->Mentors_model->importMentorsCRM($mentors);
            }
        $no++;
        endforeach;

        $this->session->set_flashdata('success', '
        Mentors CRM data synchronization <br> has been successful');
        redirect('admin/mentors');

        // $dataCRM = $this->Mentors_model->getMentorsCRM();
        // $no=0;  
        // foreach($dataCRM as $d):
        //     $email = $dataCRM[$no]['email'];
        //     $data = $this->Mentors_model->getMentorsMail($email);
            
        //     if(empty($data)){
        //         $mentors = [
        //             'id_mentors' => $dataCRM[$no]['id'],
        //             'first_name' => $dataCRM[$no]['first_name'],
        //             'last_name' => $dataCRM[$no]['last_name'],
        //             'phone' => $dataCRM[$no]['phone'],
        //             'email' => $email,
        //             'graduated_from' => $dataCRM[$no]['graduated_from'],
        //             'address' => $dataCRM[$no]['address'],
        //             'status' => '1',
        //             'password' => $dataCRM[$no]['password'],
        //             'created_at' => date('Y-m-d H:i:s'),
        //         ];

        //        $this->Mentors_model->importMentorsCRM($mentors);

        //     }
        // $no++;
        // endforeach;

        // $this->session->set_flashdata('success', '
        // Mentors CRM data synchronization <br> has been successful');
        // redirect('admin/mentors');
    }

}