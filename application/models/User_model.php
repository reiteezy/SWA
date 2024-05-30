<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{ 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    function add_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $emp_name = $this->input->post('emp_name');
        $emp_id = $this->input->post('emp_id');
        $emp_pos = $this->input->post('emp_pos');
        $emp_dept = $this->input->post('emp_dept');
        $emp_bu = $this->input->post('emp_bu');
        $user_class_id = $this->input->post('user_class');
        $emp_photo = $this->input->post('emp_photo');
        $class_data = $this->Admin_model->get_user_class($user_class_id);
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $user_data = array(
            'USERNAME' => $username,
            'CLASS_ID' => $user_class_id,
            'PASSWORD' => $password,
            'EMP_NAME' => $emp_name,
            'EMP_ID' => $emp_id,
            'EMP_POS' => $emp_pos,
            'EMP_DEPT' => $emp_dept,
            'EMP_BU' => $emp_bu,
            'EMP_PHOTO' => $emp_photo
        );
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
    public function get_user_list() 
    {
        $this->db->select('users_tbl.*, class_tbl.CLASS, class_tbl.DESCRIPTION, sub_tbl.CODE, sub_tbl.DESCRIPTION');
        $this->db->from('users_tbl');
        $this->db->join('class_tbl', 'users_tbl.CLASS_ID = class_tbl.CID', 'left');
        $this->db->join('sub_tbl', 'users_tbl.SUB_ID = sub_tbl.ID', 'left');
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
}