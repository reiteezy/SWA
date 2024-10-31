<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{ 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    function add_user($user_data)
    {
        
        $response = $this->db->insert('users_tbl', $user_data);
        if($response){
            return $this->db->insert_id();
        }
        else{
            $error = $this->db->error();
            log_message('error', 'Database Error: ' . $error['message']);
            return FALSE;
        }
    }
    public function get_users() 
    {
        $this->db->select('users_tbl.*, class_tbl.CID, class_tbl.CLASS, class_tbl.DESCRIPTION AS CLASS_DESCRIPT, sub_tbl.CODE, sub_tbl.DESCRIPTION as SUB_DESCRIPT');
        $this->db->from('users_tbl');
        $this->db->join('class_tbl', 'users_tbl.CLASS_ID = class_tbl.CID', 'left');
        $this->db->join('sub_tbl', 'users_tbl.SUB_ID = sub_tbl.ID', 'left');
        $query = $this->db->get();
        return $query->result_array(); 
    }

    public function get_status($user_id) 
    {
        $this->db->select('users_tbl.STATUS');
        $this->db->from('users_tbl');
        $this->db->where('users_tbl.ID', $user_id);
        $query = $this->db->get();
        return $query->result(); 
    }
    
    public function insert_user_data($data) 
    {
        return $this->db->insert('users_tbl', $data);
    }

    public function get_user_data($user_id) 
    {
    $this->db->select('users_tbl.*, class_tbl.CLASS, class_tbl.DESCRIPTION');
    $this->db->from('users_tbl');
    $this->db->join('class_tbl', 'users_tbl.CLASS_ID = class_tbl.CID', 'left');
    $this->db->where('users_tbl.ID', $user_id);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return null;
    }
    }
    

    public function update_user_data($user_id, $data) 
    {
        $this->db->where('ID', $user_id);
        $response = $this->db->update('users_tbl', $data);
        return $response;
    }

    // function del_user($user_id)
    // {
    //     $this->db->where('ID', $user_id);
	// 	$this->db->delete('users_tbl');
    //     return array(
    //         'deleted' => 'done',
    //     );
    // }

    public function get_tagged_subsidiaries($user_id) {
        $this->db->select('sub_tbl.*');
        $this->db->from('sub_tbl');
        $this->db->join('user_subsidiaries_tbl', 'sub_tbl.ID = user_subsidiaries_tbl.sub_id');
        $this->db->where('user_subsidiaries_tbl.user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_untagged_subsidiaries($user_id) {
        $this->db->select('sub_tbl.*');
        $this->db->from('sub_tbl');
        $this->db->join('user_subsidiaries_tbl', 'sub_tbl.ID = user_subsidiaries_tbl.sub_id', 'left');
        $this->db->where('user_subsidiaries_tbl.user_id !=', $user_id);
        $this->db->where('user_subsidiaries_tbl.sub_id IS NULL');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_user_subsidiary($user_id, $sub_id) {
        $data = array(
            'user_id' => $user_id,
            'sub_id' => $sub_id
        );
        $response = $this->db->insert('user_subsidiaries_tbl', $data);
        return $response;
    }

    public function remove_user_subsidiary($user_id, $sub_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('sub_id', $sub_id);
        $this->db->delete('user_subsidiaries_tbl');
    }

}