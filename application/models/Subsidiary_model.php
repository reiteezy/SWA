<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subsidiary_model extends CI_Model 
{ 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    
    function add_subsidiary()
    {
        $sub_code = $this->input->post('sub_code');
        $sub_descript = $this->input->post('sub_descript');

        $sub_data = array(
            'CODE' => $sub_code,
            'DESCRIPTION' => $sub_descript
        );
        $this->db->insert('sub_tbl', $sub_data);
        $insert_id = $this->db->insert_id();

    return array(
        'insert_id' => $insert_id,
        'data' => $sub_data
    );
    }
    
    public function get_subsidiaries() {    
        $this->db->order_by('CREATION_DATE', 'DESC');
        $this->db->select('*');
        $query = $this->db->get('sub_tbl');
        // echo $this->db->last_query(); 
        // die();
        return $query->result_array();
    }

    public function get_swa_subsidiary() 
    {
        $this->db->select('sub_tbl.*');
        $this->db->from('sub_tbl');
        $query = $this->db->get();
    
        if ($query) {
            return $query->result(); 
        } else {
            return array(); 
        }
    }

    function del_subsidiary($sub_id)
    {
        $this->db->where('ID', $sub_id);
		$this->db->delete('sub_tbl');
        return array(
            'deleted' => 'done',
        );
    }
    
    function update_subsidiary($sub_id, $update_data) 
    {
        $this->db->where('ID', $sub_id);
        $this->db->update('sub_tbl', $update_data);
    
        $this->db->where('ID', $sub_id);
        $query = $this->db->get('sub_tbl');
        
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; 
        }
    }
    

    public function get_subsidiary($sub_id) 
    {
        $this->db->where('ID', $sub_id);
        $query = $this->db->get('sub_tbl');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}