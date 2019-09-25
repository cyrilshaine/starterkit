<?php
$uploadname=$_POST['uploadname']; /*Name of input file*/

$img=addslashes(file_get_contents($_FILES["$uploadname"]['tmp_name']));
$type=$_FILES["$uploadname"]['type'];
$e=explode("/",$type);
$imgid="";
$msg="";

if($e[1]=="jpeg" || $e[1]=="gif" || $e[1]=="jpg" || $e[1]=="png")
{

$imgid=$this->mainmodel->imagecrop($_FILES["$uploadname"]['tmp_name'],$_FILES["$uploadname"]['name'],$_FILES["$uploadname"]['type'],200,200);
 
       $date=date("Y-m-d");
       $filename=$date."".$imgid.".jpg";
       $sql="";
       $sql.="insert into across_image values('$imgid','$type','resources/images/All_images/$filename');";
       $this->db->query($sql);
}
else
{
$msg="Invalid File format";
}
$a['msg']=$msg;
$a['imgid']=$imgid;
echo json_encode($a);
?>