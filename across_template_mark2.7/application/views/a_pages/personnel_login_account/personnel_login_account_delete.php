<?php
$accountid=$_POST['accountid'];


$sql=""; $msg="";
/* conditions or validations here */

$sql.="update across_p_user_account set remark='0' where accountid='$accountid';";

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;
echo json_encode($a);
?>