<?php

class Chart_model extends CI_model
{
    public function getEssay()
    {
        $this->db->select('DATE_FORMAT(uploaded_at, "%M %Y") as month, count(id_essay_clients) as jml');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.status_essay_clients', 7);
        $this->db->group_by("month(uploaded_at)");
        $this->db->order_by('month(uploaded_at)', 'DESC');
        $this->db->order_by('year(uploaded_at)', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result_array();
    }
    
        public function getEssayEditors()
    {
        $this->db->select('DATE_FORMAT(uploaded_at, "%M %Y") as month, count(id_essay_clients) as jml');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.status_essay_editors', 7);
        $this->db->group_by("month(uploaded_at)");
        $this->db->order_by('month(uploaded_at)', 'DESC');
        $this->db->order_by('year(uploaded_at)', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result_array();
    }
}