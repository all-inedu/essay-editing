<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'students') {
            redirect('/');
        }
        
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->model('Transaction_model');
        $this->load->model('Clients_model');
        $this->load->model('Program_model');
        $this->load->model('Essay_model');
        $this->load->library('mail_smtp');
    }


    public function index()
    {
        $user = $this->session->userdata('email');
        $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
        $data['user'] = $this->Clients_model->getAllClientsById($user);
        $data['menus'] = 'dashboard';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-students', $data);
        $this->load->view('templates/user/topbar-students', $data);
        $this->load->view('user/client/index');
        $this->load->view('templates/user/footer');
    }

    // View Profile
    public function view()
    {
        $user = $this->session->userdata('email');
        // $datas = $this->session->userdata('datas');
        // if (!$datas) {
            $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
            $data['user'] = $this->Clients_model->getAllClientsById($user);
            $data['menus'] = 'dashboard';
            $data['submenus'] = '';
            $data['readonly'] = 'readonly';
            $data['hidden'] = 'hidden';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-students', $data);
            $this->load->view('templates/user/topbar-students', $data);
            $this->load->view('user/client/profile/index');
            $this->load->view('templates/user/footer');
        // } else {
        //     $this->session->set_flashdata('warning', 'Sorry, you are using a CRM account<br>
        //     You can edit your profile in the CRM system');
        //     redirect('user');
        // }
    }

    // Edit Profile
    public function edit()
    {

        $id = $this->input->post('id');
        $user = $this->session->userdata('email');

        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('state', 'State', 'trim');
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required|trim');
        $this->form_validation->set_rules('current_school', 'Current School', 'required|trim');
        $this->form_validation->set_rules('school_name', 'School Name', 'required|trim');
        $this->form_validation->set_rules('curriculum', 'Curriculum', 'trim');
        $this->form_validation->set_rules('password1', 'Password', 'trim|matches[password2]|min_length[3]', [
            'matches' => 'Password dont math.',
            'min_length' => 'Password too short.',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
            $data['user'] = $this->Clients_model->getAllClientsById($user);
            $data['menus'] = 'dashboard';
            $data['submenus'] = '';
            $data['readonly'] = '';
            $data['hidden'] = '';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-students', $data);
            $this->load->view('templates/user/topbar-students', $data);
            $this->load->view('user/client/profile/index');
            $this->load->view('templates/user/footer');
        } else {
            $password = $this->input->post('password1');
            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'postal_code' => $this->input->post('postal_code'),
                'address' => $this->input->post('address'),
                'birthdate' => $this->input->post('birthdate'),
                'current_school' => $this->input->post('current_school'),
                'school_name' => $this->input->post('school_name'),
                'curriculum' => $this->input->post('curriculum'),
                'year' => $this->input->post('year'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];

            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = './upload_files/user/students/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {

                    $new_image = htmlspecialchars($this->upload->data('file_name'));
                    $data['image'] = $new_image;

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('student/view');
                }
            }

            if (!$password) {
                $this->Clients_model->updateClientsById($id, $data);
                $this->session->set_flashdata('success', 'Profile has been updated');
                redirect('student/view');

            } else {
                $data['password'] = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $this->Clients_model->updateClientsById($id, $data);
                $this->session->set_flashdata('success', 'Profile has been updated');
                redirect('student/view');
            }
        }
    }

    // Programs
    public function programs()
    {

        $user = $this->session->userdata('email');
        $data['trans'] = $this->Transaction_model->getAllTransactionDetail($user);
        $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
        $data['user'] = $this->Clients_model->getAllClientsById($user);
        $data['menus'] = 'program-clients';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-students', $data);
        $this->load->view('templates/user/topbar-students', $data);
        $this->load->view('user/client/program/index', $data);
        $this->load->view('templates/user/footer');
        
    }

    public function essay($code,$id){
        $checkTrans = $this->Transaction_model->getAllTransactionById($code);
        if ($checkTrans['status'] == 2) {
            $user = $this->session->userdata('email');
            $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
            $data['user'] = $this->Clients_model->getAllClientsById($user);
            $data['program'] = $this->Program_model->programById($id);
            $data['menus'] = 'program-clients';
            $data['submenus'] = '';
            $data['code'] = $code;
            if ($data['program']['id_category'] == 1) {
                $this->form_validation->set_rules('univ_name', 'Universities Name', 'required');
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('words', '', 'required',[
                    'required' => 'Fields is required'
                ]);
                if ($this->form_validation->run() == false) {
                    $data['essay'] = $this->Essay_model->getFilesClients($code, $id);
                    $id_essay_clients = $data['essay']['id_essay_clients'];
                    $data['essay_editors'] = $this->Essay_model->getEssaybyEditors($id_essay_clients); //Essay Editors
                    $data['status'] = $this->Essay_model->getEssayStatus($id_essay_clients);
                    $data['history'] = $this->Essay_model->getEssayHistoryStatus($id_essay_clients); //Status Essay
                    $data['univ'] = $this->Essay_model->getAllUniv(); //Univ
                    $data['prompt'] = $this->Essay_model->getAllEssayPrompt(); //Essay Prompt
                    $this->load->view('templates/user/header');
                    $this->load->view('templates/user/sidebar-students', $data);
                    $this->load->view('templates/user/topbar-students', $data);
                    $this->load->view('user/client/program/create-essay-client', $data);
                    $this->load->view('templates/user/footer');
                } else {
                    $this->uploadEssay();
                }
            } 

        } else if ($checkTrans['status'] == 1) {
            $this->session->set_flashdata('error', 'Your program is processing.<br>Please waiting.');
            redirect('student/essay');
        } else if ($checkTrans['status'] == '0') {
            $this->session->set_flashdata('error', 'Your program is pending.<br>Please make your payment.');
            redirect('student/essay');
        } else {
            $this->session->set_flashdata('error', 'Your program is not found.');
            redirect('student/essay');
        }
    }


    public function uploadEssay()
    {
        $user = $this->session->userdata('email');
        $data['user'] = $this->Clients_model->getAllClientsById($user);
        $file_name = $data['user']['first_name'].'\'s-Essay('.date('m-d-Y').')';

        $count = count($this->Essay_model->getEssayList());
        $id_essay = $count + 1;
        $code = $this->input->post('trans');
        $id = $this->input->post('id');

        $files = $_FILES['files']['name'];
        if ($files) {
            $config['upload_path'] = './upload_files/program/essay/students/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048;
            $config['file_name'] = $file_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('files')) {
                $new_files = htmlspecialchars($this->upload->data('file_name'));
                $data = [
                    'id_essay_clients' => $id_essay,
                    'id_essay_prompt' => $this->input->post('title'),
                    'id_transaction' => $code,
                    'id_program' => $id,
                    'email' => $this->session->userdata('email'),
                    'attached_of_clients' => $new_files,
                    'number_of_words' => $this->input->post('words'),
                    'uploaded_at' => date('Y-m-d H:i:s'),
                ];

                $status = [
                    'id_essay_clients' => $id_essay,
                    'status' => '0',
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->Essay_model->insertEssayClients($data, $status);
                $this->session->set_flashdata('success', 'Your essay has been uploaded<br> Please waiting to process.');
                redirect('student/essay/' . $code . '/' . $id);

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('student/essay/' . $code . '/' . $id);
            }

        } else {
            $this->session->set_flashdata('error', 'You must upload your essay.');
            redirect('student/essay/' . $code . '/' . $id);
        }
    }

    public function payment()
    {
        $user = $this->session->userdata('email');
        $data['trans'] = $this->Transaction_model->getAllTransaction($user);
        $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
        $data['user'] = $this->Clients_model->getAllClientsById($user);
        $data['menus'] = 'payment-clients';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-students', $data);
        $this->load->view('templates/user/topbar-students', $data);
        $this->load->view('user/client/payments/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function confirm($id){
        $user = $this->session->userdata('email');
        $data['trans'] = $this->Transaction_model->getAllTransactionById($id);

        if ($data['trans']) {
            $this->form_validation->set_rules('email', 'Email', 'required');

            if ($this->form_validation->run() == false) {
                $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
                $data['user'] = $this->Clients_model->getAllClientsById($user);
                $data['menus'] = 'payment-clients';
                $data['submenus'] = '';
                $this->load->view('templates/user/header');
                $this->load->view('templates/user/sidebar-students', $data);
                $this->load->view('templates/user/topbar-students', $data);
                $this->load->view('user/client/payments/confirmation', $data);
                $this->load->view('templates/user/footer');
            } else {
                $config['upload_path'] = './upload_files/payments/confirmation/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {

                    $new_image = htmlspecialchars($this->upload->data('file_name'));
                    $data = [
                        'status' => 1,
                        'upload_file' => $new_image,
                        'uploaded_at' => date('Y-m-d H:i:s'),
                    ];

                    $this->Transaction_model->confirmPayment($data, $id);
                    $this->_sendEmail($user, $id);
                    $this->session->set_flashdata('success', 'Please waiting, your confirmation is processing.');
                    redirect('student/payment');

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('student/confirm/' . $id);
                }
            }

        } else {
            $this->session->set_flashdata('error', 'Transaction code is not found!');
            redirect('student/payment');
        }
    }

    private function _sendEmail($user, $id)
    {
        $email = $user;
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('hafidz.fanany@all-inedu.com', 'Essay Test');
        $this->email->to('hafidz.bdt@gmail.com');
        $this->email->bcc('hafidz.fanany@all-inedu.com, 25.worldads@gmail.com');

        $mail_data['trans'] = $this->Transaction_model->getAllTransactionById($id);
        $image = $mail_data['trans']['upload_file'];
        $mail_data['email'] = $email;
        $this->email->subject('Confirmation Payment from Clients');
        $bodyMail = $this->load->view('user/client/payments/mail/confirm.php', $mail_data, true);
        $this->email->message($bodyMail);
        $this->email->attach('upload_files/payments/confirmation/' . $image);
        //Send Email
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

    }

    public function buat_folder()
    {
        $old = umask(0);
        mkdir("./upload_files/contoh", 0777);
        umask($old);

        
    }

}