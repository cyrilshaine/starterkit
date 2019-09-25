<?php
$mode=$this->db->escape_str($_POST['mode']);
$id=$this->db->escape_str($_POST['id']);
$fileid=$this->db->escape_str($_POST['fileid']);
$seqnum=$this->db->escape_str($_POST['seqnum']);

$msg=""; $sql="";


if($fileid==""){ $msg="A File is required for Upload"; }
else if(trim($seqnum)==""){ $msg="Please Include a Sequence Number"; }

if($msg==""){
if($mode=='add'){

$sql.="insert into across_site_slider values('','$fileid','$seqnum','1');";

}
if($mode=='edit'){
$sql.="update across_site_slider set fileid='$fileid',seqnum='$seqnum' where id='$id';";	
}


$this->mainmodel->database_update1($sql); 
}

$a['msg']=$msg;
echo json_encode($a);
?>