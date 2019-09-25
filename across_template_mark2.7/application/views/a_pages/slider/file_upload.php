

<?php

$uploadname=$this->db->escape_str($_POST['uploadname']); /*Name of input file*/


$pdf=addslashes(file_get_contents($_FILES["$uploadname"]['tmp_name']));


$type=$_FILES["$uploadname"]["type"];




$e=explode("/",$type);
$fileid="";
$msg="";


if($e[1]=="png" || $e[1]=="jpg" || $e[1]=="jpeg" || $e[1]=="gif")
{

$fileid=$this->mainmodel->getMaxId("across_files","fileid")+1;
$newname="";

 
       $date=date("Y-m-d");
       $filename=$date."".$fileid.".".$e[1];


       $sql="";
        $sql.="insert into across_files values('$fileid','$type','resources/lg_files/$filename','1');";
       $this->db->query($sql);

if(file_exists("./resources/lg_files")){   }else{ mkdir("./resources/lg_files"); }
$newname="./resources/lg_files/$filename";
move_uploaded_file($_FILES["$uploadname"]['tmp_name'],$newname);  /* Transfers File */

}
else
{
	$msg="Invalid File format";
}



$a['fileid']=$fileid;
$a['msg']=$msg;

echo json_encode($a);
?>