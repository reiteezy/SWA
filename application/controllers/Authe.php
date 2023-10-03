<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authe extends CI_Controller {

	function index()
	{
    
        if ($this->session->userdata('login_check') == 'go@admin')
            redirect(base_url() . 'admin','refresh');
        

		$this->login();
	}

	function login()
	{
		$this->load->view('login');
	}

	function valafclog()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$check = $this->checklogin($username, $password);
		if ($check == 'active_admin') {
			redirect(base_url() . 'admin','refresh');
		} elseif ($check == 'active_parent') {
			redirect(base_url() . 'allparent','refresh');
		} else{
			$this->session->set_flashdata('invalid_cred', 'Invalid Credentials');
			redirect(base_url(),'refresh');
		}
	}

	function checklogin($username, $password)
	{
		$this->db->where('PASSWORD', $password);
        $this->db->where('USERNAME', $username);
        $query = $this->db->get('users_tbl');
        if ($query->num_rows() > 0) {
        	$row = $query->row();
            $this->session->set_userdata('login_id', $row->ID);
            $this->session->set_userdata('login_name', $row->USERNAME);
            $this->session->set_userdata('login_class', $row->UCLASS);
            $this->session->set_userdata('login_check', 'go@admin');
            return 'active_admin';
        }
	}

	function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'Logged Out Of The System');
        redirect(base_url(),'refresh');
    }
}
