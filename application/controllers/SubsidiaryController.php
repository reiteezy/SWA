<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubsidiaryController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
        $this->load->model('Subsidiary_model');
		$this->load->model('Notification_model');
		if (!$this->session->userdata('login_id')) {
            redirect(base_url(), 'refresh');
        }
    }

    public function subsidiary()
{
	if ($this->session->userdata('priv_sub') == 1)
		{
    $view_sub = $this->Subsidiary_model->get_subsidiaries();
    $data['menu'] = 'Subsidiary';
    $data['subsidiaries'] = $view_sub;
    // print_r($view_sub);
    $this->load->view('admin/require/header');
    $this->load->view('admin/require/navbar');
    $this->load->view('admin/require/sidebar', $data);
    $this->load->view('admin/view/subsidiary_list', $data);
	$this->load->view('admin/view/js/subsidiary_js');
	$this->load->view('admin/view/modals/subsidiary_modal');
    $this->load->view('admin/require/footer');
}
else {
	redirect(base_url() . 'AdminController/error_page');
}
}

 
function get_subsidiary_list(){
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$memory_limit = ini_get('memory_limit');
	ini_set('memory_limit',-1);
	ini_set('max_execution_time', 0);

	$tab           = $this->input->post('tab');
	$start         = $this->input->post('start'); 
	$length        = $this->input->post('length'); 
	$searchValue   = $this->input->post('search')['value'];


	$subs = $this->Subsidiary_model->get_subsidiaries();

	$result = array();
	 // var_dump($po_headers);
	 // exit();
	foreach($subs as $sub){
	   $sub_id = $sub["ID"];
	 //   $log_details = $this->Po_model->getPoLog($hd_id);

	   
	   if($searchValue=='')
		  $result[] = $sub;
	   else{
		  if((strpos(strtolower($sub["CODE"]), strtolower($searchValue)) !== false || 
			 strpos(strtolower($sub["DESCRIPTION"]), strtolower($searchValue)) !== false )){
				
			 $result[] = $sub;
		  }
	   }
	   
	}


	$totalRecords = count($result);
	$slice = array_slice($result, $start, $length);
	
	$data = array(
				   'draw'            => $this->input->post('draw'), 
				   'recordsTotal'    => $totalRecords,
				   'recordsFiltered' => $totalRecords,
				   'data'            => $slice
				);

	echo json_encode($data);  
	ini_set('memory_limit',$memory_limit);  

 }


    public function subsidiary_ajax()
	{
		$data = $this->Subsidiary_model->view_subsidiary();
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


public function new_subsidiary()
	{
		$response = $this->Subsidiary_model->add_subsidiary();
		$notification_data = array(
			'message' => 'A new Subsidiary has been added',
			'header' => 'New Subsidiary',
			'target_url' => base_url('SubsidiaryController/subsidiary')
		);
		if ($response) {
			$this->Notification_model->add_notification($notification_data);
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

		$this->Subsidiary_model->update_subsidiary($sub_id, $update_data);
		$response = array('status' => 'success', 'message' => 'User updated successfully!');
	
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
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
	



}