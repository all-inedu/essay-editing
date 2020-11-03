<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Essay_list extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
        // $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('notif_pusher');
        $this->load->model('Essay_model');
        $this->load->model('Clients_model');
        $this->load->model('Editors_model');
        $this->load->model('Program_model');
        $this->load->model('Feedback_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'mentors') {
            redirect('/');
        }
    }

    
    public function index()
    {
        $user = $this->session->userdata('email');
        $data['ongoing'] = $this->Essay_model->getEssayList($user);
        $data['completed'] = $this->Essay_model->getEssayByMentors($user);  
        $data['menus'] = 'essay-list';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors');
        $this->load->view('user/mentor/essay/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function view($id){  
        $this->Essay_model->statusReadMentor($id);
        $user = $this->session->userdata('email');
        $data['essay'] = $this->Essay_model->getEssayClientsById($id); 
        $user = $data['essay']['email'];
        $id_prog = $data['essay']['id_program'];
        $data['history'] = $this->Essay_model->getEssayHistoryStatus($id);
        $data['user'] = $this->Clients_model->getAllClientsById($user);
        $data['status'] = $this->Essay_model->getEssayStatus($id);
        $data['program'] = $this->Program_model->programById($id_prog);
        $data['essay_editors'] = $this->Essay_model->getEssaybyEditors($id);
        $data['tags'] = $this->Essay_model->getEssayTags($id);
        $data['feedback'] = $this->Feedback_model->getFeedbackbyId($id);

        if($data['essay']['essay_deadline'] > $data['essay_editors']['uploaded_at']){
            $data['status_essay'] = '<input type="text" readonly class="form-control form-control-sm border-success" value="&#xf058; &nbsp; On time">';
        } else {
            $data['status_essay'] = '<input type="text" readonly class="form-control form-control-sm border-warning" value="&#xf017; &nbsp; Late">';
        }
        
        $data['menus'] = 'essay-list';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-mentors', $data);
        $this->load->view('templates/user/topbar-mentors');
        $this->load->view('user/mentor/essay/view', $data);
        $this->load->view('templates/user/footer');
    }

    public function feedback($id)
    {

        $this->form_validation->set_rules('option1','Option', 'required');
        $this->form_validation->set_rules('option2','Option', 'required');
        $this->form_validation->set_rules('option3','Option', 'required');
        $this->form_validation->set_rules('option4','Option', 'required');
        $this->form_validation->set_rules('option5','Option', 'required');
        $this->form_validation->set_rules('option6','Option', 'required');

        if($this->form_validation->run()==false){
            $this->view($id);
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
            $this->Essay_model->statusUnreadManagingEditor($id);
            $message = '<a href="'.base_url('editor/all-essay/list/completed').'" class="text-decoration-none text-muted">Mentor has provided feedback.</a>';
            $role = 'managing';
            $this->notif_pusher->notif($message, $role);
            $this->session->set_flashdata('success', 'Thank You for Feedback.');
            redirect('mentor/essay-list/view/' . $id);

        }
    }
    
    public function delete($id){
        $this->Essay_model->deleteEssayById($id);
        $this->session->set_flashdata('success', 'Your essay has been deleted.');
        redirect('mentor/essay-list/');
    }

}