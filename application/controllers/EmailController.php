<?php
class EmailController extends CI_Controller {

public function __construct() {
    parent::__construct();
    // Load any necessary libraries or models here
}

public function sendEmail() {
    // Get form data
    $from = $this->input->post('composeFrom'); // From email address
    $to = $this->input->post('composeTo'); // To email address
    $cc = $this->input->post('composeCc'); // CC email address
    $bcc = $this->input->post('composeBcc'); // BCC email address
    $subject = $this->input->post('composeSubject'); // Email subject
    $message = $this->input->post('message'); // Email message (HTML content)

    // Set headers
    $headers = "From: $from\r\n";
    if (!empty($cc)) {
        $headers .= "Cc: $cc\r\n";
    }
    if (!empty($bcc)) {
        $headers .= "Bcc: $bcc\r\n";
    }
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n"; // For HTML content

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Email sent successfully!";
    } else {
        // Failed to send email
        echo "Email sending failed.";
    }
}
}
