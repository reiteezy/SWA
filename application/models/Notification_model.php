<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_notification($notification_data) {
        $data = array(
            'message' => $notification_data['message'],
            'header' => $notification_data['header'],
            'target_url' => $notification_data['target_url'],
            'is_read' => 0
        );
        return $this->db->insert('notifications_tbl', $data);
    }

    public function get_unread_notifications() {
        $this->db->where('is_read', 0);
        $query = $this->db->get('notifications_tbl');
        return $query->result();
    }

    public function mark_as_read($notification_id) {
        $this->db->where('id', $notification_id);
        return $this->db->update('notifications_tbl', array('is_read' => 1));
    }

    public function delete_old_notifications() {
        $one_week_ago = date('Y-m-d H:i:s', strtotime('-1 day'));
        log_message('debug', 'Deleting notifications older than: ' . $one_week_ago);
        
        $this->db->where('created_at <', $one_week_ago);
        $this->db->delete('notifications_tbl');
        
        $deleted_rows = $this->db->affected_rows();
        log_message('debug', 'Number of deleted rows: ' . $deleted_rows);
        
        return $deleted_rows > 0;
    }

}