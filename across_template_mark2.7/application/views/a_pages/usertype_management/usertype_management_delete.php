<?php

$userTypeId=$_POST['userTypeId'];

$msg=""; $sql="";

$sql.="update across_usertype set remark='0' where userTypeId='$userTypeId';";

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;
echo json_encode($a);




?>