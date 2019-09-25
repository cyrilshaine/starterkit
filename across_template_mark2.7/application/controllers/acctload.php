<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acctload extends CI_Controller {

/*Login*/
public function loadLoginProcess(){
$this->load->view("login/loginprocess");
}

public function loadLogoutProcess(){
$this->load->view("login/logout_process");	
}
public function loadLoginProcessOverwrite(){
$this->load->view("login/logout_process_backup");	
}
public function loadSidebar(){
$this->load->view("a_parts/sidebar");	
}
/* Home */
public function loadHomeMain(){
$this->load->view("home/home_main");	
}

/* Page template */
public function loadPagetemplateMain(){
$this->load->view("a_pages/page_template/page_template_main");
}
public function loadPageTemplateList(){
$this->load->view("a_pages/page_template/page_template_list");	
}
public function loadPageTemplateSave(){
$this->load->view("a_pages/page_template/page_template_save");		
}
public function loadPageTemplateUpdateAuthorization(){
$this->load->view("a_pages/page_template/page_template_UpdateAuthorization");	   
}

/* Page Authorization */
public function loadPageAuthorizationMain(){
$this->load->view("a_pages/page_authorization/page_authorization_main");	
}
public function loadPageAuthorizationList(){
$this->load->view("a_pages/page_authorization/page_authorization_list");	
}
public function loadPageAuthorizationSave(){
$this->load->view("a_pages/page_authorization/page_authorization_save");
}


/* Page Management*/
public function loadPageManagementMain(){
$this->load->view("a_pages/page_management/page_management_main");	
}
public function loadpagemanagementContent(){
$this->load->view("a_pages/page_management/page_management_main_content");		
}
public function loadPageManagementSave(){
$this->load->view("a_pages/page_management/page_management_main_save");	
}
public function loadDeletePage(){
$this->load->view("a_pages/page_management/page_management_main_delete");	
}
public function loadUpdatepageDetails(){
$this->load->view("a_pages/page_management/page_management_main_update");	
}


public function createfolder(){
$this->load->view("a_pages/page_management/page_management_test");	
}




/*Module Management*/
public function loadModuleManagementMain(){
$this->load->view("a_pages/module_management/module_management_main");

}
public function loadmenumanagementContent(){
$this->load->view("a_pages/module_management/module_management_main_content");	
}
public function loadUpdatemoduleDetails(){
$this->load->view("a_pages/module_management/module_management_main_update");	
}
public function loadModuleManagementSave(){
$this->load->view("a_pages/module_management/module_management_main_save");	
}
public function loadDeleteModule(){
$this->load->view("a_pages/module_management/module_management_main_remove");

}






/*User profile */
public function loadUserProfileMain(){
$this->load->view("a_pages/user_profile/user_profile_main");	
}
public function loadUserProfileContent(){
$this->load->view("a_pages/user_profile/user_profile_main_content");	
}






/************************************************************************************************************************/
/* Optiontags */
public function loadPerson_by_usertypeOpt(){
$this->load->view("optiontags/persons_by_usertype_options");	
}
public function loadPerson_Opt(){
$this->load->view("optiontags/person_options");	
}
public function loadUserTypes(){
$this->load->view("optiontags/user_type_options");	
}



/*******************************CORE IMAGE UPLOAD*****************************************************************************************/
/* Image Upload */
public function loadUploadImage(){
$this->load->view("upload_image/uploadimage");   	
}
public function loadImagePic(){
 $this->load->view("upload_image/getImagebyId");
}
public function loadImageChange()
{ 
$this->load->view("upload_image/ChangePersonImage");    
}

/************************************************************************************************************************/
/**********************************       YOUR MAIN CONTROLLERS STARTS HERE    ******************************************/

/*Module Name => Personnel Information*/
public function loadPersonnelRegistrationMain(){
$this->load->view("a_pages/personnel_registration/personnel_registration_main");	
}
public function loadPersonnelRegistrationForm(){
$this->load->view("a_pages/personnel_registration/personnel_registration_form");	
}
public function loadPersonnelRegistrationSave(){
$this->load->view("a_pages/personnel_registration/personnel_registration_save");	
}
public function loadPersonnelRefistrationList(){
$this->load->view("a_pages/personnel_registration/personnel_registration_list");	
}
public function loadPersonnelRegistrationDelete(){
$this->load->view("a_pages/personnel_registration/personnel_registration_delete");	
}



/*Module Name => Personnel Login Account*/
public function loadPersonnelAccountMain(){
$this->load->view("a_pages/personnel_login_account/personnel_login_account_main");	
}
public function loadPersonnelLoginaccountForm(){
$this->load->view("a_pages/personnel_login_account/personnel_login_account_form");	
}
public function loadPersonLoginAccountSave(){
$this->load->view("a_pages/personnel_login_account/personnel_login_account_save");	
}
public function loadPersonnelLoginAccountList(){
$this->load->view("a_pages/personnel_login_account/personnel_login_account_list");	
}
public function loadPersonnelLoginChangeStatus(){
$this->load->view("a_pages/personnel_login_account/personnel_login_account_changeStatus");	
}
public function loadPersonnelPersonnelLoginAccountDelete()
{
$this->load->view("a_pages/personnel_login_account/personnel_login_account_delete");	
}






}