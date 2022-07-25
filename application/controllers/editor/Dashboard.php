<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Essay_model','essay');
        $this->load->model('Editors_model','editors');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'editors') {
            redirect('/');
        }
    }


    public function index()
    {
        $user = $this->session->userdata('email');
        $data['editor'] = $user;
        $data['allessay1'] = count($this->essay->essayDeadline('-1','1'));
        $data['allessay2'] = count($this->essay->essayDeadline('1','3'));
        $data['allessay3'] = count($this->essay->essayDeadline('3','5'));
        $data['youressay1'] = count($this->essay->essayDeadlineToEditor($user,'0','1'));
        $data['youressay2'] = count($this->essay->essayDeadlineToEditor($user,'1','3'));
        $data['youressay3'] = count($this->essay->essayDeadlineToEditor($user,'3','5'));
        $data['process'] = count($this->essay->getEssayEditorList($user));
        $data['completed'] = count($this->essay->getVerifiedEssayEditorList($user));
        $data['allCompleted'] = count($this->essay->getEssayVerifyList());
        $data['allProcess'] = count($this->essay->getEssayList());
        $data['menus'] = 'dashboard';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/index');
        $this->load->view('templates/user/footer');
    }
    
}