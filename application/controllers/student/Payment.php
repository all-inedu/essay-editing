<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
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
        $data['trans'] = $this->Transaction_model->getAllTransaction($user);
        $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
        $data['trans_paid'] = $this->Transaction_model->getAllTransactionPaid($user);
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
                    redirect('student/payment/confirm/' . $id);
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
        $this->email->from('essay@all-inedu.com', 'Essay Editing System');
        $this->email->to('essay@all-inedu.com');
        $this->email->cc('hafidz.bdt@gmail.com');

        $mail_data['trans'] = $this->Transaction_model->getAllTransactionById($id);
        $image = $mail_data['trans']['upload_file'];
        $mail_data['email'] = $email;
        $this->email->subject('Confirmation Of Payment');
        
        $bodyMail = $this->load->view('mail/confirmation', $mail_data, true);
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

}