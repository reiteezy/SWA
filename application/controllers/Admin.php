<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() { 

        parent::__construct();
 		$this->load->database();
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

	public function index() {
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		$this->dashboard();
	}

	public function dashboard() {
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		$page_data['page_name'] = 'dashboard';
		$page_data['page_title'] = 'Dashboard';
		$page_data['page_s_name'] = '';

		$this->load->view('admin/dashboard', $page_data);
	}

	//get description
	public function get_description() {
        $class_id = $this->input->post('class_id');
        // Fetch the description from the model based on the class_id
        $description = $this->Crud_model->get_description($class_id);
        // Return the description as JSON response
        echo json_encode($description);
    }
	
	public function get_subsidiary() {
        $sub_id = $this->input->post('sub_id');
        // Fetch the description from the model based on the class_id
        $description = $this->Crud_model->get_subsidiary($sub_id);
		$code = $this->Crud_model->get_subsidiary($sub_id);
        // Return the description as JSON response
        $data = array(
			'description' => $result['DESCRIPTION'],
			'code' => $result['CODE']
		);
		// Return the data as a JSON response
		echo json_encode($data);
    }

	public function get_user() {
         // Fetch user data from the database based on $user_id
		$user_data = $this->db->get_where('users_tbl', array('ID' => $user_id))->row_array();

		// Return the user data as a JSON response
		header('Content-Type: application/json');
		echo json_encode($user_data);
    }

	function parent(){
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		$page_data['page_name'] = 'parent';
		$page_data['page_title'] = 'Manage Parents';
		$page_data['page_s_name'] = '';

		$this->load->view('admin/parent', $page_data);
	}

	//file maintenance
	function file_maintenance($name='')
	{
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		$page_data['page_name'] = 'file_maintenance';
		if ($name=='subsidiary') {
			$page_data['page_title'] = 'Subsidiary Setup';
			$page_data['page_s_name'] = 'subsidiary';

			$this->load->view('admin/subsidiary', $page_data);
		}

		if ($name=='supplier') {
			$page_data['page_title'] = 'Supplier Setup';
			$page_data['page_s_name'] = 'supplier';

			$this->load->view('admin/supplier', $page_data);
		}

		if ($name=='user_filtering') {
			$page_data['page_title'] = 'User Filtering';
			$page_data['page_s_name'] = 'user_filtering';

			$this->load->view('admin/user_filtering', $page_data);
		}
	}
	//stock withdrawal advice
	function stock_withdrawal_advice($name='')
	{
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		$page_data['page_name'] = 'stock_withdrawal_advice';
		if ($name=='swa_form') {
			$page_data['page_title'] = 'Stock Withdrawal Advice';
			$page_data['page_s_name'] = 'swa_form';

			$this->load->view('admin/stock_withdrawal', $page_data);
		}

		if ($name=='swa_mis_confirm') {
			$page_data['page_title'] = 'SWA Confirmation - MIS';
			$page_data['page_s_name'] = 'swa_mis_confirm';

			$this->load->view('admin/swa_mis_confirm', $page_data);
		}

		if ($name=='swa_accounting_confirm') {
			$page_data['page_title'] = 'SWA Confirmation - Accounting';
			$page_data['page_s_name'] = 'swa_accounting_confirm';

			$this->load->view('admin/swa_accounting_confirm', $page_data);
		}

		if ($name=='promo_execution') {
			$page_data['page_title'] = 'Promo Execution Report';
			$page_data['page_s_name'] = 'promo_execution';

			$this->load->view('admin/promo_execution', $page_data);
		}
	}
	//system manager
	function system_manager($name='')
	{
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		$page_data['page_name'] = 'system_manager';
		if ($name=='user_type') {
			$page_data['page_title'] = 'User Type';
			$page_data['page_s_name'] = 'user_type';

			$this->load->view('admin/user_type', $page_data);
		}

		if ($name=='users') {
			$page_data['page_title'] = 'User Setup';
			$page_data['page_s_name'] = 'users';

			$this->load->view('admin/users', $page_data);
		}

		if ($name=='user_menu') {
			$page_data['page_title'] = 'User Menu';
			$page_data['page_s_name'] = 'user_menu';

			$this->load->view('admin/user_menu', $page_data);
		}

		if ($name=='menu_settings') {
			$page_data['page_title'] = 'Menu Settings';
			$page_data['page_s_name'] = 'menu_settings';

			$this->load->view('admin/menu_settings', $page_data);
		}
	}
	//system utilities
	function system_utilities($name='')
	{
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		$page_data['page_name'] = 'system_utilities';
		if ($name=='system_wallpaper') {
			$page_data['page_title'] = 'System Wallpaper';
			$page_data['page_s_name'] = 'system_wallpaper';

			$this->load->view('admin/system_wallpaper', $page_data);
		}
		if ($name=='about') {
			$page_data['page_title'] = 'About the System';
			$page_data['page_s_name'] = 'about';

			$this->load->view('admin/about', $page_data);
		}
	}
//action
	function action($spec='', $param2='',$param3='')
	{
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		if ($spec=='new_subsidiary') {
			$add_subsidiary = $this->Crud_model->add_subsidiary(); 
        	if($add_subsidiary['inserted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/file_maintenance/subsidiary','refresh');
        	} 
		}

		if ($spec=='new_supplier') {
			$add_supplier = $this->Crud_model->add_supplier(); 
        	if($add_supplier['inserted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/file_maintenance/supplier','refresh');
        	}
		}
		if ($spec=='new_type') {
			$add_type = $this->Crud_model->add_type(); 
        	if($add_type['inserted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/system_manager/user_type','refresh');
        	}
		}

				// Inside your Admin controller
		if ($spec == 'new_user') {
			 
			// Retrieve user_class ID from form submission
			$user_class_id = $this->input->post("user_class");

			// Retrieve class and description based on user_class_id
			$class_info = $this->db->get_where('class_tbl', array('ID' => $user_class_id))->row();
			
			// Check if class_info exists and get class and description
			if ($class_info) {
				$user_class = $class_info->CLASS;
				$user_description = $class_info->DESCRIPTION;
			} else {
				// Handle the case where the class information doesn't exist
				$user_class = 'Default Class';
				$user_description = 'Default Description';
			}
			$emp_name = $this->input->post("emp_name");
			$emp_id = $this->input->post("emp_id");
			$emp_pos = $this->input->post("emp_pos");
			$emp_dept = $this->input->post("emp_dept");
			$emp_bu = $this->input->post("emp_bu");

			// Create an array with user data
			$user_data = array(
				'USERNAME' => $this->input->post("username"),
				'UCLASS' => $user_class,
				'UDESCRIPTION' => $user_description,
				'PASSWORD' => $this->input->post("password"),
				'EMP_NAME' => $emp_name,
				'EMP_ID' => $emp_id,
				'EMP_POS' => $emp_pos,
				'EMP_DEPT' => $emp_dept,
				'EMP_BU' => $emp_bu,
			);

			// Insert the user data into users_tbl
			$this->Crud_model->insert_user_data($user_data);

			// Redirect or display a success message
			// ...
			
			$this->session->set_flashdata('completed', 'Action Completed Successfully');
			redirect(base_url() . 'admin/system_manager/users','refresh');
		}



		if ($spec == 'main_settings') {
			$main_settings = $this->Crud_model->main_settings(); 
        	if($main_settings['edited']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/management/settings','refresh');
        	}
		}

		if ($spec=='new_swa') {
			$add_swa = $this->Crud_model->add_swa(); 
        	if($add_type['inserted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/stock_withdrawal_advice/swa_form','refresh');
        	}
		}
	}

	public function options($param1='', $param2='')
	{
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		if ($param1=="edit_subsidiary") {
			$page_data['sub_id'] = $param2;
			$page_data['page_name'] = 'file_maintenance';
			$page_data['page_title'] = 'Edit Subsidiary';
			$page_data['page_s_name'] = 'subsidiary';

			$this->load->view('admin/edit_subsidiary', $page_data);
		}

		if ($param1=="edit_supplier") {
			$page_data['sup_id'] = $param2;
			$page_data['page_name'] = 'file_maintenance';
			$page_data['page_title'] = 'Edit supplier';
			$page_data['page_s_name'] = 'supplier';

			$this->load->view('admin/edit_supplier', $page_data);
		}
		if ($param1=="edit_user") {
			$page_data['user_id'] = $param2;
			$page_data['page_name'] = 'system_manager';
			$page_data['page_title'] = 'Edit user';
			$page_data['page_s_name'] = 'users';

			$this->load->view('admin/edit_user', $page_data);
		}
		if ($param1=="edit_type") {
			$page_data['class_id'] = $param2;
			$page_data['page_name'] = 'system_manager';
			$page_data['page_title'] = 'Edit class';
			$page_data['page_s_name'] = 'edit_type';

			$this->load->view('admin/edit_type', $page_data);
		}
	}
	
	function sub_action($action='', $param2='')
	{
		if ($this->session->userdata('login_check') != 'go@admin')
            redirect(base_url(), 'refresh'); 

		if ($action == 'edit_subsidiary') {
			$edit_subsidiary = $this->Crud_model->edit_subsidiary($param2); 
        	if($edit_subsidiary['edited']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/file_maintenance/subsidiary','refresh');
        	}
		}
		if ($action == 'del_subsidiary') {
			$del_subsidiary = $this->Crud_model->del_subsidiary($param2); 
        	if($del_subsidiary['deleted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/file_maintenance/subsidiary','refresh');
        	}
		}
		if ($action == 'edit_supplier') {
			$edit_supplier = $this->Crud_model->edit_supplier($param2); 
        	if($edit_supplier['edited']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/file_maintenance/supplier','refresh');
        	}
		}
		if ($action == 'del_supplier') {
			$del_supplier = $this->Crud_model->del_supplier($param2); 
        	if($del_supplier['deleted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/file_maintenance/supplier','xrefresh');
        	}
		}
		if ($action == 'edit_user') {
			$edit_user = $this->Crud_model->edit_user($param2); 
        	if($edit_user['edited']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/system_manager/users','refresh');
        	}
		}
		// if ($action == 'edit_user') {
			
		// 		// Get user data from the AJAX request
		// 		$user_id = $this->input->post('user_id');
		// 		$user_name = $this->input->post('user_name');
		// 		$user_class = $this->input->post('user_class');
		// 		$user_descript = $this->input->post('user_descript');
		// 		$password = $this->input->post('password');
			
		// 		// Update user data in the database
		// 		$user_data = array(
		// 			'USERNAME' => $user_name,
		// 			'UCLASS' => $user_class,
		// 			'UDESCRIPTION' => $user_descript,
		// 			'PASSWORD' => $password,
		// 		);
			
		// 		$this->db->where('ID', $user_id);
		// 		$this->db->update('users_tbl', $user_data);
			
		// 		// Return a JSON response indicating success
		// 		header('Content-Type: application/json');
		// 		echo json_encode(array('edited' => 'done'));
        // 		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        // 		redirect(base_url() . 'admin/system_manager/users','refresh');
        	
		// }
		
		if ($action == 'del_user') {
			$del_user = $this->Crud_model->del_user($param2); 
        	if($del_user['deleted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/system_manager/users','refresh');
        	}
		}
		if ($action == 'edit_type') {
			$edit_type = $this->Crud_model->edit_type($param2); 
        	if($edit_type['edited']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/system_manager/user_type','refresh');
        	}
		}
		if ($action == 'del_type') {
			$del_type = $this->Crud_model->del_type($param2); 
        	if($del_type['deleted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/system_manager/user_type','refresh');
        	}
		}
		if ($action=='update_wallpaper') {
			move_uploaded_file($_FILES['logo']['tmp_name'], 'assets/backend/dist/uploads/wallpaper.png');
			
			$this->session->set_flashdata('completed', 'Action Completed Successfully');
        	redirect(base_url() . 'admin/system_utilities/system_wallpaper','refresh');
		}
	}

	
}
