<?php

$pageid=$_POST['pageid'];

$msg=""; $sql="";

$sql.="delete from across_page where pageId='$pageid';";

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;


echo json_encode($a);






?>