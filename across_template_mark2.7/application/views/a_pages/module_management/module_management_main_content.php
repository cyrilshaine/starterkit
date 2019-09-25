<div style='overflow:auto; width:100%;'>
<table class='table table-bordered'>
<thead>
<tr>
<th>Module name</th>
<th>Module Alias</th>
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
$moduleAlias=$r[$x]['moduleAlias'];
$moduleOrder=$r[$x]['moduleOrder'];

$stt="";
if($moduleAlias=="administration"){
$stt="disabled='disabled'";
}

echo "
<tr>
<td>
<input type='hidden' id='tbl_mod_moduleid$x' value='$moduleid'/>
<input type='text' id='tbl_mod_modulename$x'  style='border:none;'  value='$moduleName' onchange='update_mdule($x)'/></td>
<td>
<input type='text' id='tbl_mod_modalias$x' style='border:none;' value='$moduleAlias' onchange='update_mdule($x)' $stt/>
</td>
<td>
<input type='number' min='0' id='tbl_mod_order$x' style='border:none;' value='$moduleOrder' onchange='update_mdule($x)' />
</td>
<td>
<button class='btn' onclick='delete_page($x)' style='width:100%; background:rgba(0,0,0,0);' $stt><span class='glyphicon glyphicon-remove'></span></button>
</td>
</tr>
";



}
?>
</tbody>
</thead>


</table>
</div>
<script type="text/javascript">



function update_mdule(x){
var moduleid=$('#tbl_mod_moduleid'+x).val();
var modulename=$('#tbl_mod_modulename'+x).val();
var moduleAlias=$('#tbl_mod_modalias'+x).val();
var seq=$('#tbl_mod_order'+x).val();

$.ajax({
url:URL+"index.php/acctload/loadUpdatemoduleDetails",
data:{
moduleid:moduleid,
modulename:modulename,
moduleAlias:moduleAlias,
seq:seq
},
method:"POST",
success:function(data){
var n=JSON.parse(data);
if(n.msg==""){
toastr.success('Module Updated', ''); SYS_searchnavi(); 
}
},
error:function(err){
console.log(err);
}

});



}


</script>
