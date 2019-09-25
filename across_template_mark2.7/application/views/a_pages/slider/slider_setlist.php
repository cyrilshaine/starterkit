<?php

    $columns = array(
    0=>'',
    1 =>'',
    2 =>'seqnum',
    3=>'',
    4=>''
);

   $idofpage=$this->session->userdata('pageId');
              $idofaccount=$this->session->userdata('accountId'); 
             $x=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'add'); /*Returns true or false*/
             $y=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'edit'); /*Returns true or false*/
             $z=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'delete'); /*Returns true or false*/
             $st1=($y)?"":"display:none";
             $st2=($z)?"":"display:none";



$requestData= $_REQUEST; 

$srchtxt=trim($this->db->escape_str($requestData['search']['value']));


$length=$_REQUEST['length'];
$start=$_REQUEST['start'];
$order_by=$_REQUEST['order'][0]['column'];
$order_byorder=$_REQUEST['order'][0]['dir'];

$orderby="order by seqnum ASC";
if(isset($_REQUEST['order'])){
$orderby=($columns[$order_by]=="")?"order by seqnum ASC":"order by ".$columns[$order_by]." $order_byorder";
}

$srch="";
if(isset($requestData['search']['value'])){
$srch=" and 
(
location like '%$srchtxt%' or seqnum like '%$srchtxt%' 

 )";
}


$q1=$this->db->query("
select * from across_site_slider as a,across_files as b where a.fileid=b.fileid and a.remark='1' 

$srch 
    ");

$r1=$q1->result_array();


$q=$this->db->query("
select * from across_site_slider as a,across_files as b where a.fileid=b.fileid and a.remark='1' 
    $orderby
    limit $start,$length
	");




$r=$q->result_array();
$tcnt=count($r);
$data=array();
for($x=0;$x<$tcnt;$x++){
$id=$r[$x]['id'];
$fileid=$r[$x]['fileid'];
$loc=$r[$x]['location'];

$img=($loc==null)?"":"<img style='width:100%;' src='".base_url()."".$loc."'/>";

$seqnum=$r[$x]['seqnum'];

$data[$x] = array(
    0=>"".($x+1)."
    <input type='hidden' id='slideid$x' value='$id'/>
    <input type='hidden' id='tbl_fileid$x' value='$fileid'/>
    <input type='hidden' id='tbl_seqnum$x' value='$seqnum'/>
    ",
    1=>"$img",
    2 =>"$seqnum",
    3=>"<button onclick='sys_edit_slider($x)' class='btn' style='width:100%; background:rgba(0,0,0,0);'><span class='glyphicon glyphicon-edit'></span></button>",
    4=>"<button onclick='sys_delete_slider($x)' class='btn' style='width:100%; background:rgba(0,0,0,0);'><span class='glyphicon glyphicon-remove'></span></button>"
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