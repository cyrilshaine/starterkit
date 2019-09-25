<?php
class Dbclass{
	function DBclass(){
     
   
	}

	function a()
	{
	return "dsafdsdf";
	}

	function b()
	{
	$CI =& get_instance();	
    $q=$CI->db->query("select * from across_lvl");
   $r=$q->result_array();
   print_r($r);
	echo "Working talaga";	
	}
}

?>