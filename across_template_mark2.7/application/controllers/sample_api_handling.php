<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample_api_handling extends CI_Controller {  
//First declare the Name of your controller but make sure the first letter in capialized



public function loadMain(){
$this->load->view("a_pages/sample_api_handling/sample_api_handling_main"); //this is the html content that will be loaded first
}

public function get_details_api(){
	$this->load->view("a_pages/sample_api_handling/sample_api_handling_api");
}

}

?>