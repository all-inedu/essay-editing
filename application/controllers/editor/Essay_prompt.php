<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Essay_prompt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('form_validation');
        $this->load->model('University_model');
        $this->load->model('Essay_prompt_model');
    }

    public function checkRole()
    {
        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'editors') {
            redirect('/');
        }
    }

    public function index()
    {
        $this->checkRole();
        $data['prompt'] = $this->Essay_prompt_model->getAllPrompt();
        $data['menus'] = 'settings';
        $data['submenus'] = 'essay-prompt';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/essay-prompt/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function create()
    {
        $this->checkRole();

        $this->form_validation->set_rules('univ_name', 'University Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['univ'] = $this->University_model->getAllUniv();
            $data['menus'] = 'settings';
            $data['submenus'] = 'essay-prompt';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-editors', $data);
            $this->load->view('templates/user/topbar-editors');
            $this->load->view('user/editor/essay-prompt/create-essay-prompt', $data);
            $this->load->view('templates/user/footer');
        } else {
            $data = [
                'id_univ' => $this->input->post('univ_name'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'notes' => $this->input->post('notes'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->Essay_prompt_model->savePrompt($data);
            $this->session->set_flashdata('success', 'Essay prompt has been created');
            redirect('editor/essay-prompt');

        }
    }

    public function view($id)
    {
        $this->checkRole();

        $data['prompt'] = $this->Essay_prompt_model->promptById($id);
        $data['univ'] = $this->University_model->getAllUniv();
        $data['disabled'] = 'disabled';
        $data['hidden'] = 'hidden';
        $data['menus'] = 'settings';
        $data['submenus'] = 'essay-prompt';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/essay-prompt/view-essay-prompt', $data);
        $this->load->view('templates/user/footer');
    }

    public function edit($id)
    {
        $this->checkRole();

        $this->form_validation->set_rules('univ_name', 'University Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['prompt'] = $this->Essay_prompt_model->promptById($id);
            $data['univ'] = $this->University_model->getAllUniv();
            $data['disabled'] = '';
            $data['hidden'] = '';
            $data['menus'] = 'settings';
            $data['submenus'] = 'essay-prompt';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-editors', $data);
            $this->load->view('templates/user/topbar-editors');
            $this->load->view('user/editor/essay-prompt/view-essay-prompt', $data);
            $this->load->view('templates/user/footer');
        } else {
            $data = [
                'id_univ' => $this->input->post('univ_name'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'notes' => $this->input->post('notes'),
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->Essay_prompt_model->updatePrompt($id, $data);
            $this->session->set_flashdata('success', 'Essay prompt has been updated');
            redirect('editor/essay-prompt/view/' . $id);
        }

    }

    public function delete($id)
    {
        $this->checkRole();
        $this->Essay_prompt_model->deletePrompt($id);
        $this->session->set_flashdata('success', 'University has been deleted');
        redirect('editor/essay-prompt');
    }
}