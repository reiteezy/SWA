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
        // $this->load->library('form_validation');
        // $this->load->library('upload');
		$this->load->model('Swa_model');
		// $this->load->model('User_model');
		// $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		// $this->output->set_header('Pragma: no-cache');
		// if (!$this->session->userdata('login_id')) {
        //     redirect(base_url(), 'refresh');
        // }
    }

    public function swa_list() 
	{
		$data['menu'] = 'swa';
		$data['swa_datas'] = $this->Swa_model->view_swa_data();

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/swa_list', $data);
        $this->load->view('admin/require/footer');
	}

    public function swa_form() 
	{
		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/swa_form');
        $this->load->view('admin/require/footer');
	}

    public function per_list() 
	{
		$data['menu'] = 'per';
		$data['per_datas'] = $this->Swa_model->view_per_data();

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/per_list', $data);
        $this->load->view('admin/require/footer');
	}

    public function per_form() 
	{
		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/per_form');
        $this->load->view('admin/require/footer');
	}

	public function new_swa()
	{
		$swa_id = $this->AM->add_swa();
		if ($swa_id) {
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
		$per_id = $this->AM->add_per();
		if ($per_id) {
			$response = array('status' => 'success', 'message' => 'Data saved successfully!', 'perId' => $per_id);
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data.');
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
	
	public function view_swa() 
	{
		if ($this->session->userdata('priv_swavo') == 1 ){
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Stock Withdrawal Advice', base_url('swa'));
			$swa_data = $this->AM->view_swa_data();
			$noDataFound = empty($swa_data);
			$data['menu'] = 'swa';
			$data['swa_datas'] = $swa_data;
			$data['noDataFound'] = $noDataFound;
			$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
			$this->load->view('admin/stock_withdrawal', $data);
		} else {
			redirect(base_url() . 'error');
		}
	}
	

	public function view_swa_reports()
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Reports', base_url('reports')); 
		$swa_data = $this->AM->view_swa_data();
		$noDataFound = empty($swa_data);
		$data['menu'] = 'swa_reports';
		$data['swa_datas'] = $swa_data;
		$data['noDataFound'] = $noDataFound;
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
				$this->load->view('admin/swa_report', $data);
		
	}

	public function view_swa_form($swa_id)
	{
		if ($this->session->userdata('priv_swavo') == 1 ){
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Stock Withdrawal Advice', base_url('swa'));
		$this->breadcrumb->add('View', base_url('swa/view'), true); 
		$data['menu'] = 'swa';
		$data['swa_id'] = $swa_id;
		$data['swa_data'] = $this->AM->get_swa_data($swa_id);
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
				$this->load->view('admin/view_swa', $data);
			} else {
				redirect(base_url() . 'error');
			}
	}


	public function view_reports_data(){
		$this->db->select('swa_tbl.*, swa_tbl.DOCUMENT_DATE, swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME');
        $this->db->from('swa_tbl');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
	
		$query = $this->db->get();
		$data = $query->result_array();
	
		$this->output->set_content_type('application/json');
	
		echo json_encode($data);
	}

	public function view_per_form($per_id)
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Promo Execution Peport', base_url('per'));
		$this->breadcrumb->add('View', base_url('per/view'), true); 
		$data['menu'] = 'per';
		$data['per_id'] = $per_id;
		$data['per_data'] = $this->AM->get_per_data($per_id);
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
				$this->load->view('admin/view_per', $data);
	}
	
	public function swa_mis_confirm()
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('MIS', base_url('mis'));
		if ($this->session->userdata('priv_swamis') == 1){
			$swa_data = $this->AM->view_swa_data();
			$noDataFound = empty($swa_data);
			$data['menu'] = 'swa_mis';
			$data['swa_datas'] = $swa_data;
			$data['noDataFound'] = $noDataFound;
			$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
			$this->load->view('admin/mis_confirm', $data);
		} else {
		redirect(base_url() . 'error');
		}
	}

	public function swa_accounting_confirm()
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i>  Home', base_url());
		$this->breadcrumb->add('Accounting', base_url('accounting'));
		if ($this->session->userdata('priv_swaacctg') == 1){
		$swa_data = $this->AM->view_swa_data();
		$noDataFound = empty($swa_data);
		$data['swa_datas'] = $swa_data;
		$data['noDataFound'] = $noDataFound;
		$data['menu'] = 'swa_accounting';
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		$this->load->view('admin/accounting_confirm', $data);
		} else {
		redirect(base_url() . 'error');
		}
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
		$response['data'] = $this->AM->get_itemfile_data();
		echo json_encode($response);
	}
	
	public function get_swa_per() 
	{
		$response['data'] = $this->AM->per_swa_details();
		echo json_encode($response);
	}
	
		
	public function get_swa_per_details() {
        $swa_id = $this->input->get('swa_id');
        $response['data'] = $this->AM->get_swa_details($swa_id);
        echo json_encode($response);
    }

	public function view_per() 
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i>  Home', base_url());
		$this->breadcrumb->add('Promo Execution Report', base_url('per'));
		if ($this->session->userdata('priv_per') == 1 || $this->session->userdata('priv_pervo') == 1 ){
		$per_data = $this->AM->view_per_data();
		$noDataFound = empty($per_data);
		$data['menu'] = 'per';
		$data['per_datas'] = $per_data;
		$data['noDataFound'] = $noDataFound;
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
	
    	$this->load->view('admin/promo_execution', $data);
		} else {
			redirect(base_url() . 'error');
		}
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


	public function saveTransactNoMis() {
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
				'SWA_TRANS_NO4_AMOUNT' => $this->input->post('transactAmount')
			);
		} else {
			return false;
		}
		
		$result = $this->AM->updateTN($swa_id, $update_data);
	
		if ($result !== false && $this->db->affected_rows() > 0) {
			$response = array('status' => 'success', 'message' => 'Changes saved!');
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data!');
		}
	
		echo json_encode($response);
	}
	

	public function saveTransactNoAcctg() {
		$swa_id = $this->input->post('swa_id');
		$update_data = array(
		'SWA_CRFCV_NO' => $this->input->post('crfcv_no'),
		'SWA_CRFCV_DATE' => $this->input->post('crfcv_date'),
		'SWA_CRFCV_AMOUNT' => $this->input->post('crfcv_amount')
		);
		$result = $this->AM->updateTN($swa_id, $update_data);
		if ($result){
			$response = array('status' => 'success', 'message' => 'Changes saved!');
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data!');
		}
		echo json_encode($response);
	}
	
	public function printSwa($swa_id){
		$swaData['data'] = $this->AM->get_swa_data($swa_id);
		if (!$swaData) {
		show_error('Data not found for the provided swa_id.');
		}
		$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
		$mpdf->autoLangToFont = true;
		$mpdf->autoScriptToLang = true;
		$html = $this->load->view('admin/print_swa', $swaData, true);
		
		$mpdf->SetMargins(5, 5, 10, 1);
		$mpdf->WriteHTML($html);

		$mpdf->Output();
	}  

	public function printPer($per_id){
		$perData['data'] = $this->AM->get_per_data($per_id);
		if (!$perData) {
		show_error('Data not found for the provided swa_id.'); 
		}
		$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
		$mpdf->autoLangToFont = true;
		$mpdf->autoScriptToLang = true;
		$html = $this->load->view('admin/print_per', $perData, true);
		
		$mpdf->SetMargins(5, 5, 10, 1);
		$mpdf->WriteHTML($html);

		$mpdf->Output();
	}

	public function get_item() 
{
    $connectdns = "test_file";
    $username = "super";
    $password = "fsasya1941";
    $barcodetable = '[ICM_SM_SERVER_POS_SQL].[dbo].[Islands City Mall - SM POS SRV$Barcodes]';
    $pricetable = '[ICM_SM_SERVER_POS_SQL].[dbo].[Islands City Mall - SM POS SRV$Sales Price]';
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


    public function get_swa_mis_count() {
        $this->db->where('SWA_MIS_STATUS', 'pending');
        $swaCount = $this->db->count_all_results('swa_tbl'); 
        echo json_encode(['count' => $swaCount]);
    }

}