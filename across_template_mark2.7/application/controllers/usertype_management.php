

<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Usertype_management extends  CI_Controller {

public function loadMain(){
$this->load->view("a_pages/usertype_management/usertype_management_main");	
}

/**********************************************************/

public function loadUsertypeSetlist(){
$this->load->view("a_pages/usertype_management/usertype_management_setlist");	
}


public function usertype_management_save(){
$this->load->view("a_pages/usertype_management/usertype_management_save");	
}

public function usertype_management_delete(){
$this->load->view("a_pages/usertype_management/usertype_management_delete");
}

}

