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
		$this->load->model('Admin_model');
		$this->load->model('User_model');
		if (!$this->session->userdata('login_id')) {
            redirect(base_url(), 'refresh');
        }
    }

	public function error_page()
	{
		$this->load->view('admin/extra/error_page');
	}

	public function index() 
	{
		if (!$this->session->userdata('logged_in'))
            redirect(base_url(), 'refresh'); 
		$data['menu'] = 'dashboard';
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/dashboard');
        $this->load->view('admin/require/footer');
	}

	public function get_description() 	
	{	
        $class_id = $this->input->post('class_id');	
        $description = $this->Admin_model->get_description($class_id);
        echo json_encode($description);
    }

	public function view_profile() 
	{
		$data['menu'] = 'dashboard';
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/js/profile_js');
        $this->load->view('admin/view/view_profile');
        $this->load->view('admin/require/footer');
	}

	public function about_page() 
	{
		$data['menu'] = 'about';
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);;
        $this->load->view('admin/view/about_page');
        $this->load->view('admin/require/footer');
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
	
		
	public function get_swa_per_details() {
        $swa_id = $this->input->get('swa_id');
        $response['data'] = $this->Admin_model->get_swa_details($swa_id);
        echo json_encode($response);
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
public function get_user_status(){
	$user_id = $this->input->get('user_id');
	$response['data'] = $this->User_model->get_status($user_id);
	echo json_encode($response);
}

public function user_status_changed()
{
    $user_id = $this->input->post('user_id');
    $user_status = $this->input->post('user_status');
	// print_r($user_status);
	// die();
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
		$response = $this->Admin_model->updatePassword($user_id, $new_password);
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
        $is_taken = $this->Admin_model->is_username_taken($username);
        $response = ['taken' => $is_taken];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

	public function check_name_availability() 
	{
        $emp_name = $this->input->get('emp_name');
        $is_taken = $this->Admin_model->is_name_taken($emp_name);
        $response = ['taken' => $is_taken];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

//-----------------------------------ASSIGN PRIVILEGE----------------------------------------------------

	public function view_privilege()
	{
		if ($this->session->userdata('priv_um') == 1){
		$data['menu'] = 'User_menu';			
		// $data['classes'] = $this->Admin_model->view_class_privilege();
		$this->load->view('admin/require/header');
		$this->load->view('admin/require/navbar');
		$this->load->view('admin/require/sidebar', $data);
		$this->load->view('admin/view/user_menu', $data);
        $this->load->view('admin/view/modals/class_modal');
        $this->load->view('admin/view/js/user_menu_js');
        $this->load->view('admin/view/modals/class_modal');
        $this->load->view('admin/view/modals/user_menu_modal');
		$this->load->view('admin/require/footer');
		} else {
		$this->load->view('admin/error');
		}
	}

	public function view_update_privilege($class_id)
	{
		$data['class_id'] = $class_id;
		$data['classes'] = $this->Admin_model->get_privilege_data($class_id);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function savePrivileges() {
		$classId = $this->input->post('classId');
		$privileges = $this->input->post('privileges');
		$result = $this->Admin_model->updatePrivileges($classId, $privileges);
		if ($result) {
			$response = array('status' => 'success', 'message' => 'Changes saved!');
		} else {
			$response = array('status' => 'error', 'message' => 'Error saving data!');
		}
		echo json_encode($response);
	}

}