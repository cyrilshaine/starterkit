<?php
/*

In SQL these are the column names found at a database table

*/


    $columns = array(

    0 => 'Col1',
    1=> 'Col2'

    
);



$requestData= $_REQUEST;  /* This contains the datas or request from the datatable*/

$srchtxt=trim($requestData['search']['value']);


$length=$_REQUEST['length'];
$start=$_REQUEST['start'];
$order_by=$_REQUEST['order'][0]['column']; /* column index  to get the column for sql manipulations use $columns[$order_by]    this will show the column name*/
$order_byorder=$_REQUEST['order'][0]['dir']; /* DESC, ASC in*/




$r[0]=array('row1','row2');
$r[1]=array('row1','row2');
$r[2]=array('row1','row2');
$r[3]=array('row1','row2');
$r[4]=array('row1','row2');


$data=array();

for($x=0;$x<count($r);$x++){

$data[$x] = array(
    0 =>$r[$x][0],
    1=>$r[$x][1]." and you searched for '".$srchtxt."' | ( limit $start,$length for sql) | order(DESC or ASC) => $order_byorder | column of db table  will be ".$columns[$order_by].""

);




}





 $json_data = array(
                "draw"            => intval( $_REQUEST['draw'] ),
                "recordsTotal"    => intval( count($data)),
                "recordsFiltered" => intval(count($r)), /* Actual num of rows*/
                "data"            => $data
            );

    echo json_encode($json_data);


?>