<?php
session_start();
$usr=$this->db->escape_str($_POST['usr']); $pass=$_POST['pass'];
$passMD5=(trim($pass)=="")?"":md5($pass);
$q=$this->db->query("select * from across_p_user_account where username='$usr' and password='$passMD5' and pid in(select pid from across_p_person where remark='1') and remark='1' and status='1'");
$rnum=$q->num_rows();
$bool=false;
$r=$q->result_array();

if($rnum > 0 && trim($r[0]['username'])==trim($usr)){

$_SESSION['2016_03_20pid']=$r[0]['pid']; /*Person ID*/
$_SESSION['2016_03_20across_accountid']=$r[0]['accountid'];
$_SESSION['2016_03_20across_datelogin']=date("Y-m-d");

$data=array('accountId' => $_SESSION['2016_03_20across_accountid'],'pid' => $r[0]['pid'] );
$this->session->set_userdata($data);
$pid=$this->session->userdata('pid');
$accountId=$this->session->userdata('accountId');
$ip=$this->session->userdata('ip_address');
$datelogin=date("Y-m-d H:i:s");
$session_id=$this->session->userdata('session_id');
$_SESSION['2016_03_20across_sessionid']=$session_id;
$id=$this->mainmodel->getMaxId('across_userlog','id')+1;
$this->db->query("insert into across_userlog values('$id','$session_id','$pid','$accountId','$ip','$datelogin','');");
$m="";
/*load link to homepage*/
 $bool=true;      
}
else if(trim($usr)!="" && trim($pass)!="" && $rnum == 0)
{
            $mssg = 'Username and Password didn\'t matched. Please try again.';
            $m=$mssg;
}
else if(trim($usr)!="" && trim($pass)!="" && trim($r[0]['username'])!=trim($usr) && $rnum > 0) /*to avoid sql injection*/
{
            $mssg = 'Username and Password didn\'t matched. Please try again.';
            $m=$mssg;  
}
else
{
            $mssg = 'Username and Password are required. Please try again.';
            $m=$mssg;
}


$a['booll']=$bool;
$a['msg']=$m;
echo json_encode($a);
?>