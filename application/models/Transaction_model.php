<?php

class Transaction_model extends CI_model
{

    public function __construct()
    {
        parent::__construct();

        $this->db2 = $this->load->database('crm', true);
    }

    public function saveAll($datas)
    {
        $this->db->insert('tbl_transaction', $datas);
    }

    public function saveTransactionDetail($data)
    {
        $this->db->insert('tbl_transaction_detail', $data);
    }

    public function viewTransaction($code)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaction_detail');
        $this->db->where('tbl_transaction_detail.transaction_code', $code);
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_transaction_detail.id_program');
        return $this->db->get()->result_array();
    }

    public function getAllTransaction($email)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaction');
        $this->db->where('tbl_transaction.status <', 2);
        $this->db->where('tbl_transaction.email', $email);
        $this->db->order_by('tbl_transaction.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getAllTransactionPending($user = 0)
    {
        if ($user) {
            $this->db->select('*');
            $this->db->from('tbl_transaction');
            $this->db->where('tbl_transaction.status', 0);
            $this->db->where('tbl_transaction.email', $user);
            $this->db->order_by('tbl_transaction.created_at', 'DESC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_transaction');
            $this->db->where('tbl_transaction.status', 0);
            $this->db->order_by('tbl_transaction.created_at', 'DESC');
            return $this->db->get()->result_array();
        }
    }

    public function getAllTransactionVerify()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaction');
        $this->db->where('tbl_transaction.status', 1);
        $this->db->order_by('tbl_transaction.uploaded_at', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getAllTransactionPaid($user = 0)
    {
        if ($user) {
            $this->db->select('*');
            $this->db->from('tbl_transaction');
            $this->db->where('tbl_transaction.status', 2);
            $this->db->where('tbl_transaction.email', $user);
            $this->db->order_by('tbl_transaction.verified_at', 'DESC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_transaction');
            $this->db->where('tbl_transaction.status', 2);
            $this->db->order_by('tbl_transaction.verified_at', 'DESC');
            return $this->db->get()->result_array();
        }
    }

    public function getAllTransactionById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaction');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function getAllTransactionDetail($email)
    {
        $this->db->select('tbl_transaction.id, tbl_transaction.created_at, tbl_transaction.transaction_code, tbl_transaction.status, tbl_transaction_detail.id_program, tbl_programs.program_name');
        $this->db->from('tbl_transaction');
        $this->db->where('tbl_transaction.email', $email);
        $this->db->order_by('tbl_transaction.created_at', 'DESC');
        $this->db->join('tbl_transaction_detail', 'tbl_transaction_detail.transaction_code = tbl_transaction.transaction_code');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_transaction_detail.id_program');
        return $this->db->get()->result_array();
    }

    public function confirmPayment($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_transaction', $data);
    }

    public function verifiedPayment($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_transaction', $data);
    }
}