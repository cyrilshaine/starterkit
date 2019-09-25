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
/*$(tbl+" thead th").eq(0).click();*/
}




function setCont(n){
$('.setcont').hide();
$('#setcont'+n).show();
}


function set_site_slides_list(){
var brid=$('#filter_branchid').val();
var link=URL+"index.php/slider/loadSetlist?name=Xssd23SqQ&brid="+brid;
SYS_TableServerside2(link,'#t_maintable');

}


function set_site_slides_list1(){
SYS_TableStart('#t_maintable'); 

$.post(URL+"index.php/slider/loadSiteSlidesListApi").done(function(data){ 
var n=JSON.parse(data);
var len=n.length;
var str="";
for(var x=0;x<len;x++){
var id=n[x].id;
var seqnum=n[x].seqnum;
var loc=n[x].location;

var img=(loc==null)?"":"<img style='width:100%;' src='"+URL+""+loc+"'/>";


str+="<tr>";
str+="<td>";
str+="<input type='hidden' id='slideid"+x+"' value='"+id+"'>";
str+="<input type='hidden' id='tbl_fileid"+x+"' value='"+n[x].fileid+"'>";
str+="<input type='hidden' id='tbl_seqnum"+x+"' value='"+seqnum+"'>";
str+="</td>";
str+="<td id='tbl_img"+x+"'>"+img+"</td>";
str+="<td align='center'><b>"+seqnum+"</b></td>";
str+="<td><button onclick='sys_edit_slider("+x+")' class='btn' style='width:100%; background:rgba(0,0,0,0);'><span class='glyphicon glyphicon-edit'></span></button></td>";
str+="<td><button onclick='sys_delete_slider("+x+")' class='btn' style='width:100%; background:rgba(0,0,0,0);'><span class='glyphicon glyphicon-remove'></span></button></td>";
str+="</tr>";	
}


$('#t_maintable tbody').html(str); 
SYS_TablefirstInstance1('#t_maintable',10,10);	
});

}

function pm_back(){
setCont(1);
}

function SYS_addSlider_form(){
setCont(2);
$('#pm_title1').text("Add Header");
$('#mode').val("add");

$('#form_other_fileid1').val("");
$('#seqnum').val("0");
}


function sys_edit_slider(x){
setCont(2);
$('#pm_title1').text("Edit Header");
$('#mode').val("edit");

var id=$('#slideid'+x).val();
var fileid=$('#tbl_fileid'+x).val();
var img=$('#tbl_img'+x).html();
var seqnum=$('#tbl_seqnum'+x).val();

$('#sliderid').val(id);
$('#form_other_fileid1').val(fileid);
$('#seqnum').val(seqnum);
$('#imghere').html(img);


}






function sys_delete_slider(x){
var id=$('#slideid'+x).val();	
SYS_confirm("Do you wish Proceed?","Information will be deleted from the database","warning","Yes","No",function(){
sweetAlertClose();  



$.post(URL+"index.php/slider/loadSiteSiledeDelete",{id:id}).done(function(data){
n=JSON.parse(data);
if(n.msg==""){
swal("Done","Information was saved","success"); set_site_slides_list();
}
else{ swal("Error",n.msg,"warning");  }
});



});		
}








function UploadFile_other1(){
$('#fileupload_other1').upload(URL+"index.php/slider/loadSiteUploadfile",{uploadname:"fileupload_other1"},function(success){
var n=JSON.parse(success);
if(n.msg==""){
$('#form_other_fileid1').val(n.fileid);
setTimeout(function(){ getFile(); },100);
 }else { swal("Error",n.msg,"error");    }
   });	
}



function getFile(){
var fileid=$('#form_other_fileid1').val();

$.post(URL+"index.php/slider/loadFileData_api?fileid="+fileid).done(function(data){ 
var n=JSON.parse(data);
	var loc=n[0].location;

	var str="<img style='width:100%;'' src='"+URL+""+loc+"'>";
	$('#imghere').html(str);
});	

}


function save_slider(){
var mode=$('#mode').val();	
var id=$('#sliderid').val();
var fileid=$('#form_other_fileid1').val();
var seqnum=$('#seqnum').val();
$.post(URL+"index.php/slider/loadsite_slides_save",{mode:mode,id:id,fileid:fileid,seqnum:seqnum}).done(function(data){
var n=JSON.parse(data);
if(n.msg==""){
swal("Done","Information was saved","success");  setCont(1); set_site_slides_list();
}
else{ $('#msg').html(SYS_validateMsg(n.msg));  }

});	
}
</script>