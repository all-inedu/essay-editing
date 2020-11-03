<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('mail_smtp');
        $this->load->model('Editors_model','editors');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'editors') {
            redirect('/');
        }
    }

    public function index()
    {
        $user = $this->session->userdata('email');
        $data['editors'] = $this->editors->getAllEditorsById(0, $user);
        $data['position'] = $this->editors->getAllPositionEditors();
        $data['menus'] = 'dashboard';
        $data['submenus'] = '';
        $data['readonly'] = 'disabled';
        $data['hidden'] = 'hidden';
        $data['title'] = 'View Profile';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/profile/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('graduated_from', 'Graduated From', 'trim|required');
        $this->form_validation->set_rules('major', 'Major', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont math.',
                'min_length' => 'Password too short.',
            ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');

        if($this->form_validation->run()==false){
            $user = $this->session->userdata('email');
            $data['editors'] = $this->editors->getAllEditorsById(0, $user);
            $data['position'] = $this->editors->getAllPositionEditors();
            $data['menus'] = 'dashboard';
            $data['submenus'] = '';
            $data['readonly'] = '';
            $data['hidden'] = '';
            $data['title'] = 'Edit Profile';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-editors', $data);
            $this->load->view('templates/user/topbar-editors');
            $this->load->view('user/editor/profile/index', $data);
            $this->load->view('templates/user/footer');
        } else {
            $image = $_FILES['image']['name'];
            $id = $this->input->post('id');
            if ($image) {
                $name = $this->input->post('first_name');
                $config['upload_path'] = './upload_files/user/editors';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 2048;
                $config['file_name'] = 'editors '.$name;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $user = $this->session->userdata('email');
                    $editors = $this->editors->getAllEditorsById(0, $user);
                    $old_image = $editors['image'];

                    $target = 'upload_files/user/editors/'.$old_image;
                    
                    if ($old_image == 'default.png') {} else {
                        unlink($target);
                    }

                    $new_image = htmlspecialchars($this->upload->data('file_name'));

                    $data = [
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'graduated_from' => $this->input->post('graduated_from'),
                        'major' => $this->input->post('major'),
                        'address' => $this->input->post('address'),
                        'about_me' => $this->input->post('about'),
                        'image' => $new_image,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];

                    if($this->input->post('password1')){
                        $data['password'] = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
                    }
                    
                    $this->editors->updateEditors($id, $data);
                    $this->session->set_flashdata('success', 'Editors has been updated');
                    redirect('editor/profile');

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('editor/profile');
                }
            } else {

                $data = [
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'graduated_from' => $this->input->post('graduated_from'),
                    'major' => $this->input->post('major'),
                    'address' => $this->input->post('address'),
                    'about_me' => $this->input->post('about'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                if($this->input->post('password1')){
                    $data['password'] = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
                }
                
                $this->editors->updateEditors($id, $data);
                $this->session->set_flashdata('success', 'Editors has been updated');
                redirect('editor/profile');

            }


        }
    }

}