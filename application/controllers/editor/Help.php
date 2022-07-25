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

        if ($role != 'editors') {
            redirect('/');
        }
    }

    public function index()
    {
        $data['menus'] = 'help';
        $data['submenus'] = '';

        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/help/index');
        $this->load->view('templates/user/footer');
    }

}