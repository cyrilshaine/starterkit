<?php

$fileid=$this->db->escape_str($_GET['fileid']);

$q=$this->db->query("select * from across_files where remark='1' and fileid='$fileid'");
$r=$q->result_array();

echo json_encode($r);

?>