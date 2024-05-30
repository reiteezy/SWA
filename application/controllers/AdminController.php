<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require FCPATH. 'vendor/autoload.php';
class AdminController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
		//  $this->load->database('odbc');
        // $this->load->library('form_validation');
        // $this->load->library('upload');
		$this->load->model('Admin_model');
		// $this->load->model('User_model');
		// $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		// $this->output->set_header('Pragma: no-cache');
		// if (!$this->session->userdata('login_id')) {
        //     redirect(base_url(), 'refresh');
        // }
    }

	public function error404()
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Error', base_url('error'));
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		$data['menu'] = 'Error_page';
		$this->load->view('admin/error', $data);
	}

	public function dash() 
	{
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/dashboard');
        $this->load->view('admin/require/footer');
		// if (!$this->session->userdata('logged_in'))
        //     redirect(base_url(), 'refresh'); 
		// $this->dashboard();
	}

	public function dashboard() 
	{
		if (!$this->session->userdata('logged_in'))
            redirect(base_url(), 'refresh'); 

		$this->breadcrumb->add('', base_url('home'));
		$swa_data = $this->AM->view_swa_data();
		$noSwaDataFound = empty($swa_data);
		$per_data = $this->AM->view_per_data();
		$noPerDataFound = empty($per_data);
		$data['per_datas'] = $per_data;
		$data['noPerDataFound'] = $noPerDataFound;
		$data['swa_datas'] = $swa_data;
		$data['noSwaDataFound'] = $noSwaDataFound;
		$data['menu'] = 'Dashboard';
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		$data['page_name'] = 'dashboard';
		$data['page_title'] = 'Dashboard';
		$data['page_s_name'] = '';
		$this->load->view('admin/dashboard', $data);
	}

	public function get_description() 	
	{	
        $class_id = $this->input->post('class_id');	
        $description = $this->Admin_model->get_description($class_id);
        echo json_encode($description);
    }

	public function view_user_filter() 
	{
		if ($this->session->userdata('priv_uf') == 1){
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('User Filtering', base_url('filter'));
		$data['menu'] = 'Filtering';
		$data['users'] = $this->UM->get_user_list();
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
        $this->load->view('admin/user_filtering', $data);
		} else {
			redirect(base_url() . 'error');
		}
	}

	public function view_profile() 
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Profile', base_url('profile'));
		$data['menu'] = 'Profile';
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
        $this->load->view('admin/view_profile', $data);
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

	// public function menu_settings()
	// {
	// 	if ($this->session->userdata('priv_ms') == 1)
	// 	{
	// 	$this->load->view('admin/menu_settings');
	// } else {
	// 	$this->load->view('admin/error');
	// 	}
	// }

	// public function user_menu()
	// {
	// 	if ($this->session->userdata('priv_um') == 1){
	// 	$this->load->view('admin/user_menu');
	// 	} else {
	// 	redirect(base_url() . 'error');
	// 	}
	// }
	
	public function about_page()
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i>  Home', base_url());
		$this->breadcrumb->add('About', base_url('about'));
		if ($this->session->userdata('priv_as') == 1){
			$data['menu'] = 'About';
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		$this->load->view('admin/about', $data);
	} else {
		redirect(base_url() . 'error');
		}
	}

	public function system_wallpaper()
	{ 
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Wallpaper', base_url('wallpaper'));
		if ($this->session->userdata('priv_sw') == 1){
			$data['menu'] = 'Wallpaper';		
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		$this->load->view('admin/system_wallpaper', $data);
		} else {
		$this->load->view('admin/error');
		}
	}

	public function update_wallpaper()
	{
		if (!empty($_FILES['logo']['name'])) {
			move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/wallpaper.jpg');
			$this->session->set_flashdata('wallpaper-success-upload', 'Wallpaper uploaded successfully');
		} else {
			$this->session->set_flashdata('wallpaper-upload-error', 'No files chosen');
		}
		redirect(base_url() . 'admin/system_wallpaper');
	}

//-----------------------------------CHANGE STATUS------------------------------------------------
public function user_status_changed()
{
    $user_id = $this->input->post('user_id');
    $user_status = $this->input->post('user_status');
    if ($user_status == '1') {
        $user_status = '0';
    } else {
        $user_status = '1';
    }
    $user_data = array('STATUS' => $user_status);
    $this->db->where('ID', $user_id);
    $response = $this->db->update('users_tbl', $user_data);
    if ($response) {
        $result = array('status' => 'success', 'message' => 'Status changed!', 'res'=> $user_status );
    } else {
        $result = array('status' => 'error', 'message' => 'Failed to change status.');
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
}

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
	public function update_password() 
	{
		$user_id = $this->input->post('user_id');
		$new_password = $this->input->post('new_password'); 
		$response = $this->AM->updatePassword($user_id, $new_password);
		if ($response) {
			$result = array('status' => 'success', 'message' => 'Password changed!');
			
		} else {+
			$result = array('status' => 'error', 'message' => 'Failed change password.');
		} 
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
//-----------------------------------CHECK USERNAME / NAME AVAILABILITY------------------------------------------------
	public function check_username_availability() 
	{
        $username = $this->input->get('username');
        $is_taken = $this->AM->is_username_taken($username);
        $response = ['taken' => $is_taken];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

	public function check_name_availability() 
	{
        $emp_name = $this->input->get('emp_name');
        $is_taken = $this->AM->is_name_taken($emp_name);
        $response = ['taken' => $is_taken];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

//-----------------------------------ASSIGN PRIVILEGE----------------------------------------------------

	public function view_privilege()
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('User Menu', base_url('privilege'));
		if ($this->session->userdata('priv_um') == 1){
		$data['menu'] = 'User_menu';			
		$data['classes'] = $this->AM->view_class_privilege();
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();

		$this->load->view('admin/user_menu', $data);
		// var_dump($this->session->userdata);	
		} else {
		$this->load->view('admin/error');
		}
	}

	public function view_update_privilege($class_id)
	{
		$data['class_id'] = $class_id;
		$data['classes'] = $this->AM->get_privilege_data($class_id);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function savePrivileges() {
		$classId = $this->input->post('classId');
		$privileges = $this->input->post('privileges');
		$result = $this->AM->updatePrivileges($classId, $privileges);
		if ($result) {
			$response = array('status' => 'success', 'message' => 'Changes saved!');
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data!');
		}
		// $this->session->sess_regenerate(true);
		echo json_encode($response);
	}

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