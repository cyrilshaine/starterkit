<?php
session_start();
$srch=(isset($_POST['srch']))?trim($this->db->escape_str($_POST['srch'])):"";
$sid=(isset($_POST['sid']))?$_POST['sid']:"";
$grpid=(isset($_POST['grpid']))?$_POST['grpid']:"";
$accountId=$_SESSION['2016_03_20across_accountid'];//(isset($_POST['accountId']))?$_POST['accountId']:""; 
$accntdata=$this->mainmodel->getAccoutDatas($accountId);


$grpsrch=($grpid=="")?"":"AND across_group.groupId='$grpid'";

$accountTypeId=(isset($accntdata[0]['userTypeId']))?$accntdata[0]['userTypeId']:""; 

$srchB=($accountId=="")?"":" AND across_p_authorization.accountid =  '$accountId' ";

$select = "SELECT DISTINCT
                    across_module.moduleId,
                    across_module.moduleAlias,
                    across_module.moduleName
                    FROM
                    across_module,
                    across_p_authorization,
                    across_group,
                    across_page,
                    across_account_type_template
                    WHERE 1
                    $srchB
                    AND NOT across_module.moduleId = 'NULL' 
                    AND across_page.pageName like '$srch%'
                    AND across_p_authorization.pageId = across_page.pageId
                    AND  across_page.moduleId = across_module.moduleId
                    AND across_module.groupId = across_group.groupId
                    AND across_account_type_template.pageId=across_page.pageId
                    $grpsrch
                    ";    
        $select .=  " ORDER BY across_module.moduleOrder,across_module.moduleName";
        $query = $this->db->query($select); 

$m="";
if($query->num_rows()==0)
{
  

$select = "SELECT DISTINCT
                    across_module.moduleId,
                    across_module.moduleAlias,
                    across_module.moduleName
                    FROM
                    across_module,
                    across_p_authorization,
                    across_group,
                    across_page,
                    across_account_type_template
                    WHERE 1
                    $srchB
                    AND across_p_authorization.aview='1'
                    AND NOT across_module.moduleId = 'NULL' 
                    AND across_page.pageName like '$srch%'
                    AND across_p_authorization.pageId = across_page.pageId
                    AND  across_page.moduleId = across_module.moduleId
                    AND across_module.groupId = across_group.groupId
                    AND across_account_type_template.pageId=across_page.pageId
                    
                    ";    
        $select .=  " ORDER BY across_module.moduleOrder,across_module.moduleName";
        $query = $this->db->query($select); 

}




$row=$query->result_array();
$str1="<ul style='margin-top:1%;'>";
$y=0;
for($x=0;$x<count($row);$x++)
{
         	$modname=ucfirst($row[$x]['moduleName']);
            $modid=$row[$x]['moduleId'];
      
            $query1=$this->db->query("select * from across_page where moduleId='$modid' and pageId in(select pageId from across_p_authorization where aview='1' and accountId='$accountId' and pageId in(select pageId from across_account_type_template where userTypeId='$accountTypeId' and aview='1')) and pageName like '%$srch%'  order by pageOrder");
			$row1=$query1->result_array();
 	              $str1.=(count($row1)==0)?"":"<li class='moduleSet' style='height:auto;'>$modname </li>";		
            	foreach($row1 as $rows1){
                    $pageId=$rows1['pageId'];
 		        	$submenu=ucfirst($rows1['pageName']);
 		        	$subalias=$rows1['pageAlias'];

                    
                    $str1.= "<li><a href='#' onclick='changePage($y)'>$submenu</a>
                     <input type='hidden' id='lnkpageId$y' value='$pageId'>
                     <input type='hidden' id='lnkaccountId$y' value='$accountId'> 
                     <input type='hidden' id='lnksubalias$y' value='$subalias'> 
                    </li>";
                   $y++;     
                    
 		        	//$str1.= "<li><a href='".base_url()."index.php/ensys/page/$pageId/$accountId/$subalias'> $submenu</a></li>";*/
                   
 		        }
}
$str1.="

</ul>";
echo $str1;
?>
<script type="text/javascript">
function changePage(n){  
var pageId=$('#lnkpageId'+n).val();
var accountId=$('#lnkaccountId'+n).val();
var subalias=$('#lnksubalias'+n).val();
window.location.href=URL+"index.php/main/page/"+pageId+"/"+accountId+"/"+subalias;   
}
</script>

<!--This will show the sidebar menus-->