<?php
$userTypeId=$_POST['userTypeId'];
$pageId=(empty($_POST['pageId']))?array():$_POST['pageId'];
$view=(empty($_POST['view']))?array():$_POST['view'];
$add=(empty($_POST['add']))?array():$_POST['add'];
$edit=(empty($_POST['edit']))?array():$_POST['edit'];
$del=(empty($_POST['del']))?array():$_POST['del'];
$sql="";
$id=$this->mainmodel->getMaxId("across_account_type_template","pageTemplateId");

 for($x=0;$x<count($pageId);$x++)
 {
  $q=$this->db->query("select * from across_account_type_template where userTypeId='$userTypeId' and pageId='$pageId[$x]'");
  if($q->num_rows()==0)
  {
  $id+=1;
  $sql.="insert into across_account_type_template values('$id','$userTypeId','$pageId[$x]','$view[$x]','$add[$x]','$edit[$x]','$del[$x]');";   
  }
  else
  {
  $r=$q->result_array();
  $pageTemplateId=$r[0]['pageTemplateId'];
  $sql.="update across_account_type_template set aview='$view[$x]',aadd='$add[$x]',aedit='$edit[$x]',adelete='$del[$x]' where pageTemplateId='$pageTemplateId';";	
  }	
}



$msg="";

$result=$this->mainmodel->database_update($sql);
if($result==false){ $msg="Database not Updated"; }
$a['msg']=$msg;
echo json_encode($a);
?>