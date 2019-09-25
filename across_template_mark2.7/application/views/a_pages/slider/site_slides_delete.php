<?php
$id=$_POST['id'];


$sql=""; $msg="";
/* conditions or validations here */

if($msg==""){ 
$sql.="update across_site_slider set remark='0' where id='$id';";
$this->mainmodel->database_update1($sql); 
}

$a['msg']=$msg;
echo json_encode($a);
?>