<?php
$moduleid=$_POST['moduleid'];
$page_name=$this->db->escape_str($_POST['page_name']);
$page_folder_name=$this->db->escape_str($_POST['page_folder_name']);
$seq=$_POST['seq'];


$msg=""; $sql="";


if(trim($page_name)==""){ $msg="Page Name required"; }
else if(trim($page_folder_name)==""){ $msg="Page Folder name Required"; }



$id=$this->mainmodel->getMaxId("across_page","pageId")+1;


$q=$this->db->query("select * from across_page where pageAlias like '$page_folder_name'");
if($q->num_rows()==0){
$sql.="insert into across_page values('$id','$moduleid','$seq','$page_folder_name','$page_name');";
}
else{
	$msg="Try another folder name, folder name already exist";
}






if($msg==""){
$directoryName = './application/views/a_pages/'.$page_folder_name;
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755, true);

}


$my_file = $directoryName."/".$page_folder_name.".php";
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

$data = '
<?php $this->load->view("main"); ?>
<script type="text/javascript">
SYS.ready(function(){ Startup(); });
function Startup(){
var user_eid=$("#user_person_id").val();
var user_accountId=$("#accountid").val();
var link=URL+"index.php/'.$page_folder_name.'/loadMain";
var contentname="#content";
SYS_redirect(link,contentname,user_eid,user_accountId);
}
</script>
';

fwrite($handle, $data);





$j_file = $directoryName."/a_js.php";
$handlej = fopen($j_file, 'w') or die('Cannot open file:  '.$j_file);

$dataj = '
<script type="text/javascript">

/* Start your Javascript Code Here */

</script>
';

fwrite($handlej, $dataj);





$css_file = $directoryName."/a_css.php";
$handlecss = fopen($css_file, 'w') or die('Cannot open file:  '.$css_file);

$datacss = '
<style type="text/css">
#t_header{ width:100%; background:#1278BC; }
#t_content{ width:100%; padding:1%; font-size: 13px;  }
#t_header button{ font-size:12px; font-weight:bold; background:#1278BC; }

.col1{ float:left; width:50%; }
.col2{ float:left; width:50%;}
@media (max-width:1000px){
.col1{ width:100%; }
.col2{ width:100%;}	
}
#sys_mainbody{ padding:2%; font-size:12px; margin-top:1%; }
#sys_mainbody .row{ margin-bottom:1%;}
#sys_mainbody .row select,#sys_mainbody .row textarea,#sys_mainbody .row input{ width: 100%; font-size:13px; }
#sys_mainbody .row label{ margin-top:4%;}
</style>
';

fwrite($handlecss, $datacss);














$m_file = $directoryName."/".$page_folder_name."_main.php";
$handlem = fopen($m_file, 'w') or die('Cannot open file:  '.$m_file);

$datam = '
<?php $this->load->view("a_pages/'.$page_folder_name.'/a_js"); $this->load->view("a_pages/'.$page_folder_name.'/a_css");  ?>

< YOUR CODE HERE >

';

fwrite($handlem, $datam);



























$c_file = './application/controllers/'.$page_folder_name.'.php';
$controller = fopen($c_file, 'w') or die('Cannot open file:  '.$c_file);

$data1 = '

<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class '.ucfirst($page_folder_name).' extends  CI_Controller {

public function loadMain(){
$this->load->view("a_pages/'.$page_folder_name.'/'.$page_folder_name.'_main");	
}

/**********************************************************/


/*  CREATE YOUT CODE HERE */




}

';
fwrite($controller, $data1);

}



































if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;


echo json_encode($a);




?>