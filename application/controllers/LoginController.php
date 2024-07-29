<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    function __construct() 
	{ 
        parent::__construct();
 		$this->load->database();
        $this->load->model('Admin_model');
        $this->load->model('Notification_model');
        }

	function index()
	{
        // if ($this->session->userdata('logged_in'))
        //     redirect(base_url() . 'admin','refresh');
        $this->load->view('admin/require/header');
		$this->load->view('login');
        // $this->load->view('admin/require/footer');
	}


function valafclog()    
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $check = $this->Admin_model->checkLogin($username, $password);
    
    if ($check == 'active_user') {
        echo json_encode(array('status' => 'success', 'redirect_url' => base_url() . 'admincontroller/dash'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Invalid Credentials'));
    }
}

    function logout() {
    $this->session->sess_destroy();
    $this->session->set_flashdata('logout_notification', 'Logged Out Of The System');
    redirect(base_url(), 'refresh');
    }

}