<?php
   $idofpage=$this->session->userdata('pageId');
              $idofaccount=$this->session->userdata('accountId'); 
             $x=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'add'); /*Returns true or false*/
             $y=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'edit'); /*Returns true or false*/
             $z=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'delete'); /*Returns true or false*/
             $st1=($y)?"":"display:none";
             $st2=($z)?"":"display:none";


/*Perform your MYSQL query here*/
            
$q=$this->db->query("select distinct * from 
	across_p_person as b,
    across_p_personnel as d
    where
    d.pid=b.pid and
    b.remark='1' 
  
    order by b.pid
	");


$str="";



$r=$q->result_array();
for($x=0;$x<count($r);$x++){
$pid=$r[$x]['pid'];
$personnel_id=$r[$x]['personnel_id'];
$name=strtoupper($r[$x]['lname']." ".$r[$x]['ename'].", ".$r[$x]['fname']." ".$r[$x]['mname']);
$gender=($r[$x]['gender']=='1')?"Male":"Female";

$str.="
<tr ondblclick='SYS_personnel_registration_form_edit($x)'>
<td>".($x+1)."
<input type='hidden' id='tbl_pid$x' value='$pid'/>
</td>
<td>$personnel_id</td>
<td>$name</td>
<td>$gender</td>
<td style='$st1'><button class='btn' style='background:rgba(0,0,0,0); width:100%; font-size:15px;' title='Edit' onclick='SYS_personnel_registration_form_edit($x)'><span class='glyphicon glyphicon-edit'></span></button></td>

<td style='$st2'><button class='btn' style='background:rgba(0,0,0,0); width:100%; font-size:15px;' title='Delete' onclick='SYS_personnel_registration_form_delete($x)'><span class='glyphicon glyphicon-remove'></span></button></td>
</tr>
";
}


echo $str;
?>
