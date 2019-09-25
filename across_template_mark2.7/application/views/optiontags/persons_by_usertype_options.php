<?php
$userTypeId=$_POST['userTypeId'];
$q=$this->db->query("select * from across_p_person where pid in(select pid from across_p_user_account where status='1' and remark='1' and userTypeId='$userTypeId')");
$r=$q->result_array();
$opt="";
for($x=0;$x<count($r);$x++)
{
$id=$r[$x]['pid'];
$name=ucwords($r[$x]['lname']." ".$r[$x]['ename'].", ".$r[$x]['fname']." ".$r[$x]['mname']);	
$opt.="<option value='$id'>$name</option>";	
}
echo $opt;
?>