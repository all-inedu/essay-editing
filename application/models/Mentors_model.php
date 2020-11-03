<?php

class Mentors_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();

        $this->db2 = $this->load->database('crm', true);
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

    public function getMentorsCRM()
    {
        return $this->db2->get_where('dtb_mentors',array('status'=> 2))->result_array();
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