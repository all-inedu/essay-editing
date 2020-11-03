<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('string');
        $this->load->model('Clients_model');
        $this->load->model('Editors_model');
        $this->load->model('Essay_model');
    }

    public function students()
    {
        $data['students'] = $this->Clients_model->getAllClients();
        $data['title'] = 'Student Report '.date('d-M-Y');
        $this->load->view('export/student-report', $data);
    }

    public function editors()
    {
        $data['editors'] = $this->Editors_model->getAllEditors();
        $data['title'] = 'Editor Report '.date('d-M-Y');
        $this->load->view('export/editor-report', $data);
    }

    public function essay_students($m, $y)
    {
        $data['essay'] = $this->Essay_model->getEssayExport($m, $y);
        $data['title'] = 'Essay Students Report '.date('d-M-Y');
        $this->load->view('export/essay-students-report', $data);
    }

    public function essay_editors($m, $y)
    {
        $data['essay'] = $this->Essay_model->getEssayEditorsExport($m, $y);
        $data['title'] = 'Essay Editors Report '.date('d-M-Y');
        if($data['essay']){
        $this->load->view('export/essay-editors-report', $data);
        } else {
            echo 'Data is not found';
        }
    }


}