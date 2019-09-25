<?php

    $columns = array(

    0 =>'userTypeId',
    1 =>'',
    2=>'user_type',
    3=>'usercateg',
    4=>"ranking",
    6=>"",
    7=>"" 
);


$brid=(isset($_GET['brid']))?$_GET['brid']:"";

$bridfilter=($brid=="")?"":"and d.brid='$brid'";



$requestData= $_REQUEST; 

$srchtxt=trim($this->db->escape_str($requestData['search']['value']));


$length=$_REQUEST['length'];
$start=$_REQUEST['start'];
$order_by=$_REQUEST['order'][0]['column'];
$order_byorder=$_REQUEST['order'][0]['dir'];

$orderby="order by userTypeId ASC";
if(isset($_REQUEST['order'])){
$orderby=($columns[$order_by]=="")?"order by userTypeId ASC":"order by ".$columns[$order_by]." $order_byorder";
}

$srch="";
if(isset($requestData['search']['value'])){
$srch=" and 
(
user_type like '%$srchtxt%'
 )";
}


$q1=$this->db->query("
select  * from 
  across_usertype
    where
    remark='1'

$srch 
    ");
//$bridfilter  and b.cid!='0'
$r1=$q1->result_array();


$q=$this->db->query("
select  * from 
  across_usertype
    where
    remark='1'
$srch 
    $orderby
    limit $start,$length
	");

//$bridfilter


$r=$q->result_array();
$tcnt=count($r);
$data=array();
for($x=0;$x<$tcnt;$x++){
$userTypeId=$r[$x]['userTypeId'];
$user_type=$r[$x]['user_type'];


$usercateg=($r[$x]['usercateg']==1)?"admin":"user";
$ranking=$r[$x]['ranking'];

$item=json_encode($r[$x]);

$data[$x] = array(
     0=>" 
     <input type='hidden' id='tbl_userTypeId$x' value='$userTypeId'/>
     <input type='hidden' id='tbl_data$x' value='$item'/>
    
     ",
     1=>"$userTypeId",
    2 =>"$user_type",
    3=>"$usercateg",
	4=>"$ranking",
    5=>"<button class='btn' style='background:rgba(0,0,0,0); width:100%; font-size:15px; $st1' title='Edit' onclick='edit_user_type($x)'><span class='glyphicon glyphicon-edit'></span></button>",
    6=>"<button class='btn' style='background:rgba(0,0,0,0); width:100%; font-size:15px; $st2' title='Delete' onclick='user_type_delete($x)'><span class='glyphicon glyphicon-remove'></span></button>"
    );

}





 $json_data = array(
                "draw"            => intval( $_REQUEST['draw'] ),
                "recordsTotal"    => intval(count($r)),
                "recordsFiltered" => intval(count($r1)),
                "data"            => $data
            );

    echo json_encode($json_data);




    ?>