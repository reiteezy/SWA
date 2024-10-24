<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require FCPATH. 'vendor/autoload.php';
class SwaController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
		//  $this->load->database('odbc');
		$this->load->model('Swa_model');
		$this->load->model('User_model');
		$this->load->model('Admin_model');
		$this->load->model('Subsidiary_model');
		$this->load->model('Notification_model');
		if (!$this->session->userdata('login_id')) {
            redirect(base_url(), 'refresh');
        }
    }

	
	public function nesa_list()
	{
		if ($this->session->userdata('priv_um') == 1){
		$data['menu'] = 'nesa';			
		$this->load->view('admin/require/header');
		$this->load->view('admin/require/navbar');
		$this->load->view('admin/require/sidebar', $data);
		$this->load->view('admin/view/nesa_view');
		$this->load->view('admin/view/js/nesa_js');
        $this->load->view('admin/view/modals/nesa_modal');
		$this->load->view('admin/require/footer');
		} else {
		$this->load->view('admin/error');
		}
	}

	public function compose_email()
	{
		// if ($this->session->userdata('priv_um') == 1){
		$data['menu'] = 'email';			
		$this->load->view('admin/require/header');
		$this->load->view('admin/require/navbar');
		$this->load->view('admin/require/sidebar', $data);
		$this->load->view('admin/view/email_page');
		$this->load->view('admin/view/js/email_js');
        $this->load->view('admin/view/modals/email_modal');
		$this->load->view('admin/require/footer');
		// } else {
		// $this->load->view('admin/error');
		// }
	}


    public function swa_list() 
	{
		if ($this->session->userdata('priv_swa') == 1)
		{
		$data['menu'] = 'Swa';
		// $data['swa_datas'] = $this->Swa_model->view_swa_data();

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/swa_list');
        $this->load->view('admin/view/js/swa_js');
        $this->load->view('admin/view/modals/swa_modal');
        $this->load->view('admin/require/footer');
	} else {
		redirect(base_url() . 'AdminController/error_page');
	}
	}

    public function per_list() 
	{
		if ($this->session->userdata('priv_per') == 1)
		{
		$data['menu'] = 'per';
		// $data['per_datas'] = $this->Swa_model->view_per_data();

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/per_list', $data);
        $this->load->view('admin/view/js/per_js');
        $this->load->view('admin/view/modals/per_modal');
        $this->load->view('admin/require/footer');
	} else {
		redirect(base_url() . 'AdminController/error_page');
	}
	}

function get_nesa_list(){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		$memory_limit = ini_get('memory_limit');
		ini_set('memory_limit',-1);
		ini_set('max_execution_time', 0);
	
		$vendor_filter         = $this->input->post('vendor_filter'); 
		$start_date         = $this->input->post('start_date'); 
		$end_date         = $this->input->post('end_date'); 
		$start         = $this->input->post('start'); 
		$length        = $this->input->post('length'); 
		$searchValue   = $this->input->post('search')['value'];
	
	
		$nesas = $this->Swa_model->get_nesa($vendor_filter, $start_date, $end_date);
	
		$result = array();
		foreach($nesas as $nesa){
		   $nesa_id = $nesa['nesa_id'];
	
		   
		   if($searchValue=='')
			  $result[] = $nesa;
		   else{
			  if((strpos(strtolower($nesa["nesa_id"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($nesa["document_date"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($nesa["location"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($nesa["sup_name"]), strtolower($searchValue)) !== false )){
					
				 $result[] = $nesa;
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


	function get_swa_list(){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		$memory_limit = ini_get('memory_limit');
		ini_set('memory_limit',-1);
		ini_set('max_execution_time', 0);
	
		$tab           = $this->input->post('tab');
		$start         = $this->input->post('start'); 
		$length        = $this->input->post('length'); 
		$searchValue   = $this->input->post('search')['value'];
	
	
		$swas = $this->Swa_model->get_swa();
	
		$result = array();
		foreach($swas as $swa){
		   $swa_id = $swa["SWA_ID"];
	
		   
		   if($searchValue=='')
			  $result[] = $swa;
		   else{
			  if((strpos(strtolower($swa["SWA_ID"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($swa["DOCUMENT_DATE"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($swa["LOCATION"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($swa["DESCRIPTION"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($swa["SWA_TRANS_NO1"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($swa["SWA_TRANS_NO2"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($swa["SWA_TRANS_NO3"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($swa["SWA_CRFCV_NO"]), strtolower($searchValue)) !== false || 
				 strpos(strtolower($swa["SUP_NAME"]), strtolower($searchValue)) !== false )){
					
				 $result[] = $swa;
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
	

	 function get_per_list(){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		$memory_limit = ini_get('memory_limit');
		ini_set('memory_limit',-1);
		ini_set('max_execution_time', 0);
	
		$tab           = $this->input->post('tab');
		$start         = $this->input->post('start'); 
		$length        = $this->input->post('length'); 
		$searchValue   = $this->input->post('search')['value'];
	
	
		$pers = $this->Swa_model->get_per();
	
		$result = array();
		 // var_dump($po_headers);
		 // exit();
		foreach($pers as $per){
		   $per_id = $per["PER_ID"];
		 //   $log_details = $this->Po_model->getPoLog($hd_id);
	
		   
		   if($searchValue=='')
			  $result[] = $per;
		   else{
			  if((strpos(strtolower($per["PER_ID"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($per["DOCUMENT_DATE"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($per["SUB_CODE"]), strtolower($searchValue)) !== false || 
			  	strpos(strtolower($per["PER_PROMO_TITLE"]), strtolower($searchValue)) !== false || 
				 strpos(strtolower($per["PER_PROMO_TITLE"]), strtolower($searchValue)) !== false )){
					
				 $result[] = $per;
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
	



	// public function get_daterange_data() {
    //     $start_date = $this->input->post('start_date');
    //     $end_date = $this->input->post('end_date');

    //     $data = $this->Swa_model->get_swa_daterange($start_date, $end_date);

    //     echo json_encode(['data' => $data]);
    // }

	function get_daterange_data(){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		$memory_limit = ini_get('memory_limit');
		ini_set('memory_limit',-1);
		ini_set('max_execution_time', 0);
	
		$tab           = $this->input->post('tab');
		$start         = $this->input->post('start'); 
		$length        = $this->input->post('length'); 
		$searchValue   = $this->input->post('search')['value'];
		$start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
	
		$swa_datas = $this->Swa_model->get_swa_daterange($start_date, $end_date);
	
		$result = array();
		foreach($swa_datas as $swa_data){
		   $swa_id = $swa_data["SWA_ID"];
	
		   
		   if($searchValue=='')
			  $result[] = $swa_data;
		   else{
			  if((strpos(strtolower($swa_data["SWA_ID"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["DOCUMENT_DATE"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SUP_NAME"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SWA_ACCOUNTING_INSTRUCT"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["LOCATION"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SUB_CODE"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SWA_REMARK"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SWA_TOTAL"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SWA_TRANS_NO1"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SWA_TRANS_NO1_DATE"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SWA_TRANS_NO1_AMOUNT"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SWA_CRFCV_NO"]), strtolower($searchValue)) !== false || 
			  strpos(strtolower($swa_data["SWA_CRFCV_DATE"]), strtolower($searchValue)) !== false || 
				 strpos(strtolower($swa_data["SWA_CRFCV_AMOUNT"]), strtolower($searchValue)) !== false )){
					
				 $result[] = $swa_data;
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
	

	public function swa_mis() 
	{
		if ($this->session->userdata('priv_swamis') == 1)
		{
		$data['menu'] = 'swa_mis';
		// $swa_data = $this->Swa_model->view_swa_data();
		// $data['swa_datas'] = $swa_data;
		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/swa_mis', $data);
        $this->load->view('admin/view/js/mis_js');
        $this->load->view('admin/view/modals/mis_modal');
        $this->load->view('admin/require/footer');
	} else {
		redirect(base_url() . 'AdminController/error_page');
	}
	}

	public function swa_accounting() 
	{
		if ($this->session->userdata('priv_swaacctg') == 1)
		{
		$data['menu'] = 'swa_accounting';
		// $swa_data = $this->Swa_model->view_swa_data();
		// $data['swa_datas'] = $swa_data;
		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/swa_accounting', $data);
        $this->load->view('admin/view/js/accounting_js');
        $this->load->view('admin/view/modals/accounting_modal');
        $this->load->view('admin/require/footer');
	} else {
		redirect(base_url() . 'AdminController/error_page');
	}
	}


	public function new_nesa()
	{
		$nesa_id = $this->Swa_model->add_nesa();
		$notification_data = array(
			'message' => 'A new NESA has been added',
			'header' => 'New NESA',
			'target_url' => base_url('SwaController/nesa_list')
		);
		if ($nesa_id) {
			$this->Notification_model->add_notification($notification_data);
			$response = array('status' => 'success', 'message' => 'Data saved successfully!', 'nesaId' => $nesa_id);
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data.');
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}


	public function new_swa()
	{
		$swa_id = $this->Swa_model->add_swa();
		$notification_data = array(
			'message' => 'A new SWA has been added',
			'header' => 'New SWA',
			'target_url' => base_url('SwaController/swa_list')
		);
		if ($swa_id) {
			$this->Notification_model->add_notification($notification_data);
			$response = array('status' => 'success', 'message' => 'Data saved successfully!', 'swaId' => $swa_id);
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data.');
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}


	public function new_per()
	{
		$per_id = $this->Swa_model->add_per();
		$notification_data = array(
			'message' => 'A new PER has been added',
			'header' => 'New PER',
			'target_url' => base_url('SwaController/per_list')
		);
		if ($per_id) {
			$this->Notification_model->add_notification($notification_data);
			$response = array('status' => 'success', 'message' => 'Data saved successfully!', 'perId' => $per_id);
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data.');
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}


	public function view_swa_reports()
	{
		if ($this->session->userdata('priv_reports') == 1)
		{
		$data['menu'] = 'swa_reports';
		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/swa_report', $data);
        $this->load->view('admin/view/js/reports_js');
        $this->load->view('admin/require/footer');
	} else {
		redirect(base_url() . 'AdminController/error_page');
	}
	}

	public function view_nesa_form($nesa_id)
	{
		$response['data'] = $this->Swa_model->get_nesa_data($nesa_id);
		echo json_encode($response);
	}


	public function view_swa_form($swa_id)
	{
		$response['data'] = $this->Swa_model->get_swa_data($swa_id);
		echo json_encode($response);
	}


	public function get_nesa_signatories($nesa_id)
	{
		$response['data'] = $this->Swa_model->get_nesa_signatories_data($nesa_id);
		echo json_encode($response);
	}

	public function get_swa_signatories($swa_id)
	{
		$response['data'] = $this->Swa_model->get_swa_signatories_data($swa_id);
		echo json_encode($response);
	}

	public function get_per_signatories($per_id)
	{
		$response['data'] = $this->Swa_model->get_per_signatories_data($per_id);
		echo json_encode($response);
	}


	public function get_promo($swa_id)
	{
		$response['data'] = $this->Swa_model->get_promo_data($swa_id);
		echo json_encode($response);
			
	}

	public function view_reports_data(){
		$this->db->select('swa_tbl.*, swa_tbl.DOCUMENT_DATE, swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION');
		// $this->db->select('swa_tbl.*, swa_tbl.DOCUMENT_DATE, swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME');
        $this->db->from('swa_tbl');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        // $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
	
		$query = $this->db->get();
		$data = $query->result_array();
	
		$this->output->set_content_type('application/json');
	
		echo json_encode($data);
	}

	public function view_per_form($per_id)
	{
		$response['data'] = $this->Swa_model->get_per_data($per_id);
		echo json_encode($response);
	}

	public function confirm_view($swa_id) 
	{
		$this->db->select('swa_tbl.*');
		$this->db->from('swa_tbl');
		$this->db->where('swa_tbl.SWA_ID', $swa_id);
	
		$query = $this->db->get();
		$swa_data = $query->row_array();
	
		$this->output->set_content_type('application/json');
	
		echo json_encode($swa_data);
	}
	
	public function get_itemfile() 
	{
		$response['data'] = $this->Admin_model->get_itemfile_data();
		echo json_encode($response);
	}
	
	public function get_swa_per() 
	{
		$response['data'] = $this->Admin_model->per_swa_details();
		echo json_encode($response);
	}
	
	public function get_subcode() 
	{
		$response['data'] = $this->Subsidiary_model->get_swa_subsidiary();
		echo json_encode($response);
	}	


	public function get_nesa_details($nesa_id) {
        $response['data'] = $this->Swa_model->get_nesa_details($nesa_id);
        echo json_encode($response);
    }


	public function get_swa_details($swa_id) {
        $response['data'] = $this->Swa_model->get_swa_details($swa_id);
        echo json_encode($response);
    }

	public function get_per_details($per_id) {
        $response['data'] = $this->Swa_model->get_per_details($per_id);
        echo json_encode($response);
    }



//-----------------------------------CHANGE STATUS------------------------------------------------


public function mis_status_changed()
{
    $swa_id = $this->input->post('swa_id');
    $mis_status = $this->input->post('mis_status');
    if ($mis_status == 'cancelled') {
        $mis_status = 'pending';
    } else {
        $mis_status = 'cancelled';
    }
    $swa_data = array('SWA_MIS_STATUS' => $mis_status);
    $this->db->where('SWA_ID', $swa_id);
    $response = $this->db->update('swa_tbl', $swa_data);
    if ($response) {
        $result = array('status' => 'success', 'message' => 'Status changed!', 'res'=> $mis_status );
    } else {
        $result = array('status' => 'error', 'message' => 'Failed to change status.');
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
}

public function acctg_status_changed()
{
    $swa_id = $this->input->post('swa_id');
    $acctg_status = $this->input->post('acctg_status');
    if ($acctg_status == 'confirmed') {
        $acctg_status = 'pending';
    } else {
        $acctg_status = 'confirmed';
    }
    $swa_data = array('SWA_ACCTG_STATUS' => $acctg_status);
    $this->db->where('SWA_ID', $swa_id);
    $response = $this->db->update('swa_tbl', $swa_data);
    if ($response) {
        $result = array('status' => 'success', 'message' => 'Status changed!', 'res'=> $acctg_status );
    } else {
        $result = array('status' => 'error', 'message' => 'Failed to change status.');
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
}

//-----------------------------------update password------------------------------------------------

//-----------------------------------CHECK USERNAME / NAME AVAILABILITY------------------------------------------------

//-----------------------------------ASSIGN PRIVILEGE----------------------------------------------------


	public function saveTransactNoMis() 
	{
		$swa_id = $this->input->post('swa_id');
		$this->db->select('swa_tbl.SWA_TRANS_NO1, swa_tbl.SWA_TRANS_NO2, swa_tbl.SWA_TRANS_NO3');
		$this->db->from('swa_tbl');
		$this->db->where('SWA_ID', $swa_id);
		$query = $this->db->get();
		$data = $query->row();
		if (empty($data->SWA_TRANS_NO1) && empty($data->SWA_TRANS_NO2) && empty($data->SWA_TRANS_NO3)) {
			$update_data = array(
				'SWA_TRANS_NO1' => $this->input->post('transactNo'),
				'SWA_TRANS_NO1_DATE' => $this->input->post('transactDate'),
				'SWA_TRANS_NO1_AMOUNT' => $this->input->post('transactAmount')
			);
		} elseif (!empty($data->SWA_TRANS_NO1) && empty($data->SWA_TRANS_NO2) && empty($data->SWA_TRANS_NO3)){
			$update_data = array(
				'SWA_TRANS_NO2' => $this->input->post('transactNo'),
				'SWA_TRANS_NO2_DATE' => $this->input->post('transactDate'),
				'SWA_TRANS_NO2_AMOUNT' => $this->input->post('transactAmount')
			);
		} elseif (!empty($data->SWA_TRANS_NO1) && !empty($data->SWA_TRANS_NO2) && empty($data->SWA_TRANS_NO3)){
			$update_data = array(
				'SWA_TRANS_NO3' => $this->input->post('transactNo'),
				'SWA_TRANS_NO3_DATE' => $this->input->post('transactDate'),
				'SWA_TRANS_NO3_AMOUNT' => $this->input->post('transactAmount')
			);
		} else {
			return false;
		}
		
		$result = $this->Admin_model->updateTN($swa_id, $update_data);
	
		if ($result !== false && $this->db->affected_rows() > 0) {
			$response = array('status' => 'success', 'message' => 'Changes saved!');
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data!');
		}
	
		echo json_encode($response);
	}
	

	public function saveTransactNoAcctg() 
	{
		$swa_id = $this->input->post('swa_id');
		$update_data = array(
		'SWA_CRFCV_NO' => $this->input->post('crfcv_no'),
		'SWA_CRFCV_DATE' => $this->input->post('crfcv_date'),
		'SWA_CRFCV_AMOUNT' => $this->input->post('crfcv_amount')
		);
		$result = $this->Admin_model->updateTN($swa_id, $update_data);
		if ($result){
			$response = array('status' => 'success', 'message' => 'Changes saved!');
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data!');
		}
		echo json_encode($response);
	}
	
	public function printSwa($swa_id)
	{
		$copies = $this->input->get('copies');
	
		if (!is_numeric($copies) || (int)$copies <= 0) {
			$copies = 1;
		} else {
			$copies = (int)$copies;
		}
	
		$swaData['data'] = $this->Admin_model->get_swa_data($swa_id);
		if (!$swaData['data']) {
			show_error('Data not found for the provided swa_id.');
		}
	
		$this->Swa_model->increment_print_count($swa_id);
	
		$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
		$mpdf->autoLangToFont = true;
		$mpdf->autoScriptToLang = true;
	
		$html = $this->load->view('admin/view/print_swa', $swaData, true);
	
		$mpdf->SetMargins(5, 5, 10, 1);
	
		for ($i = 0; $i < $copies; $i++) {
			$mpdf->WriteHTML($html);
			if ($i < $copies - 1) {
				$mpdf->AddPage(); 
			}
		}
	
		$mpdf->Output();
	}
	
	public function printPer($per_id)
	{
		$copies = $this->input->get('copies');
	
		if (!is_numeric($copies) || (int)$copies <= 0) {
			$copies = 1;
		} else {
			$copies = (int)$copies;
		}
		
		$perData['data'] = $this->Admin_model->get_per_data($per_id);
		if (!$perData) {
		show_error('Data not found for the provided swa_id.'); 
		}
		$this->Swa_model->increment_print_countper($per_id);

		$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
		$mpdf->autoLangToFont = true;
		$mpdf->autoScriptToLang = true;
		$html = $this->load->view('admin/view/print_per', $perData, true);
		
		$mpdf->SetMargins(5, 5, 10, 1);
		for ($i = 0; $i < $copies; $i++) {
			$mpdf->WriteHTML($html);
			if ($i < $copies - 1) {
				$mpdf->AddPage(); // Add a new page for each copy
			}
		}

		$mpdf->Output();
	}

public function get_nesa_vendor(){
	$vendor_code = $this->input->post('vendor_code');	
	$vendor_list = $this->Swa_model->get_nesa_vendor($vendor_code);
	echo json_encode($vendor_list);
}

	public function get_item_code() 
{
    $connectdns = "test_file";
    $username = "super";
    $password = "fsasya1941";
    $barcodetable = '[ICM_SM_SERVER_POS_02292024].[dbo].[ICM - SM POS SRV 02-29-2024$Barcodes]';
    $pricetable = '[ICM_SM_SERVER_POS_02292024].[dbo].[ICM - SM POS SRV 02-29-2024$Sales Price]';
    $item_input = $this->input->post('item_input');

    $connection = odbc_connect($connectdns, $username, $password);
    if (!$connection) {	
        die('Not connected: ' . odbc_errormsg());
    }

    $barcode_check_query = "
        SELECT [Item No_]
        FROM $barcodetable
        WHERE [Barcode No_] = '$item_input'
    ";
    $barcode_check_result = odbc_exec($connection, $barcode_check_query);
    if (!$barcode_check_result) {
        die('Error in SQL query: ' . odbc_errormsg());
    }

    $item_no = $item_input;
    if ($row = odbc_fetch_array($barcode_check_result)) {
        $item_no = $row['Item No_'];
    }

    $barcode_query = "
        WITH MaxDateCTE AS (
            SELECT 
                [Unit of Measure Code],
                MAX([Starting Date]) AS LatestDate
            FROM $pricetable
            WHERE [Item No_] = '$item_no'
            AND [Sales Code] = 'ALL'
            GROUP BY [Unit of Measure Code]
        ),
        MaxUnitPriceCTE AS (
            SELECT 
                sp.[Item No_],
                sp.[Unit of Measure Code],
                sp.[Unit Price] AS MaxUnitPrice,
                sp.[Starting Date] AS LatestDate
            FROM $pricetable sp
            JOIN MaxDateCTE md
                ON sp.[Unit of Measure Code] = md.[Unit of Measure Code]
                AND sp.[Starting Date] = md.LatestDate
            WHERE sp.[Item No_] = '$item_no'
            AND sp.[Sales Code] = 'ALL'
        )
        SELECT 
            b.[Barcode No_],
            b.[Item No_],
            b.[Description],
            mup.[Unit of Measure Code],
            mup.[MaxUnitPrice],
            mup.[LatestDate]
        FROM 
        $barcodetable b
        LEFT JOIN 
            MaxUnitPriceCTE mup
            ON b.[Item No_] = mup.[Item No_]
        WHERE 
            b.[Item No_] = '$item_no'
        OR b.[Barcode No_] = '$item_input'";

    $barcode_row = odbc_exec($connection, $barcode_query);
    if (!$barcode_row) {
        die('Error in SQL query: ' . odbc_errormsg());
    }

    $data['barcodes'] = array();
    $seen_uoms = array();

    while ($row = odbc_fetch_array($barcode_row)) {
        $uom = $row['Unit of Measure Code'];
        if (!isset($seen_uoms[$uom])) {
            $seen_uoms[$uom] = true;
            $barcode = array(
                "Description" => $row['Description'],
                "Unit of Measure Code" => $row['Unit of Measure Code'],
                "Item No_" => $row['Item No_'],
                "Barcode No_" => $row['Barcode No_'],
                "MaxUnitPrice" => $row['MaxUnitPrice'],
                "LatestDate" => $row['LatestDate']
            );
            $data['barcodes'][] = $barcode;
        }
    }

    error_log(print_r($data, true));

    odbc_free_result($barcode_row);
    odbc_close($connection);

    header('Content-Type: application/json');
    echo json_encode($data);
}


public function get_vendor()
{
    $connectdns = "test_file";
    $username = "super";
    $password = "fsasya1941";
    $vendortable = '[ICM_SM_SERVER_POS_02292024].[dbo].[ICM - SM POS SRV 02-29-2024$Vendor]';
    $vendor_input = $this->input->post('vendor_input');

	$vendor_input = strtolower($vendor_input);
    $connection = odbc_connect($connectdns, $username, $password);
    if (!$connection) {
        die('Not connected: ' . odbc_errormsg());
    }

    $vendor_check_query = "
        SELECT [No_], [Name]
        FROM $vendortable
        WHERE LOWER([No_]) = LOWER('$vendor_input')";

    $vendor_check_result = odbc_exec($connection, $vendor_check_query);
    if (!$vendor_check_result) {
        die('Error in SQL query: ' . odbc_errormsg());
    }

    $data['vendors'] = array();

    while ($row = odbc_fetch_array($vendor_check_result)) {
        $data['vendors'][] = $row;
    }

    odbc_free_result($vendor_check_result);
    odbc_close($connection);

    header('Content-Type: application/json');
    echo json_encode($data);
}

// public function get_nesa_vendor()
// {
//     $connectdns = "test_file";
//     $username = "super";
//     $password = "fsasya1941";
//     $vendortable = '[ICM_SM_SERVER_POS_02292024].[dbo].[ICM - SM POS SRV 02-29-2024$Vendor]';
// 	$vendor_code = $this->input->post('vendor_code');	

// 	$vendor_code = strtolower($vendor_code);
//     $connection = odbc_connect($connectdns, $username, $password);
//     if (!$connection) {
//         die('Not connected: ' . odbc_errormsg());
//     }

//     $vendor_check_query = "
//         SELECT [No_], [Name]
//         FROM $vendortable
//         WHERE [No_] LIKE '$vendor_code'";

//     $vendor_check_result = odbc_exec($connection, $vendor_check_query);
//     if (!$vendor_check_result) {
//         die('Error in SQL query: ' . odbc_errormsg());
//     }

//     $data['vendors'] = array();

//     while ($row = odbc_fetch_array($vendor_check_result)) {
//         $data['vendors'][] = $row;
		
//     }
//     odbc_free_result($vendor_check_result);
//     odbc_close($connection);

//     header('Content-Type: application/json');
// 	echo json_encode($data);
// }


    public function get_swa_mis_count() {
        $this->db->where('SWA_MIS_STATUS', 'pending');
        $swaCount = $this->db->count_all_results('swa_tbl'); 
        echo json_encode(['count' => $swaCount]);
    }


	public function generate_nesa_pdf() {
		$rows = json_decode($this->input->post('rows'), true); 

		$row = $rows[0];
		var_dump($row['nesa_id']);
		$row_details = $this->Swa_model->get_nesa_details($row['nesa_id']);
		if (empty($rows)) {
			echo "No data available";
			return;
		}
		var_dump($row_details);
		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8', 
			'format' => 'Letter', 
			'orientation' => 'L',
			'default_font_size' => 12,
			'default_font' => 'Arial' 
		]);
		$mpdf->SetTitle($row['sup_name'] . ' ' . $row['nesa_id']);
		$html = '<div style="text-align: center; border-bottom: 20px;"><h4>Near Expiry Stock Advise (Nesa)</h4></div>';
		// Start the table
		$html .= '<table border="0" cellspacing="0" cellpadding="4" style="width: 100%; margin-bottom: 20px;">';
		$html .= '<tr>';
		$html .= '<td style="width: 50%;"></td>'; 
		$html .= '<td style="width: 50%; text-align: right;"><h5>Nesa No.: ' . htmlspecialchars($row['nesa_id']) . '</h5></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width: 50%;"><h5>Supplier Code: ' . htmlspecialchars($row['sup_code']) . '</h5></td>';
		$html .= '<td style="width: 50%; text-align: right;"><h5>Date: ' . htmlspecialchars($row['document_date']) . '</h5></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width: 50%;"><h5>Supplier Name: ' . htmlspecialchars($row['sup_name']) . '</h5></td>';
		$html .= '<td style="width: 50%; text-align: right;"><h5>Location: ' . htmlspecialchars($row['location']) . '</h5></td>';
		$html .= '</tr>';
		$html .= '</table>';
		$html .= '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%;">';
		$html .= '<tr><th style="font-size: 12px;">Item Code</th><th style="font-size: 12px;">Item Description</th><th style="font-size: 12px;">Unit</th><th style="font-size: 12px;">Quantity</th><th style="font-size: 12px;">Expiry</th></tr>'; 

			foreach ($row_details as $detail) {
			$html .= '<tr>';
			$html .= '<td style="font-size: 12px;">' . htmlspecialchars($detail->item_code) . '</td>';
			$html .= '<td style="font-size: 12px;">' . htmlspecialchars($detail->item_descript) . '</td>';
			$html .= '<td style="font-size: 12px;">' . htmlspecialchars($detail->uom) . '</td>';
			$html .= '<td style="font-size: 12px;">' . htmlspecialchars($detail->qty) . '</td>';
			$html .= '<td style="font-size: 12px;">' . htmlspecialchars($detail->expiry) . '</td>';
			
		$html .= '</tr>';
		}

		$html .= '</table>';
		$html .= '<table border="0" cellspacing="0" cellpadding="4" style="width: 100%; margin-top: 20px;">';
		$html .= '<tr>';
		$html .= '<td style="width: 50%;"><h5>Submitted by: ' . htmlspecialchars($row['sub_by']) . '</h5></td>';
		$html .= '<td style="width: 50%;"><h5>Checked by: ' . htmlspecialchars($row['check_by']) . '</h5></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width: 50%;"><h5>Date: ' . htmlspecialchars($row['sub_date']) . '</h5></td>';
		$html .= '<td style="width: 50%;"><h5>Date: ' . htmlspecialchars($row['check_date']) . '</h5></td>';
		$html .= '</tr>';
		$html .= '</table>';
	
		$mpdf->WriteHTML($html);
	
		$pdfOutput = $mpdf->Output('selected_data.pdf', 'S'); 
		$this->output
			->set_content_type('application/pdf')
			->set_output($pdfOutput);
	}
	

	
}