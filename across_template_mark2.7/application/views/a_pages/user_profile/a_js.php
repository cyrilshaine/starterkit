<script type="text/javascript">
SYS.ready(function(){
SYS_StartUserprof();

});
function SYS_Profhidebutton(){
$('#profchangepic').hide();
}
function SYS_Profshowbutton(){
$('#profchangepic').show();
}

function toggleChangeImage(){ $('#profchangepic').toggle(); }

function SYS_StartUserprof(){
var pid=$('#userprofile_pid').val();
SYS_UserProfileContent(pid);	

}
function SYS_UserProfileContent(pid)
{
$.post(URL+"index.php/acctload/loadUserProfileContent",{pid:pid}).done(function(data){ 
$('#userprofcont').html(data);
SYS_Profhidebutton();
getImage();
});	
}

function SYS_imageUpload(){
$('#personpic').upload(URL+"index.php/acctload/loadUploadImage",{uploadname:"personpic"},function(success){ 
n=JSON.parse(success);

if(n.msg==""){
$('#prof_imgid').val(n.imgid);
   setTimeout(function(){ getImage(); 
setImagetoSave();

   	 },200);
 }else { swal("Error",n.msg,"error");    }
   });	
}
function cancelNewImage(){
imgid=$('#prof_origimgid').val();
$.post(URL+"index.php/acctload/loadImagePic",{imgid:imgid}).done(function(data){
$('#imagecont').html(data);
});	
SYS_Profhidebutton();		
}

function getImage(){
imgid=$('#prof_imgid').val();
$.post(URL+"index.php/acctload/loadImagePic",{imgid:imgid}).done(function(data){ 
$('#imagecont').html(data);
});	
}
function setImagetoSave(){
getImage();
swal({
  title: "Do you wish to Save this Picture?",
  text: "",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#68BEFD",
  confirmButtonText: "Okay",
  closeOnConfirm: false
},
function(isConfirm){
if(isConfirm)
{
updateImage();
SYS_Profhidebutton();
swal("Done","Picture Updated Successfully","success"); 	
}	
else
{
cancelNewImage();	
sweetAlertClose(); 
}

});



}




function updateImage(){
var imgid=$('#prof_imgid').val();
var pid=$('#personid').val();	
$.post(URL+"index.php/acctload/loadImageChange",{imgid:imgid,pid:pid}).done(function(data){  });
}


function SYS_dealer_loginaccount_form_edit(accountid)
{
$('#dialog1').remove();
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/

SYS_dialog('#dialog1','500','600px','Edit Personnel Login Account',function(){ SYS_personnel_login_account_save(); });
$.post(URL+"index.php/acctload/loadPersonnelLoginaccountForm",{mode:'edit',accountid:accountid}).done(function(data){
$("#dialog1").html(data).dialog("open");
});  
}

</script>