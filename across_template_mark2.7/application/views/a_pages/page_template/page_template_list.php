<?php
$userTypeId=$_POST['userTypeId'];
$str="";
$c=0;
$mod=$this->mainmodel->getModules();
for($x1=0;$x1<count($mod);$x1++){
$modulename=ucwords($mod[$x1]['moduleName']);
$moduleId=$mod[$x1]['moduleId'];
$str.="<tr style='background:rgba(0,0,0,0.1); font-weight:bold'><td>$modulename</td><td>Add</td><td>Edit</td><td>Delete</td></tr>";	
$q1=$this->db->query("select * from across_page where moduleId='$moduleId' order by pageOrder");
$r1=$q1->result_array();
for($x2=0;$x2<count($r1);$x2++){
$pageId=$r1[$x2]['pageId'];
$pagename=ucwords($r1[$x2]['pageName']);

$q2=$this->db->query("select * from across_account_type_template where userTypeId='$userTypeId' and pageId='$pageId' and aview='1'");
$r2=$q2->result_array();
$select=""; $select1=""; $select2=""; $select3="";
if(isset($r2[0]['aview'])){
 if($r2[0]['aview']==1){ $select="checked"; }	
}
if(isset($r2[0]['aadd'])){
 if($r2[0]['aadd']==1){ $select1="checked"; }	
}
if(isset($r2[0]['aedit'])){
 if($r2[0]['aedit']==1){ $select2="checked"; }	
}
if(isset($r2[0]['adelete'])){
 if($r2[0]['adelete']==1){ $select3="checked"; }	
}


$str.="<tr style='cursor:pointer;' ><td>
<input type='checkbox' class='page' id='page$c' value=''  $select>
<input type='hidden' id='pageId$c' value='$pageId'>
$pagename</td>


<td><input type='checkbox' class='pagea' id='pageadd$c'  value='' $select1></td>
<td><input type='checkbox' class='pagea' id='pageedit$c'  value='' $select2></td>
<td><input type='checkbox' class='pagea' id='pagedelete$c'  value='' $select3></td>
</tr>";	
$c++;	



}

}



?>
<table class='table table-condensed table-bordered table-hover'><?= $str; ?></table>
<input type='hidden' id='page_rowcount' value="<?= $c; ?>">