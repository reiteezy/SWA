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
        $response = $this->db->insert('sub_tbl', $sub_data);
        if($response){
            return $this->db->insert_id();
        }
        else{
            return FALSE;
        }
    }
    
    public function view_subsidiary() 
    {
        $result = $this->db->get('sub_tbl')->result();
        $this->db->order_by('DESCRIPTION', 'DESC');
        return $result;
    }
    

    function del_subsidiary($sub_id)
    {
        $this->db->where('ID', $sub_id);
		$this->db->delete('sub_tbl');
        return array(
            'deleted' => 'done',
        );
    }
    
    public function edit_subsidiary($sub_id, $update_data) 
    {
        $this->db->where('ID', $sub_id);
        $response = $this->db->update('sub_tbl', $update_data);
        return $response;
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