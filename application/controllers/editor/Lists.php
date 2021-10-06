<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lists extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('mail_smtp');
        $this->load->model('Essay_model','essay');
        $this->load->model('Editors_model','editors');
        $this->load->model('Auth_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'editors') {
            redirect('/');
        }
    }

    public function index()
    {
        $user = $this->session->userdata('email');
        $data['editors'] = $this->editors->getAllEditorsWithoutMe('');
        $data['menus'] = 'list';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/list/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function invite()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tbl_editors.email]',
        [
            'is_unique' => 'This email has been registered.',
        ]);

        if($this->form_validation->run()==false) {
            $data['menus'] = 'list';
            $data['submenus'] = '';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-editors', $data);
            $this->load->view('templates/user/topbar-editors');
            $this->load->view('user/editor/list/invite');
            $this->load->view('templates/user/footer');
        } else {
           
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'activated_at' => time(),
            ];

            $this->Auth_model->saveToken($user_token);
            $this->_sendEmail($token);
            $this->session->set_flashdata('success', 'You have invited a new editor.');
            redirect('editor/lists');
        }
    }

    private function _sendEmail($token)
    {
        $email = $this->input->post('email');
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Test');
        $this->email->to($email);
        $this->email->set_priority(1);
        $this->email->subject('Invitation To The Editor');
        $mail_data['email'] = $email;
        $mail_data['token'] = $token;
        $mail_data['date'] = date('Y-m-d');
        $bodyMail = $this->load->view('mail/invite-editor', $mail_data, true);
        $this->email->message($bodyMail);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function view($id)
    {
        $data['editors'] = $this->editors->getAllEditorsById($id);
        $user = $data['editors']['email'];
        $data['position'] = $this->editors->getAllPositionEditors();
        $data['process'] = $this->essay->getEssayEditorList($user);
        $data['completed'] = $this->essay->getVerifiedEssayEditorList($user);
        $data['menus'] = 'list';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/list/view');
        $this->load->view('templates/user/footer');
    }

    public function deactivate()
    {
        $id = $this->input->post('id');
        $query = $this->editors->getAllEditorsById($id);

        if($query['status']==1) {
            $data = [
                'status' => 2,
            ];
            $this->editors->updatePositionById($id, $data);
        } else {
            $data = [
                'status' => 1,
            ];
            $this->editors->updatePositionById($id, $data);
        }

        $this->session->set_flashdata('success', 'Editors has been updated');
        redirect('editor/lists');
    }

}