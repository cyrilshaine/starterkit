<?php
/*echo '<link rel="stylesheet" type="text/css" href="'. base_url() .'resources/mater/font-awesome/4.7.0/css/font-awesome.min.css"></link>
      <link rel="stylesheet" type="text/css" href="'. base_url() .'resources/mater/css/bootstrap.min.css"></link> 
      <link rel="stylesheet" href="' . base_url() . 'resources/mater/css/mdb.css"/>
      <link rel="stylesheet" type="text/css" href="'. base_url() .'resources/mater/css/template.css"></link>  
      <link rel="stylesheet" type="text/css" href="'. base_url() .'resources//materjs/vendor/datatables/css/dataTables.bootstrap4.min.css"></link>';
*/


?>





<div class=''>
<div class='row'>
<div class='col-sm-12'>

<div id='cont'></div>


</div>
</div>


</div>

<?php
$this->load->view("a_pages/page_management/modals");

?>
<script type="text/javascript">
$(document).ready(function(){
page_management();
$('#content').css({'z-index':'1041'});
});

function page_management(){

$.ajax({
	url:URL+"index.php/acctload/loadpagemanagementContent",
	success:function(data){
$('#cont').html(data);
	},
	error:function(err){
		console.log(err);
	}
});

}



function  add_new_page(x){
var moduleid=$('#tbl_mod_moduleid'+x).val();
var modulename=$('#tbl_mod_modulename'+x).val();
jse_confirm_dialog({
    type:"blue",
    title:"Module: "+modulename,
    html:`

    <div>
  
    <input type='hidden' id='form_moduleid' value='`+moduleid+`'/>
    <div class='row' style='margin-bottom:2%;'>
     <div class='col-sm-12'>
      <label>Page Name</label>
      <input type='text' class='form-control' id='form_page_name'/>
     </div>
    </div>
    <div class='row' style='margin-bottom:2%;'>
     <div class='col-sm-12'>
      <label>Page Folder Name</label>
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

var moduleid=$('#form_moduleid').val();
var page_name=$('#form_page_name').val();
var page_folder_name=$('#form_page_folder_name').val();
var seq=$('#form_seq').val();

$.ajax({
url:URL+"index.php/acctload/loadPageManagementSave",
data:{
	moduleid:moduleid,
	page_name:page_name,
	page_folder_name:page_folder_name,
	seq:seq
},
method:"POST",
success:function(data){
var n=JSON.parse(data);
if(n.msg==""){ swal("Done",'Done Information was Saved', 'success'); jse_confirm_dialog_hide(); page_management(); }
else{
swal(n.msg);	
}

},
error:function(err){
console.log(err);
}

});

}




function delete_page(x,y){

var pageid=$('#pageid_'+x+'-'+y+'').val();

jse_confirm_dialog({
    type:"blue",
    title:"",
    html:"<h4>Do you wish Proceed?</h4>",
    save_text:"Proceed",
    cancel_text:"Cancel",
    success:function(data){  
     

     $.ajax({
     	url:URL+"index.php/acctload/loadDeletePage",
     	data:{pageid:pageid},
     	method:"POST",
     	success:function(data){
     		var n=JSON.parse(data);
     		if(n.msg==""){
     		swal('Done Information was deleted');	 jse_confirm_dialog_hide(); page_management();
     		}
     		else{
     		swal(n.msg);	
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