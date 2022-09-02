<?php
class Feedback_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();

        // $this->db2 = $this->load->database('crm', true);
    }

    public function getFeedbackById($id)
    {
        return $this->db->get_where('tbl_essay_feedback', ['id_essay_clients' => $id])->row_array();
    }

    public function addFeedback($data, $id, $average_rating)
    {
        $this->db->insert('tbl_essay_feedback', $data);

        $this->db->set('essay_rating', $average_rating);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');
    }

}