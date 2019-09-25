/*****************               CORE ACROSSMEDIA SYSTEM PROCEDURES     ****************************************************/

SYS_validateMsg=function(msg) /*Validation message*/
{
str="<div class='alert alert-danger' style='width:100%; height:auto; background:rgba(255,0,0,0.1); margin-bottom:1em;  padding:0.5%; border-radius:0.5em; border:rgba(255,0,0,0.1) solid 1px;'><span class='glyphicon glyphicon-warning-sign text-danger' style='margin-left:1em; '> </span><span class='text-danger' style='font-family:arial,tahoma,verdana; margin-left:1em;'>"+msg+"</span></div>"; 
return str; 
}


SYS_loginProcess=function(){
var usr=$('#usr').val();
var pass=$('#pass').val();
$.post(URL+"index.php/acctload/loadLoginProcess",{usr:usr,pass:pass}).done(function(data){
n=JSON.parse(data);
if(n.msg!=""){ $('#msg').html(SYS_validateMsg(n.msg)); }else{ $('#msg').html(""); }   
if(n.booll){  window.location.href=URL+"index.php/main/home";  } 
});
}


SYS_OverwriteLog=function(){
$.post(URL+"index.php/acctload/loadLoginProcessOverwrite").done(function(data){
n=JSON.parse(data);
if(n.msg!=""){ $('#msg').html(SYS_validateMsg(n.msg)); }else{ $('#msg').html(""); }   
if(n.booll){  window.location.href=URL+"index.php/main/home";  } 
});  
}

SYS_logout=function(){
$.post(URL+"index.php/acctload/loadLogoutProcess").done(function(data){
n=JSON.parse(data);
if(n.res==true){ window.location.href=URL+""; }
});
}


/*Side bar           JSE Exchange( or simply Ajax Request)-------------------------------------------------*/
SYS_searchnavi=function() /*sidebar search*/
{
var srch=$('#searchAuthPages').val();
var sid=$('#sessionid').val();
var accountId=$('#accountid').val();
$.post(URL+"index.php/acctload/loadSidebar",{srch:srch,sid:sid,accountId:accountId,grpid:""}).done(function(data){ 
$('#authorization').html(data); 
$('#authorization').css({'visibility':'visible'});
});
}


/* Used in to transfer to another page*/
SYS_redirect=function(contentlink,bodyname,current_userid,current_accountId){
$.post(contentlink,{userid_pid:current_userid,userid_accountId:current_accountId}).done(function(data){ 
$(bodyname).html(data);
}); 
}

SYS_setsidebarbyGroup=function(grpid){
if(grpid=="")
{
//window.location.href=URL+"index.php/main/home";
} 
var srch=$('#searchAuthPages').val();
var sid=$('#sessionid').val();
var accountId=$('#accountid').val();
$.post(URL+"index.php/acctload/loadSidebar",{srch:srch,sid:sid,accountId:accountId,grpid:grpid}).done(function(data){ 
$('#authorization').html(data); 
$('#authorization').css({'visibility':'visible'});
});
}




/*****             Constants              ********/
var SYS=$(document);

$(window).resize(function () {
    fluidDialog();
});
SYS.on("dialogopen", ".ui-dialog", function (event, ui) {
    fluidDialog();
});


/*** SWEET ALERT CUSTOMIZED FUNCTIONS ****/

sweetAlertClose=function(){
$('.sweet-overlay,.sweet-alert').hide();
 $('body.stop-scrolling').css({'overflow':'auto'});	
}


/*
SYS_confirm

title => Any User defines title
text => Any user Defined text or the message of Dialog
type => "error" or "success" or "warning"
successfunct => callback function if success button is clicked
*/


SYS_confirm=function(title,text,type,savename,cancelname,successfunc){
swal({
  title: title,
  text: text,
  type: type,
  showCancelButton: true,
  confirmButtonColor: "#68BEFD",
  confirmButtonText: savename,
  cancelButtonText: cancelname,
  closeOnConfirm: false
},
function(){
successfunc();
});
}


/*
SYS_confirm2

title => Any User defines title
text => Any user Defined text or the message of Dialog
type => "error" or "success" or "warning"
successfunct => callback function if success button is clicked
cancefunct =>  callback function if cancel button is clicked
*/


SYS_confirm2=function(title,text,type,savename,cancelname,successfunc,cancelfunct){
swal({
  title: title,
  text: text,
  type: type,
  showCancelButton: true,
  confirmButtonColor: "#68BEFD",
  confirmButtonText: savename,
  cancelButtonText: cancelname,
  closeOnConfirm: false,
  closeOnCancel:false
},
function(isConfirm){
  if(isConfirm){ successfunc(); }
  else{ cancelfunct(); }

});
}



/* JQUERY DIALOG CUSTOMIZED FUNCTIONS*/
fluidDialog=function() {
    var $visible = $(".ui-dialog:visible");
    // each open dialog
    $visible.each(function () {
        var $this = $(this);
        var dialog = $this.find(".ui-dialog-content").data("ui-dialog");
        // if fluid option == true
        if (dialog.options.fluid) {
            var wWidth = $(window).width();
            // check window width against dialog width
            if (wWidth < (parseInt(dialog.options.maxWidth) + 50))  {
                // keep dialog from filling entire screen
                $this.css("max-width", "90%");
            } else {
                // fix maxWidth bug
                $this.css("max-width", dialog.options.maxWidth + "px");
            }
            //reposition dialog
            dialog.option("position", dialog.options.position);
        }
    });

}


SYS_dialog2=function(dialogname,height,width,title,cancelfunct){

$(dialogname).dialog({autoOpen: false,clickOut: true,fluid:true,responsive:false,resizable: true,position: 'center',stack: true,title:title,height:height,width:width,modal: true, close:function(){ $(this).dialog('close'); }
, buttons: [
    {
      text: "Cancel",
      click: function() {
      cancelfunct();  
      $( this ).dialog( "close" );
      }
    }
  ]});  
fluidDialog();
}

SYS_dialog=function(dialogname,height,width,title,savefunct){

$(dialogname).dialog({autoOpen: false,clickOut: true,fluid:true,responsive:false,resizable: true,position: 'center',stack: true,title:title,height:height,width:width,modal: true, close:function(){ $(this).dialog('close'); }
, buttons: [
    {
    text: "Save",
    click: function(){ 
      savefunct();
      }
    },
    {
      text: "Cancel",
      click: function() {
      $( this ).dialog( "close" );
      }
    }
  ]});  
fluidDialog();
}

SYS_dialog4=function(dialogname,height,width,title,savename,cancelname,savefunct){

$(dialogname).dialog({autoOpen: false,clickOut: true,fluid:true,responsive:false,resizable: true,position: 'center',stack: true,title:title,height:height,width:width,modal: true, close:function(){ $(this).dialog('close'); }
, buttons: [
    {
    text: savename,
    click: function(){ 
      savefunct();
      }
    },
    {
      text: cancelname,
      click: function() {
      $( this ).dialog( "close" );
      }
    }
  ]});  
fluidDialog();
}

SYS_dialog3=function(dialogname,height,width,title){
$(dialogname).dialog({autoOpen: false,clickOut: true,fluid:true,responsive:false,resizable: true,position: 'center',stack: true,title:title,height:height,width:width,modal: true, close:function(){ $(this).dialog('close'); }
});  
fluidDialog();
}


SYS_closeDialog=function(){
$('#dialog1').html("").dialog('close'); 
}

SYS_closeDialog2=function(dialogname){
$(dialogname).html("").dialog('close'); 
}



/* DATATABLE CUSTOMIZED FUNCTIONS*/
SYS_TableStart=function(tablename){
$(tablename).hide();  
$(tablename).DataTable().destroy(); 	
}

SYS_TablefirstInstance=function(tablename){
$(tablename).fadeIn();  
$(tablename).DataTable({
   searching:true,
   ordering:true,
   select:false,
   aLengthMenu: [[10,25, 50, 75, -1], [10,25, 50, 75, "All"]],
   pageLength: 10,
    });
   $(tablename).css({'font-size':'12px','width':'100%'}); 
}

SYS_TablefirstInstance1=function(tablename,strt,paglength){
$(tablename).fadeIn();  
$(tablename).DataTable({
   searching:true,
   ordering:true,
   select:false,
   aLengthMenu: [[strt,10,25, 50, 75, -1], [strt,10,25, 50, 75, "All"]],
   pageLength: paglength,
    });
   $(tablename).css({'font-size':'12px','width':'100%'}); 
}















/*---------------------------------------------------*/
SYS_dealer_loginaccount_form_edit=function(x)
{
var accountid=$('#tbl_dealaccount_accountid'+x).val();  
var pid=$('#tbl_dealaccount_pid'+x).val();
$('#dialog2').remove();
$('body').append("<div id='dialog2'></div>"); 
SYS_dialog('#dialog2','400','600px','Update Login Account',function(){ SYS_dealer_login_form_save();  });
$.post(URL+"index.php/acctload/loadDealerLoginAccountForm",{mode:'edit',pid:pid,accountid:accountid}).done(function(data){
$("#dialog2").html(data).dialog("open");
});   
}

SYS_dealer_login_form_save=function(){
var accountid=$('#form_login_account_accountid').val();
var password=$('#form_password').val();
var retype_password=$('#form_retypepassword').val();

SYS_confirm("Are You Sure?","Information will be saved to the database","warning","Yes","No",function(){
sweetAlertClose();  


$.post(URL+"index.php/acctload/loadDealerLoginAccountSave",{accountid:accountid,password:password,retype_password:retype_password}).done(function(data){
n=JSON.parse(data);
if(n.msg==""){ swal("Done","Information was saved","success"); SYS_closeDialog2("#dialog2");  }
else{
 $('#msg').html(SYS_validateMsg(n.msg));  
}
if(n.ex1==""){ $('#form_password').css({'border-color':'#68BEFD'}); }else{ $('#form_password').css({'border-color':'red'}); } 
if(n.ex2==""){ $('#form_retypepassword').css({'border-color':'#68BEFD'}); }else{ $('#form_retypepassword').css({'border-color':'red'}); } 
});

});

}