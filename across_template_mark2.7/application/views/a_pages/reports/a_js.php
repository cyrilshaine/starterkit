
<script type="text/javascript">


function add_form() {
$('#dialog1').remove(); /*Removes existing DOM*/
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/

//SYS_dialog3('#dialog_id_name','height','width','Title');
SYS_dialog3('#dialog1','500','500px','Add Form'); //initialize dialog

/*HTML Virtual DOM*/
var html=`
<div style='padding:2%;'>
<h1>Sample HTML</h1>
<div class='row'>
	<div  class='col-sm-12'>
		<input type='text' id='idname' class='form-control' value=''>
	</div>
</div>
<div class='row'>
	<div  class='col-sm-12' align='right'>
		<button class='btn btn-primary'>Save</button>
	</div>
</div>
</div>
`;


$("#dialog1").html(html).dialog("open"); //appends html to disalog

}





function edit_form(){

var sampletext=$('#sampledata').val();
/*
or 
var sampletext=document.querySelector('#sampledata');
or 
var sampletext=document.getElementById('sampledata');

*/

$('#dialog1').remove(); /*Removes existing DOM*/
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/

//SYS_dialog3('#dialog_id_name','height','width','Title');
SYS_dialog3('#dialog1','500','500px','Edit Form'); //initialize dialog

/*HTML Virtual DOM*/
var html=`
<div style='padding:2%;'>
<h1>Sample HTML</h1>
<div class='row'>
	<div  class='col-sm-12'>
		<label>Sample Text</label>
		<input type='text' id='idname' class='form-control' value='${sampletext}'>
		<input type='text' id='idname2' class='form-control' value='`+sampletext+`'>
	</div>
</div>

<div class='row'>
	<div  class='col-sm-12' align='right'>
		<button class='btn btn-primary'>Save</button>
	</div>
</div>
</div>
`;


$("#dialog1").html(html).dialog("open"); //appends html to disalog


}


</script>
