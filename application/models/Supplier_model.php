<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model 
{ 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    public function view_supplier() 
    {
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get('sup_tbl')->result();
        return $result;
    }

    function add_supplier()
    {
        $sup_code = $this->input->post('sup_code');
        $sup_name = $this->input->post('sup_name');
        $sup_add = $this->input->post('sup_add');
        $sup_contact = $this->input->post('sup_contact');
        $sup_phoneno = $this->input->post('sup_phoneno');
        $sup_telno = $this->input->post('sup_telno');
        $sup_data = array(
        	'CODE' => $sup_code, 
            'NAME' => $sup_name,
            'ADDRESS' => $sup_add,
            'CONTACT_PERSON' => $sup_contact,
            'PHONE_NO' => $sup_phoneno,
            'TEL_NO' => $sup_telno
        );
        $response = $this->db->insert('sup_tbl', $sup_data);
        if($response){
            return $this->db->insert_id();
        }
        else{
            return FALSE;
        } 
    }
    
    public function get_supplier($sup_id) 
    {
        $this->db->where('ID', $sup_id);
        $query = $this->db->get('sup_tbl');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    function edit_supplier($sup_id, $update_data)
    {
        $this->db->where('ID', $sup_id);
        $response = $this->db->update('sup_tbl', $update_data);
        return $response;
    }

    function del_supplier($sup_id)
    {
        $this->db->where('ID', $sup_id);
		$this->db->delete('sup_tbl');
        return array(
            'deleted' => 'done',
        );
    }
}