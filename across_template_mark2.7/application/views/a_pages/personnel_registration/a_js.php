<script type="text/javascript">

function SYS_personnel_list(){
SYS_TableStart('#t_maintable'); /* Table declaration*/


$.post(URL+"index.php/acctload/loadPersonnelRefistrationList").done(function(data){ 
$('#t_maintable tbody').html(data); /* Attatch list content to tbody*/
SYS_TablefirstInstance1('#t_maintable',10,10);	/* Table set*/
});

}



/*Add Personnel*/
function SYS_personnel_registration_form(){
$('#dialog1').remove();
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/


SYS_dialog('#dialog1','500','1000px','Add Personnel',function(){ SYS_dealer_finalsave(); });
$.post(URL+"index.php/acctload/loadPersonnelRegistrationForm",{mode:'add',pid:""}).done(function(data){
$("#dialog1").html(data).dialog("open");
});  
}


/*Edit personnel*/
function SYS_personnel_registration_form_edit(x)
{	
var pid=$('#tbl_pid'+x).val();
$('#dialog1').remove();
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/


SYS_dialog('#dialog1','500','1000px','Edit Personnel',function(){ SYS_dealer_finalsave(); });
$.post(URL+"index.php/acctload/loadPersonnelRegistrationForm",{mode:'edit',pid:pid}).done(function(data){
$("#dialog1").html(data).dialog("open");
});  



}


/* Delete Personnel */
function SYS_personnel_registration_form_delete(x)
{
var pid=$('#tbl_pid'+x).val();	
SYS_confirm("Do you wish Proceed?","Information will be deleted from the database","warning","Yes","No",function(){
sweetAlertClose();  



$.post(URL+"index.php/acctload/loadPersonnelRegistrationDelete",{pid:pid}).done(function(data){
n=JSON.parse(data);
if(n.msg==""){
swal("Done","Information was saved","success");  SYS_personnel_list();
}
else{ swal("Error",n.msg,"warning");  }
});



});	
}









function SYS_dealer_finalsave()
{
SYS_confirm("Do you wish Proceed?","Information will be saved to the database","warning","Yes","No",function(){
sweetAlertClose();  
SYS_personnel_registration_save();
});	
}




function SYS_personnel_registration_save(){
/********* Gets values from form ***************/
var mode=$('#form_mode').val();
var pid=$('#form_default_pid').val();

var fname=$('#form_fname').val();
var mname=$('#form_mname').val();
var lname=$('#form_lname').val();
var ename=$('#form_ename').val();
var gender=$('#form_gender').val();
var civilstat=$('#form_civilstat').val();
var bday=$('#form_bday').val();
var homeaddress=$('#form_homeaddress').val();
var presentaddress=$('#form_presentaddress').val();
var mobilenum=$('#form_mobilenum').val();
var othernum=$('#form_othernum').val();


/********  Saving process **************/
$.post(URL+"index.php/acctload/loadPersonnelRegistrationSave",{
	mode:mode,
	pid:pid,
	fname:fname,
	mname:mname,
	lname:lname,
    ename:ename,
    gender:gender,
    civilstat:civilstat,
    bday:bday,
    homeaddress:homeaddress,
    presentaddress:presentaddress,
    mobilenum:mobilenum,
    othernum:othernum
}).done(function(data){
n=JSON.parse(data);
if(n.msg==""){
swal("Done","Information was saved","success"); SYS_closeDialog2("#dialog1"); SYS_personnel_list();
}
else{ $('#msg').html(SYS_validateMsg(n.msg));  }

if(n.ex1==""){ $('#form_fname').css({'border-color':'#68BEFD'}); }else{ $('#form_fname').css({'border-color':'red'}); } 
if(n.ex2==""){ $('#form_mname').css({'border-color':'#68BEFD'}); }else{ $('#form_mname').css({'border-color':'red'}); } 
if(n.ex3==""){ $('#form_lname').css({'border-color':'#68BEFD'}); }else{ $('#form_lname').css({'border-color':'red'}); } 
if(n.ex4==""){ $('#form_ename').css({'border-color':'#68BEFD'}); }else{ $('#form_ename').css({'border-color':'red'}); } 
}); 





}
</script>