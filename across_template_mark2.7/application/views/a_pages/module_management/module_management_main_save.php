<?php

$page_name=$this->db->escape_str($_POST['page_name']);
$page_folder_name=$this->db->escape_str($_POST['page_folder_name']);
$seq=$_POST['seq'];


$msg=""; $sql="";


if(trim($page_name)==""){ $msg="Module Name required"; }
else if(trim($page_folder_name)==""){ $msg="Module Alias Required"; }



$id=$this->mainmodel->getMaxId("across_module","moduleId")+1;
$sql.="insert into across_module values('$id','6','$seq','$page_folder_name','$page_name');";


if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;


echo json_encode($a);




?>