<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model 
{ 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    function add_type()
    {
        $user_class = $this->input->post('user_class');
        $user_descript = $this->input->post('user_descript');

        $class_data = array(
            'CLASS' => $user_class,
            'DESCRIPTION' => $user_descript
        );
        $response = $this->db->insert('class_tbl', $class_data);
        if($response){
            return $this->db->insert_id();
        }
        else{
            return FALSE;
        }
       
    }
    
    public function get_type($class_id) 
    {
        $this->db->where('CID', $class_id);
        $query = $this->db->get('class_tbl');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    function edit_type($class_id, $update_data)
    {
        $this->db->where('CID', $class_id);
        $this->db->update('class_tbl', $update_data);
    }
            
    function del_type($class_id)
    {
        $this->db->where('CID', $class_id);
		$this->db->delete('class_tbl');
        return array(
            'deleted' => 'done',
        );
    }

    public function view_type() 
    {
        $result = $this->db->get('class_tbl')->result_array();
        return $result;
    }

    public function get_class_data() 
    {
        $result = $this->db->get('class_tbl')->result();
        return $result;
    }
    
}