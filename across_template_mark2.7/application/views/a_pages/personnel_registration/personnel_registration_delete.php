<?php
$pid=$_POST['pid'];


$sql=""; $msg="";
/* conditions or validations here */
$q=$this->db->query("select * from across_p_user_account where pid='$pid' and remark='1'");
if($q->num_rows()>0){ $msg="Cannot be deleted"; }


$sql.="update across_p_person set remark='0' where pid='$pid';";
$sql.="update across_p_personnel set remark='0' where pid='$pid';";

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;
echo json_encode($a);
?>