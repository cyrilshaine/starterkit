
<input type='hidden' id='mode' value='add'>
<input type='hidden' id='sliderid' value=''>
<div style='padding:0.5%; margin-bottom:1%; border-bottom:solid 1px rgba(0,0,0,0.2);'>
<button class='btn' onclick='pm_back()' style='background:rgba(0,0,0,0);'><span style='font-size:14px;' class='glyphicon glyphicon-arrow-left'></span></button><span style='font-size:20px; font-weight:bold' id='pm_title1'></span>
</div>
<div id='msg'></div>

<div class='row' style='margin-bottom:2%; '>
	<div id='imghere' style='padding:2%; width:60%;'></div>
</div>

<div class='row' style='margin-bottom:4%; '>
	<div class='col-sm-7'>
		<label>Upload Slide image (1331 X 370 pixel recommended)</label>
		<input type='hidden' id='form_other_fileid1' value=''>
		<input type='file' class='form-control' name='fileupload_other1' style='width:100%;' id='fileupload_other1' onchange='UploadFile_other1()'>
	</div>
</div>

<div class='row' style='margin-bottom:4%; '>
<div class='col-sm-4'>
<label>Sequence Number</label>
<input type='number' class='textbox' id='seqnum' min="0" value='0' style='width:100%;'>
</div>
</div>

<div class='row' style='margin-bottom:4%; '>
<div class='col-sm-7'>
<button class='btn btn-success btn-lg' onclick='save_slider()'><span class='glyphicon glyphicon-save'></span>Save</button>
</div>
</div>



