<div id='t_header'>
<button class='btn btn-primary' style='' onclick="setcont(1)"><span class='glyphicon glyphicon-arrow-left'></span> Back</button>
</div>
<div style='padding:2%;'>
<input type='hidden' id='mode' value='add'>
<input type='hidden' id='form_userTypeId' value=''>


<div class='row' style='margin-bottom:2%'>
<div class='col-sm-12'>
<label>User Type</label>
<input type='text' class='form-control' id='form_user_type' value=''>
</div>
</div>



<div class='row' style='margin-bottom:2%'>
<div class='col-sm-12'>
<label>Type</label>
<select class='form-control' id='form_usercateg'>
	<option value='1'>admin</option>
	<option value='2'>users</option>
</select>
</div>
</div>



<div class='row' style='margin-bottom:2%'>
<div class='col-sm-12'>
<label>Ranking</label>
<input type='text' class='form-control' id='form_ranking' value=''>
</div>
</div>



<div class='row'>
<div class='col-sm-12' align='right'>
<button class='btn btn-success' onclick='usertype_save();'>Save</button>
</div>
</div>


</div>