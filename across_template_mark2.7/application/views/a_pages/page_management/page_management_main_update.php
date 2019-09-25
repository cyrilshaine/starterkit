<?php
$pageid=$_POST['pageid'];
$pagename=$_POST['pagename'];
$pagefoldername=$_POST['pagefoldername'];
$seq=$_POST['seq'];

$msg=""; $sql="";


$sql.="update across_page set pageOrder='$seq',pageAlias='$pagefoldername',pageName='$pagename' where pageId='$pageid';";

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;
echo json_encode($a);
?>