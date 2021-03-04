<?php

class Clients_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();

        $this->db2 = $this->load->database('bigdata', true);
    }

    public function getAllById($id)
    {
        if ($this->db->get_where('tbl_clients', ['email' => $id])->row_array()) {
            return $this->db->get_where('tbl_clients', ['email' => $id])->row_array();
        } else {
            return $this->db2->get_where('dtb_clients', ['email' => $id])->row_array();
        }
    }

    public function checkClientById($st_num)
    {
        return $this->db->get_where('tbl_clients', ['id_clients' => $st_num])->row_array();
    }

    public function getAllClients()
    {
        $this->db->select('tbl_clients.id_clients, tbl_clients.first_name, tbl_clients.last_name, tbl_clients.email, tbl_clients.phone, tbl_clients.address, tbl_mentors.first_name as first_name1, tbl_mentors.last_name as last_name1');
        $this->db->from('tbl_clients');
        $this->db->where('tbl_clients.status', 1);
        $this->db->join('tbl_mentors', 'tbl_mentors.id_mentors = tbl_clients.id_mentor');
        $this->db->order_by('tbl_clients.first_name','ASC');
        return $this->db->get()->result_array();
        // return $this->db->get_where('tbl_clients', ['status' => 1])->result_array();
    }

    public function getAllClientsCrm()
    {
        return $this->db2->get_where('dtb_clients', ['status' => 2, 'mentor_id >' => 0])->result_array();
    }

    public function getAllBigdata()
    {
        $this->db2->select('
            tbl_stmentor.stmentor_id,
            tbl_stmentor.mt_id1,
            tbl_stmentor.mt_id2,
            tbl_stprog.st_num,
            tbl_students.st_firstname,
            tbl_students.st_lastname,
            tbl_students.st_mail,
            tbl_students.st_phone,
            tbl_students.st_address,
            tbl_students.st_password,
            tbl_prog.prog_sub
        ');
        $this->db2->from('tbl_stmentor');
        $this->db2->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_stmentor.stprog_id');
        $this->db2->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db2->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db2->where('tbl_prog.main_number', 1);
        $this->db2->where('tbl_stmentor.mt_id1 !=', "");
        $this->db2->where('tbl_stmentor.stmentor_id >', 342);
        return $this->db2->get()->result_array();
    }

    public function getAllClientsById($id)
    {
        $email_client = $this->db->get_where('tbl_clients', ['email' => $id, 'status' => 1])->row_array();
        $id_client = $this->db->get_where('tbl_clients', ['id_clients' => $id, 'status' => 1])->row_array();

        if ($email_client) {
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

    public function getAllClientsByMentor($id)
    {
        $this->db->order_by('first_name', 'ASC');
        return $this->db->get_where('tbl_clients', ['id_mentor' => $id, 'status' => 1])->result_array();
    }

}