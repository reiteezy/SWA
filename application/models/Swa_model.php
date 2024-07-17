<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swa_model extends CI_Model 
{ 
  
	function __construct() 
    { 
        parent::__construct(); 
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
        
        $this->db->select('swa_tbl.*, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION as DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME, sup_tbl.NAME, swa_details_tbl.SWA_QUANTITY, swa_details_tbl.SWA_UNIT, swa_details_tbl.SWA_DESCRIPTION, swa_details_tbl.SWA_UNIT_COST, swa_details_tbl.SWA_AMOUNT');
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
        $this->db->select('swa_tbl.*, swa_tbl.DOCUMENT_DATE, swa_tbl.SWA_ID, sub_tbl.CODE AS SUB_CODE, sub_tbl.DESCRIPTION, sup_tbl.CODE AS SUP_CODE, sup_tbl.NAME');
        $this->db->from('swa_tbl');
        // $this->db->join('swa_details_tbl', 'swa_tbl.SWA_ID = swa_details_tbl.SWA_ID', 'left');
        $this->db->join('sub_tbl', 'swa_tbl.SUB_ID = sub_tbl.ID', 'left');
        $this->db->join('sup_tbl', 'swa_tbl.SUP_ID = sup_tbl.ID', 'left');
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
        
        return $per_id;
    }

    public function updateTN($swa_id, $update_data) 
    { 
        $this->db->where('SWA_ID', $swa_id);
        $response = $this->db->update('swa_tbl', $update_data);
        return $response;
    }

}