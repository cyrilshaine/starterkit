<?php
$mode=$_POST['mode'];
$userTypeId=$_POST['userTypeId'];
$user_type=$this->db->escape_str($_POST['user_type']);
$usercateg=$_POST['usercateg'];
$ranking=$_POST['ranking'];


$msg=""; $sql="";

if(trim($user_type)==""){ $msg="User Type is required"; }

if($mode=='add'){

$id=$this->mainmodel->getMaxId("across_usertype","userTypeId")+1;
$sql.="insert into across_usertype values('$id','$user_type','$usercateg','$ranking','1');";

}
else if($mode=="edit"){
$sql.="update across_usertype set user_type='$user_type',usercateg='$usercateg',ranking='$ranking' where userTypeId='$userTypeId';";	
}



if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;

echo json_encode($a);


?>