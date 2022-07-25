<?php

class User_model extends CI_model
{

    public function userData($user)
    {
        return $this->db->get_where('tbl_clients', ['email' => $user])->row_array();
    }

}