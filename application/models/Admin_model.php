<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{ 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    function checkLogin($username, $password)
    {
        $this->db->where('PASSWORD', $password);
        $this->db->where('USERNAME', $username);
        $this->db->select('users_tbl.*, class_tbl.*');
        $this->db->from('users_tbl');
        $this->db->join('class_tbl', 'users_tbl.CLASS_ID = class_tbl.CID', 'left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->STATUS == '1') {
                
                // var_dump($row->swaReports);
                // die();
                $session_data = array(
                    'login_id' => $row->ID,
                    'login_name' => $row->USERNAME,
                    'login_empname' => $row->EMP_NAME,
                    'login_empid' => $row->EMP_ID,
                    'login_emppos' => $row->EMP_POS,
                    'login_empdept' => $row->EMP_DEPT,
                    'login_empbu' => $row->EMP_BU,
                    'login_status' => $row->STATUS,
                    'login_image' => $row->EMP_PHOTO,
                    'login_class' => $row->CLASS,
                    'login_pass' => $row->PASSWORD,
                    'login_cd' => $row->DESCRIPTION,
                    'priv_fm' => $row->fileMaintenance,
                    'priv_sub' => $row->subsidiary,
                    'priv_sup' => $row->supplier,
                    'priv_uf' => $row->userFiltering,
                    'priv_swa' => $row->swa,
                    'priv_swaf' => $row->swaForm,
                    'priv_swavo' => $row->swaVo,
                    'priv_swamis' => $row->swaMis,
                    'priv_reports' => $row->swaReports,
                    'priv_per' => $row->per,
                    'priv_pervo' => $row->perVo,
                    'priv_swaacctg' => $row->swaAcctg,
                    'priv_sm' => $row->systemManager,
                    'priv_ut' => $row->userType,
                    'priv_users' => $row->systemUser,
                    'priv_um' => $row->userMenu,
                    'priv_ms' => $row->menuSetting,
                    'priv_utilities' => $row->systemUtilities,  
                    'priv_sw' => $row->systemWallpaper,
                    'priv_as' => $row->aboutSystem,
                    'priv_fi' => $row->fileImport,
                    'logged_in' => true
                );
                $this->session->set_userdata($session_data);
                return 'active_user';
            } else { 
                $session_data = array(
                    'login_id' => $row->ID,
                    'login_name' => $row->USERNAME,
                    'login_empname' => $row->EMP_NAME,
                    'login_empid' => $row->EMP_ID,
                    'login_emppos' => $row->EMP_POS,
                    'login_empdept' => $row->EMP_DEPT,
                    'login_empbu' => $row->EMP_BU,
                    'login_status' => $row->STATUS,
                    'login_image' => $row->EMP_PHOTO,
                    'login_class' => $row->CLASS,
                    'login_pass' => $row->PASSWORD,
                    'login_cd' => $row->DESCRIPTION,
                    'priv_fm' => $row->fileMaintenance,
                    'priv_sub' => $row->subsidiary,
                    'priv_sup' => $row->supplier,
                    'priv_uf' => $row->userFiltering,
                    'priv_swa' => $row->swa,
                    'priv_swaf' => $row->swaForm,
                    'priv_swavo' => $row->swaVo,
                    'priv_swamis' => $row->swaMis,
                    'priv_reports' => $row->swaReports,
                    'priv_per' => $row->per,
                    'priv_pervo' => $row->perVo,
                    'priv_swaacctg' => $row->swaAcctg,
                    'priv_sm' => $row->systemManager,
                    'priv_ut' => $row->userType,
                    'priv_users' => $row->systemUser,
                    'priv_um' => $row->userMenu,
                    'priv_ms' => $row->menuSetting,
                    'priv_utilities' => $row->systemUtilities,  
                    'priv_sw' => $row->systemWallpaper,
                    'priv_as' => $row->aboutSystem,
                    'priv_fi' => $row->fileImport,
                    'logged_in' => true
                );   
                $this->session->unset_userdata($session_data);
                return 'inactive_user';
        }
    }
    }

        public function view_swa_data() 
    {
        $this->db->order_by('CREATION_DATE', 'DESC');
        $this->db->select('swa_tbl.*, sub_tbl.CODE as SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE as SUP_CODE, sup_tbl.NAME');
        $this->db->from('swa_tbl');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
                $query = $this->db->get();
    
        if ($query) {
            return $query->result(); 
        } else {
            return array(); 
        }
    }
    
    public function view_per_data() 
    {
        $this->db->order_by('SWA_ID', 'DESC');
        $this->db->select('per_tbl.*');
        $this->db->from('per_tbl');
                $query = $this->db->get();
    
        if ($query) {
            return $query->result(); 
        } else {
            return array(); 
        }
    } 

    public function get_swa_data($swa_id) 
    {
        
        $this->db->select('swa_tbl.*, swa_tbl.DOCUMENT_DATE, swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME, swa_details_tbl.SWA_QUANTITY, swa_details_tbl.SWA_UNIT, swa_details_tbl.SWA_DESCRIPTION, swa_details_tbl.SWA_UNIT_COST, swa_details_tbl.SWA_AMOUNT');
        $this->db->from('swa_tbl');
        $this->db->join('swa_details_tbl', 'swa_tbl.SWA_ID = swa_details_tbl.SWA_ID', 'left');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
        $this->db->where('swa_tbl.SWA_ID', $swa_id);

        $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }

    public function get_per_data($per_id) 
    {
        $this->db->select('per_tbl.*, per_details_tbl.PER_QUANTITY, per_details_tbl.PER_UNIT, per_details_tbl.PER_ITEM_DESCRIPTION, per_details_tbl.PER_ACTUAL_EXECUTE_QTY, per_details_tbl.PER_UNUSED_ALLOCATION');
        $this->db->from('per_tbl');
        $this->db->join('per_details_tbl', 'per_tbl.PER_ID = per_details_tbl.PER_ID', 'left');
        $this->db->where('per_tbl.PER_ID', $per_id);

        $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }

    public function get_itemfile_data() 
    {
        $this->db->select('item_file_tbl.*');
        $this->db->from('item_file_tbl');
        $query = $this->db->get();
    
        if ($query) {
            return $query->result(); 
        } else {
            return array(); 
        }
    }

    public function per_swa_details() 
    {
        $this->db->distinct();
        $this->db->select('swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME, swa_details_tbl.SWA_QUANTITY, swa_details_tbl.SWA_UNIT, swa_details_tbl.SWA_DESCRIPTION, swa_details_tbl.SWA_UNIT_COST, swa_details_tbl.SWA_AMOUNT, swa_tbl.SWA_PROMO_TITLE, swa_tbl.SWA_PROMO_MECHANICS, swa_tbl.SWA_PROMO_START, swa_tbl.SWA_PROMO_END, swa_tbl.SWA_TRANS_NO1, swa_tbl.SWA_TRANS_NO2, swa_tbl.SWA_TRANS_NO3');
        $this->db->from('swa_tbl');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
        $this->db->join('swa_details_tbl', 'swa_tbl.SWA_ID = swa_details_tbl.SWA_ID', 'left');
        $query = $this->db->get();
    
        if ($query) {
            return $query->result(); 
        } else {
            return array(); 
        }
    }

    public function get_swa_details($swa_id) 
    {
        $this->db->select('swa_details_tbl.*');
        $this->db->from('swa_details_tbl');
        $this->db->where('SWA_ID', $swa_id); 
        $query = $this->db->get();

        if ($query) {
            return $query->result(); 
        } else {
            return array(); 
        }
    }

    public function get_description($class_id) 
    {
        $query = $this->db->get_where('class_tbl', array('CID' => $class_id));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->DESCRIPTION;
        } else {
            return 'Description not found';
        }
    }

      public function get_user_class($user_class_id)
    {
        $this->db->where('CID', $user_class_id);
        $query = $this->db->get('class_tbl');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_swa_sub($sub_id) 
    {
        $this->db->where('ID', $sub_id);
        $query = $this->db->get('sub_tbl');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_swa_sup($sup_id) 
    {
        $this->db->where('ID', $sup_id);
        $query = $this->db->get('sup_tbl');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
   
    function add_swa()
    {
        $loc = ($this->input->post('loc') === 'Others') ? $this->input->post('otherDetails') : $this->input->post('loc');
        $document_date = $this->input->post('document_date');
        $control_no = $this->input->post('control_no');
        // $trans_no = $this->input->post('trans_no');
        $per_no = $this->input->post('per_no');
        // $crfcv_no = $this->input->post('crfcv_no');
        $table_data = $this->input->post('datas');
        $acct_instruct = $this->input->post('acct_instruct');
        $remark = $this->input->post('remark');
        $req_by = $this->input->post('req_by');
        $req_date = $this->input->post('req_date');
        $rev_by = $this->input->post('rev_by');
        $rev_date = $this->input->post('rev_date');
        $app_by = $this->input->post('app_by');
        $app_date = $this->input->post('app_date');
        $rel_by = $this->input->post('rel_by');
        $rel_date = $this->input->post('rel_date');
        $rec_by = $this->input->post('rec_by');
        $rec_date = $this->input->post('rec_date');
        $promo_title = $this->input->post('promo_title');
        $promo_mechanics = $this->input->post('promo_mechanics');
        $promo_start = $this->input->post('promo_start');
        $promo_end = $this->input->post('promo_end');
        $sub_id = $this->input->post('sub_id');
        $sup_id = $this->input->post('sup_id');
        $total_amt = $this->input->post('total');
        

        $sub_data = $this->Admin_model->get_swa_sub($sub_id);
        $sup_data = $this->Admin_model->get_swa_sup($sup_id);
        
        $swa_data = array(
            'SUB_ID' => $sub_id,
            'SUP_ID' => $sup_id,
            'LOCATION' => $loc,
            'SWA_CONTROL_NO' => $control_no,
            'DOCUMENT_DATE' => $document_date,
            'SWA_PER_NO' => $per_no,
            'SWA_ACCOUNTING_INSTRUCT' => $acct_instruct,
            'SWA_REMARK' => $remark,
            'SWA_REQUEST_BY' => $req_by,
            'SWA_REQUEST_BY_DATE' => $req_date,
            'SWA_REVIEW_BY' => $rev_by,
            'SWA_REVIEW_BY_DATE' => $rev_date,
            'SWA_APPROVE_BY' => $app_by,
            'SWA_APPROVE_BY_DATE' => $app_date,
            'SWA_RELEASE_BY' => $rel_by,
            'SWA_RELEASE_BY_DATE' => $rel_date,
            'SWA_RECEIVE_BY' => $rec_by,
            'SWA_RECEIVE_BY_DATE' => $rec_date,
            'SWA_PROMO_TITLE' => $promo_title,
            'SWA_PROMO_MECHANICS' => $promo_mechanics,
            'SWA_PROMO_START' => $promo_start,
            'SWA_PROMO_END' => $promo_end,
            'SWA_TOTAL' => $total_amt
        );
        $this->db->insert('swa_tbl', $swa_data);
        $swa_id = $this->db->insert_id();
        $table_data = $this->input->post('datas');
        $swa_table_data = array();
        
        foreach ($table_data as $row) {
            if (!empty($row['item_code']) || !empty($row['barcode']) || !empty($row['qty']) || !empty($row['unit']) || !empty($row['descript']) || !empty($row['unit_cost']) || !empty($row['amt'])) {
                $swa_table_data[] = array(
                    'SWA_ID' => $swa_id,
                    'SWA_ITEM_CODE' => $row['item_code'],
                    'SWA_BARCODE' => $row['barcode'],
                    'SWA_QUANTITY' => $row['qty'],
                    'SWA_UNIT' => $row['unit'],
                    'SWA_DESCRIPTION' => $row['descript'],
                    'SWA_UNIT_COST' => $row['unit_cost'],
                    'SWA_AMOUNT' => $row['amt'],
                );
            }
        }
        
        if (!empty($swa_table_data)) {
            $this->db->insert_batch('swa_details_tbl', $swa_table_data);
        }
        
        return $swa_id;
        }

    function add_per()
    {
        $control_no = $this->input->post('control_no');
        $misref1 = $this->input->post('mis_ref_1');
        $misref2 = $this->input->post('mis_ref_2');
        $misref3 = $this->input->post('mis_ref_3');
        $sub_code = $this->input->post('sub_code');
        $sub_descript = $this->input->post('sub_descript');
        $promo_title = $this->input->post('promo_title');
        $mechanics = $this->input->post('mechanics');
        $promo_start = $this->input->post('promo_start');
        $promo_end = $this->input->post('promo_end');
        $summary = $this->input->post('per_summary');
        $remarks = $this->input->post('post_promo_remarks');
        $sponsor_code = $this->input->post('sup_code');
        $sponsor_name = $this->input->post('sup_name');
        $sub_by = $this->input->post('sub_by');
        $sub_date = $this->input->post('sub_date');
        $rev_by = $this->input->post('rev_by');
        $rev_date = $this->input->post('rev_date');
        $audit_by = $this->input->post('audit_by');
        $audit_date = $this->input->post('audit_date');
        $note_by = $this->input->post('note_by');
        $note_date = $this->input->post('note_date');
        $swa_id = $this->input->post('swa_series_no');
        $doc_date = $this->input->post('document_date');
        $table_data = $this->input->post('datas');
        
      
        $per_data = array(
           
            'SWA_ID' => $swa_id,
            'PER_SPONSOR_CODE' => $sponsor_code,
            'PER_SPONSOR_NAME' => $sponsor_name,
            'PER_CONTROL_NO' => $control_no,
            'PER_MISREF_NO1' => $misref1,
            'PER_MISREF_NO2' => $misref2,
            'PER_MISREF_NO3' => $misref3,
            'PER_SUMMARY' => $summary,
            'PER_REMARK' => $remarks,
            'SUB_CODE' => $sub_code,
            'SUB_DESCRIPT' => $sub_descript,
            'PER_PROMO_TITLE' => $promo_title,
            'PER_MECHANICS' => $mechanics,
            'PROMO_START' => $promo_start,
            'PROMO_END' => $promo_end,
            'PER_SUBMIT_BY' => $sub_by,
            'PER_SUBMIT_BY_DATE' => $sub_date,
            'PER_REVIEW_BY' => $rev_by,
            'PER_REVIEW_BY_DATE' => $rev_date,
            'PER_AUDIT_BY' => $audit_by,
            'PER_AUDIT_BY_DATE' => $audit_date,
            'PER_NOTE_BY' => $note_by,
            'PER_NOTE_BY_DATE' => $note_date,
            'DOCUMENT_DATE' => $doc_date
        );
        // print_r($per_data);
        $this->db->insert('per_tbl', $per_data);
        $per_id = $this->db->insert_id();
        $table_data = $this->input->post('datas');
        $per_table_data = array();
        
        foreach ($table_data as $row) {
            if (!empty($row['qty']) || !empty($row['unit']) || !empty($row['descript']) || !empty($row['unit_cost']) || !empty($row['amt'])) {
                $per_table_data[] = array(
                    'PER_ID' => $per_id,
                    'PER_QUANTITY' => $row['qty'],
                    'PER_UNIT' => $row['unit'],
                    'PER_ITEM_DESCRIPTION' => $row['descript'],
                    'PER_ACTUAL_EXECUTE_QTY' => $row['actual_qty'],
                    'PER_UNUSED_ALLOCATION' => $row['unused_alloc']
                );
            }
        }
        
        if (!empty($per_table_data)) {
            $this->db->insert_batch('per_details_tbl', $per_table_data);
        }
        
        return $per_id;
    }
    
    public function updatePassword($user_id, $new_password) 
    {
        $this->db->where('ID', $user_id);
        $result = $this->db->update('users_tbl', array('PASSWORD' => $new_password));
        return $result;
    }
        
    public function is_username_taken($username) 
    {
        $query = $this->db->get_where('users_tbl', array('USERNAME' => $username));
        return $query->num_rows() > 0;
    }

    public function is_name_taken($emp_name) 
    {
        $query = $this->db->get_where('users_tbl', array('EMP_NAME' => $emp_name));
        return $query->num_rows() > 0;
    }
    
    public function updateTN($swa_id, $update_data) 
    { 
        $this->db->where('SWA_ID', $swa_id);
        $response = $this->db->update('swa_tbl', $update_data);
        return $response;
    }

    public function updatePrivileges($classId, $privileges) 
    { 
        if (!is_null($privileges) && is_array($privileges)) {
            foreach ($privileges as $privilege => $value) {
                $this->db->set($privilege, $value);
            }
        $this->db->where('CID', $classId);
        return $this->db->update('class_tbl');
        }
    }

    public function get_privilege_data($class_id)
    {
        $this->db->where('CID', $class_id);
        $query = $this->db->get('class_tbl');
        if ($query->num_rows() == 1) { 
            return $query->row();
        } else {
            return false;
        }
    }

    public function view_class_privilege() 
    {
        $result = $this->db->get('class_tbl')->result();
        return $result;
    }

}
