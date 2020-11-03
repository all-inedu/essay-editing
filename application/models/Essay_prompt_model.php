<?php

class Essay_prompt_model extends CI_model
{

    public function getAllPrompt()
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_prompt');
        $this->db->where('tbl_essay_prompt.status', 1);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_prompt.id_univ');
        return $this->db->get()->result_array();
    }

    public function savePrompt($data)
    {
        $this->db->insert('tbl_essay_prompt', $data);
    }

    public function promptById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_prompt');
        $this->db->where('tbl_essay_prompt.id_essay_prompt', $id);
        $this->db->where('tbl_essay_prompt.status', 1);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_prompt.id_univ');
        return $this->db->get()->row_array();
    }

    public function updatePrompt($id, $data)
    {
        $this->db->where('id_essay_prompt', $id);
        $this->db->update('tbl_essay_prompt', $data);
    }

    public function deletePrompt($id)
    {
        $this->db->set('status', 2);
        $this->db->where('id_essay_prompt', $id);
        $this->db->update('tbl_essay_prompt');
        // $this->db->delete('tbl_universities', array('id_univ' => $id));
    }

    public function promptByUniv($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_prompt');
        $this->db->where('id_univ', $id);
        return $this->db->get()->result_array();
    }
}