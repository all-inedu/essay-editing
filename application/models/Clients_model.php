<?php

class Clients_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();

        $this->db2 = $this->load->database('crm', true);
    }

    public function getAllById($id)
    {
        if ($this->db->get_where('tbl_clients', ['email' => $id])->row_array()) {
            return $this->db->get_where('tbl_clients', ['email' => $id])->row_array();
        } else {
            return $this->db2->get_where('dtb_clients', ['email' => $id])->row_array();
        }
    }

    public function checkClientById($email)
    {
            return $this->db->get_where('tbl_clients', ['email' => $email])->row_array();
    }

    public function getAllClients()
    {
        $this->db->select('tbl_clients.id_clients, tbl_clients.first_name, tbl_clients.last_name, tbl_clients.email, tbl_clients.phone, tbl_clients.address, tbl_mentors.first_name as first_name1, tbl_mentors.last_name as last_name1');
        $this->db->from('tbl_clients');
        $this->db->where('tbl_clients.status', 1);
        $this->db->join('tbl_mentors', 'tbl_mentors.id_mentors = tbl_clients.id_mentor');
        return $this->db->get()->result_array();
        // return $this->db->get_where('tbl_clients', ['status' => 1])->result_array();
    }

    public function getAllClientsCrm()
    {
        return $this->db2->get_where('dtb_clients', ['status' => 2, 'mentor_id >'=>0])->result_array();
    }

    public function getAllClientsById($id)
    {
        $email_client = $this->db->get_where('tbl_clients', ['email' => $id, 'status' => 1])->row_array();
        $id_client = $this->db->get_where('tbl_clients', ['id_clients' => $id, 'status' => 1])->row_array();
        
        if($email_client){
            return $email_client;
        } else {
            return $id_client;
        }
    }

    public function updateClientsById($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_clients', $id);
        $this->db->update('tbl_clients');
    }

    public function importClientsCRM($students)
    {
        $this->db->insert('tbl_clients', $students);
    }

    public function getAllClientsByMentor($id){
        $this->db->order_by('first_name', 'ASC');
        return $this->db->get_where('tbl_clients', ['id_mentor'=>$id, 'status' => 1])->result_array();
    }

}