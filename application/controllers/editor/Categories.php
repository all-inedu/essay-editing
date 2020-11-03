<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Category_model', 'category');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'editors') {
            redirect('/');
        }
    }


    public function index()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');

        if($this->form_validation->run()==false){
            $data['categories'] = $this->category->getAllTags();
            $data['menus'] = 'settings';
            $data['submenus'] = 'categories';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-editors', $data);
            $this->load->view('templates/user/topbar-editors');
            $this->load->view('user/editor/categories/index');
            $this->load->view('templates/user/footer');
        } else {
            $this->_createTags();
        }
    }

    private function _createTags()
    {
        $data = [
            'topic_name' => $this->input->post('title'),
        ];
        $this->category->createTags($data);
        $this->session->set_flashdata('success', 'Categories has been created');
        redirect('editor/categories');
    }

    public function view($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');

        if($this->form_validation->run()==false){
        $data['categories'] = $this->category->getAllTags();
        $data['cat'] = $this->category->getAllTagsById($id);
        $data['menus'] = 'settings';
        $data['submenus'] = 'categories';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/categories/view');
        $this->load->view('templates/user/footer');
        } else {
            $this->_updateTags($id);
        }
    }

    private function _updateTags($id)
    {
        $data = [
            'topic_name' => $this->input->post('title'),
        ];
        $this->category->updateTags($data, $id);
        $this->session->set_flashdata('success', 'Categories has been updated');
        redirect('editor/categories');
    }

    public function delete($id)
    {
        $this->category->deleteTags($id);
        $this->session->set_flashdata('success', 'Categories has been deleted');
        redirect('editor/categories'); 
    }


}