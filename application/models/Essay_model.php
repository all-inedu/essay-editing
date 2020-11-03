<?php
class Essay_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->db2 = $this->load->database('crm', true);
    }
    
    public function countEssayUnreadMentor($user){
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.status_read',0);
        $this->db->where('tbl_essay_clients.mentors_mail',$user);        
        return $this->db->get()->result_array();
    }

    public function countEssayList()
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        return $this->db->get()->result_array();
    }

    public function getEssayExport($m, $y)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.status_essay_clients !=', 7);
        $this->db->where('month(tbl_essay_clients.uploaded_at)', $m);
        $this->db->where('year(tbl_essay_clients.uploaded_at)', $y);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
        $this->db->order_by('tbl_essay_clients.uploaded_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getEssayEditorsExport($m, $y)
    {
        $this->db->select('
        tbl_editors.first_name as editors_fn,
        tbl_editors.last_name as editors_ln,
        tbl_clients.first_name as clients_fn,
        tbl_clients.last_name as clients_ln,
        tbl_programs.program_name,
        tbl_programs.minimum_word as min,
        tbl_programs.maximum_word as max,
        tbl_essay_clients.essay_title,
        tbl_essay_clients.essay_rating,
        tbl_essay_clients.completed_at,
        tbl_essay_editors.attached_of_editors as files,
        tbl_essay_editors.managing_file as managing_file,
        tbl_essay_editors.work_duration as duration,
        tbl_essay_editors.notes_editors as notes,
        tbl_essay_editors.uploaded_at as upload,
        tbl_status.status_title
        ');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.status_essay_editors =', 7);
        $this->db->where('month(tbl_essay_editors.uploaded_at)', $m);
        $this->db->where('year(tbl_essay_editors.uploaded_at)', $y);
        $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_editors.editors_mail');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_editors.status_essay_editors');
        $this->db->order_by('tbl_essay_editors.uploaded_at', 'DESC');
        return $this->db->get()->result_array();
    }
    
    public function getEssayEditorsExportByEditors($m, $y, $e)
    {
        $this->db->select('
        tbl_editors.first_name as editors_fn,
        tbl_editors.last_name as editors_ln,
        tbl_clients.first_name as clients_fn,
        tbl_clients.last_name as clients_ln,
        tbl_programs.program_name,
        tbl_programs.minimum_word as min,
        tbl_programs.maximum_word as max,
        tbl_essay_clients.essay_title,
        tbl_essay_clients.essay_rating,
        tbl_essay_clients.completed_at,
        tbl_essay_editors.attached_of_editors as files,
        tbl_essay_editors.managing_file as managing_file,
        tbl_essay_editors.work_duration as duration,
        tbl_essay_editors.notes_editors as notes,
        tbl_essay_editors.uploaded_at as upload,
        tbl_status.status_title
        ');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.status_essay_editors =', 7);
        $this->db->where('month(tbl_essay_editors.uploaded_at)', $m);
        $this->db->where('year(tbl_essay_editors.uploaded_at)', $y);
        $this->db->where('tbl_essay_editors.editors_mail', $e);
        $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_editors.editors_mail');
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_editors.status_essay_editors');
        $this->db->order_by('tbl_essay_clients.completed_at', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getEssayList($user='')
    {
        if($user){
            $this->db->select('*');
            $this->db->from('tbl_essay_clients');
            $this->db->where('tbl_essay_clients.status_essay_clients !=',7);
            $this->db->where('tbl_essay_clients.mentors_mail =',$user);
            $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
            $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
            $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
            $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
            $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
            $this->db->order_by('tbl_essay_clients.status_read', 'ASC');
            $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_essay_clients');
            $this->db->where('tbl_essay_clients.status_essay_clients  !=',7);
            $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
            $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program'); 
            $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
            $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
            $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
            $this->db->order_by('tbl_essay_clients.status_read', 'ASC');
            $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
            return $this->db->get()->result_array();
        }
    }

    public function getAllEssayNotAssign(){
        $not_assign = ['0','4','5'];
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where_in('tbl_essay_clients.status_essay_clients',$not_assign);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program'); 
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
        $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getAllEssayAssign($email){
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.status_essay_clients =',1);
        $this->db->where('tbl_essay_editors.editors_mail !=',$email);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program'); 
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.id_essay_clients = tbl_essay_clients.id_essay_clients');
        $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getAllEssayAccept($email){
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.status_essay_clients =',2);
        $this->db->where('tbl_essay_editors.editors_mail !=',$email);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program'); 
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.id_essay_clients = tbl_essay_clients.id_essay_clients');
        $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getAllEssayProcess($email){
        $ongoing = ['2','3','6','8'];
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_editors.editors_mail !=',$email);
        $this->db->where_in('tbl_essay_clients.status_essay_clients',$ongoing);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program'); 
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
        $this->db->join('tbl_essay_editors', 'tbl_essay_editors.id_essay_clients = tbl_essay_clients.id_essay_clients');
        $this->db->order_by('tbl_essay_clients.status_read', 'ASC');
        $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
        return $this->db->get()->result_array();
    }
    
    public function getEssayByMentors($user){
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.status_essay_clients =',7);
        $this->db->where('tbl_essay_clients.mentors_mail =',$user);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
        $this->db->order_by('tbl_essay_clients.status_read', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getEssayVerifyList($id='')
    {
        if($id) {
            $this->db->select('*');
            $this->db->from('tbl_essay_clients');
            $this->db->where('tbl_essay_clients.status_essay_clients',7);
            $this->db->where('tbl_editors.id_editors',$id);
            $this->db->join('tbl_essay_editors', 'tbl_essay_editors.id_essay_clients = tbl_essay_clients.id_essay_clients');
            $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_editors.editors_mail');
            $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
            $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
            $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
            $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
            $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
            $this->db->order_by('tbl_essay_clients.uploaded_at', 'DESC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_essay_clients');
            $this->db->where('tbl_essay_clients.status_essay_clients',7);
            $this->db->join('tbl_essay_editors', 'tbl_essay_editors.id_essay_clients = tbl_essay_clients.id_essay_clients');
            $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_editors.editors_mail');
            $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
            $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program'); 
            $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category');
            $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
            $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
            $this->db->order_by('tbl_essay_clients.uploaded_at', 'DESC');
            return $this->db->get()->result_array();
        }
    }

    public function getEssayStatus($id_essay_clients)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_status');
        $this->db->where('tbl_essay_status.id_essay_clients',$id_essay_clients);
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_status.id_essay_clients');
        $this->db->order_by('tbl_essay_status.id', 'DESC');
        return $this->db->get()->row_array();
    }

    public function getEssayHistoryStatus($id_essay_clients)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_status');
        $this->db->where('tbl_essay_status.id_essay_clients',$id_essay_clients);
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_status.status');
        $this->db->order_by('tbl_essay_status.id', 'DESC');
        $this->db->limit(5); 
        return $this->db->get()->result_array();
    }

    public function getEssayClientsById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.id_essay_clients', $id);
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email');
        return $this->db->get()->row_array();
    }

    public function getEssayReviseById($id){
        $this->db->select('tbl_editors.first_name, tbl_editors.last_name, tbl_essay_revise.id, tbl_essay_revise.notes, tbl_essay_revise.file, tbl_essay_revise.created_at, tbl_essay_revise.role, tbl_essay_revise.admin_mail, tbl_essay_revise.editors_mail');
        $this->db->from('tbl_essay_revise');
        $this->db->where('tbl_essay_revise.id_essay_clients',$id);
        $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_revise.editors_mail');
        $this->db->order_by('tbl_essay_revise.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getFilesClients($code, $id)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.id_transaction', $code);
        $this->db->where('tbl_essay_clients.id_program', $id);
        $this->db->join('tbl_essay_prompt', 'tbl_essay_prompt.id_essay_prompt = tbl_essay_clients.id_essay_prompt');
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_prompt.id_univ');
        return $this->db->get()->row_array();
    }

    public function getAllUniv()
    {
        $this->db->order_by('university_name', 'ASC');
        return $this->db->get_where('tbl_universities', array('status' => 1))->result_array();
    }

    public function getEssayTopic()
    {
        $this->db->order_by('id_topic', 'DESC');
        return $this->db->get('tbl_tags')->result_array();
    }

    public function getAllEssayPrompt()
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_prompt');
        $this->db->where('tbl_essay_prompt.status', 1);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_prompt.id_univ');
        return $this->db->get()->result_array();
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

    public function getEssayTags($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_tags');
        $this->db->where('tbl_essay_tags.id_essay_clients', $id);
        $this->db->join('tbl_tags', 'tbl_tags.id_topic = tbl_essay_tags.id_topic');
        return $this->db->get()->result_array();
    }

    public function insertEssayClients($data, $status)
    {
        $this->db->insert('tbl_essay_clients', $data);
        $this->db->insert('tbl_essay_status', $status);
    }

    public function insertEssayEditors($data, $id_essay_clients, $status)
    {
        $this->db->insert('tbl_essay_editors', $data);
        
        $this->db->set('status_essay_clients', 1);
        $this->db->where('id_essay_clients', $id_essay_clients);
        $this->db->update('tbl_essay_clients');

        $this->db->insert('tbl_essay_status', $status);
    }

    public function cancelAssign($id, $status)
    {
        $this->db->delete('tbl_essay_editors', ['id_essay_clients' => $id]);

        $this->db->set('status_essay_clients', 4);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');

        $this->db->insert('tbl_essay_status', $status);
    }

    public function acceptedEssay($id, $status)
    {
        $this->db->set('status_essay_clients', 2);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');
 
        $this->db->set('status_essay_editors', 2);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_editors');

        $this->db->insert('tbl_essay_status', $status);
    }

    
    public function rejectedEssay($id, $data, $status)
    {
        $this->db->delete('tbl_essay_editors', ['id_essay_clients' => $id]);

        $this->db->set('status_essay_clients', 5);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');

        $this->db->insert('tbl_essay_reject', $data);
        
        $this->db->insert('tbl_essay_status', $status);
    }

    public function getRejectedEssay($id){
        $this->db->select('tbl_editors.first_name,tbl_editors.last_name,tbl_essay_reject.notes,tbl_essay_reject.created_at');
        $this->db->from('tbl_essay_reject');
        $this->db->where('tbl_essay_reject.id_essay_clients', $id);
        $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_reject.editors_mail');
        $this->db->order_by('tbl_essay_reject.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getEssaybyEditors($id)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('tbl_essay_editors');
            $this->db->where('tbl_essay_editors.id_essay_clients', $id);
            // $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
            $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_editors.editors_mail');
            return $this->db->get()->row_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_essay_editors');
            $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
            return $this->db->get()->result_array();
        }
    }

    public function getEssayEditorsById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.id_essay_editors', $id);
        return $this->db->get()->row_array();
    }

    public function getEssayEditorsByEssayClients($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.id_essay_clients', $id);
        $this->db->join('tbl_editors', 'tbl_editors.email = tbl_essay_editors.editors_mail');
        return $this->db->get()->row_array();
    }

    public function getEssayEditorList($user)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.editors_mail', $user);
        $this->db->where('tbl_essay_editors.status_essay_editors !=', 7);
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_editors.status_essay_editors');
        $this->db->order_by('tbl_essay_editors.read', 'ASC');
        $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getVerifiedEssayEditorList($user)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.editors_mail', $user);
        $this->db->where('tbl_essay_editors.status_essay_editors =', 7);
        $this->db->join('tbl_essay_clients', 'tbl_essay_clients.id_essay_clients = tbl_essay_editors.id_essay_clients');
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program');
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_editors.status_essay_editors');
        $this->db->order_by('tbl_essay_editors.read', 'ASC');
        $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
        return $this->db->get()->result_array();
    }

    public function updateEssayEditors($data, $status, $id_essay_clients)
    {
        $this->db->set('status_essay_clients', 3);
        $this->db->where('id_essay_clients', $id_essay_clients);
        $this->db->update('tbl_essay_clients');

        $this->db->insert('tbl_essay_status', $status);
        
        $this->db->where('id_essay_clients', $id_essay_clients);
        $this->db->update('tbl_essay_editors', $data);
    }
    
    public function workDuration($duration) {
        $this->db->insert('tbl_work_duration', $duration);
    }

    public function updateEssayEditorsRevision($data, $status, $id_essay_clients)
    {
        $this->db->set('status_essay_clients', 8);
        $this->db->where('id_essay_clients', $id_essay_clients);
        $this->db->update('tbl_essay_clients');

        $this->db->insert('tbl_essay_status', $status);
        
        $this->db->where('id_essay_clients', $id_essay_clients);
        $this->db->update('tbl_essay_editors', $data);
    }

    public function deleteEssayTagsById($id_essay_clients)
    {
        $this->db->delete('tbl_essay_tags', ['id_essay_clients' => $id_essay_clients]);
    }

    public function insertEssayTags($data_tags)
    {
        $this->db->insert('tbl_essay_tags', $data_tags);
    }


    public function verifiedEssay($id, $data, $status)
    {
        $this->db->set('status_essay_clients', 7);
        $this->db->set('status_read', 0);
        $this->db->set('completed_at', date('Y-m-d H:i:s'));
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');

        $this->db->insert('tbl_essay_status', $status);

        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_editors', $data);
    }


    public function revisionEssay($id, $data, $revise, $status)
    {
        $this->db->set('status_essay_clients', 6);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');

        $this->db->insert('tbl_essay_status', $status);
        
        $this->db->insert('tbl_essay_revise', $revise);

        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_editors', $data);
    }

    public function commentsEssay($comments)
    {
        $this->db->insert('tbl_essay_revise', $comments);
    }

    public function giveFeedback($code, $id_prog, $id)
    {
        $this->db->set('essay_rating', $id);
        $this->db->where('id_transaction', $code);
        $this->db->where('id_program', $id_prog);
        $this->db->update('tbl_essay_clients');
    }

    public function statusReadMentor($id){
        $this->db->set('status_read', 1);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');
    }

    public function statusUnreadMentor($id){
        $this->db->set('status_read', 0);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');
    }

    public function statusReadManagingEditor($id){
        $this->db->set('status_read_editor', 1);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');
    }

    public function statusUnreadManagingEditor($id){
        $this->db->set('status_read_editor', 0);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_clients');
    }

    public function statusReadEditor($id){
        $this->db->set('read', 1);
        $this->db->where('id_essay_editors', $id);
        $this->db->update('tbl_essay_editors');
    }

    public function statusUnreadEditor($id){
        $this->db->set('read', 0);
        $this->db->where('id_essay_clients', $id);
        $this->db->update('tbl_essay_editors');
    }

    public function essayDue5Days($today, $dueDate)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('status_essay_clients !=',7);
        $this->db->where('essay_deadline >=', $today);
        $this->db->where('essay_deadline <=', $dueDate);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program'); 
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
        $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
        return $this->db->get()->result_array();
    }

    public function essayDue5DaysByEditor($editor, $today, $dueDate)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.editors_mail =',$editor);
        $this->db->where('tbl_essay_editors.status_essay_editors !=',7);
        $this->db->where('tbl_essay_clients.essay_deadline >=', $today);
        $this->db->where('tbl_essay_clients.essay_deadline <=', $dueDate);
        $this->db->join('tbl_essay_clients','tbl_essay_clients.id_essay_clients=tbl_essay_editors.id_essay_clients');
        return $this->db->get()->result_array();
    }


    public function essayDeadline($start, $num){
        $today = date('Y-m-d');
        $start = date('Y-m-d', strtotime('+'.$start.' days', strtotime($today)));
        $dueDate = date('Y-m-d', strtotime('+'.$num.' days', strtotime($today)));

        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->where('tbl_essay_clients.status_essay_clients !=',7);
        $this->db->where('tbl_essay_clients.essay_deadline >', $start);
        $this->db->where('tbl_essay_clients.essay_deadline <=', $dueDate);
        $this->db->join('tbl_universities', 'tbl_universities.id_univ = tbl_essay_clients.id_univ');
        $this->db->join('tbl_programs', 'tbl_programs.id_program = tbl_essay_clients.id_program'); 
        $this->db->join('tbl_categories', 'tbl_categories.id_category = tbl_programs.id_category'); 
        $this->db->join('tbl_clients', 'tbl_clients.email = tbl_essay_clients.email'); 
        $this->db->join('tbl_status', 'tbl_status.id = tbl_essay_clients.status_essay_clients');
        $this->db->order_by('tbl_essay_clients.essay_deadline', 'ASC');
        return $this->db->get()->result_array();

    }

    public function essayDeadlineToEditor($editor, $start, $num){
        $status = ['1','2','3','6','8'];
        $today = date('Y-m-d');
        $start = date('Y-m-d', strtotime('+'.$start.' days', strtotime($today)));
        $dueDate = date('Y-m-d', strtotime('+'.$num.' days', strtotime($today)));

        $this->db->select('*');
        $this->db->from('tbl_essay_editors');
        $this->db->where('tbl_essay_editors.editors_mail =',$editor);
        $this->db->where_in('tbl_essay_editors.status_essay_editors',$status);
        $this->db->where('tbl_essay_clients.essay_deadline >', $start);
        $this->db->where('tbl_essay_clients.essay_deadline <=', $dueDate);
        $this->db->join('tbl_essay_clients','tbl_essay_clients.id_essay_clients=tbl_essay_editors.id_essay_clients');
        return $this->db->get()->result_array();

    }
    
    public function deleteEssayById($id)
    {
        $this->db->delete('tbl_essay_editors', ['id_essay_clients' => $id]);
        $this->db->delete('tbl_essay_status', ['id_essay_clients' => $id]);
        $this->db->delete('tbl_essay_revise', ['id_essay_clients' => $id]);
        $this->db->delete('tbl_essay_reject', ['id_essay_clients' => $id]);
        $this->db->delete('tbl_essay_tags', ['id_essay_clients' => $id]);
        $this->db->delete('tbl_essay_clients', ['id_essay_clients' => $id]);
    }
    
    public function lastEssay()
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_clients');
        $this->db->order_by('tbl_essay_clients.id_essay_clients', 'DESC');
        return $this->db->get()->row_array();
    }

}