<?php $this->load->view("a_pages/personnel_login_account/a_js");


$mode=$_POST['mode'];
$accountid=$_POST['accountid'];

$acct=$this->mainmodel->getAccoutDatas($accountid);

$username=($mode=="add")?"":$acct[0]['username'];
$userTypeId=($mode=="add")?"":$acct[0]['userTypeId'];
$pid=($mode=="add")?"":$acct[0]['pid'];
?>


<script type="text/javascript">
SYS.ready(function(){
SYS_setUserType();
SYS_person_options();
<?php
if($mode=='edit')
{
echo "
$('#form_pid').val($pid);
$('#form_pid').prop('disabled',true);
";	
}
else
{
echo "
$('#form_pid').prop('disabled',false);
";		
}
echo "$('#form_usertypeid').val($userTypeId);";
?>
});
</script>
<input type='hidden' id='form_mode' value="<?= $mode; ?>">
<input type='hidden' id='form_default_accountid' value="<?= $accountid; ?>">

<!-- VALIDATION DIV TAG  -->
<div id='msg' style='height:15px; margin-top:1%;'></div>


<div id='sys_mainbody' style='margin-top:2%;'>
<div class='row'>
<div class='col-sm-4'><label>Personnel</label></div>
<div class='col-sm-8'><select class='select' id='form_pid'></select></div>
</div>

<div class='row'>
<div class='col-sm-4'><label>User type</label></div>
<div class='col-sm-8'><select class='select' id='form_usertypeid'></select></div>
</div>

<div class='row'>
<div class='col-sm-4'><label>Username*</label></div>
<div class='col-sm-8'><input type='text' id='form_username' class='textbox' value="<?= $username; ?>"/></div>
</div>


<div class='row'>
<div class='col-sm-4'><label>Password*</label></div>
<div class='col-sm-8'><input type='password' id='form_pass' class='textbox' value=""/></div>
</div>

<div class='row'>
<div class='col-sm-4'><label>Confirm Password*</label></div>
<div class='col-sm-8'><input type='password' id='form_confirmpass' class='textbox' value=""/></div>
</div>



</div>