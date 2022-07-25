<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('mail_smtp');
        $this->load->library('form_validation');
        $this->load->model('Editors_model');
        $this->load->model('Auth_model');
        $this->load->model('Essay_model');
        
        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }

    }

    public function index()
    {
        $data['editors'] = $this->Editors_model->getAllEditors();
        // $managing_editor = $this->Editors_model->getAllManagingEditors();
        // $col = array_column($managing_editor, 'email');
        // $me_mail = implode(", ",$col);
        // echo $me_mail;
        $data['menus'] = 'users';
        $data['submenus'] = 'editors';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/editors/index');
        $this->load->view('templates/user/footer');
    } 

    public function randomPassword($length)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $string = '';

        for ($i=0; $i<$length; $i++)
        {
            $pos = rand(0, strlen($char)-1);
            $string .= $char{$pos};
        }

        return $string;
        
    }

    public function create()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_editors.email]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('graduated_from', 'Graduated From', 'trim|required');
        $this->form_validation->set_rules('major', 'Major', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('position', 'First Name', 'trim|required');

        if($this->form_validation->run()==false){
        $data['editors'] = $this->Editors_model->getAllEditors();
        $data['position'] = $this->Editors_model->getAllPositionEditors();
        $data['menus'] = 'users';
        $data['submenus'] = 'editors';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/editors/create');
        $this->load->view('templates/user/footer');
        } else {
            $pass = $this->randomPassword(10);
            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'graduated_from' => $this->input->post('graduated_from'),
                'major' => $this->input->post('major'),
                'address' => $this->input->post('address'),
                'position' => $this->input->post('position'),
                'image' => 'default.png',
                'password' => password_hash($pass, PASSWORD_DEFAULT),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->_sendPassword($pass);
            $this->Editors_model->createEditors($data);
            $this->session->set_flashdata('success', 'Editors has been created');
            redirect('admin/editors');
        }
    }

    public function _sendPassword($pass)
    {
        $email = $this->input->post('email');
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Editing Platform');
        $this->email->to($email);
        $this->email->set_priority(1);
        $this->email->subject('Your Password');
        $mail_data['email'] = $email;
        $mail_data['password'] = $pass;
        $mail_data['date'] = date('Y-m-d');
        $bodyMail = $this->load->view('mail/send-password', $mail_data, true);
        $this->email->message($bodyMail);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function invite()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tbl_editors.email]',
        [
            'is_unique' => 'This email has been registered.',
        ]);

        if($this->form_validation->run()==false) {
            $data['editors'] = $this->Editors_model->getAllEditors();
            $data['menus'] = 'users';
            $data['submenus'] = 'editors';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar', $data);
            $this->load->view('templates/user/topbar');
            $this->load->view('user/admin/editors/invite');
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
            redirect('admin/editors');
        }
    }


    private function _sendEmail($token)
    {
        $email = $this->input->post('email');
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Editing Platform');
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
        $data['editors'] = $this->Editors_model->getAllEditorsById($id);
        $user = $data['editors']['email'];
        $data['position'] = $this->Editors_model->getAllPositionEditors();
        $data['process'] = $this->Essay_model->getEssayEditorList($user);
        $data['completed'] = $this->Essay_model->getVerifiedEssayEditorList($user);
        $data['menus'] = 'users';
        $data['submenus'] = 'editors';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/editors/view');
        $this->load->view('templates/user/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_editors');
        $data = [
            'position' => $this->input->post('position'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        echo $id;
        $this->Editors_model->updatePositionById($id, $data);
        $this->session->set_flashdata('success', 'Editors has been updated');
        redirect('admin/editors');
    }

    public function essay($id)
    {   
        echo 'hello';
    }

    public function deactivate()
    {
        $id = $this->input->post('id');
        $query = $this->Editors_model->getAllEditorsById($id);

        if($query['status']==1) {
            $data = [
                'status' => 2,
            ];
            $this->Editors_model->updatePositionById($id, $data);
        } else {
            $data = [
                'status' => 1,
            ];
            $this->Editors_model->updatePositionById($id, $data);
        }

        $this->session->set_flashdata('success', 'Editors has been updated');
        redirect('admin/editors');
    }

    
}