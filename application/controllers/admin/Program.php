<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->model('Program_model');
        $this->load->model('Category_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }
    }

    public function index()
    {
        $data['program'] = $this->Program_model->getAllPrograms();
        $data['menus'] = 'settings';
        $data['submenus'] = 'program';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/program/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function create()
    {

        $this->form_validation->set_rules('program_name', 'Program Name', 'required|trim');
        $this->form_validation->set_rules('id_category', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric|trim');
        $this->form_validation->set_rules('discount', 'Discount', 'numeric|trim');
        $this->form_validation->set_rules('max_word', 'Maximum Word', 'required|numeric|trim');
        $this->form_validation->set_rules('completed_within', 'Completed Within', 'required|numeric|trim');

        if ($this->form_validation->run() == false) {
            $data['category'] = $this->Category_model->getAllCategory();
            $data['menus'] = 'settings';
            $data['submenus'] = 'program';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar', $data);
            $this->load->view('templates/user/topbar');
            $this->load->view('user/admin/program/create-program', $data);
            $this->load->view('templates/user/footer');
        } else {
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = './upload_files/programs/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = $this->input->post('program_name');

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {

                    $new_image = htmlspecialchars($this->upload->data('file_name'));

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('admin/program/create');
                }

            } else {
                $new_image = 'default.png';
            }

            $data = [
                'program_name' => $this->input->post('program_name'),
                'description' => $this->input->post('description'),
                'id_category' => $this->input->post('id_category'),
                'price' => $this->input->post('price'),
                'discount' => $this->input->post('discount'),
                'minimum_word' => $this->input->post('min_word'),
                'maximum_word' => $this->input->post('max_word'),
                'completed_within' => $this->input->post('completed_within'),
                'images' => $new_image,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->Program_model->saveProgram($data);
            $this->session->set_flashdata('success', 'Program has been created');
            redirect('admin/program');
        }
    }

    public function view($id)
    {
        $data['program'] = $this->Program_model->programById($id);
        $data['disabled'] = 'disabled';
        $data['hidden'] = 'hidden';
        $data['menus'] = 'settings';
        $data['submenus'] = 'program';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/program/view-program', $data);
        $this->load->view('templates/user/footer');
    }

    public function edit($id)
    {
        $data['program'] = $this->Program_model->programById($id);
        $this->form_validation->set_rules('program_name', 'Program Name', 'required|trim');
        $this->form_validation->set_rules('id_category', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric|trim');
        $this->form_validation->set_rules('discount', 'Discount', 'numeric|trim');
        $this->form_validation->set_rules('maximum_word', 'Maximum Word', 'required|numeric|trim');
        $this->form_validation->set_rules('completed_within', 'Completed Within', 'required|numeric|trim');

        if ($this->form_validation->run() == false) {
            $data['category'] = $this->Category_model->getAllCategory();
            $data['disabled'] = '';
            $data['hidden'] = '';
            $data['menus'] = 'settings';
            $data['submenus'] = 'program';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar', $data);
            $this->load->view('templates/user/topbar');
            $this->load->view('user/admin/program/view-program', $data);
            $this->load->view('templates/user/footer');

        } else {
            $old_image = $data['program']['images'];
            // echo $old_image;
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = './upload_files/programs/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = $this->input->post('program_name');

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {

                    if ($old_image == 'default.png') {} else {
                        unlink('upload_files/programs/' . $old_image);
                    }

                    $upload_image = htmlspecialchars($this->upload->data('file_name'));

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('admin/program/view/' . $id);
                }

            } else {
                $upload_image = $old_image;
            }
            echo $upload_image;
            $data = [
                'program_name' => $this->input->post('program_name'),
                'description' => $this->input->post('description'),
                'id_category' => $this->input->post('id_category'),
                'price' => $this->input->post('price'),
                'discount' => $this->input->post('discount'),
                'minimum_word' => $this->input->post('minimum_word'),
                'maximum_word' => $this->input->post('maximum_word'),
                'completed_within' => $this->input->post('completed_within'),
                'images' => $upload_image,
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->Program_model->updateProgram($id, $data);
            $this->session->set_flashdata('success', 'Program has been updated');
            redirect('admin/program/view/' . $id);

        }
    }

    public function delete($id)
    {
        $this->Program_model->deleteById($id);
        $this->session->set_flashdata('success', 'Program has been deleted');
        redirect('admin/program');
    }
}