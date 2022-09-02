<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Help extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }
    }

    public function index()
    {
        $data['menus'] = 'help';
        $data['submenus'] = '';

        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/help/index');
        $this->load->view('templates/user/footer');
    }

}