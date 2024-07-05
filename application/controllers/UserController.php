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
        // $this->load->view('admin/require/customscript');
        $this->load->view('admin/view/user_list', $data);
        $this->load->view('admin/require/footer');
	}

    public function add_user_page() 
	{
		$data['users'] = $this->User_model->get_user_list();
		$data['classes'] = $this->Class_model->get_class_data();
		$data['menu'] = 'Add User';
		// $data['users'] = $user_data;

		$this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        // $this->load->view('admin/require/customscript');
        $this->load->view('admin/view/add_user', $data);
        $this->load->view('admin/require/footer');
	}

    public function new_user() 
	{
		$response = $this->User_model->add_user();
		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data saved successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to add data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function edit_user()
	{
		$user_class_id = $this->input->post('user_class');
        $class_data = $this->User_model->get_user_data($user_class_id);
		$user_id = $this->input->post('user_id');

			$data = array(
			'USERNAME' => $this->input->post('user_name'),
			'CLASS_ID' => $user_class_id,
			'PASSWORD' => $this->input->post('password'),
			'EMP_NAME' => $this->input->post('emp_name'),
			'EMP_ID' => $this->input->post('emp_id'),
			'EMP_POS' => $this->input->post('emp_pos'),
			'EMP_DEPT' => $this->input->post('emp_dept'),
			'EMP_BU' => $this->input->post('emp_bu')
		
		);
			
		$response = $this->User_model->update_user_data($user_id, $data);

		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data updated successfully!');
			
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to update data.');
		} 
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	public function user_list() 
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Users', base_url('users'));
		if ($this->session->userdata('priv_users') == 1)
		{
		$data['menu'] = 'Users';
		$data['users'] = $this->User_model->get_user_list();
		$data['classes'] = $this->Class_model->get_class_data();
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
        $this->load->view('admin/users', $data);
		} else {
			redirect(base_url() . 'admin/error404');
		}
    }
	
	public function view_edit_user($user_id)
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('Users', base_url('users'));
		$this->breadcrumb->add('Edit', base_url('users'), true);
		if ($this->session->userdata('priv_users') == 1)
		{
		$data['menu'] = 'Users';
		$data['user_id'] = $user_id;
		$data['user_data'] = $this->User_model->get_user_data($user_id);
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		// var_dump($data);
		$this->load->view('admin/edit_user', $data);
		} else {
			redirect(base_url() . 'admin/error404');
		}
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
		echo json_encode($user_data);
    }

	// 	public function del_user($user_id)
// {
// 		$del_user = $this->User_model->del_user($user_id); 
// 		if($del_user['deleted']=='done'){
// 		$this->session->set_flashdata('success', 'Successfully deleted.');
// 		redirect(base_url() . 'admin/user_list','refresh');
// }

}