<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubsidiaryController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
        $this->load->model('Subsidiary_model');
		if (!$this->session->userdata('login_id')) {
            redirect(base_url(), 'refresh');
        }
    }

    public function subsidiary()
{
    $view_sub = $this->Subsidiary_model->view_subsidiary();
    $data['menu'] = 'Subsidiary';
    $data['subsidiaries'] = $view_sub;
    // print_r($view_sub);
    $this->load->view('admin/require/header');
    $this->load->view('admin/require/navbar');
    $this->load->view('admin/require/sidebar', $data);
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
		$response = $this->Subsidiary_model->add_subsidiary();
		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data saved successfully!', 'data' => $response);
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to add data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function edit_subsidiary()
	{
		$sub_id = $this->input->post('sub_id');
		$update_data = array(
		'CODE' => $this->input->post('update_subcode'),
		'DESCRIPTION' => $this->input->post('update_subdescript')
		);

		$response = $this->Subsidiary_model->update_subsidiary($sub_id, $update_data);

		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data updated successfully!', 'data' => $response);
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to update data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
		
	public function del_subsidiary($sub_id) 
	{
		$del_subsidiary = $this->Subsidiary_model->del_subsidiary($sub_id); 
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
  
        $description = $this->Subsidiary_model->get_subsidiary($sub_id);
		$code = $this->Subsidiary_model->get_subsidiary($sub_id);
  
        $data = array(
			'description' => $result['DESCRIPTION'],
			'code' => $result['CODE']
		);
		
		echo json_encode($data);
    }
	
	public function view_edit_subsidiary($sub_id) 
	{
		// if ($this->session->userdata('priv_sub') == 1)
		// {
		$data['menu'] = 'Subsidiary';
		$data['sub_id'] = $sub_id;
		$data['sub_data'] = $this->Subsidiary_model->get_subsidiary($sub_id);
		// var_dump($data);
		$this->load->view('admin/require/header');
		$this->load->view('admin/require/navbar');
		$this->load->view('admin/require/sidebar', $data);
		$this->load->view('admin/view/edit_subsidiary', $data);
        $this->load->view('admin/require/footer');
		// } else {
		// 	redirect(base_url() . 'admin/error404');
		// }
	}


}