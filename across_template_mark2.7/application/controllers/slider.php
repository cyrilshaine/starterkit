

<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Slider extends  CI_Controller {

public function loadMain(){
$this->load->view("a_pages/slider/slider_main");	
}

/**********************************************************/

public function loadsite_slides_save(){
$this->load->view("a_pages/slider/site_slides_save");	
}
public function loadSiteSlidesListApi(){
$this->load->view("a_pages/slider/site_slides_list_api");	
}
public function loadSiteSiledeDelete(){
$this->load->view("a_pages/slider/site_slides_delete");	
}


public function loadSetlist(){
$this->load->view("a_pages/slider/slider_setlist");		
}



public function loadFileData_api(){
$this->load->view("a_pages/slider/file_data");	
}
public function loadSiteUploadfile(){
$this->load->view("a_pages/slider/file_upload");	
}
}

