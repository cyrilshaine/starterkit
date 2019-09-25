<?php session_start();  
if(!isset($_SESSION['accountid'])){ echo '<meta http-equiv="refresh" content="0;url='.base_url().'">'; }else{
?>
<!doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?= $title; ?></title>
 <?php
/*list additional headers from pinasa*/
if ($extraHeadContent) {
    foreach ($extraHeadContent as $extraHeader):
        echo $extraHeader . "\n";
    endforeach;
}
?>
</head>
<body>
<div style=''>	
<?php $this->load->view('headfoot/head1'); /*load header*/ ?>
<div id="containerWrap">
    <div id="container"> 
  <!-- -Sidebar-    -->
   <div id="authorization"> <?php $this->load->view("sidebar/sidebar"); ?> </div><!--SideBar-->
        <div id="content"> 
        You have No access to this page
        </div><!-- end content-->
   </div>
</div>
<?php $this->load->view('headfoot/footer'); ?>
</div>
</body>
</html>
<?php } ?>