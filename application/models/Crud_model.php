<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model { 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    public function get_description($class_id) {
        // Query the database to retrieve the description based on class_id
        $query = $this->db->get_where('class_tbl', array('ID' => $class_id));

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->DESCRIPTION;
        } else {
            return 'Description not found'; // You can handle this case as needed
        }
    }
    public function get_subsidiary($sub_id) {
        // Query the database to retrieve the description based on class_id
        $query = $this->db->get_where('sub_tbl', array('ID' => $sub_id));

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return array(
                'DESCRIPTION' => $row->DESCRIPTION,
                'CODE' => $row->CODE        
            );
        } else {
            return array(
                'DESCRIPTION' => 'Description not found',
                'CODE' => 'Code not found'
            );
        }
    }
    public function get_user_classes() {
        // Retrieve classes from class_tbl
        return $this->db->get('class_tbl')->result_array();
    }

    public function insert_user_data($data) {
        // Insert data into users_tbl
        $this->db->insert('users_tbl', $data);
    }
// ADD functionalities
    function add_subsidiary()
    {
        $sub_data = array(
            'CODE' => $this->input->post('sub_code'),
            'DESCRIPTION' => $this->input->post('sub_descript'),
        );

        $this->db->insert('sub_tbl', $sub_data);
        $sub_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'sub_id' => $sub_id
        );
    }

    function add_supplier()
    {
        $sup_data = array(
        	'CODE' => $this->input->post('sup_code'),
            'NAME' => $this->input->post('sup_name'),
            'ADDRESS' => $this->input->post('sup_add'),
            'CONTACT_PERSON' => $this->input->post('sup_contact'),
            'PHONE_NO' => $this->input->post('sup_phoneno'),
            'TEL_NO' => $this->input->post('sup_telno'),
        );

        $this->db->insert('sup_tbl', $sup_data);
        $sup_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'sup_id' => $sup_id
        );
    }

    function add_user()
    {

        $password = $this->input->post("password");
        $user_data = array(
            'USERNAME' => $this->input->post("username"),
            'UCLASS' => $this->input->post("user_class"),
            'UDESCRIPTION' => $this->input->post("user_descript"),
            'PASSWORD' => $password,
            'EMP_NAME' => $this->input->post("emp_name"),
            'EMP_ID' => $this->input->post("emp_id"),
            'EMP_POS' => $this->input->post("emp_pos"),
            'EMP_DEPT' => $this->input->post("emp_dept"),
            'EMP_BU' => $this->input->post("emp_bu"),
        );

        $this->db->insert('users_tbl', $user_data);
        $user_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'user_id' => $user_id
        );
    }
    function add_type()
    {

        $class_data = array(
            'CLASS' => $this->input->post("user_class"),
            'DESCRIPTION' => $this->input->post("user_descript"),
        );

        $this->db->insert('class_tbl', $class_data);
        $class_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'class_id' => $class_id
        );
    }
    function add_swa()
    {

        $class_data = array(
            'CLASS' => $this->input->post("user_class"),
            'DESCRIPTION' => $this->input->post("user_descript"),
        );

        $this->db->insert('class_tbl', $class_data);
        $class_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'class_id' => $class_id
        );
    }
   
    function add_parent()
    {
        $email = $this->input->post("email");
        if ($email != ''){
            if ($this->check_email($email)) {
                return FALSE;
                die();
            }
        }

        $pwd = $this->input->post("password");
        $parent_data = array(
            'NAME' => $this->input->post("name"),
            'PHONE' => $this->input->post("phone"),
            'ADDRESS' => $this->input->post("address"),
            'EMAIL' => $email,
            'PASSWORD' => $pwd,
        );

        $this->db->insert('parent_tbl', $parent_data);
        $parent_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'parent_id' => $parent_id
        );
    }

    function add_student($class_id)
    {
        $student_data = array(
            'NAME' => $this->input->post("name"),
            'PARENT' => $this->input->post("parent"),
            'CLASS' => $class_id,
            'SESSION' => $this->db->get_where('settings_tbl',array('ID'=>1))->row()->SESSION,
        );

        $this->db->insert('student', $student_data);
        $student_id = $this->db->insert_id();

      
    }
    // Edit functionalities
    function edit_student($student_id)
    {
        $student_data = array(
            'NAME' => $this->input->post("name"),
            'PARENT' => $this->input->post("parent")
        );

        $this->db->where('ID', $student_id);
        $this->db->update('student', $student_data);

        return array(
            'edited' => 'done',
            'student_id' => $student_id
        );
    }

    function edit_subsidiary($sub_id)
    {
        $sub_data = array(
            'CODE' => $this->input->post('sub_code'),
            'DESCRIPTION' => $this->input->post('sub_descript'),
        );

        $this->db->where('ID', $sub_id);
		$this->db->update('sub_tbl', $sub_data);

        return array(
            'edited' => 'done',
        );
    }

    function edit_supplier($sup_id)
    {
        $sup_data = array(
        	'CODE' => $this->input->post('sup_code'),
            'NAME' => $this->input->post('sup_name'),
            'ADDRESS' => $this->input->post('sup_add'),
            'CONTACT_PERSON' => $this->input->post('sup_contact'),
            'PHONE_NO' => $this->input->post('sup_phoneno'),
            'TEL_NO' => $this->input->post('sup_telno'),
        );

        $this->db->where('ID', $sup_id);
		$this->db->update('sup_tbl', $sup_data);

        return array(
            'edited' => 'done',
        );
    }
    function edit_user($user_id)
    {
        $user_data = array(
        	'USERNAME' => $this->input->post('user_name'),
            'UCLASS' => $this->input->post('user_class'),
            'UDESCRIPTION' => $this->input->post('user_descript'),
            'PASSWORD' => $this->input->post('password'),
        );

        $this->db->where('ID', $user_id);
		$this->db->update('users_tbl', $user_data);

        return array(
            'edited' => 'done',
        );
    }
    
    function edit_type($class_id)
    {
        $class_data = array(
        	'CLASS' => $this->input->post('class_code'),
            'DESCRIPTION' => $this->input->post('class_descript'),
        );

        $this->db->where('ID', $class_id);
		$this->db->update('class_tbl', $class_data);

        return array(
            'edited' => 'done',
        );
    }

    // Delete Functionalities
    function del_user($user_id)
    {
        $this->db->where('ID', $user_id);
		$this->db->delete('users_tbl');

        return array(
            'deleted' => 'done',
        );
    }
    function del_subsidiary($sub_id)
    {
        $this->db->where('ID', $sub_id);
		$this->db->delete('sub_tbl');

        return array(
            'deleted' => 'done',
        );
    }
    function del_supplier($sup_id)
    {
        $this->db->where('ID', $sup_id);
		$this->db->delete('sup_tbl');

        return array(
            'deleted' => 'done',
        );
    }
    function del_type($class_id)
    {
        $this->db->where('ID', $class_id);
		$this->db->delete('class_tbl');

        return array(
            'deleted' => 'done',
        );
    }

    //check if email exist
    function check_email($email='')
    {
    	$email1 = $this->db->get_where('users_tbl', array('EMAIL' => $email));
        $email2 = $this->db->get_where('parent_tbl', array('EMAIL' => $email));

        if ($email1->num_rows() > 0 || $email2->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


}
