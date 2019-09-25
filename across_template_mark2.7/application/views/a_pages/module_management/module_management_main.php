<div class=''>
<div class='row'>
<div class='col-sm-12'>
<button class='btn btn-primary' onclick='add_new_page()'><span class='glyphicon glyphicon-plus'></span></button>
<div id='cont'></div>


</div>
</div>


</div>
<?php
$this->load->view("a_pages/page_management/modals");

?>
<script type="text/javascript">
$(document).ready(function(){
module_management();
$('#content').css({'z-index':'1041'});
});
function module_management(){

$.ajax({
	url:URL+"index.php/acctload/loadmenumanagementContent",
	success:function(data){
$('#cont').html(data); 
	},
	error:function(err){
		console.log(err);
	}
});

}


function  add_new_page(){
jse_confirm_dialog({
    type:"blue",
    title:"Add new Module",
    html:`

    <div>
  
    
    <div class='row' style='margin-bottom:2%;'>
     <div class='col-sm-12'>
      <label>Module Name</label>
      <input type='text' class='form-control' id='form_page_name'/>
     </div>
    </div>
    <div class='row' style='margin-bottom:2%;'>
     <div class='col-sm-12'>
      <label>Module Alias</label>
      <input type='text' class='form-control' id='form_page_folder_name'/>
     </div>
    </div>
    <div class='row' style='margin-bottom:2%;'>
     <div class='col-sm-12'>
      <label>Sequence No.</label>
      <input type='number' min='0' class='form-control' id='form_seq'/>
     </div>
    </div>
    


    </div>


    `,
    save_text:"Save",
    cancel_text:"Cancel",
    success:function(){  
     save_new_page();


    }
});

}


function save_new_page(){


var page_name=$('#form_page_name').val();
var page_folder_name=$('#form_page_folder_name').val();
var seq=$('#form_seq').val();

$.ajax({
url:URL+"index.php/acctload/loadModuleManagementSave",
data:{

	page_name:page_name,
	page_folder_name:page_folder_name,
	seq:seq
},
method:"POST",
success:function(data){
var n=JSON.parse(data);
if(n.msg==""){ swal("Done",'Done Information was Saved', 'success'); jse_confirm_dialog_hide(); module_management(); }
else{
swal(n.msg);	
}

},
error:function(err){
console.log(err);
}

});

}



function delete_page(x){

var pageid=$('#tbl_mod_moduleid'+x+'').val();

jse_confirm_dialog({
    type:"blue",
    title:"",
    html:"<h4>Do you wish Proceed?</h4>",
    save_text:"Proceed",
    cancel_text:"Cancel",
    success:function(data){  
     

     $.ajax({
     	url:URL+"index.php/acctload/loadDeleteModule",
     	data:{pageid:pageid},
     	method:"POST",
     	success:function(data){
     		var n=JSON.parse(data);
     		if(n.msg==""){
     		swal("Done",'Done Information was deleted', 'success');	 jse_confirm_dialog_hide(); module_management();
     		}
     		else{
     		swal("",n.msg,"warning");	
     		}
     		
     	},
     	error:function(err){
        console.log(err);
     	}

     });


     }
 });

}



</script>



<?php

echo '
  <script type="text/javascript" src="' . base_url() . 'resources/mater/js/mdb.min.js"></script>      
        <script type="text/javascript" src="' . base_url() . 'resources/mater/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="' . base_url() . 'resources/mater/js/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
     <script type="text/javascript" src="' . base_url() . 'resources/mater/js/template.js"></script>
          ';



?>