<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        // $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->library('mail_smtp');
        $this->load->model('Transaction_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }
    }

    public function index()
    {
        $user = $this->session->userdata('email');
        $data['pending'] = $this->Transaction_model->getAllTransactionPending();
        $data['verify'] = $this->Transaction_model->getAllTransactionVerify();
        $data['paid'] = $this->Transaction_model->getAllTransactionPaid();
        $data['menus'] = 'payments';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/payment/index', $data);
        $this->load->view('templates/user/footer');
    }

    private function _sendEmail($id)
    {
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Test'); 

        $mail_data['trans'] = $this->Transaction_model->getAllTransactionById($id);
        $email = $mail_data['trans']['email'];
        $this->email->to($email);
        $this->email->subject('Your Payment Has Been Verified');
        $bodyMail = $this->load->view('mail/payment-verified', $mail_data, true);
        $this->email->message($bodyMail);
        //Send Email
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

    }

    public function verified($id)
    {

        $data = [
            'status' => 2,
            'verified_at' => date('Y-m-d H:i:s'),
        ];

        $this->_sendEmail($id);
        $this->Transaction_model->verifiedPayment($data, $id);
        $this->session->set_flashdata('success', 'Payment has been verified');
        redirect('admin/payments');
    }
}