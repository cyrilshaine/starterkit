<?php
/* Values from the $.post*/
$mode=$_POST['mode'];
$pid=$_POST['pid'];


$person=$this->mainmodel->person_data($pid); /* In SQL => select * from across_person where pid='$pid'*/
$personnel=$this->mainmodel->personnel_data($pid); /* In SQL => select * from across_person where pid='$pid'*/



/* Gets valus from executed query in $person*/
$fname=($mode=="add")?"":strtoupper($person[0]['fname']);
$mname=($mode=="add")?"":strtoupper($person[0]['mname']);
$lname=($mode=="add")?"":strtoupper($person[0]['lname']);
$ename=($mode=="add")?"":strtoupper($person[0]['ename']);
$gender=($mode=="add")?"":$person[0]['gender'];


/* Gets valus from executed query in $personnel*/
$civilstat=($mode=="add")?"":$personnel[0]['civilstat'];
$bdate=($mode=="add")?"":$personnel[0]['bdate'];
$home_address=($mode=="add")?"":$personnel[0]['home_address'];
$present_address=($mode=="add")?"":$personnel[0]['present_address'];
$mobilenum=($mode=="")?"add":$personnel[0]['mobilenum'];
$other_contact=($mode=="add")?"":$personnel[0]['other_contact'];


?>
<script type="text/javascript">
SYS.ready(function(){
$( ".datepicker" ).datepicker({
     changeMonth: true,
      changeYear: true,
    dateFormat: "yy-mm-dd"
  });	

<?php
echo "
$('#form_gender').val($gender);
$('#form_civilstat').val($civilstat);
";

?>
});

</script>

<input type='hidden' id='form_mode' value="<?= $mode; ?>">
<input type='hidden' id='form_default_pid' value="<?= $pid; ?>">


<!-- VALIDATION DIV TAG  -->
<div id='msg' style='height:15px; margin-top:1%;'></div>




<div id='sys_mainbody'>

<div class='col-sm-6'>
<div class='row'>
<div class='col-sm-5'><label>First Name*</label></div>
<div class='col-sm-7'><input type='text' id='form_fname' class='textbox' value="<?= $fname; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Middle Name</label></div>
<div class='col-sm-7'><input type='text' id='form_mname' class='textbox' value="<?= $mname; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Last Name*</label></div>
<div class='col-sm-7'><input type='text' id='form_lname' class='textbox' value="<?= $lname; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Suffix</label></div>
<div class='col-sm-7'><input type='text' id='form_ename' class='textbox' value="<?= $ename; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Gender</label></div>
<div class='col-sm-7'><select class='select' id='form_gender'><option value='1'>Male</option><option value='2'>Female</option></select></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Civil Status</label></div>
<div class='col-sm-7'><select class='select' id='form_civilstat'><option value='1'>Single</option><option value='2'>Married</option><option value='3'>Widow</option><option value='4'>Legally Separated</option></select></div>
</div>


</div>
<div class='col-sm-6'>

<div class='row'>
<div class='col-sm-5'><label>Birthday(YYYY-MM-DD)</label></div>
<div class='col-sm-7'><input type='text' id='form_bday' class='textbox datepicker' value="<?= $bdate; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Home Address</label></div>
<div class='col-sm-7'><textarea class='textbox' id='form_homeaddress' style='height:60px;'><?= $home_address; ?></textarea></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Present Address</label></div>
<div class='col-sm-7'><textarea class='textbox' id='form_presentaddress' style='height:60px;'><?= $present_address; ?></textarea></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Mobile Number</label></div>
<div class='col-sm-7'><input type='text' id='form_mobilenum' class='textbox' value="<?= $mobilenum; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Other Contact Number</label></div>
<div class='col-sm-7'><input type='text' id='form_othernum' class='textbox' value="<?= $other_contact; ?>"/>

</div>
</div>

</div>






</div>
