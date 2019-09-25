<script type="text/javascript">
SYS.ready(function(){
SYS_setUserType();
});

function SYS_setUserType(){
var user_usertypeId=$('#user_usertypeId').val(); 
$.post(URL+"index.php/acctload/loadUserTypes",{usertypeId:user_usertypeId}).done(function(data){ 
$('#userTypeId').html(data);
SYS_person_options();
});

}
function SYS_person_options(){
var userTypeId=$('#userTypeId').val();
$.post(URL+"index.php/acctload/loadPerson_by_usertypeOpt",{userTypeId:userTypeId}).done(function(data){
$('#pauto_pid').html(data);	
SYS_page_authorization_list();
});
}

function SYS_page_authorization_list(){
var userTypeId=$('#userTypeId').val();
var pid=$('#pauto_pid').val();
$.post(URL+"index.php/acctload/loadPageAuthorizationList",{userTypeId:userTypeId,pid:pid}).done(function(data){  $('#page_autho_cont').html(data); });
}


function SYS_singlecheck(c)
{
if($('#page'+c).is(':checked')){ $('#page'+c).prop("checked",false); }else{ $('#page'+c).prop("checked",true); }
}

function SYS_group_check(){ $('.page').prop("checked",true); }
function SYS_group_uncheck(){ $('.page').prop("checked",false); }

function SYS_page_authorization_group_save(){
var cnt=$('#page_rowcount').val();
var userTypeId=$('#userTypeId').val();
var pid=$('#pauto_pid').val();
var pageId=[]; var view=[]; var add=[]; var edit=[]; var del=[];  var z=0;
for(var x=0;x<cnt;x++){
pageId[x]=$('#pageId'+x).val();	

view[x]=($('#page'+x).is(':checked'))?1:0;
add[x]=($('#pageadd'+x).is(':checked'))?1:0;
edit[x]=($('#pageedit'+x).is(':checked'))?1:0;
del[x]=($('#pagedelete'+x).is(':checked'))?1:0;
}

$.post(URL+"index.php/acctload/loadPageAuthorizationSave",{userTypeId:userTypeId,pageId:pageId,pid:pid,view:view,add:add,edit:edit,del:del}).done(function(data){ 
	alert(data);
n=JSON.parse(data);
if(n.msg==""){ SYS_searchnavi(); swal("Done", "", "success");  }
else{ swal("Error", n.msg, "error"); }
});	
}




</script>