<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }
 
    // fungsi cetak pdf
    public function cetakpdf(){
     //load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
       // retrieve data from model
        //$data['all_itemreport'] = $this->itemreport->get_items();
        //$data['title'] = "items";
        ini_set('memory_limit', '256M'); 
       // boost the memory limit if it's low ;)
        $html = "<html><h1>This is test pdf</h1></html>";
       // render the view into HTML
        $pdf->allow_charset_conversion=true;  // Set by default to TRUE
        $pdf->charset_in='UTF-8';
        $pdf->autoLangToFont = true;
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I'); // save to file because we can
        exit();
}
}