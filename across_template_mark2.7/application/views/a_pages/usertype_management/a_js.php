
<script type="text/javascript">




function SYS_TableServerside2(url,tbl){
SYS_TableStart(tbl);  
$(tbl).fadeIn(); 
   $(tbl).DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": url,
            "dataType": "json",
            "error": function(jqXHR, textStatus, errorThrown){
        $(tbl+' tbody').html("<tr><td colspan='10'>No Results Found</td></tr>");
        $(tbl+' .dataTables_info').text("Showing 0 to 0 of 0 entries");
           }
        },
        "columnDefs":[{
            "target":[0,5],
            "orderable":false
        }]

    });
$(tbl).css({'visibility':'visible'});

}




function setcont(n){
$('.setcont').hide();
$('#setcont'+n).show();	
}




function SYS_userype_list(){

var link=URL+"index.php/usertype_management/loadUsertypeSetlist?name=Xssd23SqQ";
SYS_TableServerside2(link,'#t_maintable');
}



function add_usertype(){
$('#mode').val("add");
setcont(2);

}




function usertype_save(){

var mode=$('#mode').val();
var userTypeId=$('#form_userTypeId').val();
var user_type=$('#form_user_type').val();
var usercateg=$('#form_usercateg').val();
var ranking=$('#form_ranking').val();

$.ajax({
    url:URL+"index.php/usertype_management/usertype_management_save",
    method:"POST",
    data:{
        mode:mode,
        userTypeId:userTypeId,
        user_type:user_type,
        usercateg:usercateg,
        ranking:ranking
    },
    success:function(data){
        var n=JSON.parse(data);
        if(n.msg==""){ swal("Done","","success"); SYS_userype_list(); setcont(1); }
        else{ swal(n.msg); }
    },
    error:function(err){
        console.log(err);
    }

});





}



function edit_user_type(x){
var n=JSON.parse($('#tbl_data'+x).val());
$('#mode').val("edit");
if(n){
$('#form_userTypeId').val(n.userTypeId);
$('#form_user_type').val(n.user_type);
$('#form_usercateg').val(n.usercateg);
$('#form_ranking').val(n.ranking);
}

setcont(2);

}


function user_type_delete(x){

var userTypeId=$('#tbl_userTypeId'+x).val();
SYS_confirm("Do you wish Proceed?","Information will be deleted from the database","warning","Yes","No",function(){
sweetAlertClose();  
$.post(URL+"index.php/usertype_management/usertype_management_delete",{userTypeId:userTypeId}).done(function(data){
n=JSON.parse(data);
if(n.msg==""){
swal("Done","Information was deleted","success");  SYS_userype_list();
}
else{ swal("Error",n.msg,"warning");  }
});

}); 


}

</script>
