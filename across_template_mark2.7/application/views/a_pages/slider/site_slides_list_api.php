<?php
$q=$this->db->query("select * from across_site_slider as a,across_files as b where a.fileid=b.fileid and a.remark='1' order by seqnum");


$r=$q->result_array();
echo json_encode($r);


?>