<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_json extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->model('Transaction_model');
        $this->load->model('Clients_model');
        $this->load->model('Editors_model');
        $this->load->model('Essay_model');
    }

    public function pendingCountJson()
    {
        $pending = $this->Transaction_model->getAllTransactionPending();
        echo json_encode($pending);
    }

    public function verifyCountJson()
    {
        $verify = $this->Transaction_model->getAllTransactionVerify();
        echo json_encode($verify);
    }

    public function countStar5($id)
    {
        $star5 = $this->Editors_model->star5($id);
        echo json_encode($star5);
    }

    public function countStar4($id)
    {
        $star5 = $this->Editors_model->star4($id);
        echo json_encode($star5);
    }

    public function countStar3($id)
    {
        $star5 = $this->Editors_model->star3($id);
        echo json_encode($star5);
    }

    public function countStar2($id)
    {
        $star5 = $this->Editors_model->star2($id);
        echo json_encode($star5);
    }

    public function countStar1($id)
    {
        $star5 = $this->Editors_model->star1($id);
        echo json_encode($star5);
    }

    public function numberOfRating($id)
    {
        $NOR = $this->Editors_model->numberOfRating($id);
        echo json_encode($NOR);
    }

    public function sumOfRating($id)
    {
        $SOR = $this->Editors_model->sumOfRating($id);
        echo json_encode($SOR);
    }

    public function completeEssayByEditors($id)
    {
        $complete = $this->Editors_model->getEditorsEssayById($id);
        echo json_encode($complete);
    }

    public function essay5Days($today, $dueDate)
    {
        $essay = $this->Essay_model->essayDue5Days($today, $dueDate);
        echo json_encode($essay);
    }

    public function essayDue5DaysByEditor($editor, $today, $dueDate)
    {
        $essay = $this->Essay_model->essayDue5DaysByEditor($editor, $today, $dueDate);
        echo json_encode($essay);
    }

}