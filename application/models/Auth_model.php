<?php

class Auth_model extends CI_model
{

    public function __construct()
    {
        parent::__construct();

        // $this->db2 = $this->load->database('bigdata', true);
    }

    public function saveClients($data)
    {
        $this->db->insert('tbl_clients', $data);
    }

    public function saveToken($user_token)
    {
        $this->db->insert('tbl_token', $user_token);
    }

    public function studentsByEmail($email)
    {
        return $this->db->get_where('tbl_clients', ['email' => $email])->row_array();
    }

    public function mentorsByEmail($email)
    {
        return $this->db->get_where('tbl_mentors', ['email' => $email])->row_array();
    }

    public function adminsByEmail($email)
    {
        return $this->db->get_where('tbl_admins', ['email' => $email])->row_array();
    }

    public function editorsByEmail($email)
    {
        return $this->db->get_where('tbl_editors', ['email' => $email])->row_array();
    }

    public function clientByEmail($email)
    {
        if ($this->db->get_where('tbl_clients', ['email' => $email])->row_array()) {
            return $this->db->get_where('tbl_clients', ['email' => $email])->row_array();
        } else if ($this->db->get_where('tbl_admins', ['email' => $email])->row_array()) {
            return $this->db->get_where('tbl_admins', ['email' => $email])->row_array();
        } else if ($this->db->get_where('tbl_mentors', ['email' => $email])->row_array()) {
            return $this->db->get_where('tbl_mentors', ['email' => $email])->row_array();
        } else if ($this->db->get_where('tbl_editors', ['email' => $email])->row_array()) {
            return $this->db->get_where('tbl_editors', ['email' => $email])->row_array();
        }
    }


    // public function clientsByCrm($email)
    // {
    //     if ($this->db2->get_where('dtb_admins', ['email' => $email])->row_array()) {
    //         return $this->db2->get_where('dtb_admins', ['email' => $email])->row_array();
    //     } else if ($this->db2->get_where('dtb_clients', ['email' => $email])->row_array()) {
    //         return $this->db2->get_where('dtb_clients', ['email' => $email])->row_array();
    //     } else if ($this->db2->get_where('dtb_mentors', ['email' => $email])->row_array()) {
    //         return $this->db2->get_where('dtb_mentors', ['email' => $email])->row_array();
    //     }
    // }

    public function clientByToken($token)
    {
        return $this->db->get_where('tbl_token', ['token' => $token])->row_array();
    }

    public function deleteEmail($email)
    {
        $this->db->delete('tbl_clients', ['email' => $email]);
        $this->db->delete('tbl_token', ['email' => $email]);
    }

    public function verifyAccount($email)
    {
        $this->db->set('status', 1);
        $this->db->where('email', $email);
        $this->db->update('tbl_clients');
        $this->db->delete('tbl_token', ['email' => $email]);
    }

    public function resetPasswordAdmins($data)
    {
        $this->db->set('password', $data['password']);
        $this->db->where('email', $data['email']);
        $this->db->update('tbl_admins');
        $this->db->delete('tbl_token', ['email' => $data['email']]);
    }

    public function resetPasswordClients($data)
    {
        $this->db->set('password', $data['password']);
        $this->db->where('email', $data['email']);
        $this->db->update('tbl_clients');
        $this->db->delete('tbl_token', ['email' => $data['email']]);
    }

    public function resetPasswordEditors($data)
    {
        $this->db->set('password', $data['password']);
        $this->db->where('email', $data['email']);
        $this->db->update('tbl_editors');
        $this->db->delete('tbl_token', ['email' => $data['email']]);
    }

    public function resetPasswordMentors($data)
    {
        $this->db->set('password', $data['password']);
        $this->db->where('email', $data['email']);
        $this->db->update('tbl_mentors');
        $this->db->delete('tbl_token', ['email' => $data['email']]);
    }

    public function addAdminByCRM($add_user)
    {
        $this->db->insert('tbl_admins', $add_user);
    }

    public function addClientByCRM($add_user)
    {
        $this->db->insert('tbl_clients', $add_user);
    }
}