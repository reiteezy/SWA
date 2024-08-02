<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Insert activity into the database
    public function add_activity($description) {
        $data = array(
            'description' => $description,
        );
        return $this->db->insert('activities', $data);
    }

    // Get recent activities from the database
    public function get_recent_activities($limit = 10) {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('activities', $limit);
        return $query->result();
    }
}
?>
