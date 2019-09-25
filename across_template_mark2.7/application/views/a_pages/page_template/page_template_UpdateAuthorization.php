<?php
$userTypeId=$_POST['userTypeId'];
$qperson=$this->db->query("select accountid from across_p_user_account where userTypeId='$userTypeId'");
$qr=$qperson->result_array(); /*Gets all account id*/
$sql="";

$q1=$this->db->query("select * from across_account_type_template where userTypeId='$userTypeId'");
$r1=$q1->result_array();
for($x=0;$x<count($r1);$x++)
{
 $pageID=$r1[$x]['pageId'];
 $aview=$r1[$x]['aview'];
 $aadd=$r1[$x]['aadd'];
 $aedit=$r1[$x]['aedit'];
 $adelete=$r1[$x]['adelete'];
   for($y=0;$y<count($qr);$y++)
  {
    $id=$qr[$y]['accountid'];
    $qq=$this->db->query("select * from across_p_authorization where accountid='$id' and pageId='$pageID'");
    if($qq->num_rows()==0)
    {
    $sql.="insert into across_p_authorization values('$id','$pageID','$aview','$aadd','$aedit','$adelete');"; 	
    }
    else
	{
	$sql.="update across_p_authorization set aview='$aview',aadd='$aadd',aedit='$aedit',adelete='$adelete' where accountid='$id' and pageId='$pageID';";	
	}
  }
}

$this->mainmodel->database_update1($sql);
?>