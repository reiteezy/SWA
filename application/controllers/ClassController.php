<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassController extends CI_Controller 
{
	function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
		$this->load->model('Class_model');
		$this->load->model('Notification_model');
		if (!$this->session->userdata('login_id')) {
            redirect(base_url(), 'refresh');
        }
    }

    public function class_list()
	{
		$class = $this->Class_model->view_type();
		$data['menu'] = 'Type';
		$data['classes'] = $class;
		
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar', $data);
        $this->load->view('admin/view/class_list', $data);
        $this->load->view('admin/view/js/class_js');
        $this->load->view('admin/view/modals/class_modal');
        $this->load->view('admin/require/footer');
	}

    public function add_class()
	{
        $this->load->view('admin/require/header');
        $this->load->view('admin/require/navbar');
        $this->load->view('admin/require/sidebar');
        $this->load->view('admin/view/add_class');
        $this->load->view('admin/require/footer');
	}

	public function new_type() 
	{
		$response = $this->Class_model->add_type();
		$notification_data = array(
			'message' => 'A new class has been added',
			'header' => 'User Class',
			'target_url' => base_url('ClassController/class_list')
		);
		
		if ($response) {
			$this->Notification_model->add_notification($notification_data);
			$result = array('status' => 'success', 'message' => 'Data saved successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to add data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function edit_type()
	{
		$class_id = $this->input->post('class_id');
		$update_data = array(
		'CLASS' => $this->input->post('update_userclass'),
		'DESCRIPTION' => $this->input->post('update_userdescript')
		);

		$response = $this->Class_model->edit_type($class_id, $update_data);

		if ($response) {
			$result = array('status' => 'success', 'message' => 'Data updated successfully!');
		} else {
			$result = array('status' => 'error', 'message' => 'Failed to update data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function del_type($class_id)
	{
		$del_type = $this->Class_model->del_type($class_id); 
		if($del_type['deleted']=='done'){
			$result = array('status' => 'success', 'message' => 'Data deleted successfully!');
		}  else {
			$result = array('status' => 'error', 'message' => 'Failed to delete data.');
		}
	
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	public function get_type($type_id) 
	{
		$type_data = $this->db->get_where('class_tbl', array('CID' => $type_id))->row_array();
		header('Content-Type: application/json');	
		echo json_encode($type_data);
    }

	public function view_type() 
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('User type', base_url('type'));
		if ($this->session->userdata('priv_ut') == 1)
		{
		$view_type = $this->Class_model->view_type();
		$data['menu'] = 'Type';
		$data['types'] = $view_type;
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		$this->load->view('admin/user_type', $data);
		} else {
			redirect(base_url() . 'admin/error404');
		}
	}

	public function view_edit_type($class_id)
	{
		$this->breadcrumb->add('<i class="fas fa-home"></i> Home', base_url());
		$this->breadcrumb->add('User type', base_url('type'));
		$this->breadcrumb->add('Edit', base_url('type'), true); 
		if ($this->session->userdata('priv_ut') == 1)
		{
		$data['menu'] = 'Type';
		$data['class_id'] = $class_id;
		$data['class_data'] = $this->Class_model->get_type($class_id);
		$data['breadcrumbs'] = $this->breadcrumb->getBreadcrumbs();
		// var_dump($data);
		$this->load->view('admin/edit_type', $data);
		} else {
			redirect(base_url() . 'admin/error404');
	}
	}


}