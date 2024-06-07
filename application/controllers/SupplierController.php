<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
		$this->load->model('Supplier_model');
		
        // $this->load->library('form_validation');
        // $this->load->library('upload');
		// $this->load->model('Supplier_model', 'SPM');
		// $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		// $this->output->set_header('Pragma: no-cache');
		// if (!$this->session->userdata('login_id')) {
        //     redirect(base_url(), 'refresh');
        // }
    }
    
    public function supplier() 
	{
		$view_sup = $this->Supplier_model->view_supplier();
		$data['menu'] = 'Supplier';
		$data['suppliers'] = $view_sup;

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/supplier_list', $data);
        $this->load->view('admin/require/footer');
	}

	public function add_supplier()
	{
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/add_supplier');
        $this->load->view('admin/require/footer');
	}

public function new_supplier() 
	{
		$response = $this->SPM->add_supplier();
		if ($response) {
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
		'CODE' => $this->input->post('sup_code'),
		'NAME' => $this->input->post('sup_name'),
		'ADDRESS' => $this->input->post('sup_add'),
		'CONTACT_PERSON' => $this->input->post('sup_contact'),
		'PHONE_NO' => $this->input->post('sup_phoneno'),
		'TEL_NO' => $this->input->post('sup_telno')
		);

		$response = $this->SPM->edit_supplier($sup_id, $update_data);

		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data updated successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to update data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function del_supplier($sup_id) 
	{
		$del_supplier = $this->SPM->del_supplier($sup_id); 
		if($del_supplier['deleted']=='done'){
			$result = array('status' => 'success', 'message' => 'Data deleted successfully!');
		}  else {
			$result = array('status' => 'error', 'message' => 'Failed to delete data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function view_edit_supplier($sup_id)
	{
		if ($this->session->userdata('priv_sup') == 1)
		{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Supplier', base_url('supplier'));
		$this->breadcrumb->add('Edit', base_url('supplier/edit'), true);
		$data['menu'] = 'Supplier';
		$data['sup_id'] = $sup_id;
		$data['sup_data'] = $this->SPM->get_supplier($sup_id);
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		$this->load->view('admin/edit_supplier', $data);
		} else {
			redirect(base_url() . 'admin/error404');
		}
	}

	public function view_supplier() 
	{
		if ($this->session->userdata('priv_sup') == 1)
		{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Supplier', base_url('supplier'));
		$view_sup = $this->SPM->view_supplier();
		$data['menu'] = 'Supplier';
		$data['suppliers'] = $view_sup;
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		$this->load->view('admin/supplier', $data);
		} else {
			redirect(base_url() . 'admin/error404');
		}
	}

	public function get_supplier($supplier_id) 
	{
		$supplier_data = $this->db->get_where('sup_tbl', array('ID' => $supplier_id))->row_array();
		header('Content-Type: application/json');
		echo json_encode($supplier_data);
    }
}