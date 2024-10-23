<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swa_model extends CI_Model 
{ 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    public function get_nesa($vendor_filter, $start_date, $end_date) 
    {
        $this->db->order_by('nesa_id', 'DESC');
        $this->db->select('nesa_tbl.*');
        $this->db->from('nesa_tbl');
        $this->db->like('sup_code', $vendor_filter);
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('document_date >=', $start_date);
            $this->db->where('document_date <=', $end_date);
        }

        $query = $this->db->get();
        return $query->result_array(); 
       
    }

    public function get_nesa_vendor($vendor_code) 
    {
        $this->db->select('nesa_tbl.nesa_id, nesa_tbl.sup_code');
        $this->db->from('nesa_tbl');
        $this->db->like('sup_code', $vendor_code);
        $this->db->group_by('nesa_tbl.nesa_id, nesa_tbl.sup_code');

        $query = $this->db->get();
        return $query->result_array(); 
       
    }


    public function get_swa() 
    {
        $this->db->order_by('SWA_ID', 'DESC');
        $this->db->select('swa_tbl.*, sub_tbl.CODE as SUB_CODE,  sub_tbl.DESCRIPTION');
        // $this->db->select('swa_tbl.*, sub_tbl.CODE as SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE as SUP_CODE, sup_tbl.NAME');
        $this->db->from('swa_tbl');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        // $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');

        $query = $this->db->get();
        return $query->result_array(); 
       
    }
    

    public function get_per() 
    {
        $this->db->order_by('PER_ID', 'DESC');
        $this->db->select('per_tbl.*');
        $this->db->from('per_tbl');
        $query = $this->db->get();

        return $query->result_array(); 
    } 


    public function get_nesa_data($nesa_id) 
    {
        $this->db->select('nesa_tbl.*, nesa_details_tbl.item_code, nesa_details_tbl.item_descript, nesa_details_tbl.uom, nesa_details_tbl.qty, nesa_details_tbl.expiry'); 
        $this->db->from('nesa_tbl');
        $this->db->join('nesa_details_tbl', 'nesa_tbl.nesa_id = nesa_details_tbl.nesa_id', 'left');
        $this->db->where('nesa_tbl.nesa_id', $nesa_id);
        $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }

    public function get_swa_data($swa_id) 
    {
        $this->db->select('swa_tbl.*, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION as DESCRIPTION, swa_details_tbl.SWA_QUANTITY, swa_details_tbl.SWA_UNIT, swa_details_tbl.SWA_DESCRIPTION, swa_details_tbl.SWA_UNIT_COST, swa_details_tbl.SWA_AMOUNT');
        // $this->db->select('swa_tbl.*, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION as DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME, sup_tbl.NAME, swa_details_tbl.SWA_QUANTITY, swa_details_tbl.SWA_UNIT, swa_details_tbl.SWA_DESCRIPTION, swa_details_tbl.SWA_UNIT_COST, swa_details_tbl.SWA_AMOUNT');
        $this->db->from('swa_tbl');
        $this->db->join('swa_details_tbl', 'swa_tbl.SWA_ID = swa_details_tbl.SWA_ID', 'left');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        // $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
        $this->db->where('swa_tbl.SWA_ID', $swa_id);
        $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }

    
    public function get_nesa_signatories_data($nesa_id) 
    {
        $this->db->select('nesa_tbl.sub_by, nesa_tbl.sub_date, nesa_tbl.sub_time, nesa_tbl.check_by, nesa_tbl.check_date, nesa_tbl.check_time, nesa_tbl.rev_by, nesa_tbl.rev_date, nesa_tbl.rev_time, nesa_tbl.app_by, nesa_tbl.app_date, nesa_tbl.app_time, nesa_tbl.rec_by, nesa_tbl.rec_date, nesa_tbl.rec_time');
        $this->db->from('nesa_tbl');
        $this->db->where('nesa_tbl.nesa_id', $nesa_id);
        $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }

    public function get_swa_signatories_data($swa_id) 
    {
        $this->db->select('swa_tbl.SWA_REQUEST_BY, swa_tbl.SWA_REQUEST_BY_DATE, swa_tbl.SWA_REVIEW_BY, swa_tbl.SWA_REVIEW_BY_DATE, swa_tbl.SWA_APPROVE_BY, swa_tbl.SWA_APPROVE_BY_DATE, swa_tbl.SWA_RELEASE_BY, swa_tbl.SWA_RELEASE_BY_DATE, ,swa_tbl.SWA_RECEIVE_BY, swa_tbl.SWA_RECEIVE_BY_DATE');
        $this->db->from('swa_tbl');
        $this->db->where('swa_tbl.SWA_ID', $swa_id);
        $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }

    public function get_per_signatories_data($per_id) 
    {
        $this->db->select('per_tbl.PER_SUBMIT_BY, per_tbl.PER_SUBMIT_BY_DATE, per_tbl.PER_REVIEW_BY, per_tbl.PER_REVIEW_BY_DATE, per_tbl.PER_AUDIT_BY, per_tbl.PER_AUDIT_BY_DATE, per_tbl.PER_NOTE_BY, per_tbl.PER_NOTE_BY_DATE');
        $this->db->from('per_tbl');
        $this->db->where('per_tbl.PER_ID', $per_id);
        $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }

    public function get_promo_data($swa_id) 
    {
        $this->db->select('swa_tbl.SWA_PROMO_TITLE, swa_tbl.SWA_PROMO_MECHANICS, swa_tbl.SWA_PROMO_START, swa_tbl.SWA_PROMO_END');
        $this->db->from('swa_tbl');
        $this->db->where('swa_tbl.SWA_ID', $swa_id);
        $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }


    public function get_swa_daterange($start_date, $end_date) 
    {
        $this->db->select('swa_tbl.*, swa_tbl.DOCUMENT_DATE, swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION');
        // $this->db->select('swa_tbl.*, swa_tbl.DOCUMENT_DATE, swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME');
        $this->db->from('swa_tbl');
        // $this->db->join('swa_details_tbl', 'swa_tbl.SWA_ID = swa_details_tbl.SWA_ID', 'left');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        // $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
        $this->db->where('swa_tbl.DOCUMENT_DATE >=', $start_date);
        $this->db->where('swa_tbl.DOCUMENT_DATE <=', $end_date);

        $query = $this->db->get();
        return $query->result_array();
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
        $this->db->select('swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION, swa_details_tbl.SWA_QUANTITY, swa_details_tbl.SWA_UNIT, swa_details_tbl.SWA_DESCRIPTION, swa_details_tbl.SWA_UNIT_COST, swa_details_tbl.SWA_AMOUNT, swa_tbl.SWA_PROMO_TITLE, swa_tbl.SWA_PROMO_MECHANICS, swa_tbl.SWA_PROMO_START, swa_tbl.SWA_PROMO_END, swa_tbl.SWA_TRANS_NO1, swa_tbl.SWA_TRANS_NO2, swa_tbl.SWA_TRANS_NO3');
        // $this->db->select('swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME, swa_details_tbl.SWA_QUANTITY, swa_details_tbl.SWA_UNIT, swa_details_tbl.SWA_DESCRIPTION, swa_details_tbl.SWA_UNIT_COST, swa_details_tbl.SWA_AMOUNT, swa_tbl.SWA_PROMO_TITLE, swa_tbl.SWA_PROMO_MECHANICS, swa_tbl.SWA_PROMO_START, swa_tbl.SWA_PROMO_END, swa_tbl.SWA_TRANS_NO1, swa_tbl.SWA_TRANS_NO2, swa_tbl.SWA_TRANS_NO3');
        $this->db->from('swa_tbl');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        // $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
        $this->db->join('swa_details_tbl', 'swa_tbl.SWA_ID = swa_details_tbl.SWA_ID', 'left');
        $query = $this->db->get();
    
        if ($query) {
            return $query->result(); 
        } else {
            return array(); 
        }
    }

    public function get_nesa_details($nesa_id) 
    {
        $this->db->select('nesa_details_tbl.*');
        $this->db->from('nesa_details_tbl');
        $this->db->where('nesa_id', $nesa_id); 
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

    
    public function get_per_details($per_id) 
    {
        $this->db->select('per_details_tbl.*');
        $this->db->from('per_details_tbl');
        $this->db->where('PER_ID', $per_id); 
        $query = $this->db->get();

        if ($query) {
            return $query->result(); 
        } else {
            return array(); 
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


    function add_nesa()
    {
        $loc = $this->input->post('nesa_location');
        $document_date = $this->input->post('nesa_date');
        $control_no = $this->input->post('control_no');
        $course_of_action = $this->input->post('course_of_action');
        $sub_by = $this->input->post('sub_by');
        $sub_date = $this->input->post('sub_date');
        $sub_time = $this->input->post('sub_time');
        $check_by = $this->input->post('check_by');
        $check_date = $this->input->post('check_date');
        $check_time = $this->input->post('check_time');
        $rev_by = $this->input->post('rev_by');
        $rev_date = $this->input->post('rev_date');
        $rev_time = $this->input->post('rev_time');
        $app_by = $this->input->post('app_by');
        $app_date = $this->input->post('app_date');
        $app_time = $this->input->post('app_time');
        $rec_by = $this->input->post('rec_by');
        $rec_date = $this->input->post('rec_date');
        $rec_time = $this->input->post('rec_time');
        $sup_code = $this->input->post('sup_code');
        $sup_name = $this->input->post('sup_name');

        
        $nesa_data = array(
            'location' => $loc,
            'document_date' => $document_date,
            'nesa_id' => $control_no,
            'course_of_action' => $course_of_action,
            'sub_by' => $sub_by,
            'sub_date' => $sub_date,
            'sub_time' => $sub_time,
            'check_by' => $check_by,
            'check_date' => $check_date,
            'check_time' => $check_time,
            'rev_by' => $rev_by,
            'rev_date' => $rev_date,
            'rev_time' => $rev_time,
            'app_by' => $app_by,
            'app_date' => $app_date,
            'app_time' => $app_time,
            'rec_by' => $rec_by,
            'rec_date' => $rec_date,
            'rec_time' => $rec_time,
            'sup_code' => $sup_code,
            'sup_name' => $sup_name
        );
        $this->db->insert('nesa_tbl', $nesa_data);
        $nesa_id = $this->db->insert_id();
        $table_data = $this->input->post('datas');
        $nesa_table_data = array();
        
        foreach ($table_data as $row) {
            if (!empty($row['item_code']) || !empty($row['item_descript']) || !empty($row['unit']) || !empty($row['unit_cost']) || !empty($row['qty']) || !empty($row['expiry'])) {
                $nesa_table_data[] = array(
                    'nesa_id' => $nesa_id,
                    'item_code' => $row['item_code'],
                    'item_descript' => $row['item_descript'],
                    'uom' => $row['unit'],
                    'unit_cost' => $row['unit_cost'],
                    'qty' => $row['qty'],
                    'expiry' => $row['expiry']
                );
            }
        }
        
        if (!empty($nesa_table_data)) {
            $this->db->insert_batch('nesa_details_tbl', $nesa_table_data);
        }
        
        return $nesa_id;
        }


   
    function add_swa()
    {
        $loc = $this->input->post('loc');
        $document_date = $this->input->post('document_date');
        // $control_no = $this->input->post('control_no');
        // $trans_no = $this->input->post('trans_no');
        $per_no = $this->input->post('per_no');
        // $crfcv_no = $this->input->post('crfcv_no');
        // $table_data = $this->input->post('datas');
        $acct_instruct = $this->input->post('acct_instruct');
        $remark = $this->input->post('remark');
        $req_by = $this->input->post('swa_req_by');
        $req_date = $this->input->post('swa_req_date');
        $rev_by = $this->input->post('swa_rev_by');
        $rev_date = $this->input->post('swa_rev_date');
        $app_by = $this->input->post('swa_app_by');
        $app_date = $this->input->post('swa_app_date');
        $rel_by = $this->input->post('swa_rel_by');
        $rel_date = $this->input->post('swa_rel_date');
        $rec_by = $this->input->post('swa_rec_by');
        $rec_date = $this->input->post('swa_rec_date');
        $promo_title = $this->input->post('promo_title');
        $promo_mechanics = $this->input->post('promo_mechanics');
        $promo_start = $this->input->post('promo_start');
        $promo_end = $this->input->post('promo_end');
        $sub_id = $this->input->post('sub_id');
        // $sup_id = $this->input->post('sup_id');
        $total_amt = $this->input->post('total');
        $sup_code = $this->input->post('swa_sup_code');
        $sup_name = $this->input->post('swa_sup_name');

        $sub_data = $this->Admin_model->get_swa_sub($sub_id);
        // $sup_data = $this->Admin_model->get_swa_sup($sup_id);
        
        $swa_data = array(
            'SUB_ID' => $sub_id,
            // 'SUP_ID' => $sup_id,
            'SUP_CODE' => $sup_code,
            'SUP_NAME' => $sup_name,
            'LOCATION' => $loc,
            // 'SWA_CONTROL_NO' => $control_no,
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
        // var_dump($table_data);
        // exit;
        $swa_table_data = array();
        
        foreach ($table_data as $row) {
            if (!empty($row['item_code']) || !empty($row['qty']) || !empty($row['uom']) || !empty($row['item_desript']) || !empty($row['unit_cost']) || !empty($row['total_amount'])) {
                $swa_table_data[] = array(
                    'SWA_ID' => $swa_id,
                    'SWA_ITEM_CODE' => $row['item_code'],
                    // 'SWA_BARCODE' => $row['barcode'],
                    'SWA_QUANTITY' => $row['qty'],
                    'SWA_UNIT' => $row['uom'],
                    'SWA_DESCRIPTION' => $row['item_descript'],
                    'SWA_UNIT_COST' => $row['unit_cost'],
                    'SWA_AMOUNT' => $row['total_amount'],
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

        // print_r($this->input->post());
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
        
        // print_r($misref1);
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
        $update_swa_per = array(
            'SWA_PER_NO' => $per_id
        );
        $this->db->where('SWA_ID', $swa_id);
        $this->db->update('swa_tbl', $update_swa_per);
        
        return $per_id;
    }

    public function updateTN($swa_id, $update_data) 
    { 
        $this->db->where('SWA_ID', $swa_id);
        $response = $this->db->update('swa_tbl', $update_data);
        return $response;
    }

    public function increment_print_count($swa_id)
    {
        $this->db->set('PRINT_COUNT', 'PRINT_COUNT + 1', FALSE);
        $this->db->where('SWA_ID', $swa_id);
        $this->db->update('swa_tbl');
    }

    public function increment_print_countper($per_id)
    {
        $this->db->set('PRINT_COUNT', 'PRINT_COUNT + 1', FALSE);
        $this->db->where('PER_ID', $per_id);
        $this->db->update('per_tbl');
    }

}