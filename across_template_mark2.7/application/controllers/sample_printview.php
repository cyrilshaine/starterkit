<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample_printview extends CI_Controller {  
//First declare the Name of your controller but make sure the first letter in capialized



public function loadMain(){
$this->load->view("a_pages/sample_printview/sample_printview_main"); //this is the html content that will be loaded first
}


public function loadPdfReport(){ //gets the mpdf generated pdf
$this->load->view("a_pages/sample_printview/sample_printview_printview");
}



}

?>