<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('Class_model');
		$this->load->model('Subsidiary_model');
		$this->load->model('Notification_model');
		if (!$this->session->userdata('login_id')) {
            redirect(base_url(), 'refresh');
        }
    }

    public function users() 
	{
		// $data['users'] = $this->User_model->get_user_list();
		$data['classes'] = $this->Class_model->get_class_data();
		$data['menu'] = 'Users';

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/user_list', $data);
        $this->load->view('admin/view/js/users_js');
        $this->load->view('admin/view/modals/users_modal');
        $this->load->view('admin/require/footer');
	}

    public function add_user_page() 
	{
		$data['users'] = $this->User_model->get_user_list();
		$data['classes'] = $this->Class_model->get_class_data();
		$data['menu'] = 'Add User';

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/add_user', $data);
        $this->load->view('admin/require/footer');
	}

    public function new_user() 
	{
		$username = $this->input->post('username');
        // $password = $this->input->post('password');
        $emp_name = $this->input->post('emp_name');
        $emp_id = $this->input->post('emp_id');
        $emp_pos = $this->input->post('emp_pos');
        $emp_dept = $this->input->post('emp_dept');
        $emp_bu = $this->input->post('emp_bu');
        $user_class_id = $this->input->post('user_class');
        $emp_photo = $this->input->post('emp_photo');
        $class_data = $this->Admin_model->get_user_class($user_class_id);
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // var_dump($emp_pos);
        $password = $this->security->xss_clean(password_hash('alturas2024', PASSWORD_BCRYPT));
        $user_data = array(
            'USERNAME' => $username,
            'CLASS_ID' => $user_class_id,
            'PASSWORD' => $password,
            'EMP_NAME' => $emp_name,
            'EMP_ID' => $emp_id,
            'EMP_POS' => $emp_pos,
            'EMP_DEPT' => $emp_dept,
            'EMP_BU' => $emp_bu,
            'EMP_PHOTO' => $emp_photo
        );

		$response = $this->User_model->add_user($user_data);
		$notification_data = array(
			'message' => 'A new user has been added',
			'header' => 'New User',
			'target_url' => base_url('UserController/users')
		);
		if ($response) {
			$this->Notification_model->add_notification($notification_data);
			$result = array('status' => 'success', 'message' => 'Data saved successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to add data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function edit_user()
	{
		$user_class_id = $this->input->post('update_userclass');
		$user_id = $this->input->post('user_id');
		$user_data = $this->User_model->get_user_data($user_id);
		$password = $this->input->post('update_password');
		// var_dump($user_data['PASSWORD']);
		if($password != ''){
		$update_pass = $this->security->xss_clean(password_hash($password, PASSWORD_BCRYPT));
		} else{
			$update_pass = $this->security->xss_clean($user_data['PASSWORD']);
		}
		// var_dump($update_pass);
			$data = array(
			'USERNAME' => $this->input->post('update_username'),
			'CLASS_ID' => $user_class_id,
			'PASSWORD' => $update_pass
		);
		// var_dump($data);
		$response = $this->User_model->update_user_data($user_id, $data);
		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data updated successfully!');
			
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to update data.');
		} 
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	
	function get_users_list(){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		$memory_limit = ini_get('memory_limit');
		ini_set('memory_limit',-1);
		ini_set('max_execution_time', 0);
	
		$tab           = $this->input->post('tab');
		$start         = $this->input->post('start'); 
		$length        = $this->input->post('length'); 
		$searchValue   = $this->input->post('search')['value'];
	
	
		$users = $this->User_model->get_users();
	
		$result = array();
		 // var_dump($po_headers);
		 // exit();
		foreach($users as $user){
		   $user_id = $user["ID"];
		 //   $log_details = $this->Po_model->getPoLog($hd_id);
	
		   
		   if($searchValue=='')
			  $result[] = $user;
		   else{
			  if((strpos(strtolower($sub["EMP_NAME"]), strtolower($searchValue)) !== false || 
				 strpos(strtolower($sub["USERNAME"]), strtolower($searchValue)) !== false || 
				 strpos(strtolower($sub["CLASS"]), strtolower($searchValue)) !== false|| 
				 strpos(strtolower($sub["STATUS"]), strtolower($searchValue)) !== false)){
					
				 $result[] = $user;
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
	


	public function get_user($user_id) 
{
    $this->db->select('users_tbl.*, class_tbl.CLASS, class_tbl.DESCRIPTION');
    $this->db->from('users_tbl');
    $this->db->join('class_tbl', 'users_tbl.CLASS_ID = class_tbl.CID', 'left');
    $this->db->where('users_tbl.ID', $user_id);

    $query = $this->db->get();
    $user_data = $query->row_array();

    header('Content-Type: application/json');
    if ($user_data) {
        echo json_encode($user_data);
    } else {
        echo json_encode(array('error' => 'User not found'));
    }
}

public function user_filter_view() 
{
	$data['users'] = $this->User_model->get_user_list();
	// $data['tagged'] = $this->get_user_tagged_subsidiaries();
	// $data['untagged'] = $this->get_user_untagged_subsidiaries();

	$data['menu'] = 'user filter';
	// print_r($data['users']);

	$this->load->view('admin/require/header');
	$this->load->view('admin/require/navbar');
	$this->load->view('admin/require/sidebar', $data);
	$this->load->view('admin/view/user_filtering', $data);
	$this->load->view('admin/require/footer');
}

public function get_user_tagged_subsidiaries() {
	$user_id = $this->input->post('user_id');
	$subsidiaries = $this->User_model->get_tagged_subsidiaries($user_id);
	echo json_encode($subsidiaries);
}

public function get_user_untagged_subsidiaries() {
    $user_id = $this->input->post('user_id');
    $subsidiaries = $this->User_model->get_untagged_subsidiaries($user_id);
    echo json_encode($subsidiaries);
}


public function tag_subsidiary() {
	$user_id = $this->input->post('user_id');
	$sub_id = $this->input->post('sub_id');
	$response = $this->User_model->add_user_subsidiary($user_id, $sub_id);
	if ($response) {
		$result = array('status' => 'success', 'message' => 'Data updated successfully!');
		
	} else {
		$result = array('status' => 'error', 'message' => 'Failed to update data.');
	} 
	$this->output->set_content_type('application/json')->set_output(json_encode($result));
}

public function untag_subsidiary() {
	$user_id = $this->input->post('user_id');
	$subsidiary_id = $this->input->post('subsidiary_id');
	$this->User_model->remove_user_subsidiary($user_id, $subsidiary_id);
	redirect('user');
}
}