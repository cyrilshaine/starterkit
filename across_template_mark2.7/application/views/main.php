<?php session_start();  
$this->load->view("a_parts/jse_compressorv1_1");
ob_start("compress_html");
ob_start("compress_js"); 

if(!isset($_SESSION['2016_03_20across_sessionid'])){ echo '<meta http-equiv="refresh" content="0;url='.base_url().'">'; }else{
?>
<!doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<head><title><?= $title; ?></title>
 <?php
/*list additional headers from pinasa*/
if ($extraHeadContent) {
    foreach ($extraHeadContent as $extraHeader):
        echo $extraHeader . "\n";
    endforeach;
 }
?>
<style type="text/css">
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button{ font-family:"Arial"; }

#authorization{
	/*position: fixed;
   */
    overflow-y: auto;
    top: 0;
    bottom: 0;
 /*
   z-index:20;
    margin-top: 131px;
*/
}




#content{
/*position: fixed;
  */  
    overflow-y: auto;
    top: 0;
    bottom: 0;
    z-index:1;
 /*   margin-top: 131px;	
    right: 0;
    */
}

#authorization-wrapper{ background: rgba(0,0,0,0); height:100%; position: absolute;  }

</style>
</head>
<body>
<div style=''>	
<?php $this->load->view('a_parts/header'); /*load header*/ ?>
<div id="container" > 
  <!-- -Sidebar-    -->
   <div id="authorization" style='margin-bottom:60px; '><?php $this->load->view("a_parts/sidebar"); ?></div><!--SideBar-->
        <div id="content" style='margin-bottom:60px;'>        
        </div><!-- end content-->
   </div>
<?php $this->load->view('a_parts/footer'); ?>
</div>

</body>
</html>

<?php } ?>