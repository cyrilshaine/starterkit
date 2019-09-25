<?php
$userTypeId=$_POST['userTypeId']; $pid=$_POST['pid'];

$acntId=$this->mainmodel->getAccountId($pid,$userTypeId);
$accountid=(isset($acntId[0]['accountid']))?$acntId[0]['accountid']:"";
$msg="";
if($accountid==""){ $msg="No user accounts were found for this person";}
$pageId=(empty($_POST['pageId']))?array():$_POST['pageId'];
$view=(empty($_POST['view']))?array():$_POST['view'];
$add=(empty($_POST['add']))?array():$_POST['add'];
$edit=(empty($_POST['edit']))?array():$_POST['edit'];
$del=(empty($_POST['del']))?array():$_POST['del'];


$sql="";
//$sql.="delete from across_p_authorization where accountid='$accountid';";
 for($x=0;$x<count($pageId);$x++)
 {
  //$sql.="delete from across_p_authorization where accountid='$accountid' and pageId='$pageId[$x]';";	
  $q=$this->db->query("select * from across_p_authorization where accountid='$accountid' and pageId='$pageId[$x]'");
  if ($q->num_rows()==0)
  {
  $sql.="insert into across_p_authorization values('$accountid','$pageId[$x]','$view[$x]','$add[$x]','$edit[$x]','$del[$x]');";   
  }
  else
  {
   $sql.="update across_p_authorization set aview='$view[$x]',aadd='$add[$x]',aedit='$edit[$x]',adelete='$del[$x]' where accountid='$accountid' and pageId='$pageId[$x]';";	
  }	
}


if($msg==""){
$result=$this->mainmodel->database_update($sql);
if($result==false){ $msg="Database not Updated"; }
}
$a['msg']=$msg;
echo json_encode($a);
?>