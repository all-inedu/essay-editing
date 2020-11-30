<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Clients_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }

    }

    public function index()
    {
        $data['clients'] = $this->Clients_model->getAllClients();
        $data['menus'] = 'users';
        $data['submenus'] = 'clients';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/clients/index');
        $this->load->view('templates/user/footer');
    }

    public function sycnCRMClients()
    {
        $dataCRM = $this->Clients_model->getAllClientsCrm();
        $no = 0;
        foreach ($dataCRM as $d):
            $email = $dataCRM[$no]['email'];
            $data = $this->Clients_model->checkClientById($email);
            if (empty($data)) {
                $students = [
                    'id_clients' => $dataCRM[$no]['id'],
                    'first_name' => $dataCRM[$no]['first_name'],
                    'last_name' => $dataCRM[$no]['last_name'],
                    'phone' => $dataCRM[$no]['phone'],
                    'email' => $email,
                    'address' => $dataCRM[$no]['address'],
                    'id_mentor' => $dataCRM[$no]['mentor_id'],
                    'status' => '1',
                    'password' => $dataCRM[$no]['password'],
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->Clients_model->importClientsCRM($students);
            }
            $no++;
        endforeach;

        $this->session->set_flashdata('success', 'Clients CRM data synchronization <br> has been successful');
        redirect('admin/clients');
    }

    public function view($id)
    {
        $data['user'] = $this->Clients_model->getAllClientsById($id);
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
