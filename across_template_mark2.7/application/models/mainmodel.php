<?php
class Mainmodel extends CI_Model {

public function __construct(){ $this->load->database(); }


/*************************          CORE SQL QUERY FUNCTIONS     *********************************/

public function getstaticpage($id) /*gets static page form staticpage table in DB*/
{
$query=$this->db->query("select * from across_staticpages where id='$id'");
if ($query->num_rows() > 0){
$row = $query->row(); 
$pagecont = $row->pageContent;
return $pagecont;
}        
}
 


public function getMaxId($tbl,$id){ /*Gets maximum Id from any table*/
$q=$this->db->query("select max($id) as id from $tbl");
$r=$q->result_array();
return ($r[0]['id']==NULL)?"0":$r[0]['id'];
}




public function getMaxVal($tbl,$id,$cond){ /*Gets maximum Id from any table*/
$q=$this->db->query("select max($id) as id from $tbl $cond");
$r=$q->result_array();
return ($r[0]['id']==NULL)?"0":$r[0]['id'];
}





public function numformat($length,$val){ /* adds zeros to your interger $val example -> 1  Let $val=1;  use numformat(7,$val)   the result will be 0000001*/
$l=$length-strlen($val); $str='';
for($x=0;$x<$l;$x++){ $str.="0"; }
return $str.''.$val;
}




public function hasAccess($accountId){
$q=$this->db->query("select * from across_p_user_account where accountid='$accountId' and remark='1'");  
$bool=false;
if($q->num_rows()>0){ $bool=true; }
return $bool;
}



public function coding($codeNumber){
$q=$this->db->query("select * from across_coding where codeNumber='$codeNumber'");
return $q->result_array();
}





public function database_update($sql){ /* Accepts sql string and executes sql string but expects a return*/
$e=explode(";",$sql); $ret=false;
$this->db->query("begin;"); $b=true;
for($x=0;$x<count($e)-1;$x++)
{
$q=$this->db->query($e[$x]);
$b= $b && $q;
}
if($b){ $this->db->query("commit;"); $ret=true; }else{ $this->db->query('rollback;'); }
return $ret;
}




public function database_update1($sql){
$e=explode(";",$sql);
$this->db->query("begin;"); $b=true;
for($x=0;$x<count($e)-1;$x++)
{
$q=$this->db->query($e[$x]);
$b= $b && $q;
}
if($b){ $this->db->query("commit;");  }else{ $this->db->query('rollback;'); }
}






/* Control Buttons */
  public function hasButtonAccess($accountId,$pageId,$mode){
  $acc=$this->getAccoutDatas($accountId);
  $accountTypeId=$acc[0]['userTypeId'];
  $q=$this->db->query("select * from across_p_authorization where accountId='$accountId' and pageId='$pageId'");
  $b=false;
  $r=$q->result_array();
   $x=$this->hasTemplateButtonAccess($accountTypeId,$pageId,'add');
   $y=$this->hasTemplateButtonAccess($accountTypeId,$pageId,'edit');
   $z=$this->hasTemplateButtonAccess($accountTypeId,$pageId,'delete');


  if($mode=='add'){ if($x){ if($r[0]['aadd']=='1'){ $b=true; } } } 
  if($mode=='edit'){ if($y){ if($r[0]['aedit']=='1'){ $b=true; } } }  
  if($mode=='delete'){ if($z){ if($r[0]['adelete']=='1'){ $b=true; } } }
  
  return $b;
  }




  public function hasTemplateButtonAccess($accountTypeId,$pageId,$mode)
  {
   $q=$this->db->query("select * from across_account_type_template where userTypeId='$accountTypeId' and pageId='$pageId'");
   $b=false;
   $r=$q->result_array();
   if($mode=='add'){ if($r[0]['aadd']=='1'){ $b=true; } } 
   if($mode=='edit'){ if($r[0]['aedit']=='1'){ $b=true; } } 
   if($mode=='delete'){ if($r[0]['adelete']=='1'){ $b=true; } }
  
  return $b; 
  }


/**************SECONDARY CORE SQL QUERY FUNCTIONS***********************************/
/* User types*/
public function userType_data($userTypeId){
$q1=$this->db->query("select * from across_usertype where userTypeId='$userTypeId'");
return $q1->result_array();
}
public function userType_list($usertypeId){
$q1=$this->db->query("select * from across_usertype where userTypeId='$usertypeId' order by ranking");
$r1=$q1->result_array();
$sql="";

if(count($r1)>0)
{

$ranking=$r1[0]['ranking'];
$sql="select * from across_usertype where remark='1' and ranking >='$ranking' order by ranking";
}
else
{
$sql="select * from across_usertype  where remark='1' order by ranking";  
}
$q=$this->db->query($sql);
return $q->result_array();

}


public function userType_list1(){
$q=$this->db->query("select * from across_usertype  where remark='1' and not userclass=0");
return $q->result_array();  
}



/* pages */
public function getSystemPagesDatas($pageId) /*Gets submenu page datas*/
{
$q=$this->db->query("select * from across_page  where pageId='$pageId'");
$r=$q->result_array();
return $r; 
}



/* Modules */
public function getModuleData($moduleId){
$q=$this->db->query("select * from across_module  where moduleId='$moduleId'");
return $q->result_array();
}  
public function getModules(){
$q=$this->db->query("select * from across_module order by moduleOrder");
return $q->result_array();
}  



/* Groups */
public function getGroups(){
$q=$this->db->query("select * from across_group  where isVisible='1'");
return $q->result_array();  
}




/*********************************            START HERE       **************************************************/


/* User accounts */
public function getAccoutDatas($accountId){
$q=$this->db->query("select * from across_p_user_account  where accountid='$accountId'");
return $q->result_array();
}
public function getAccountId($pid,$userTypeId)
{
$q=$this->db->query("select * from across_p_user_account  where pid='$pid' and userTypeId='$userTypeId' and remark='1'");
return $q->result_array();  
}





/* Personnel Information */
public function person_data($pid){
$q=$this->db->query("select * from across_p_person  where pid='$pid'");
return $q->result_array();  
}

public function personnel_data($pid)
{
$q=$this->db->query("select * from across_p_personnel  where pid='$pid'");
return $q->result_array();   
}






















/**********************************     ANONYMOUS PROCEDURAL FUNCTIONS       **********************************************/
/*Image Cropping function */
function imagecrop($img_name,$newname,$type,$modwidth,$modheight)
{
$imgid=$this->getMaxId("across_image","imgid")+1;
$date=date("Y-m-d");
$filename=$date."".$imgid.".jpg";
if(file_exists("./resources/images/All_images")){}else{ mkdir("./resources/images/All_images"); }
$newname="./resources/images/All_images/".$filename;
list($width,$height)=getimagesize($img_name);
$tn=imagecreatetruecolor($modwidth,$modheight);
if(!strcmp("image/png",$type)){
imagealphablending($tn,false); 
imagesavealpha($tn,true);
}
if(!strcmp("image/jpg",$type) || !strcmp("image/jpeg",$type) || !strcmp("image/pjp",$type)) $src_img=imagecreatefromjpeg($img_name);  
if(!strcmp("image/png",$type)) $src_img=imagecreatefrompng($img_name);   
if(!strcmp("image/gif",$type)) $src_img=imagecreatefromgif($img_name);
imagecopyresized($tn,$src_img,0,0,0,0,$modwidth,$modheight,$width,$height);
if(!strcmp("image/png",$type)){ imagesavealpha($src_img,true); $ok=imagepng($tn,$newname); }
else if(!strcmp("image/gif",$type)){ $ok=imagegif($tn,$newname); } 
else{ $ok=imagejpeg($tn,$newname); }
if($ok==1){    }
return $imgid;
}





/*Image*/
public function getImageDatas($imgid){
$q=$this->db->query("select * from across_image where imgid='$imgid'");
return $q->result_array();  
}





public function imageGarbageCollection(){
$q=$this->db->query("select * from across_image where not imgid in(select imgid from across_p_person)");
$r=$q->result_array(); 
$sql="";
for($x=0;$x<count($r);$x++){
$imgid=$r[$x]['imgid']; 
$imglnk=$r[$x]['img_location'];
$sql.="delete from across_image where imgid='$imgid';";
if(file_exists("./$imglnk")){ unlink("./$imglnk"); } 
} 
$e=explode(";",$sql); $b=true;
$this->db->query("begin;");
for($y=0;$y<count($e)-1;$y++){
$q1=$this->db->query($e[$y]);
$b=$b && $q1;  
}
if($b){ $this->db->query("commit"); }else{ $this->db->query("rollback"); }
}

}


/******************************************************************************************/