<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
		$this->load->model('Supplier_model');
		$this->load->model('Notification_model');
		if (!$this->session->userdata('login_id')) {
            redirect(base_url(), 'refresh');
        }
    }
    
    public function supplier() 
	{
		if ($this->session->userdata('priv_sub') == 1)
		{
		$view_sup = $this->Supplier_model->view_supplier();
		$data['menu'] = 'Supplier';
		$data['suppliers'] = $view_sup;

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/supplier_list', $data);
        $this->load->view('admin/view/js/supplier_js');
        $this->load->view('admin/view/modals/supplier_modal');
        $this->load->view('admin/require/footer');
		} 
		else {
		redirect(base_url() . 'admin/error404');
		}
	}

public function new_supplier() 
	{
		$response = $this->Supplier_model->add_supplier();
		$notification_data = array(
			'message' => 'A new Supplier has been added',
			'header' => 'New Supplier',
			'target_url' => base_url('SupplierController/supplier')
		);
		if ($response) {
			$this->Notification_model->add_notification($notification_data);
			$result = array('status' => 'success', 'message' => 'Data saved successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to add data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function edit_supplier()
	{
		$sup_id = $this->input->post('sup_id');
		$update_data = array(
		'CODE' => $this->input->post('update_supcode'),
		'NAME' => $this->input->post('update_supname'),
		'ADDRESS' => $this->input->post('update_supaddress'),
		'CONTACT_PERSON' => $this->input->post('update_supcontact'),
		'PHONE_NO' => $this->input->post('update_supphoneno'),
		'TEL_NO' => $this->input->post('update_suptelno')
		);

		$response = $this->Supplier_model->edit_supplier($sup_id, $update_data);

		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data updated successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to update data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function del_supplier($sup_id) 
	{
		$del_supplier = $this->Supplier_model->del_supplier($sup_id); 
		if($del_supplier['deleted']=='done'){
			$result = array('status' => 'success', 'message' => 'Data deleted successfully!');
		}  else {
			$result = array('status' => 'error', 'message' => 'Failed to delete data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function get_supplier($supplier_id) 
	{
		$supplier_data = $this->db->get_where('sup_tbl', array('ID' => $supplier_id))->row_array();
		header('Content-Type: application/json');
		echo json_encode($supplier_data);
    }
}