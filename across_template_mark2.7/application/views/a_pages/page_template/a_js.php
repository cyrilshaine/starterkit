<script type="text/javascript">
SYS.ready(function(){

SYS_setUserType();
});
function SYS_setUserType(){
var user_usertypeId=$('#user_usertypeId').val(); 
$.post(URL+"index.php/acctload/loadUserTypes",{usertypeId:user_usertypeId}).done(function(data){ 
$('#userTypeId').html(data);
SYS_page_template_list();		
});


}

function SYS_page_template_list(){
var userTypeId=$('#userTypeId').val();
$.post(URL+"index.php/acctload/loadPageTemplateList",{userTypeId:userTypeId}).done(function(data){  $('#page_template_cont').html(data); });
}

function SYS_singlecheck(c)
{
if($('#page'+c).is(':checked')){ $('#page'+c).prop("checked",false); }else{ $('#page'+c).prop("checked",true); }
}

function SYS_group_check(){ $('.page').prop("checked",true); }
function SYS_group_uncheck(){ $('.page').prop("checked",false); }

function SYS_page_template_group_save(){
var cnt=$('#page_rowcount').val();
var userTypeId=$('#userTypeId').val();
var pageId=[]; var view=[]; var add=[]; var edit=[]; var del=[]; var z=0;
for(var x=0;x<cnt;x++){
pageId[x]=$('#pageId'+x).val();	
if($('#page'+x).is(':checked')){ view[x]=1;  }
else{ view[x]=0; }


add[x]=($('#pageadd'+x).is(':checked'))?1:0;
edit[x]=($('#pageedit'+x).is(':checked'))?1:0;
del[x]=($('#pagedelete'+x).is(':checked'))?1:0;
}

$.post(URL+"index.php/acctload/loadPageTemplateSave",{userTypeId:userTypeId,pageId:pageId,view:view,add:add,edit:edit,del:del}).done(function(data){ 

n=JSON.parse(data);
if(n.msg==""){ SYS_searchnavi(); swal("Done", "", "success"); SYS_page_template_updateAuthorization(); }
else{ swal("Error", n.msg, "error"); }
});
}

function SYS_page_template_updateAuthorization(){
var userTypeId=$('#userTypeId').val();
$.post(URL+"index.php/acctload/loadPageTemplateUpdateAuthorization",{userTypeId:userTypeId}).done(function(data){ 

	SYS_searchnavi(); swal("Done", "Page Authorization has also been updated", "success"); });	
}
</script>