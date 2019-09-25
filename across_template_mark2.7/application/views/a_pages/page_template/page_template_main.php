<?php $this->load->view("a_pages/page_template/a_js"); $this->load->view("a_pages/page_template/a_css"); 

$userid_pid=$_POST['userid_pid']; 
$user_accountId=$_POST['userid_accountId'];
$usr=$this->mainmodel->getAccoutDatas($user_accountId);
$userTypeId=(isset($usr[0]['userTypeId']))?$usr[0]['userTypeId']:"";
?>
<input type='hidden' id='user_usertypeId' value="<?= $userTypeId; ?>">
<div id='sys_mainbody'>
<div class='row'>
<div class='col-sm-7' style='padding-bottom:1%;'>
<div class='input-group'>
	<span class='input-group-addon'><span><span class='glyphicon glyphicon-user'></span> User Type</span></span>
	<select class='select'  id='userTypeId' onchange="SYS_page_template_list();">
		
		</select>
</div>
</div>
<div class='col-sm-5' align='right'>
<span style=''>
<button class='btn btn-primary' onclick='SYS_group_check()'>Check All</button>
<button class='btn btn-primary' onclick='SYS_group_uncheck()'>Uncheck All</button>
<button class='btn btn-primary' onclick='SYS_page_template_group_save()'>Save</button>
</span>
</div>
<div></div>
</div>

<div id='page_template_cont'></div>

<div class='row'>
<div class='col-sm-7' style='padding-bottom:1%;'>

</div>
<div class='col-sm-5' align='right'>
<span style=''>
<button class='btn btn-primary' onclick='SYS_group_check()'>Check All</button>
<button class='btn btn-primary' onclick='SYS_group_uncheck()'>Uncheck All</button>
<button class='btn btn-primary' onclick='SYS_page_template_group_save()'>Save</button>
</span>
</div>
<div></div>
</div>



</div>
