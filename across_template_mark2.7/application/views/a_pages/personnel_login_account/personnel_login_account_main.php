<?php $this->load->view("a_pages/personnel_login_account/a_js"); $this->load->view("a_pages/personnel_registration/a_css"); 
?>
<?php 
             $idofpage=$this->session->userdata('pageId');
             $idofaccount=$this->session->userdata('accountId'); 
             $x=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'add'); /*Returns true or false*/
             $y=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'edit'); /*Returns true or false*/
             $z=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'delete'); /*Returns true or false*/
             
             $st=($x)?"visibility:visible":"visibility:hidden";
             $st1=($y)?"":"display:none";
             $st2=($z)?"":"display:none";
?>

<script type="text/javascript">
SYS.ready(function(){
SYS_personnel_login_account_list();
});
</script>
<div id='t_content'>
<div id='t_header'>
<button class='btn btn-primary' style='<?= $st; ?>' onclick="SYS_personnel_login_account_form()"><span class='glyphicon glyphicon-plus'></span>Create Account</button>
</div>	

<div style='margin-top:1%; padding:2%;' class='table-responsive'>
<table id='t_maintable' class='table table-bordered table-striped table-condensed table-hover' >
<thead>
<tr>
<th style='width:5px;'></th>
<th style='width:100px;'>User ID</th>
<th style='width:200px;'>Name</th>
<th style='width:100px;'>Username</th>
<th style='width:90px;'>User Type</th>
<th style='width:90px;'>Status</th>
<th style='width:10px;'>Set Status(Active/Inactive)</th>
<th style='width:5px; <?= $st1; ?>'>Edit</th>
<th style='width:5px; <?= $st2; ?>'>Delete</th>
</tr>
</thead>
<tbody>
	
</tbody>
</table>
</div>
</div> 
