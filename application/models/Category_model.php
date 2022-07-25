<?php

class Category_model extends CI_model
{
    public function getAllCategory()
    {
        return $this->db->get('tbl_categories')->result_array();
    }

    public function getAllTags()
    {
        return $this->db->get('tbl_tags')->result_array();
    }

    public function getAllTagsById($id)
    {
        return $this->db->get_where('tbl_tags', ['id_topic'=>$id])->row_array();
    }

    public function createTags($data)
    {
        $this->db->insert('tbl_tags', $data);
    }

    public function updateTags($data, $id)
    {
        $this->db->where('id_topic', $id);
        $this->db->update('tbl_tags', $data);
    }

    public function deleteTags($id)
    {
        $this->db->delete('tbl_tags', array('id_topic' => $id));
    }
}