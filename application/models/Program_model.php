<?php

class Program_model extends CI_model
{

    public function getAllPrograms()
    {
        $this->db->order_by('program_name', 'ASC');
        return $this->db->get_where('tbl_programs', array('status' => 1))->result_array();
    }

    public function getAllProgramsGroup()
    {
        $this->db->order_by('program_name', 'DESC');
        $this->db->group_by('id_category');
        return $this->db->get_where('tbl_programs', array('status' => 1))->result_array();
    }

    public function getAllEssayPrograms()
    {
        $this->db->order_by('minimum_word', 'ASC');
        return $this->db->get_where('tbl_programs', array('status' => 1, 'id_category' => 1))->result_array();
    }

    public function saveProgram($data)
    {
        $this->db->insert('tbl_programs', $data);
    }

    public function programById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_programs');
        $this->db->where('tbl_programs.id_program', $id);
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category');
        return $this->db->get()->row_array();
        // return $this->db->get_where('tbl_programs', ['id_program' => $id, 'status' => 1])->row_array();
    }

    public function updateProgram($id, $data)
    {
        $this->db->where('id_program', $id);
        $this->db->update('tbl_programs', $data);
    }

    public function deleteById($id)
    {
        $this->db->set('status', 2);
        $this->db->where('id_program', $id);
        $this->db->update('tbl_programs');
    }

}