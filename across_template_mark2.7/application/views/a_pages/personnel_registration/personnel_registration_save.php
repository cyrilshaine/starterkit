<?php
$mode=$_POST['mode'];
$pid=$_POST['pid'];



$fname=strtoupper($this->db->escape_str($_POST['fname']));
$mname=strtoupper($this->db->escape_str($_POST['mname']));
$lname=strtoupper($this->db->escape_str($_POST['lname']));
$ename=strtoupper($this->db->escape_str($_POST['ename']));
$gender=$_POST['gender'];
$civilstat=$_POST['civilstat'];
$bday=$_POST['bday'];
$homeaddress=$this->db->escape_str($_POST['homeaddress']);
$presentaddress=$this->db->escape_str($_POST['presentaddress']);
$mobilenum=$this->db->escape_str($_POST['mobilenum']);
$othernum=$this->db->escape_str($_POST['othernum']);

$msg=""; $sql="";
$ex1=""; $ex2=""; $ex2=""; $ex3=""; $ex4="";
$pat1="/^[0-9]+$/"; $pat2="/^\D+$/"; $pat3="/^[a-zA-Z0-9]$/"; 


/*  Validation Process => You can customize this validation process*/
if(trim($fname)==""){ $msg="Invalid First name";  $ex1="1"; }
else if(preg_match($pat1,$mname)){ $msg="Invalid Middle name";  $ex2="1";}
else if(trim($lname)==""){ $msg="Invalid Last name";  $ex3="1"; }
else if(preg_match($pat1,$ename)){ $msg="Invalid Suffix";  $ex4="1"; }	







if($mode=='add')
{




$q1=$this->db->query("select * from across_p_person where fname like '$fname' and lname like '$lname' and mname like '$mname' and ename like '$ename' and gender='$gender'");
if($q1->num_rows()==0)
{
$pid=$this->mainmodel->getMaxId("across_p_person","pid")+1;
$sql.="insert into  across_p_person values('$pid','$fname','$mname','$lname','$ename','$gender','0','1');";
}
else
{
$msg="This Person Already Exists"; 
}

$q2=$this->db->query("select * from across_p_personnel where pid='$pid'");
if($q2->num_rows()==0)
{

/* Create a personnel_id*/
$emp=$this->mainmodel->getMaxVal("across_p_personnel",'personnel_id',"where personnel_id like '%-".date("Y")."-%'");
$cut=explode("-",$emp);
$num=(isset($cut[2]))?$cut[2]:"0";
$code=$this->mainmodel->coding(1);
$codeStart=$code[0]['codePrefix'];
$codelen=$code[0]['codeLength'];
$strt=(trim($codeStart)=="")?"":"$codeStart-";
$personnel_id=$strt.date("Y")."-".$this->mainmodel->numformat($codelen,($num+1));


$sql.="insert into across_p_personnel values('$pid','$personnel_id','$civilstat','$bday','$homeaddress','$presentaddress','$mobilenum','$othernum','1');";	
}
else{
$sql.="update across_p_personnel set civilstat='$civilstat',bdate='$bday',home_address='$homeaddress',present_address='$presentaddress',mobilenum='$mobilenum',other_contact='$othernum',remark='1' where pid='$pid';";	
}







}
else if($mode=='edit')
{





$sql.="update across_p_person set fname='$fname',mname='$mname',lname='$lname',ename='$ename',gender='$gender' where pid='$pid';";
$q3=$this->db->query("select * from across_p_personnel where pid='$pid'");
if($q3->num_rows()==0)
{
$emp=$this->mainmodel->getMaxVal("across_p_personnel",'personnel_id',"where personnel_id like '%-".date("Y")."-%'");
$cut=explode("-",$emp);
$num=(isset($cut[2]))?$cut[2]:"0";
$code=$this->mainmodel->coding(1);
$codeStart=$code[0]['codePrefix'];
$codelen=$code[0]['codeLength'];
$strt=(trim($codeStart)=="")?"":"$codeStart-";
$personnel_id=$strt.date("Y")."-".$this->mainmodel->numformat($codelen,($num+1));

$sql.="insert into across_p_personnel values('$pid','$personnel_id','$civilstat','$bday','$homeaddress','$presentaddress','$mobilenum','$othernum','1');";	
}
else{
$sql.="update across_p_personnel set civilstat='$civilstat',bdate='$bday',home_address='$homeaddress',present_address='$presentaddress',mobilenum='$mobilenum',other_contact='$othernum',remark='1' where pid='$pid';";	
}







}

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;
$a['ex1']=$ex1;
$a['ex2']=$ex2;
$a['ex3']=$ex3;
$a['ex4']=$ex4;

echo json_encode($a);

?>