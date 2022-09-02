<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Chart_model');
    }

    public function index()
    {
        $chart = $this->Chart_model->getEssay();
        $col1 = array_column($chart, "month");
        $data['month'] = json_encode($col1);
        
        $col2 = array_column($chart, 'jml');
        $data['jml'] = json_encode($col2);
        
        $this->load->view('user/admin/chart/index',$data);
    }
}