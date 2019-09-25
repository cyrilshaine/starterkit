<?php
$mode=$_POST['mode'];
$accountid=$_POST['accountid'];
$pid=$_POST['pid'];
$userTypeId=$_POST['userTypeId'];
$username=$this->db->escape_str($_POST['username']);
$password=$_POST['password'];
$confirmpass=$_POST['confirmpass'];


$sql=""; $msg="";
$ex1=""; $ex2=""; $ex3="";

$q=$this->db->query("select * from across_p_user_account where username='$username' and remark='1'");
$qq=$this->db->query("select * from across_p_user_account where username='$username' and not accountid='$accountid' and remark='1'");


if(trim($username)==""){ $msg="Invalid Username"; $ex1="1"; }
else if($q->num_rows()>0 && $mode=="add"){ $msg="Username Already Exists"; $ex1="1"; }
else if($qq->num_rows()>0 && $mode=="edit"){ $msg="Username Already Exists"; $ex1="1"; }
else if(trim($password)==""){ $msg="Invalid Password"; $ex2="1"; }
else if($password!=$confirmpass){ $msg="Invalid!Password Mismatch"; $ex3="1"; $ex2="1"; }

if($mode=='add')
{
$q5=$this->db->query("select * from across_p_user_account where pid='$pid' and remark='1'");
if($q5->num_rows()==0)
{
$passwordmd5=md5($password);	
$accountid=$this->mainmodel->getMaxId("across_p_user_account","accountid")+1;

/*Status will be 0 by default but 1 whem approved*/
$sql.="insert into across_p_user_account values('$accountid','$pid','$userTypeId','$username','$passwordmd5','1','0','1','1');";
}
else{ $msg="This person Already has an account"; }













/*Update assigned modules*/
$sql.="delete from across_p_authorization where accountid='$accountid';"; 
  $q5=$this->db->query("select * from across_account_type_template where userTypeId='$userTypeId'");
  $r5=$q5->result_array();
  for($x=0;$x<count($r5);$x++)
  {
  $aview=($r5[$x]['aview']=='1')?"1":"0";
  $aadd=($r5[$x]['aadd']=='1')?"1":"0";
  $aedit=($r5[$x]['aedit']=='1')?"1":"0";
  $adelete=($r5[$x]['adelete']=='1')?"1":"0";
  if($aview=="1"){ $pageId=$r5[$x]['pageId'];  $sql.="insert into across_p_authorization values('$accountid','$pageId','$aview','$aadd','$aedit','$adelete');";  } 
   
}














}
else if($mode=='edit'){
$passwordmd5=md5($password);	
$sql.="update across_p_user_account set username='$username',password='$passwordmd5' where accountid='$accountid';";
}


if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;
$a['ex1']=$ex1;
$a['ex2']=$ex2;
$a['ex3']=$ex3;
echo json_encode($a);
?>