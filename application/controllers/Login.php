<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class Login extends CI_Controller
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
            redirect('');
        }
        $this->load->view('templates/home/new-header', $data);
        $this->load->view('home/login/index');
        $this->load->view('templates/home/footer');
        }

        public function auth($id)
        {
            $data['role'] = $this->session->userdata('role');
            if($data['role']){
                $this->session->set_flashdata('warning', 'You have already login.');
                redirect('');
            }
            
            if($id=='students'){
                $datas = [
                    'title' => 'students',
                ];
            } else if($id=='editors') {
                $datas = [
                    'title' => 'editors',
                ];
            } else if($id=='mentors'){
                $datas = [
                    'title' => 'mentors',
                ];
            }

            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/home/new-header', $data);
                $this->load->view('home/login/login', $datas);
                $this->load->view('templates/home/footer');
            } else {
                
                if($id=='students'){
                    $this->_loginStudents();
                } else if($id=='editors'){
                    $this->_loginEditors();
                } else if($id=='mentors'){
                    $this->_loginMentors();
                }


            }
           
        }


        public function _loginStudents()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Auth_model->studentsByEmail($email);
            if ($user) {
                //User is active
                if ($user['status'] == 1) {
                    //password is true
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role' => 'students',
                            'name' => $user['first_name'].' '.$user['last_name']
                        ];
    
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('login', 'Signed in successfully');
                        redirect('student/dashboard');
    
                    } else {
                        $this->session->set_flashdata('error', 'Your password is wrong.');
                        redirect('login/auth/students');
                    }
    
                } else {
                    $this->session->set_flashdata('error', 'This email has not been actived.');
                    redirect('login/auth/students');
                }
            } else {
                $this->session->set_flashdata('error', 'This email has not been registered.');
                redirect('login/auth/students');
            }
        }


        public function _loginMentors()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $user = $this->Auth_model->mentorsByEmail($email);
            if ($user) {
                //User is active
                if ($user['status'] == 1) {
                    //password is true
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role' => 'mentors',
                            'name' => $user['first_name'].' '.$user['last_name']
                        ];
    
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('login', 'Signed in successfully');
                        redirect('mentor/dashboard');
    
                    } else {
                        $this->session->set_flashdata('error', 'Your password is wrong.');
                        redirect('login/auth/mentors');
                    }
    
                } else {
                    $this->session->set_flashdata('error', 'This email has not been actived.');
                    redirect('login/auth/mentors');
                }
            } else {
                $this->session->set_flashdata('error', 'This email has not been registered.');
                redirect('login/auth/mentors');
            }
        }

        public function _loginEditors()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $user = $this->Auth_model->editorsByEmail($email);
            if ($user) {
                //User is active
                if ($user['status'] == 1) {
                    //password is true
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role' => 'editors',
                            'name' => $user['first_name'].' '.$user['last_name'],
                            'position' => $user['position'],
                        ];
    
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('login', 'Signed in successfully');
                        redirect('editor/dashboard');
    
                    } else {
                        $this->session->set_flashdata('error', 'Your password is wrong.');
                        redirect('login/auth/editors');
                    }
    
                } else {
                    $this->session->set_flashdata('error', 'This email has not been actived.');
                    redirect('login/auth/editors');
                }
            } else {
                $this->session->set_flashdata('error', 'This email has not been registered.');
                redirect('login/auth/editors');
            }
        }
    }
?>