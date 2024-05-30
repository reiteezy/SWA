<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubsidiaryController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
        $this->load->model('Subsidiary_model');
    }

    public function subsidiary()
	{
		$view_sub = $this->Subsidiary_model->view_subsidiary();
		$data['menu'] = 'Subsidiary';
		$data['subsidiaries'] = $view_sub;
		
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/subsidiary_list', $data);
        $this->load->view('admin/require/footer');
	}

    public function subsidiary_ajax()
	{
		$data = $this->Subsidiary_model->view_subsidiary();
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

    public function add_subsidiary()
	{
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/add_subsidiary');
        $this->load->view('admin/require/footer');
	}
	
public function new_subsidiary()
	{
		$response = $this->SBM->add_subsidiary();
		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data saved successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to add data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function edit_subsidiary()
	{
		$sub_id = $this->input->post('sub_id');
		$update_data = array(
		'CODE' => $this->input->post('sub_code'),
		'DESCRIPTION' => $this->input->post('sub_descript')
		);

		$response = $this->SBM->edit_subsidiary($sub_id, $update_data);

		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data updated successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to update data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
		
	public function del_subsidiary($sub_id) 
	{
		$del_subsidiary = $this->SBM->del_subsidiary($sub_id); 
		if($del_subsidiary['deleted']=='done'){
			$result = array('status' => 'success', 'message' => 'Data deleted successfully!');
		}  else {
			$result = array('status' => 'error', 'message' => 'Failed to delete data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function get_subsidiary_view($subsidiary_id) 
	{
		$this->db->select('sub_tbl.*');
		$this->db->from('sub_tbl');
		$this->db->where('sub_tbl.ID', $subsidiary_id);

		$query = $this->db->get();
		$subsidiary_data = $query->row_array();

		$this->output->set_content_type('application/json');
		echo json_encode($subsidiary_data);
    }

	public function get_subsidiary() {
        $sub_id = $this->input->post('sub_id');
  
        $description = $this->SBM->get_subsidiary($sub_id);
		$code = $this->SBM->get_subsidiary($sub_id);
  
        $data = array(
			'description' => $result['DESCRIPTION'],
			'code' => $result['CODE']
		);
		
		echo json_encode($data);
    }
	
	public function view_edit_subsidiary($sub_id) 
	{
		if ($this->session->userdata('priv_sub') == 1)
		{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Subsidiary', base_url('subsidiary'));
		$this->breadcrumb->add('Edit', base_url('subsidiary/edit'), true); 
		$data['menu'] = 'Subsidiary';
		$data['sub_id'] = $sub_id;
		$data['sub_data'] = $this->SBM->get_subsidiary($sub_id);
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		// var_dump($data);
		$this->load->view('admin/edit_subsidiary', $data);
		} else {
			redirect(base_url() . 'admin/error404');
		}
	}

	public function view_subsidiary() 
	{
		if ($this->session->userdata('priv_sub') == 1)
		{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Subsidiary', base_url('subsidiary'));
		$view_sub = $this->SBM->view_subsidiary();
		$data['menu'] = 'Subsidiary';
		$data['subsidiaries'] = $view_sub;
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		
		$this->load->view('admin/subsidiary', $data);
		}
		else {
			redirect(base_url() . 'admin/error404');
		}
	}

}