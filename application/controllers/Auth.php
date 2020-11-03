<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('mail_smtp');
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function checkRole()
    {
        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role == 'admins') {
            redirect('admin');
        } else if ($role == 'clients') {
            redirect('user');
        } else if ($role == 'editors') {
            redirect('editor');
        }
    }

    public function index()
    {
        $this->checkRole();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth/footer');
        } else {
            $this->_login();
        }

    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Auth_model->clientByEmail($email);
        $user_crm = $this->Auth_model->clientsByCrm($email);

        if ($user) {
            //User is active
            if ($user['status'] == 1) {
                //password is true
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role'],
                        'admin_name' => $user['full_name'],
                        'name' => $user['first_name'].' '.$user['last_name']
                    ];

                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('login', 'Signed in successfully');
                    if ($user['role'] == 'admins') {
                        redirect('admin');
                    } else if ($user['role'] == 'clients') {
                        redirect('home/checkout/');
                    } else {
                        echo 'gagal';
                    }

                } else {
                    $this->session->set_flashdata('error', 'Your password is wrong.');
                    redirect('auth');
                }

            } else {
                $this->session->set_flashdata('error', 'This email has not been actived.');
                redirect('auth');
            }

            // CRM users
        } else if ($user_crm) {
            if (password_verify($password, $user_crm['password'])) {

                if ($user_crm['type'] > 0) {
                    $data = [
                        'email' => $user_crm['email'],
                        'role' => 'admins',
                        'name' => $user_crm['name'],
                    ];
                    $add_user=[
                        'full_name' => $user_crm['name'],
                        'email' => $user_crm['email'],
                        'role' => 'admins',
                        'status' => '1',
                        'password' => $user_crm['password'],
                        'created_at' => date('Y-m-d h:i:s')
                    ];
                    $this->Auth_model->addAdminByCRM($add_user);
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('login', 'Signed in successfully');
                    redirect('admin');
                } else if ($user_crm['is_tutor'] == '0') {
                    $data = [
                        'email' => $user_crm['email'],
                        'role' => 'editors',
                        'name' => $user_crm['first_name'] . ' ' . $user_crm['last_name'],
                    ];
                    //add editors
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('login', 'Signed in successfully');
                    redirect('editor');
                } else {
                    $data = [
                        'email' => $user_crm['email'],
                        'role' => 'clients',
                        'name' => $user_crm['first_name'] . ' ' . $user_crm['last_name'],
                    ];
                    $add_user=[
                        'first_name' => $user_crm['first_name'],
                        'last_name' => $user_crm['last_name'],
                        'phone' => $user_crm['phone'],
                        'email' => $user_crm['email'],
                        'address' => $user_crm['address'],
                        'role' => 'clients',
                        'status' => '1',
                        'password' => $user_crm['password'],
                        'created_at' => date('Y-m-d h:i:s')
                    ];
                    $this->Auth_model->addClientByCRM($add_user);
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('login', 'Signed in successfully');
                    redirect('home/checkout');
                }

            } else {
                $this->session->set_flashdata('error', 'Your password is wrong.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Email is not registered.<br> Please register your account.!');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->checkRole();
        //Form Validation
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_clients.email]|is_unique[tbl_admins.email]|is_unique[tbl_editors.email]',
            [
                'is_unique' => 'This email has been registered.',
            ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont math.',
                'min_length' => 'Password too short.',
            ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('templates/auth/new-header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth/footer');
        } else {
            $email = $this->input->post('email');
            $user_crm = $this->Auth_model->clientsByCrm($email);

            if (!$user_crm) {
                $data = [
                    'first_name' => htmlspecialchars($this->input->post('first_name', true)),
                    'last_name' => htmlspecialchars($this->input->post('last_name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'role' => 'clients',
                    'status' => '0',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'address' => $this->input->post('address'),
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $this->input->post('email'),
                    'token' => $token,
                    'activated_at' => time(),
                ];

                $this->_sendEmail($token, 'verify');
                $this->Auth_model->saveClients($data);
                $this->Auth_model->saveToken($user_token);

                $this->session->set_flashdata('success', 'Your account has been created<br> Please activated!');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Your account has been created in CRM All-Inedu<br> Please login with CRM Account!');
                redirect('auth/register');
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Editing System');
        $this->email->to($email);

        if ($type == 'verify') {
            //User Activation
            $this->email->subject('Account Verification');
            $mail_data['email'] = $email;
            $mail_data['token'] = $token;
            $mail_data['date'] = date('Y-m-d');
            $mail_data['name'] = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
            $bodyMail = $this->load->view('auth/mail/activated', $mail_data, true);
            $this->email->message($bodyMail);

        } else
        if ($type == 'forgot-password') {
            //Reset Password
            // $user = $this->Auth_model->clientByEmail($email);
            $this->email->subject('Reset Your Password');
            $mail_data['email'] = $email;
            $mail_data['token'] = $token;
            $mail_data['role'] = $role;
            $mail_data['date'] = date('Y-m-d');
            $bodyMail = $this->load->view('mail/forgot-password', $mail_data, true);
            $this->email->message($bodyMail);
        }
        //Send Email
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->Auth_model->clientByEmail($email);

        if ($user) {
            $user_token = $this->Auth_model->clientByToken($token);
            if ($user_token) {
                if (time() - $user_token['activated_at'] < (60 * 60 * 24)) {
                    //Success Verified
                    $this->Auth_model->verifyAccount($email);
                    $data = [
                        'email' => $email,
                        'role' => 'clients',
                        'name' => $user['first_name'] . ' ' . $user['last_name'],
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', 'Your account has been verified.');
                    redirect('home/checkout');

                } else {
                    //Token Expired
                    $this->Auth_model->deleteEmail($email);
                    $this->session->set_flashdata('error', 'Account activation failed.!<br> Token expired.');
                    redirect('auth');
                }

            } else {
                //Token Invalid
                $this->session->set_flashdata('error', 'Account activation failed.!<br> Token invalid.');
                redirect('auth');
            }

        } else {
            //Email not found
            $this->session->set_flashdata('error', 'Account activation failed.!<br> Wrong email.');
            redirect('auth');
        }
    }

    public function forgot($id)
    {
        $email = $this->input->post('email');

        //Validation
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $data['role'] = $id;
            $this->load->view('templates/home/new-header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/home/footer');
        } else {
            // $user = $this->Auth_model->clientByEmail($email);
            if($id=='students'){$user = $this->Auth_model->studentsByEmail($email);} else 
            if($id=='editors'){$user = $this->Auth_model->editorsByEmail($email);} else 
            if($id=='mentors'){$user = $this->Auth_model->mentorsByEmail($email);} else 
            if($id=='administrator'){$user = $this->Auth_model->adminsByEmail($email);}

            if ($user) {
                if ($user['status'] == 1) {

                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $this->input->post('email'),
                        'token' => $token,
                        'activated_at' => time(),
                    ];

                    $this->Auth_model->saveToken($user_token);
                    $this->_sendEmail($token, 'forgot-password');

                    $this->session->set_flashdata('success', 'Please check your email to reset your password.');
                    redirect('auth/forgot/'.$id);

                } else {
                    $this->session->set_flashdata('error', 'This email has not been actived.');
                    redirect('auth/forgot/'.$id);
                }

            } else {
                $this->session->set_flashdata('error', 'Email is not registered.<br> Please register your account.!');
                redirect('auth/forgot/'.$id);
            }
        }

    }

    public function reset()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $role = $this->input->get('role');
        $user = $this->Auth_model->clientByEmail($email);

        if ($user) {
            $user_token = $this->Auth_model->clientByToken($token);
            if ($user_token) {
                if (time() - $user_token['activated_at'] < (60 * 60 * 24)) {
                    //Success Verified
                    $this->session->set_userdata('reset-email', $email);
                    $this->session->set_userdata('role', $role);
                    $this->changePassword();

                } else {
                    //Token Expired
                    $this->Auth_model->deleteEmail($email);
                    $this->session->set_flashdata('error', 'Reset your account is failed.!<br> Token expired.');
                    redirect('auth');
                }

            } else {
                //Token Invalid
                $this->session->set_flashdata('error', 'Reset your account is failed.!<br> Token invalid.');
                redirect('auth');
            }

        } else {
            //Email not found
            $this->session->set_flashdata('error', 'Reset your account is failed.!<br> Wrong email.');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset-email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont math.',
                'min_length' => 'Password too short.',
            ]);

        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/home/new-header', $data);
            $this->load->view('auth/change_password');
            $this->load->view('templates/home/footer');
        } else {
            $email = $this->session->userdata('reset-email');
            $data = [
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'email' => $email,
            ];
            $role = $this->session->userdata('role');
            // $user = $this->Auth_model->clientByEmail($email);

            if ($role == 'administrator') {
                $this->Auth_model->resetPasswordAdmins($data);
            } else if ($role == 'students') {
                $this->Auth_model->resetPasswordClients($data);
            } else if ($role == 'editors') {
                $this->Auth_model->resetPasswordEditors($data);
            } else if ($role == 'mentors') {
                $this->Auth_model->resetPasswordMentors($data);
            }

            $this->session->unset_userdata('reset-email');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('success', 'Your password has been updated.');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('success', 'You have been logout.');
        redirect('/');
    }

}