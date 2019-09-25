<?php
session_start();
$session_id=$_SESSION['2016_03_20across_sessionid'];
unset($_SESSION['2016_03_20across_accountid']);
unset($_SESSION['2016_03_20across_sessionid']);
unset($_SESSION['2016_03_20pid']);
unset($_SESSION['2016_03_20across_datelogin']);

$date=date("Y-m-d H:i:s");
$q=$this->db->query("update across_userlog set datelogout='$date' where session_id='$session_id';");
$this->session->unset_userdata('pid');
$this->session->unset_userdata('accountId');
$this->session->unset_userdata('session_id');

$res=false;
if(!isset($_SESSION['2016_03_20across_sessionid']) && $q){ $res=true; }

$a['res']=$res;
echo json_encode($a);
?>