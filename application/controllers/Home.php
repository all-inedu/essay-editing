<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->library('mail_smtp');
        $this->load->model('Program_model');
        $this->load->model('Clients_model');
        $this->load->model('Transaction_model');
        $this->load->model('Auth_model');
        $this->load->model('Editors_model');
    }

    public function index()
    {
        $data['program'] = $this->Program_model->getAllProgramsGroup();
        $data['essay'] = $this->Program_model->getAllEssayPrograms();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('templates/home/new-header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/home/footer');
    }

    public function add()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => 1,
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'discount' => $this->input->post('discount'),
            // 'options' => array('discount' => $this->input->post('discount')),
        );

        $this->cart->insert($data);
        $this->session->set_flashdata('success', 'your shopping cart list has been created');
        redirect('home/cart');
    }

    public function cart()
    {
        $data['role'] = $this->session->userdata('role');
        $this->load->view('templates/home/header', $data);
        $this->load->view('home/cart');
        $this->load->view('templates/home/footer');
    }

    public function delete($rowid = '')
    {
        if ($rowid) {
            $this->cart->remove($rowid);
            $this->session->set_flashdata('success', 'your shopping cart list has been removed');
            redirect('home/cart');
        }
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'your shopping cart list has been removed');
        redirect('/');
    }

    public function update($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => $this->input->post('qty'),
        );

        $this->session->set_flashdata('success', 'your shopping cart list has been updated');
        $this->cart->update($data);
        redirect('home/cart');
    }

    public function checkout()
    {
        if ($this->cart->contents()) {
            if ($this->session->userdata('email')) {
                $id = $this->session->userdata('email');
                $data['clients'] = $this->Clients_model->getAllById($id);
                $data['code'] = 'INV-' . date('dmY') . '-' . strtoupper(random_string('alnum', 8));
                $data['role'] = $this->session->userdata('role');
                $this->load->view('templates/home/header', $data);
                $this->load->view('home/checkout', $data);
                $this->load->view('templates/home/footer');
            } else {
                $this->session->set_flashdata('warning', 'Please login or register your account!');
                redirect('auth/register');
            }
        } else {
            redirect('/');
        }
    }

    private function _sendEmail($datas)
    {
        $email = $this->input->post('email');
        $code = $datas['transaction_code'];
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Editing System');
        $this->email->to($email);
        $this->email->bcc('essay@all-inedu.com, hafidz.bdt@gmail.com');

        //User Activation
        $this->email->subject('Payment Information');

        $datas['detail'] = $this->Transaction_model->viewTransaction($code);
        $datas['date'] = date('Y-m-d');
        $bodyMail = $this->load->view('mail/transaction', $datas, true);
        $this->email->message($bodyMail);

        // var_dump($data['detail']);
        // Send Email
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

    }

    public function process()
    {

        $datas = [
            'transaction_code' => $this->input->post('code'),
            'email' => $this->input->post('email'),
            'full_name' => $this->input->post('name'),
            'amount' => $this->input->post('amount'),
            'total' => $this->input->post('total'),
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->Transaction_model->saveAll($datas);
        foreach ($this->cart->contents() as $items):
            $data = [
                'transaction_code' => $this->input->post('code'),
                'id_program' => $items['id'],
                'qty' => $items['qty'],
                'sub_total' => $items['qty'] * $items['price'],
            ];
            $this->Transaction_model->saveTransactionDetail($data);
        endforeach;

        $this->_sendEmail($datas);
        // var_dump($datas);
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Please make payment via ATM or Mobile Banking!');
        redirect('student/payment');
    }

    public function getProgramJson($id)
    {
        $data = $this->Program_model->programById($id);
        echo json_encode($data);
    }
    
    public function join_editor()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $data['role'] = $this->session->userdata('role');
        if($data['role']){
            $this->session->set_flashdata('error', 'Sorry, you have logged in');
            redirect('/'); 
        }
        $user_token = $this->Auth_model->clientByToken($token);
        if($user_token){
            $this->addEditors($email, $token);            
        } else {
            $this->session->set_flashdata('error', 'Token is not found');
            redirect('/');
        }
    }

    public function addEditors($email, $token)
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('graduated_from', 'Graduated From', 'trim|required');
        $this->form_validation->set_rules('major', 'Major', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont math.',
                'min_length' => 'Password too short.',
            ]);
       $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
               

            if($this->form_validation->run()==false){
                $data['email'] = $email;
                $this->load->view('templates/home/new-header');
                $this->load->view('home/join-editor', $data);
                $this->load->view('templates/home/footer');
            } else {
                // $this->addEditors();
                $editors = [
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'graduated_from' => $this->input->post('graduated_from'),
                    'major' => $this->input->post('major'),
                    'address' => $this->input->post('address'),
                    'position' => 1,
                    'image' => 'default.png',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
    
                $this->Editors_model->createEditors($editors);
                $this->Editors_model->deleteToken($email);
                $this->session->set_flashdata('success', 'Editors has been created');
                redirect('login/auth/editors');
            }
    }

    public function email()
    {
        $this->load->view('mail/send-password');
    }
}