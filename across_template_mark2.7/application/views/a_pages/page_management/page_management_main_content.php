<div class='table-responsive'>
<table class='table table-bordered'>
<thead>
<tr>
<th>Pagename</th>
<th>Page folder name</th>
<th>Sequence #</th>
<th></th>
</tr>
<tbody>
<?php
$q=$this->db->query("select * from across_module where 1 order by moduleOrder");
$r=$q->result_array();
for($x=0;$x<count($r);$x++){
$moduleid=$r[$x]['moduleId'];
$moduleName=$r[$x]['moduleName'];
echo "
<tr>
<td colspan='3' >
<input type='hidden' id='tbl_mod_moduleid$x' value='$moduleid'/>
<input type='hidden' id='tbl_mod_modulename$x' value='$moduleName'/>
<b>$moduleName</b></td>
<td >
<button class='btn btn-primary ' style='width:100%;' onclick='add_new_page($x)'><span class='glyphicon glyphicon-plus'></span></button>
</td>
</tr>
";

$q1=$this->db->query("select * from across_page where moduleId='$moduleid' order by pageOrder");
$r1=$q1->result_array();
for($y=0;$y<count($r1);$y++){
$pageid=$r1[$y]['pageId'];
$pageAlias=$r1[$y]['pageAlias'];
$pageName=$r1[$y]['pageName'];
$pageOrder=$r1[$y]['pageOrder'];
$stt=""; $unedit="";
if($pageName=="Page Management" || $pageName=="Page Template" || $pageName=="Page Authorization" || $pageName=="Backup Database" || $pageAlias=="module_management"){
$stt="visibility:hidden;";
$unedit="disabled";
}

echo "
<tr>
<td>
<input type='hidden' id='pageid_$x-$y' value='$pageid'/>

<input type='text' id='pagename_$x-$y' class='form_control' style='border:none; width:100%;' value='$pageName' onchange='update_Page($x,$y)' /></td>
<td><input type='text' id='page_alias_$x-$y' class='form_control' style='border:none; width:100%;' value='$pageAlias' onchange='update_Page($x,$y)' $unedit disabled/></td>
<td><input type='number' id='page_seq_$x-$y' class='form_control' style='width:100%; border:none;' value='$pageOrder' onchange='update_Page($x,$y)'/></td>
<td><button class='btn ' class='form_control' style='$stt width:100%; background:rgba(0,0,0,0);' onclick='delete_page($x,$y)'><span class='glyphicon glyphicon-remove'></button></td>
</tr>
";	
}



}
?>
</tbody>
</thead>


</table>
</div>
<script type="text/javascript">



function update_Page(x,y){
var pageid=$('#pageid_'+x+'-'+y+'').val();
var pagename=$('#pagename_'+x+'-'+y).val();
var pagefoldername=$('#page_alias_'+x+'-'+y).val();
var seq=$('#page_seq_'+x+'-'+y).val();

$.ajax({
url:URL+"index.php/acctload/loadUpdatepageDetails",
data:{
pageid:pageid,
pagename:pagename,
pagefoldername:pagefoldername,
seq:seq
},
method:"POST",
success:function(data){
var n=JSON.parse(data);
if(n.msg==""){
toastr.success('Page Updated', ''); SYS_searchnavi(); 
}
},
error:function(err){
console.log(err);
}

});



}


</script>
