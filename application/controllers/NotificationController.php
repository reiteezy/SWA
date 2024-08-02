<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Notification_model');
    }

    public function get_unread_notifications() {
        $notifications = $this->Notification_model->get_unread_notifications();
        echo json_encode($notifications);
    }

    // public function get_mis_notifications() {
    //     $notifications = $this->Notification_model->get_mis_notifications();
    //     echo json_encode($notifications);
    // }

    // public function get_accounting_notifications() {
    //     $notifications = $this->Notification_model->get_accounting_notifications();
    //     echo json_encode($notifications);
    // }

    public function get_swa_notifications() {
        $notifications = $this->Notification_model->get_swa_notifications();
        echo json_encode($notifications);
    }

    public function get_per_notifications() {
        $notifications = $this->Notification_model->get_per_notifications();
        echo json_encode($notifications);
    }


    public function mark_as_read($notification_id) {
        $this->Notification_model->delete_old_notifications();
        $response = $this->Notification_model->mark_as_read($notification_id);
        if ($response) {
            $result = array('status' => 'success', 'message' => 'Notification marked as read.');
        } else {
            $result = array('status' => 'error', 'message' => 'Failed to mark notification as read.');
        }
    
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
    
}
