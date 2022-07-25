<?php
defined('BASEPATH') or exit('No direct script access allowed');

class University extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('University_model');
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
        $data['univ'] = $this->University_model->getAllUniv();
        $data['menus'] = 'settings';
        $data['submenus'] = 'universities';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/universities/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function create()
    {
        $this->checkRole();
        $this->form_validation->set_rules('univ_name', 'University Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == false) {
            $data['univ'] = $this->University_model->getAllUniv();
            $data['menus'] = 'settings';
            $data['submenus'] = 'universities';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-editors', $data);
            $this->load->view('templates/user/topbar-editors');
            $this->load->view('user/editor/universities/create-university');
            $this->load->view('templates/user/footer');
        } else {
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = './upload_files/univ/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {

                    $new_image = htmlspecialchars($this->upload->data('file_name'));

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('editor/university/create');
                }

            } else {
                $new_image = 'default.png';
            }

            $data = [
                'university_name' => $this->input->post('univ_name'),
                'website' => $this->input->post('website'),
                'univ_email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'photo' => $new_image,
                'country' => $this->input->post('country'),
                'address' => $this->input->post('address'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->University_model->saveUniv($data);
            $this->session->set_flashdata('success', 'University has been created');

            redirect('editor/university');
        }
    }

    public function view($id)
    {
        $this->checkRole();
        $data['univ'] = $this->University_model->viewUnivById($id);
        $data['readonly'] = 'readonly';
        $data['hidden'] = 'hidden';
        $data['menus'] = 'settings';
        $data['submenus'] = 'universities';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/universities/view-university', $data);
        $this->load->view('templates/user/footer');
    }

    public function edit($id)
    {
        $this->checkRole();
        $data['univ'] = $this->University_model->viewUnivById($id);
        $this->form_validation->set_rules('univ_name', 'University Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == false) {
            $data['readonly'] = '';
            $data['hidden'] = '';
            $data['menus'] = 'settings';
            $data['submenus'] = 'universities';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-editors', $data);
            $this->load->view('templates/user/topbar-editors');
            $this->load->view('user/editor/universities/view-university', $data);
            $this->load->view('templates/user/footer');
        } else {

            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = './upload_files/univ/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['univ']['photo'];
                    $target = 'upload_files/univ/'.$old_image;
                    
                    if ($old_image == 'default.png') {} else {
                        unlink($target);
                    }

                    $new_image = htmlspecialchars($this->upload->data('file_name'));
                    $id = $this->input->post('id_univ');
                    $data = [
                        'university_name' => $this->input->post('univ_name'),
                        'website' => $this->input->post('website'),
                        'univ_email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'photo' => $new_image,
                        'country' => $this->input->post('country'),
                        'address' => $this->input->post('address'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];

                    $this->University_model->updateUniv($id, $data);
                    $this->session->set_flashdata('success', 'University has been created');
                    redirect('editor/university/view/' . $id);

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('editor/university/view/' . $id);
                }

            } else {
                $id = $this->input->post('id_univ');
                $data = [
                    'university_name' => $this->input->post('univ_name'),
                    'website' => $this->input->post('website'),
                    'univ_email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'country' => $this->input->post('country'),
                    'address' => $this->input->post('address'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->University_model->updateUniv($id, $data);
                $this->session->set_flashdata('success', 'University has been updated');
                redirect('editor/university/view/' . $id);
            }

        }

    }

    public function delete($id)
    {
        $this->checkRole();
        $this->University_model->deleteUniv($id);
        $this->session->set_flashdata('success', 'University has been deleted');
        redirect('editor/university');
    }

}