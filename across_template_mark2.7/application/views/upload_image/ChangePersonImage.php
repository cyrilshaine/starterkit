<?php
$imgid=$_POST['imgid']; $pid=$_POST['pid'];

$person=$this->mainmodel->person_data($pid);
$previmgid=$person[0]['imgid'];

$sql="";

$sql.="update across_p_person set imgid='$imgid' where pid='$pid';";

$this->db->query($sql);

?>