<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->model('Transaction_model');
        $this->load->model('Clients_model');
        $this->load->model('Program_model');
        $this->load->model('Essay_model');
        $this->load->library('mail_smtp');
    }


    // View Profile
    public function index()
    {
        $user = $this->session->userdata('email');
        // $datas = $this->session->userdata('datas');
        // if (!$datas) {
            $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
            $data['user'] = $this->Clients_model->getAllClientsById($user);
            $data['menus'] = 'dashboard';
            $data['submenus'] = '';
            $data['readonly'] = 'readonly';
            $data['hidden'] = 'hidden';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-students', $data);
            $this->load->view('templates/user/topbar-students', $data);
            $this->load->view('user/client/profile/index');
            $this->load->view('templates/user/footer');
        // } else {
        //     $this->session->set_flashdata('warning', 'Sorry, you are using a CRM account<br>
        //     You can edit your profile in the CRM system');
        //     redirect('user');
        // }
    }

    // Edit Profile
    public function edit()
    {
        $id = $this->input->post('id');
        $user = $this->session->userdata('email');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('state', 'State', 'trim');
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required|trim');
        $this->form_validation->set_rules('current_school', 'Current School', 'required|trim');
        $this->form_validation->set_rules('school_name', 'School Name', 'required|trim');
        $this->form_validation->set_rules('curriculum', 'Curriculum', 'trim');
        $this->form_validation->set_rules('password1', 'Password', 'trim|matches[password2]|min_length[3]', [
            'matches' => 'Password dont math.',
            'min_length' => 'Password too short.',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['count_trans'] = $this->Transaction_model->getAllTransactionPending($user);
            $data['user'] = $this->Clients_model->getAllClientsById($user);
            $data['menus'] = 'dashboard';
            $data['submenus'] = '';
            $data['readonly'] = '';
            $data['hidden'] = '';
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar-students', $data);
            $this->load->view('templates/user/topbar-students', $data);
            $this->load->view('user/client/profile/index');
            $this->load->view('templates/user/footer');
        } else {
            $file_activity = $_FILES['activity']['name'];
            $file_resume = $_FILES['resume']['name'];
            $file_quisioner = $_FILES['quisioner']['name'];
            
            $password = $this->input->post('password1');
            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'postal_code' => $this->input->post('postal_code'),
                'address' => $this->input->post('address'),
                'birthdate' => $this->input->post('birthdate'),
                'current_school' => $this->input->post('current_school'),
                'school_name' => $this->input->post('school_name'),
                'curriculum' => $this->input->post('curriculum'),
                'year' => $this->input->post('year'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];

            // Photo Profile
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = './upload_files/user/students/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = $this->input->post('first_name').'('.date('H:i:s').')';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $students = $this->Clients_model->getAllClientsById($user);
                    $old_image = $students['image'];
                    $target = 'upload_files/user/students/'.$old_image;
                    
                    if ($old_image == 'default.png') {} else {
                        unlink($target);
                    }

                    $new_image = htmlspecialchars($this->upload->data('file_name'));
                    $data['image'] = $new_image;

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('student/profile');
                }
            }

             // Activity Files
             if ($file_activity) {
                 $config['upload_path'] = './upload_files/user/students/activity/';
                 $config['allowed_types'] = 'doc|docx|pdf';
                 $config['max_size'] = 2048;
                 $config['file_name'] = 'Activity '.$this->input->post('first_name').'('.date('d-m-Y').')';
 
                 $this->load->library('upload');
                 $this->upload->initialize($config);
 
                 if ($this->upload->do_upload('activity')) {
                    $students = $this->Clients_model->getAllClientsById($user);
                    $old_file = $students['activity'];
                    $target = 'upload_files/user/students/activity/'.$old_file;
                    
                    if ($old_file == '') {} else {
                        unlink($target);
                    }
                    
                     $activity_name = htmlspecialchars($this->upload->data('file_name'));
                     $data['activity'] = $activity_name;
 
                 } else {
                     $error = array('error' => $this->upload->display_errors());
                     $this->session->set_flashdata('error', $error['error']);
                     redirect('student/profile');
                 }
             }

             // Resume Files
             if ($file_resume) {
                $config['upload_path'] = './upload_files/user/students/resume/';
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size'] = 2048;
                $config['file_name'] = 'Resume '.$this->input->post('first_name').'('.date('d-m-Y').')';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('resume')) {
                   $students = $this->Clients_model->getAllClientsById($user);
                   $old_file = $students['resume'];
                   $target = 'upload_files/user/students/resume/'.$old_file;
                   
                   if ($old_file == '') {} else {
                       unlink($target);
                   }
                   
                    $resume_name = htmlspecialchars($this->upload->data('file_name'));
                    $data['resume'] = $resume_name;

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('student/profile');
                }
            }

            // Quisioner Files
            if ($file_quisioner) {
                $config['upload_path'] = './upload_files/user/students/quisioner/';
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size'] = 2048;
                $config['file_name'] = 'Quisioner '.$this->input->post('first_name').'('.date('d-m-Y').')';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('quisioner')) {
                   $students = $this->Clients_model->getAllClientsById($user);
                   $old_file = $students['quisioner'];
                   $target = 'upload_files/user/students/quisioner/'.$old_file;
                   
                   if ($old_file == '') {} else {
                       unlink($target);
                   }
                   
                    $quisioner_name = htmlspecialchars($this->upload->data('file_name'));
                    $data['quisioner'] = $quisioner_name;

                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('student/profile');
                }
            }


            if (!$password) {
                $this->Clients_model->updateClientsById($id, $data);
                $this->session->set_flashdata('success', 'Profile has been updated');
                redirect('student/profile');

            } else {
                $data['password'] = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $this->Clients_model->updateClientsById($id, $data);
                $this->session->set_flashdata('success', 'Profile has been updated');
                redirect('student/profile');
            }
        }
    }


}