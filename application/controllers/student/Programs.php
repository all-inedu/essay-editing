<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Programs extends CI_Controller
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
        
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->library('mail_smtp');
        $this->load->model('User_model');
        $this->load->model('Transaction_model');
        $this->load->model('Clients_model');
        $this->load->model('Program_model');
        $this->load->model('Essay_model');
        $this->load->model('Feedback_model');
    }

    // Programs
    public function index()
    {
        $this->form_validation->set_rules('program', 'Programs', 'required');

        if($this->form_validation->run()==false){
            $user = $this->session->userdata('email');
            $data['trans'] = $this->Transaction_model->getAllTransactionDetail($user);
            $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
            $data['user'] = $this->Clients_model->getAllClientsById($user);
            $data['prog'] = $this->Program_model->getAllPrograms();
            $data['code'] = 'INV-' . date('dmY') . '-' . strtoupper(random_string('alnum', 8));
            $data['menus'] = 'program-clients';
            $data['submenus'] = '';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-students', $data);
            $this->load->view('templates/user/topbar-students', $data);
            $this->load->view('user/client/program/index', $data);
            $this->load->view('templates/user/footer');  
        } else {
            $this->orderProgram();
        }
              
    }

    public function orderProgram()
    {
        $code = $this->input->post('code');
        $datas = [
            'transaction_code' => $code,
            'email' => $this->input->post('email'),
            'full_name' => $this->input->post('name'),
            'amount' => 1,
            'total' => $this->input->post('total'),
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $data = [
            'transaction_code' => $code,
            'id_program' => $this->input->post('prog'),
            'qty' => 1,
            'sub_total' => $this->input->post('total'),
        ];
        
        $this->Transaction_model->saveAll($datas);
        $this->Transaction_model->saveTransactionDetail($data);
        $this->_sendEmail($datas);
        
        $this->session->set_flashdata('success', 'Please check your email,<br>Confirmation your payment.');
        redirect('student/payment');

    }

    private function _sendEmail($datas)
    {
        $email = $this->input->post('email');
        $code = $this->input->post('code');
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Editing System');
        $this->email->to($email);
        $this->email->bcc('hafidz.bdt@gmail.com');

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
                    $data['feedback'] = $this->Feedback_model->getFeedbackbyId($id_essay_clients);
                    $data['tags'] = $this->Essay_model->getEssayTags($id_essay_clients);
                    $data['history'] = $this->Essay_model->getEssayHistoryStatus($id_essay_clients); //Status Essay
                    $data['univ'] = $this->Essay_model->getAllUniv(); //Univ
                    $data['prompt'] = $this->Essay_model->getAllEssayPrompt(); //Essay Prompt
                    $this->load->view('templates/user/header');
                    $this->load->view('templates/user/sidebar-students', $data);
                    $this->load->view('templates/user/topbar-students', $data);
                    $this->load->view('user/client/program/program-student', $data);
                    $this->load->view('templates/user/footer');
                } else {
                    $this->uploadEssay();
                }
            } 

        } else if ($checkTrans['status'] == 1) {
            $this->session->set_flashdata('error', 'Your program is processing.<br>Please waiting.');
            redirect('student/programs/');
        } else if ($checkTrans['status'] == '0') {
            $this->session->set_flashdata('error', 'Your program is pending.<br>Please make your payment.');
            redirect('student/programs/');
        } else {
            $this->session->set_flashdata('error', 'Your program is not found.');
            redirect('student/programs/');
        }
    }


    public function uploadEssay()
    {
        $user = $this->session->userdata('email');
        $data['user'] = $this->Clients_model->getAllClientsById($user);
        $file_name = $data['user']['first_name'].'\'s-Essay('.date('m-d-Y').')';

        $count = count($this->Essay_model->countEssayList());
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
                $this->_sendEmailEssay($data);
                $this->session->set_flashdata('success', 'Your essay has been uploaded<br> Please waiting to process.');
                redirect('student/programs/essay/' . $code . '/' . $id);

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('student/programs/essay/' . $code . '/' . $id);
            }

        } else {
            $this->session->set_flashdata('error', 'You must upload your essay.');
            redirect('student/programs/essay/' . $code . '/' . $id);
        }
    }

    private function _sendEmailEssay($data)
    {
        $id = $data['id_essay_clients'];
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('essay@all-inedu.com', 'Essay Editing System');
        $this->email->to('essay@all-inedu.com');
        $this->email->bcc('hafidz.bdt@gmail.com');

        //User Activation
        $this->email->subject('Upload Essay By Student');

        $datas['detail'] = $this->Essay_model->getEssayClientsById($id);
        $datas['date'] = date('Y-m-d');
        $bodyMail = $this->load->view('mail/upload-essays-student', $datas, true);
        $this->email->message($bodyMail);

        var_dump($datas['detail']);
        // Send Email
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function feedback($id)
    {
        $code = $this->input->post('code');
        $prog = $this->input->post('prog');

        $this->form_validation->set_rules('option1','Option', 'required');
        $this->form_validation->set_rules('option2','Option', 'required');
        $this->form_validation->set_rules('option3','Option', 'required');
        $this->form_validation->set_rules('option4','Option', 'required');
        $this->form_validation->set_rules('option5','Option', 'required');
        $this->form_validation->set_rules('option6','Option', 'required');

        if($this->form_validation->run()==false){
            $this->essay($code, $prog);
        } else {
            $option1 = $this->input->post('option1');
            $option2 = $this->input->post('option2');
            $option3 = $this->input->post('option3');
            $option4 = $this->input->post('option4');
            $option5 = $this->input->post('option5');
            $option6 = $this->input->post('option6');
            $add_comments = $this->input->post('add_comments');

            $sum = ($option1+$option2+$option3+$option4+$option5+$option6);
            $average = $sum/6;
            $average_rating = number_format($average,1);

            $data = [
                'id_essay_clients' => $id,
                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'option4' => $option4,
                'option5' => $option5,
                'option6' => $option6,
                'add_comments' => $add_comments,
                'created_at' => date('Y-m-d H:i:s')
            ];
             
            $this->Feedback_model->addFeedback($data, $id, $average_rating);

            $this->session->set_flashdata('success', 'Thank You for Feedback.');
            redirect('student/programs/essay/' . $code . '/' . $prog);

        }
    }

}