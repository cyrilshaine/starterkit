<?php
$q=$this->db->query("select distinct * from 
	across_p_person as b,
    across_p_personnel as d
    where
    d.pid=b.pid and
    b.remark='1' 
    
    order by b.pid");

$r=$q->result_array();
$opt="";
for($x=0;$x<count($r);$x++)
{
$id=$r[$x]['pid'];
$name=ucwords($r[$x]['lname']." ".$r[$x]['ename'].", ".$r[$x]['fname']." ".$r[$x]['mname']);	
$opt.="<option value='$id'>$name</option>";	
}
echo $opt;
?>