<?php

class University_model extends CI_model
{

    public function getAllUniv()
    {
        $this->db->order_by('university_name', 'ASC');
        return $this->db->get_where('tbl_universities', array('status' => 1, 'id_univ >=' => 0))->result_array();
    }

    public function saveUniv($data)
    {
        $this->db->insert('tbl_universities', $data);
    }

    public function viewUnivById($id)
    {
        return $this->db->get_where('tbl_universities', ['id_univ' => $id])->row_array();
    }

    public function updateUniv($id, $data)
    {
        $this->db->where('id_univ', $id);
        $this->db->update('tbl_universities', $data);
    }

    public function deleteUniv($id)
    {
        $this->db->set('status', 2);
        $this->db->where('id_univ', $id);
        $this->db->update('tbl_universities');
        // $this->db->delete('tbl_universities', array('id_univ' => $id));
    }

}