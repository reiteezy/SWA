<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

class M_pdf {
    public $pdf;

    public function __construct() {
        $this->pdf = new \Mpdf\Mpdf();
    }
}