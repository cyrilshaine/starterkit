<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	
	public function index()
	{
		$this->login();
	}
    public function login()
	{
     $this->load->model('mainmodel');
	 $data['title']="Login";	
     $data['extraHeadContent'] = array(
          '<link rel="shortcut icon" href="' . base_url() . 'resources/images/icon.ico"></link>',
          '<link rel="stylesheet" type="text/css" href="'. base_url() .'resources/styles/BS.css"></link>', 
         '<link rel="stylesheet" type="text/css" href="'. base_url() .'resources/styles/system.css"></link>', 
          '<link rel="stylesheet" href="' . base_url() . 'resources/bootstrap/css/bootstrap.css"/>',
          '<link rel="stylesheet" href="' . base_url() . 'resources/bootstrap/css/bootstrap-theme.css"/>',                                        
          '<link rel="stylesheet" type="text/css" href="'. base_url() .'resources/plugins/jqueryui/css/custom/jquery-ui-1.8.13.custom.css"></link>',                      
          '<script type="text/javascript" src="' . base_url() . 'resources/jquery.min.js"></script>',
          '<script type="text/javascript" src="' . base_url() . 'logicfiles/script.js"></script>',		
          '<script type="text/javascript" src="' . base_url() . 'resources/bootstrap/js/bootstrap.min.js"></script>',
		  '<script type="text/javascript"> 
                var URL = "'.base_url().'";
                var cURL = "'.current_url().'";
                var path = "'.APPPATH.'";
                
          </script> ');
     $data['image']="";	
      
     $this->load->view('login/login',$data);
	}



/*
IF YOU NEED TO ADD A CSS OR A JAVASCRIPT LINK JUST INCLUDE ON THE LIST BELOW
*/
     public function links(){
        $data=array(
        '<link rel="shortcut icon" href="' . base_url() . 'resources/images/icon.ico"></link>',
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/styles/BS.css"></link>', 
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/styles/bootstrap-select.css"></link>',        
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/dialog/jquery-ui-themes-1.10.4/themes/jflat/jquery-ui.css"></link>', 
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/styles/system.css"></link>', 
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/styles/system2.css"></link>', 
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/styles/panel.css"></link>',   
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/bootstrap/css/bootstrap.css"/>',
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/bootstrap/css/bootstrap-theme.css"/>',
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/sweetalert/dist/sweetalert.css">',        
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/datatableJSE/datatables.bootstrap.min.css"></link>',
        '<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/toast/toastr.min.css"></link>',

 
        '<script type="text/javascript" src="' . base_url() . 'resources/jquery.min.js"></script>',
        '<script type="text/javascript" src="' . base_url() . 'resources/bootstrap/bootstrap-select.js"></script>',       
        '<script type="text/javascript" src="'.base_url().'resources/dialog/jquery-ui.js"></script>',
        '<script type="text/javascript" src="'.base_url().'resources/dialog/jquery.dialogOptions.js"></script>',
        '<script type="text/javascript" src="' . base_url() . 'resources/sweetalert/dist/sweetalert.min.js"></script>',       
        '<script type="text/javascript" src="' . base_url() . 'resources/bootstrap/js/bootstrap.min.js"></script>',
        '<script type="text/javascript" src="' . base_url() . 'resources/datatableJSE/jquery.dataTables.min.js"></script>', 
        '<script type="text/javascript"  src="' . base_url() . 'resources/datatableJSE/dataTables.bootstrap.min.js"></script>',
        '<script type="text/javascript" charset="utf8" src="' . base_url() . 'resources/datatableJSE/datatables.min.js"></script>',
        '<script type="text/javascript" charset="utf8" src="' . base_url() . 'resources/datatableJSE/jse.tables.js"></script>',
        '<script type="text/javascript" charset="utf8" src="' . base_url() . 'resources/toast/toastr.min.js"></script>',

        '<script type="text/javascript" src="' . base_url() . 'logicfiles/script.js"></script>',
        '<script type="text/javascript" src="' . base_url() . 'logicfiles/methods.js"></script>',
        '<script type="text/javascript" src="' . base_url() . 'resources/uploadz.js"></script>',
        '<script type="text/javascript"> 
                var URL = "'.base_url().'";
                var cURL = "'.current_url().'";
                var path = "'.APPPATH.'";
        </script> ');
     return $data;
    }


/*
THIS FUNCTION IS A CORE FUNCTION IN THE ACROSSMEDIA FRAMEWORK
THE FUNCTION ACCEPTS 2 PARAMETERS
$pageId is the variable uset to represent the pageId in the across_page table located at the database
$accountId is the user account id of the current user using the system
*/
     public function page($pageId,$accountId)
    {
     $this->load->model("mainmodel");
     $pagedata=$this->mainmodel->getSystemPagesDatas($pageId);
     $moduleId=$pagedata[0]['moduleId'];
     $mod=$this->mainmodel->getModuleData($moduleId);
     $pageAlias=$pagedata[0]['pageAlias'];
     $modName=$mod[0]['moduleName'];
     $data['extraHeadContent'] = $this->links();
     $data['headertitle']=$modName;
     $data['subheadertitle']=$pagedata[0]['pageName'];
     $data['title']="Title Here";
     $dat=array('accountId' => $accountId,'pageId' => $pageId );
     $this->session->set_userdata($dat);
     if($this->mainmodel->hasAccess($accountId)){ $this->load->view("a_pages/$pageAlias/$pageAlias",$data); }
     else{ $this->load->view("error_access/no_access",$data); }    
    }

/*
THIS IS THE HOME PAGE NOT INCLUDED IN THE DATABASE TABLE across_page   BUT THIS PAGE IS ESSENTIAL FOR
IT LOADS THE HOME PAGE OR THE PAGE WITH THE DASHBOARD
*/
	 public function home(){
	 $data['extraHeadContent'] =$this->links();
     $data['headertitle']="Home";
     $data['subheadertitle']="Control Panel";
	 $data['title']="Title Here";    
	 $this->load->view('home/home',$data);
    }

 
}