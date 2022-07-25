<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students_json extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('User_model');
        $this->load->model('Transaction_model');
        $this->load->model('Clients_model');
        $this->load->model('Program_model');
        $this->load->model('Essay_model');
        $this->load->model('Essay_prompt_model');
    }

    public function prompt($id)
    {
        $result = $this->Essay_model->promptById($id);
        echo json_encode($result);
    }

    public function promptByUniv($id)
    {
        $result = $this->Essay_prompt_model->promptByUniv($id);
        echo json_encode($result);
    }

}