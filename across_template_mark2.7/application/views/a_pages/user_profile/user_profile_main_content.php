
<?php
$pid=$_POST['pid'];
$person=$this->mainmodel->person_data($pid);
$name=ucwords($person[0]['lname']." ".$person[0]['ename'].", ".$person[0]['fname']." ".$person[0]['mname']);
$gender=($person[0]['gender']=='1')?"Male":"Female";
$imgid=$person[0]['imgid'];
$rem=($person[0]['remark']=='1')?"<span class='text-success'>Active</span>":"<span class='text-warning'>Inactive</span>";
?>
<?php 
             $idofpage=$this->session->userdata('pageId');
              $idofaccount=$this->session->userdata('accountId'); 
             $x=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'add'); /*Returns true or false*/
             $y=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'edit'); /*Returns true or false*/
             $z=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'delete'); /*Returns true or false*/
             $st=($x)?"visibility:visible":"visibility:hidden";
             
             ?>
<input type='hidden' id='personid' value="<?= $pid; ?>">
<div class='row'>
<div class='col-sm-4' >
<div id='imagecont' align='center' onclick='toggleChangeImage()'><span class='glyphicon glyphicon-user' style='background:#FFF; font-size:190px; margin-top:1%;'></span>
</div>
<div id='profchangepic'><label class='btn btn-primary' style='width:100%;' for='personpic' ><input name='personpic' id='personpic' style='display:none;' type='file' onchange='SYS_imageUpload()' >Change picture</label></div>
<input type='hidden' id="prof_imgid" value="<?= $imgid; ?>">
<input type="hidden" id="prof_origimgid" value="<?= $imgid; ?>"> 
</div>	 
<div class='col-sm-8' id='profile_head'>
<div style='width:100%; height:30px; background:#0477BB; margin-bottom:2%;'></div>
<div class='row'>
<div class='col-sm-2'><label>Name : </label></div>
<div class='col-sm-8'><?= $name; ?></div>
</div>
<div class='row'>
<div class='col-sm-2'><label>Gender : </label></div>
<div class='col-sm-8'><?= $gender; ?></div>
</div>
<div class='row'>
<div class='col-sm-2'><label>Information Status : </label></div>
<div class='col-sm-8'><b><?= $rem; ?></b></div>
</div>
</div>
</div>
<div class='row' style='padding:2%;' id='profile_main_content'>


<div style='width:100%; height:auto; background:#0477BB; margin-bottom:2%; padding:0.6%;'><span style='color:#FFF; font-size:15px;'>User Account Information </span></div>
<table class='table table-bordered table-hover table-condensed table-striped' id='useraccnt_info'>
<thead>
<tr>
<th>Username</th>
<th>User Type</th>
<th>Status</th>
<th></th>
</tr>
</thead>
<tbody>
<?php
$q=$this->db->query("select * from across_p_user_account where pid='$pid' and remark='1'");
$r=$q->result_array();
$str="";
for($x=0;$x<count($r);$x++)
{
$accountid=$r[$x]['accountid'];
$userTypeId=$r[$x]['userTypeId'];
$usert=$this->mainmodel->userType_data($userTypeId);
$userType=ucwords($usert[0]['user_type']);
$username=$r[$x]['username'];	
$rem=($r[$x]['status']=='1')?"<span class='text-success'>Active</span>":"<span class='text-warning'>Inactive</span>";
$str.="
<tr>
<td><b>$username</b></td>
<td>$userType</td>
<td><b>$rem</b></td>";
$str.="<td><button class='btn btn-primary' title='Edit' onclick=\"SYS_dealer_loginaccount_form_edit($accountid)\"><span class='glyphicon glyphicon-edit'></span></button></td>";

$str.="</tr>";
}

echo $str;
?>
</tbody>

</table>
</div>