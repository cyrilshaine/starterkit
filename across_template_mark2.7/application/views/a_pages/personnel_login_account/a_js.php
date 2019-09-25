<script type="text/javascript">

function SYS_personnel_login_account_list(){
SYS_TableStart('#t_maintable'); /* Table declaration*/

$.post(URL+"index.php/acctload/loadPersonnelLoginAccountList").done(function(data){ 
$('#t_maintable tbody').html(data); /* Attatch list content to tbody*/
SYS_TablefirstInstance1('#t_maintable',10,10);	/* Table set*/
});


}



function SYS_setUserType(){
var user_usertypeId=$('#user_usertypeId').val(); 
$.post(URL+"index.php/acctload/loadUserTypes",{usertypeId:user_usertypeId}).done(function(data){ 
$('#form_usertypeid').html(data);

});

}

function SYS_person_options(){
$.post(URL+"index.php/acctload/loadPerson_Opt").done(function(data){
$('#form_pid').html(data);	
});
}




function SYS_personnel_login_account_form(){
$('#dialog1').remove();
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/


SYS_dialog('#dialog1','500','600px','Add Personnel Login Account',function(){ SYS_personnel_login_account_save(); });
$.post(URL+"index.php/acctload/loadPersonnelLoginaccountForm",{mode:'add',accountid:""}).done(function(data){
$("#dialog1").html(data).dialog("open");
}); 
}



function SYS_personnel_login_account_form_edit(x)
{
var accountid=$('#tbl_accountid'+x).val();	
$('#dialog1').remove();
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/


SYS_dialog('#dialog1','500','600px','Edit Personnel Login Account',function(){ SYS_personnel_login_account_save(); });
$.post(URL+"index.php/acctload/loadPersonnelLoginaccountForm",{mode:'edit',accountid:accountid}).done(function(data){
$("#dialog1").html(data).dialog("open");
}); 	
}



function SYS_personnel_login_account_form_delete(x)
{
var accountid=$('#tbl_accountid'+x).val();	
SYS_confirm("Do you wish Proceed?","Information will be deleted from the database","warning","Yes","No",function(){
sweetAlertClose();  


$.post(URL+"index.php/acctload/loadPersonnelPersonnelLoginAccountDelete",{accountid:accountid}).done(function(data){
n=JSON.parse(data);
if(n.msg==""){
swal("Done","Information was saved","success"); SYS_personnel_login_account_list();
}
else{ swal("Error",n.msg,"warning");  }
 });
});	
}






function SYS_personnel_login_account_save(){
var mode=$('#form_mode').val();
var accountid=$('#form_default_accountid').val();
var pid=$('#form_pid').val();
var userTypeId=$('#form_usertypeid').val();
var username=$('#form_username').val();
var password=$('#form_pass').val();
var confirmpass=$('#form_confirmpass').val();

SYS_confirm("Do you wish Proceed?","Information will be saved to the database","warning","Yes","No",function(){
sweetAlertClose();  

$.post(URL+"index.php/acctload/loadPersonLoginAccountSave",{
mode:mode,
accountid:accountid,
pid:pid,
userTypeId:userTypeId,
username:username,
password:password,
confirmpass:confirmpass
	}).done(function(data){ 
n=JSON.parse(data);
if(n.msg==""){ swal("Done","Information was saved","success"); SYS_closeDialog2("#dialog1"); if(typeof SYS_personnel_login_account_list=='function'){ SYS_personnel_login_account_list(); } }
else{ $('#msg').html(SYS_validateMsg(n.msg));  }
if(n.ex1==""){ $('#form_username').css({'border-color':'#68BEFD'}); }else{ $('#form_username').css({'border-color':'red'}); } 
if(n.ex2==""){ $('#form_pass').css({'border-color':'#68BEFD'}); }else{ $('#form_pass').css({'border-color':'red'}); } 
if(n.ex3==""){ $('#form_confirmpass').css({'border-color':'#68BEFD'}); }else{ $('#form_confirmpass').css({'border-color':'red'}); } 	
});


});

}




function SYS_personnel_accountstatus_change(x)
{
var accountid=$('#tbl_accountid'+x).val();
SYS_confirm("Are You Sure?","Information will be saved to the database","warning","Yes","No",function(){
sweetAlertClose();  

$.post(URL+"index.php/acctload/loadPersonnelLoginChangeStatus",{accountid:accountid}).done(function(data){
n=JSON.parse(data);
$('#tbl_stat1'+x).html(n.status_desc);
 swal("Done","Information was saved","success");
 });	

});
}
</script>