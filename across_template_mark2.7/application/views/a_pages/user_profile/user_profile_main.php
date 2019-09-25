<?php $this->load->view("a_pages/user_profile/a_js"); $this->load->view("a_pages/user_profile/a_css"); 
$userid_pid=$_POST['userid_pid'];
?>
<script type="text/javascript">
SYS.ready(function(){

$('#tbl_dealaccount_accountid1').val($('#user_person_accountid').val());	
});
</script>
<input type='hidden' id='userprofile_pid' value="<?= $userid_pid; ?>">
<input type='hidden' id='tbl_dealaccount_pid1' value="<?= $userid_pid; ?>">
<input type='hidden' id='tbl_dealaccount_accountid1' value="">
<div id='t_content'>
<div id='userprofcont'></div>
</div>
<input type='hidden' id='acctform_type' value="employee">