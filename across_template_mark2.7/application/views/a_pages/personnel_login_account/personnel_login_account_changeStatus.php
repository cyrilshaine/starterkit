<?php
$accountid=$_POST['accountid'];
$acct=$this->mainmodel->getAccoutDatas($accountid);
$status=$acct[0]['status'];
$sql="";

$new_status=($status==1)?0:1;
$new_statdesc=($status==1)?"<span class='text-warning'><b>INACTIVE</b></span>":"<span class='text-success'><b>ACTIVE</b></span>";


$sql.="update across_p_user_account set status='$new_status' where accountid='$accountid';";

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['status_desc']=$new_statdesc;
echo json_encode($a);
?>