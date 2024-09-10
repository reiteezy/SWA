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
		$data['users'] = $this->User_model->get_user_list();
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
		$response = $this->User_model->add_user();
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
        $class_data = $this->User_model->get_user_data($user_class_id);
		$user_id = $this->input->post('user_id');

			$data = array(
			'USERNAME' => $this->input->post('update_username'),
			'CLASS_ID' => $user_class_id,
			'PASSWORD' => $this->input->post('update_password'),
		
		);
			
		$response = $this->User_model->update_user_data($user_id, $data);
		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data updated successfully!');
			
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to update data.');
		} 
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
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