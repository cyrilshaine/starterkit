<?php
$moduleid=$_POST['moduleid'];
$modulename=$_POST['modulename'];
$moduleAlias=$_POST['moduleAlias'];
$seq=$_POST['seq'];




$msg=""; $sql="";


$sql.="update across_module set moduleOrder='$seq',moduleAlias='$moduleAlias',moduleName='$modulename' where moduleId='$moduleid';";

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;
echo json_encode($a);
?>