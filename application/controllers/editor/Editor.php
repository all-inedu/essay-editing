<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Essay_model','essay');
        $this->load->model('Editors_model','editors');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'editors') {
            redirect('/');
        }
    }


    public function index()
    {
        $data['menus'] = 'dashboard';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/mentor/index');
        $this->load->view('templates/user/footer');
    }

    public function essay_list()
    {
        $user = $this->session->userdata('email');
        $data['essay'] = $this->essay->getEssayEditorList($user); 
        $data['menus'] = 'essay-list';
        $data['submenus'] = '';
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar-editors', $data);
        $this->load->view('templates/user/topbar-editors');
        $this->load->view('user/editor/essay-list/index', $data);
        $this->load->view('templates/user/footer');
    }
    

    public function view_essay($id)
    {
        $data['essay_editor'] = $this->essay->getEssayEditorsById($id);
        if($data['essay_editor']) {
            $id_essay_client = $data['essay_editor']['id_essay_clients'];
            $data['essay'] = $this->essay->getEssayClientsById($id_essay_client);
            $data['tags'] = $this->essay->getEssayTopic();
            $data['tags_clients'] = $this->essay->getEssayTags($id_essay_client);
            $data['status'] = $this->essay->getEssayStatus($id_essay_client);
            $data['menus'] = 'essay-list';
            $data['submenus'] = '';

            $this->form_validation->set_rules('tags[]', 'Tags', 'required');

            if($this->form_validation->run()==false){        
                $this->load->view('templates/user/header');
                $this->load->view('templates/user/sidebar-editors', $data);
                $this->load->view('templates/user/topbar-editors');
                $this->load->view('user/editor/essay-list/view-essay', $data);
                $this->load->view('templates/user/footer');
            } else {
                if($this->input->post('upload')){
                    $this->updateEssayEditors();
                } else if($this->input->post('revision')){
                    $this->updateEssayEditorsRevision(); 
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Students Essay is not found.');
            redirect('editor/essay-list');
        }
    }

    public function updateEssayEditors()
    {
        $id_essay_clients = $this->input->post('id_essay_clients');
        $id_essay_editors = $this->input->post('id_essay_editors');
        $id = $id_essay_clients;
        $user = $this->session->userdata('email');
        $editors = $this->editors->getAllEditorsByEmail($user);
        $clients = $this->essay->getEssayClientsById($id);
        $file_name = 'Editing-'.$clients['first_name'].'-Essays-by-'.$editors['first_name'].'('.date('d-m-Y').')';
        
        $files = $_FILES['files']['name'];
        $tags = $this->input->post('tags[]');

        if($files){

            $config['upload_path'] = './upload_files/program/essay/editors/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048;
            $config['file_name'] = $file_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('files')) {
                $new_files = htmlspecialchars($this->upload->data('file_name'));
                $data = [
                    'attached_of_editors' => $new_files,
                    'uploaded_at' => date('Y-m-d H:i:s'),
                    'status_essay_editors' => '3',
                ];
                
                $status = [
                    'id_essay_clients' => $id_essay_clients,
                    'status' => '3',
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $no=0;
                foreach ($tags as $i):
                    
                    $data_tags = [
                        'id_essay_clients' => $id_essay_clients,
                        'id_topic' => $tags[$no]
                    ];
                    $this->essay->insertEssayTags($data_tags);
    
                $no++;
                endforeach;

                $this->essay->updateEssayEditors($data, $status, $id_essay_clients);
                $this->session->set_flashdata('success', 'Your essay has been uploaded<br> Please waiting to verified.');
                redirect('editor/view-essay/'.$id_essay_editors);

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('editor/view-essay/'.$id_essay_editors);
            }

         } else {
            $this->session->set_flashdata('error', 'Please, you must upload your essay.');
            redirect('editor/view-essay/'.$id_essay_editors);
         }
    }

    public function updateEssayEditorsRevision()
    {
        $id_essay_clients = $this->input->post('id_essay_clients');
        $id_essay_editors = $this->input->post('id_essay_editors');
        $id = $id_essay_clients;
        $user = $this->session->userdata('email');
        $editors = $this->editors->getAllEditorsByEmail($user);
        $clients = $this->essay->getEssayClientsById($id);
        $file_name = 'Editing-'.$clients['first_name'].'-Essay-by-'.$editors['first_name'].'('.date('d-m-Y').')';

        $files = $_FILES['files']['name'];
        $tags = $this->input->post('tags[]');
        
        $this->essay->deleteEssayTagsById($id_essay_clients);

        if($files){

            $config['upload_path'] = './upload_files/program/essay/editors/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048;
            $config['file_name'] = $file_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('files')) {
                $new_files = htmlspecialchars($this->upload->data('file_name'));
                $data = [
                    'attached_of_editors' => $new_files,
                    'uploaded_at' => date('Y-m-d H:i:s'),
                    'status_essay_editors' => '8',
                ];
                
                $status = [
                    'id_essay_clients' => $id_essay_clients,
                    'status' => '8',
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $no=0;
                foreach ($tags as $i):
                    
                    $data_tags = [
                        'id_essay_clients' => $id_essay_clients,
                        'id_topic' => $tags[$no]
                    ];
                    $this->essay->insertEssayTags($data_tags);
    
                $no++;
                endforeach;

                $this->essay->updateEssayEditorsRevision($data, $status, $id_essay_clients);
                $this->session->set_flashdata('success', 'Your essay has been uploaded<br> Please waiting to verified.');
                redirect('editor/view-essay/'.$id_essay_editors);

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('editor/view-essay/'.$id_essay_editors);
            }

         } else {
            $this->session->set_flashdata('error', 'Please, you must upload your essay.');
            redirect('editor/view-essay/'.$id_essay_editors);
         }
    }
    

    public function accepted($id, $id_essay_editors)
    {
        $status = [
            'id_essay_clients' => $id,
            'status' => '2',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->essay->acceptedEssay($id, $status);
        $this->session->set_flashdata('success', 'Students essay was accepted.');
        redirect('editor/view-essay/'.$id_essay_editors);
    }

    public function rejected($id)
    {
        $status = [
            'id_essay_clients' => $id,
            'status' => '5',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->essay->rejectedEssay($id, $status);
        $this->session->set_flashdata('success', 'Students essay was rejected.');
        redirect('editor/essay-list');
    }



}