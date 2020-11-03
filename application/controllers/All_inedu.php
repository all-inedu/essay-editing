<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All_inedu extends CI_Controller
{
    public function __construct()
        {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        }

    public function index()
    {
        $data['role'] = $this->session->userdata('role');
        if($data['role']){
            redirect('admin/dashboard');
        }
        
        $datas = ['title' => 'administrator'];
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
                $this->load->view('templates/home/new-header', $data);
                $this->load->view('home/login/login', $datas);
                $this->load->view('templates/home/footer');
         } else {
                $this->_loginAdmins();
        }
    }

    public function _loginAdmins()
    {
        $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Auth_model->adminsByEmail($email);
            if ($user) {
                //User is active
                if ($user['status'] == 1) {
                    //password is true
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role' => 'admins',
                            'name' => $user['full_name']
                        ];
    
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('login', 'Signed in successfully');
                        redirect('admin/dashboard');
    
                    } else {
                        $this->session->set_flashdata('error', 'Your password is wrong.');
                        redirect('all-inedu');
                    }
    
                } else {
                    $this->session->set_flashdata('error', 'This email has not been actived.');
                    redirect('all-inedu');
                }
            } else {
                $this->session->set_flashdata('error', 'This email has not been registered.');
                redirect('all-inedu');
            }
    }
}
?>