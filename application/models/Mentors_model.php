<?php

class Mentors_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();

        $this->db2 = $this->load->database('bigdata', true);
    }

    public function getAllMentors()
    {
        return $this->db->get_where('tbl_mentors', ['status' => 1])->result_array();
    }

    public function getMentorsMail($email)
    {
        $this->db->select('*');
        $this->db->from('tbl_mentors');
        $this->db->where('tbl_mentors.email', $email);
        return $this->db->get()->row_array();
    }

    public function getMentorsID($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_mentors');
        $this->db->where('tbl_mentors.id_mentors', $id);
        return $this->db->get()->row_array();
    }

    // public function getMentorsCRM()
    // {
    //     return $this->db2->get_where('dtb_mentors',array('status'=> 2))->result_array();
    // }

    public function getMentorBigdata() 
    {
        $this->db2->select('*');
        $this->db2->from('tbl_mt');
        $this->db2->where('tbl_mt.mt_status', 1);
        $this->db2->where('tbl_mt.mt_istutor <', 3);
        $this->db2->join('tbl_univ','tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db2->get()->result_array();
    }

    public function importMentorsCRM($editors)
    {
        $this->db->insert('tbl_mentors', $editors);
    }

    public function updateMentors($user, $data){
        $this->db->where('email', $user);
        $this->db->update('tbl_mentors', $data);
    }

}