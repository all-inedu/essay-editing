<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Clients_model');
        $this->load->model('Mentors_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }

    }

    public function index()
    {
        $bigdata_client = $this->Clients_model->getAllBigdata();
        $bigdata_clients = [];
        foreach ($bigdata_client as $cl):
            $email = $cl['st_mail'];
            $data = $this->Clients_model->checkClientById($cl['st_num']);
            if (empty($data)) {
                $students = [
                    'id_clients' => $cl['st_num'],
                    'first_name' => $cl['st_firstname'],
                    'last_name' => $cl['st_lastname'],
                    'phone' => $cl['st_phone'],
                    'email' => $email,
                    'id_mentor' => $cl['mt_id1'],
                ];
                $bigdata_clients[] = $students;
            }
        endforeach;

        $data['bigdata_clients'] = $bigdata_clients;
        $data['clients'] = $this->Clients_model->getAllClients();
        $data['menus'] = 'users';
        $data['submenus'] = 'clients';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/clients/index');
        $this->load->view('templates/user/footer');
    }

    public function syncCRMClients()
    {
        $client = $this->Clients_model->getAllBigdata();
        foreach ($client as $cl):
            $email = $cl['st_mail'];
            $data = $this->Clients_model->checkClientById($cl['st_num']);
            if (empty($data)) {
                $students = [
                    'id_clients' => $cl['st_num'],
                    'first_name' => $cl['st_firstname'],
                    'last_name' => $cl['st_lastname'],
                    'phone' => $cl['st_phone'],
                    'email' => $email,
                    'address' => $cl['st_address'],
                    'id_mentor' => $cl['mt_id1'],
                    'status' => '1',
                    'password' => $cl['st_password'],
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->Clients_model->importClientsCRM($students);
                
            } 
            // else {
                // $id = $cl['st_num'];
                // $data_update = [
                //     'first_name' => $cl['st_firstname'],
                //     'last_name' => $cl['st_lastname'],
                //     'phone' => $cl['st_phone'],
                //     'email' => $email,
                //     'id_mentor' => $cl['mt_id1'],
                //     'address' => $cl['st_address'],
                //     'updated_at' => date('Y-m-d H:i:s'),
                // ];

                // echo json_encode($data_update);
                // $this->Clients_model->updateClientsById($id, $data_update);
            // }
        endforeach;
        $this->session->set_flashdata('success', 'Clients CRM data synchronization <br> has been successful');
        redirect('admin/clients');
    }



    public function view($id)
    {
        $data['user'] = $this->Clients_model->getAllClientsById("",$id);
        $data['mentors'] = $this->Mentors_model->getAllMentors();
        $data['menus'] = 'users';
        $data['submenus'] = 'clients';
        $data['readonly'] = 'readonly';
        $data['hidden'] = 'hidden';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/clients/view');
        $this->load->view('templates/user/footer');
    }

}