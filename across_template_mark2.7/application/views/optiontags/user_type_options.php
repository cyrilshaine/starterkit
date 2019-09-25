<?php
$user_usertypeId=$_POST['usertypeId'];

//$this->mainmodel->userType_data($user_userTypeId);

$r=$this->mainmodel->userType_list($user_usertypeId);
$opt="";
for($x=0;$x<count($r);$x++)
{
$id=$r[$x]['userTypeId'];
$name=ucwords($r[$x]['user_type']);	
$opt.="<option value='$id'> $name </option>";	
}
echo $opt;
?>