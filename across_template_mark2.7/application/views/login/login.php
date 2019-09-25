
<?php session_start(); 
//date_default_timezone_set("Asia/Manila");
$this->load->view("a_parts/jse_compressorv1_1");
ob_start("compress_html");
ob_start("compress_js"); 

if(isset($_SESSION['2015_01_18across_sessionid'])){ echo '<meta http-equiv="refresh" content="0;url='.base_url().'index.php/main/home">'; }
else{ $this->session->sess_destroy();   
?>
<!doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
 <title><?= $title; ?></title>
 <?php
if ($extraHeadContent) {
    foreach ($extraHeadContent as $extraHeader):
        echo $extraHeader . "\n";
    endforeach;
}
?>
<style type="text/css">
@-moz-keyframes spinner-loader {
  0% {
    -moz-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -moz-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-webkit-keyframes spinner-loader {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner-loader {
  0% {
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
/* :not(:required) hides this rule from IE9 and below */
.spinner-loader:not(:required) {
  -moz-animation: spinner-loader 1500ms infinite linear;
  -webkit-animation: spinner-loader 1500ms infinite linear;
  animation: spinner-loader 1500ms infinite linear;
  -moz-border-radius: 0.5em;
  -webkit-border-radius: 0.5em;
  border-radius: 0.5em;
  -moz-box-shadow: rgba(0, 0, 51, 0.3) 1.5em 0 0 0, rgba(0, 0, 51, 0.3) 1.1em 1.1em 0 0, rgba(0, 0, 51, 0.3) 0 1.5em 0 0, rgba(0, 0, 51, 0.3) -1.1em 1.1em 0 0, rgba(0, 0, 51, 0.3) -1.5em 0 0 0, rgba(0, 0, 51, 0.3) -1.1em -1.1em 0 0, rgba(0, 0, 51, 0.3) 0 -1.5em 0 0, rgba(0, 0, 51, 0.3) 1.1em -1.1em 0 0;
  -webkit-box-shadow: rgba(0, 0, 51, 0.3) 1.5em 0 0 0, rgba(0, 0, 51, 0.3) 1.1em 1.1em 0 0, rgba(0, 0, 51, 0.3) 0 1.5em 0 0, rgba(0, 0, 51, 0.3) -1.1em 1.1em 0 0, rgba(0, 0, 51, 0.3) -1.5em 0 0 0, rgba(0, 0, 51, 0.3) -1.1em -1.1em 0 0, rgba(0, 0, 51, 0.3) 0 -1.5em 0 0, rgba(0, 0, 51, 0.3) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 51, 0.3) 1.5em 0 0 0, rgba(0, 0, 51, 0.3) 1.1em 1.1em 0 0, rgba(0, 0, 51, 0.3) 0 1.5em 0 0, rgba(0, 0, 51, 0.3) -1.1em 1.1em 0 0, rgba(0, 0, 51, 0.3) -1.5em 0 0 0, rgba(0, 0, 51, 0.3) -1.1em -1.1em 0 0, rgba(0, 0, 51, 0.3) 0 -1.5em 0 0, rgba(0, 0, 51, 0.3) 1.1em -1.1em 0 0;
  display: inline-block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin: 1.5em;
  overflow: hidden;
  text-indent: 100%;
}
input.textbox, .select, textarea {
    box-shadow: 0px 1px 3px 2px rgba(1, 1, 1, 0) inset;

}
</style>
</head>
<body>
<!-- Header    -->
<?php
if(isset($_GET['overwrite']) && $_GET['overwrite']=='pass'){
echo "
<script type='text/javascript'>
SYS.ready(function(){
SYS_OverwriteLog();
});
</script>
";  
}
?>
<script type="text/javascript">
speak("Welcome to the Login page!");
//speak("It is three o clock You may take your snacks");
function speak(text, callback) {
    var u = new SpeechSynthesisUtterance();
    u.text = text;
    u.lang = 'en-US';
 
    u.onend = function () {
        if (callback) {
            callback();
        }
    };
 
    u.onerror = function (e) {
        if (callback) {
            callback(e);
        }
    };
 
    speechSynthesis.speak(u);
}


</script>

<div id="headWrap" style='width:100%;'>
    <div id="head" style="background:#284C8E; width:100%;">
        <div id="headContentWrap" style="background:#284C8E;">
            <div id="headContent" style="background:#284C8E; width:100%; height:14em;" align='center'>
               
               
              <!-- 
               <img style='height:100%; margin-top:10px;' src="<?php //echo base_url(); ?>resources/images/logo.png" >
              -->


            </div> 
        </div>
    </div>
</div>
<!-- Container -->
<div class='row' align='right' style='width:100%;'>
<div id="currentDateHolder" style='margin-right:9px;'><?=date("d | F Y")?></div>
</div>

<div id="containWrap" style="background:#FFFF; width:100%;">
    <div id="contain" style="background:#FFF; width:100%;">
        <div id="containContentWrap">
            <div id="containContent">                 
                <div id="contentHolder">
       				 <div id="msg"> </div>                
          			 <div id="loginHolderWrap">     
            <div id="loginProcessor" ></div>          
<div class='container' style='margin-top:20px;'>
<div class='row'>
<div class='col-md-7' >
  <?php       
    echo $this->mainmodel->getstaticpage('1');
    echo $this->mainmodel->getstaticpage('2');    
    ?> </div>
<div class='col-md-5' align='center'>
            <div  class="loginHolder" style='width:100%; padding:4%;' id="employeeLogin" >    

                 <table border="0" width="100%" class='form-group' cellpadding="3">
                 <tr>
                   <td style='height:30px;'></td>
                </tr>
                 <tr>
                   <td width="60%">
                    <hr>
                    <div class='input-group form-group'>
                    <span class='input-group-addon'><span class='glyphicon glyphicon-user'></span></span>   
                    <input type="text" id='usr' class="textbox input-group" placeholder='Username' style="width: 100%;" name="systemUser"/>
                    </div>
                </td>
                 </tr>
                 <tr>
                   <td>
                      <div class='input-group form-group'>
                    <span class='input-group-addon'><span class='glyphicon glyphicon-lock'></span></span>   
                    <input type="password" class="textbox" id='pass' placeholder='Password' style="width: 100%;" name="pWord" onkeypress=""/>
                    </div>
                    </td>
                </tr>
                 <tr>
                  <td colspan="2" align="right">
                   <input type="button" value="Login / SignIn" class="buttonActive" name="taskName" onclick='SYS_loginProcess()'/>
                 <hr>
                 </td>
               </tr>      
                <tr>
                 <td colspan="2" align="right" class="loginFormLink">
                 
                </td>
              </tr>        
              </table>
                <?php $this->load->helper("url"); ?>
                <input type='hidden' id='baseurl' value="<?php  echo base_url(); ?>"> 
                </div>

</div>

</div>
<hr>
<div id="footHolderWrap" style='width:100%;'>
                <div class="footHolder">
                    <div id="copyrightHolder" style='font-size:13px;'>
                        Copyright &copy; <?=date("Y")?>  ACROSS Media IT Solution. All rights reserved.
                    </div>
                </div>                          
            </div>         
 
 </div>

        </div>
           
            
            </div>
        </div>
    </div>
</div>
<div id='loadingDiv' style='position:absolute; z-index:1000; width:100%; background:rgba(0,0,0,0.1); top:0; height:100%; padding:15%; overflow:hidden;' align='center'>
<div class="spinner-loader">
  Loading…
</div>
</div>
<?php
}                                    
?>      


<script type="text/javascript">
var $loading = $('#loadingDiv');
$(document)
  .ajaxStart(function () {
    $loading.show(); 
  })
  .ajaxStop(function () {
    $loading.hide();
  });



$(document).ready(function() { 
 $('#loadingDiv').hide();
   
   var isctrl=false;
   var shift=false;
   $("body").keyup(function(e){ 
    if(e.keyCode==17){ isctrl=false; }
    if(e.keyCode==16){  shift=false; }
    });
   $("body").keydown(function(e){  
    if(e.keyCode==17){  isctrl=true; /*Disable f12*/ }
    if(e.keyCode==16){  shift=true;  }
    if(e.keyCode==123 || e.keyCode==118){  return false; /*Disable f12 f7*/ }
    if((e.keyCode==85 || e.keyCode==79 || e.keyCode==80 || e.keyCode==65 || e.keyCode==83) && isctrl==true){  return false; /*Disable CTRL+U*/ } 
    if(e.keyCode==73 && isctrl==true && shift==true){ return false;  }
});
   $("#pass,#usr").keydown(function(e){ if(e.keyCode==13){ SYS_loginProcess(); } });                                                                                          

});

 Object.defineProperty(console,'_commandLineAPI',{ get:function(){ throw 'Sorry, developer tools are blocked here' }});  
</script></body>
</html><style>
.loginHolder{
	background-color: #ffffff;
    border: 1px solid #999;
    border: 1px solid rgba(0, 0, 0, 0.3);
    *border: 1px solid #999;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    outline: none;
    -webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
    -moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
    box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding-box;
    background-clip: padding-box;
}
</style>


 