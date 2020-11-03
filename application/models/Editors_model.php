<?php

class Editors_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllEditorsWithoutMe($user)
    {
        $this->db->select('*');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.status', 1);
        $this->db->where('tbl_editors.position <', 4);
        $this->db->where('tbl_editors.email !=', $user);
        $this->db->join('tbl_position_editors', 'tbl_position_editors.id_position = tbl_editors.position');
        return $this->db->get()->result_array();
    }

    public function getAllEditorWithoutMe($user)
    {
        $this->db->select('*');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.status', 1);
        $this->db->where('tbl_editors.email !=', $user);
        $this->db->join('tbl_position_editors', 'tbl_position_editors.id_position = tbl_editors.position');
        return $this->db->get()->result_array();
    }

    public function getAllManagingEditors()
    {
        $this->db->select('tbl_editors.email');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.position', 3);
        $this->db->join('tbl_position_editors', 'tbl_position_editors.id_position = tbl_editors.position');
        return $this->db->get()->result_array();
    }

    public function getAllEditors()
    {
        $this->db->select('*');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.status', 1);
        $this->db->join('tbl_position_editors', 'tbl_position_editors.id_position = tbl_editors.position');
        return $this->db->get()->result_array();
    }

    public function getAllEditorsById($id='', $user='')
    {
        if($id){
            $this->db->select('*');
            $this->db->from('tbl_editors');
            $this->db->where('tbl_editors.id_editors', $id);
            $this->db->join('tbl_position_editors', 'tbl_position_editors.id_position = tbl_editors.position');
            return $this->db->get()->row_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_editors');
            $this->db->where('tbl_editors.email', $user);
            $this->db->join('tbl_position_editors', 'tbl_position_editors.id_position = tbl_editors.position');
            return $this->db->get()->row_array();
        }
    }

    public function getAllEditorsByEmail($user)
    {
        $this->db->select('*');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.email', $user);
        $this->db->join('tbl_position_editors', 'tbl_position_editors.id_position = tbl_editors.position');
        return $this->db->get()->row_array();
    }

    public function getAllPositionEditors()
    {
        return  $this->db->get('tbl_position_editors')->result_array();
    }

    public function updatePositionById($id, $data)
    {
        $this->db->where('id_editors', $id);
        $this->db->update('tbl_editors', $data);
    }

    public function createEditors($data)
    {
        $this->db->insert('tbl_editors', $data);
    }

    public function deleteToken($email)
    {
        $this->db->delete('tbl_token', ['email' => $email]);
    }

    public function updateEditors($id, $data)
    {
        $this->db->where('id_editors', $id);
        $this->db->update('tbl_editors', $data);
    }

    public function star5($id)
    {
        $this->db->select('tbl_essay_clients.email');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.id_editors', $id);
        $this->db->where('tbl_essay_clients.essay_rating', 5);
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.editors_mail = tbl_editors.email');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        return $this->db->get()->result_array();
    }

    public function star4($id)
    {
        $this->db->select('tbl_essay_clients.email');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.id_editors', $id);
        $this->db->where('tbl_essay_clients.essay_rating', 4);
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.editors_mail = tbl_editors.email');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        return $this->db->get()->result_array();
    }

    public function star3($id)
    {
        $this->db->select('tbl_essay_clients.email');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.id_editors', $id);
        $this->db->where('tbl_essay_clients.essay_rating', 3);
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.editors_mail = tbl_editors.email');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        return $this->db->get()->result_array();
    }

    public function star2($id)
    {
        $this->db->select('tbl_essay_clients.email');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.id_editors', $id);
        $this->db->where('tbl_essay_clients.essay_rating', 2);
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.editors_mail = tbl_editors.email');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        return $this->db->get()->result_array();
    }

    public function star1($id)
    {
        $this->db->select('tbl_essay_clients.email');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.id_editors', $id);
        $this->db->where('tbl_essay_clients.essay_rating', 1);
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.editors_mail = tbl_editors.email');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        return $this->db->get()->result_array();
    }

    public function numberOfRating($id)
    {
        $this->db->select('tbl_essay_clients.email');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.id_editors', $id);
        $this->db->where('tbl_essay_clients.essay_rating >', 0);
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.editors_mail = tbl_editors.email');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        return $this->db->get()->result_array();
    }

    public function sumOfRating($id)
    {
        $this->db->select_sum('tbl_essay_clients.essay_rating');
        $this->db->from('tbl_editors');
        $this->db->where('tbl_editors.id_editors', $id);
        $this->db->where('tbl_essay_clients.essay_rating >', 0);
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.editors_mail = tbl_editors.email');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        return $this->db->get()->row_array();
    }

    public function getEditorsEssayById($id)
    {
        $this->db->select('tbl_editors.id_editors');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_editors.id_editors', $id);
        $this->db->where('tbl_essay_editors.status_essay_editors', 7);
        $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_editors.editors_mail');
        return $this->db->get()->result_array();
    }
}