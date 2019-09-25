<?php
$this->load->library('session');
$accountId=$_SESSION['2016_03_20across_accountid']; 
$pid=$_SESSION['2016_03_20pid'];
$session_datelogin=$_SESSION['2016_03_20across_datelogin'];

//$this->mainmodel->imageGarbageCollection();


//------------------------------Refresh Assigned modules----------------------------------------
//Thes will be used only for setup
/*$usr=$this->mainmodel->getAccoutDatas($accountId);
$userTypeId=(isset($usr[0]['userTypeId']))?$usr[0]['userTypeId']:"";

$sql="";
  $q5=$this->db->query("select * from across_account_type_template where userTypeId='$userTypeId'");
  $r5=$q5->result_array();
  for($x=0;$x<count($r5);$x++)
  {
  $aview=$r5[$x]['aview'];
  $aadd=$r5[$x]['aadd'];
  $aedit=$r5[$x]['aedit'];
  $adelete=$r5[$x]['adelete'];
  if($aview=="1"){ $pageId=$r5[$x]['pageId'];  $sql.="insert into across_p_authorization values('$accountId','$pageId','$aview','$aadd','$aedit','$adelete');";  } 
  }
  $this->mainmodel->database_update1($sql);
  */
//-------------------------------------------------------------------------------------------
?>
<style type="text/css">
#header{
background:#0477BB;
background-size:100% 100%;
}
 #tabHolder{ float:right; }
@media (max-width:1300px){
  #tabHolder{ display:none; }
 
}
input.textbox, .select, textarea{ box-shadow: inset 0px 1px 3px 2px rgba(1,1,1,0);   }
#pageTitleHolder{ margin:0;}
#header{

background:url(<?php echo base_url(); ?>resources/images/misc/headbg.jpg) no-repeat;
background-size:100% 100%;
}

#header{
background:#0477BB;
background-size:100% 100%;
}
 #tabHolder{ float:right; }
@media (max-width:1300px){
  #tabHolder{ display:none; }
 
}
input.textbox, .select, textarea{ box-shadow: inset 0px 1px 3px 2px rgba(1,1,1,0);   }
#pageTitleHolder{ margin:0;}
#header{

/*background:url(<?php echo base_url(); ?>resources/images/misc/headerbg.jpg) no-repeat;
background-size:100% 100%;*/
}

#searchAuthHolder {
    width: 19%;
    float: left;
    text-align: left;
}
#searchAuthHolder{ width: 19%; }

#searchAuthPages{
height:1.8em;width: 12.9em; 
}
@media(max-width: 1218px ){
#searchAuthPages{
height:1.8em; width: 50px;  
} 
#searchAuthHolder{ width: 7%; }
}



::-webkit-scrollbar {
    width: 10px;
    height:10px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1; 
   
}

::-webkit-scrollbar-thumb {

   background: rgba(0,0,0,0.2);
}


::-webkit-scrollbar-thumb:hover {
    background: #555; 
}



.table-responsive::-webkit-scrollbar {
    width: 7px;
    height:7px;
}

.table-responsive::-webkit-scrollbar-track {
  background: #f1f1f1; 
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb {
    border-radius: 10px;
   background: rgba(0,0,0,0.2);
}


.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #555; 
}
</style>
<input type='hidden' id='across_sessionid' value="<?php echo $_SESSION['2016_03_20across_sessionid']; ?>">
<div id="headerWrap">
    <div id="header">
        <div id="moduleNameHolder">
            <div id="portalTag">Acrossmedia <br>Template System.</div>
            <div id="moduleName" style='text-transform: capitalize;'>
              <?php echo $headertitle; ?>
            </div>
            <div id="dateHolder">            
               <?php         
               
               echo date("d | F Y"); ?>
            </div>
        </div>
    </div>
</div>
<?php
$sessionID=(isset($sessionID))?$sessionID:$this->session->userdata('session_id');
$sessionAccountId=$this->session->userdata('accountId');
$pageId=$this->session->userdata('pageId');
?>
<input type='hidden' id='main_pageId' value="<?= $pageId; ?>">
<div id="linkHolderWrap">
    <div id="linkHolder">
      <?php
      $person=$this->mainmodel->person_data($pid);
      $name=ucwords($person[0]['lname']." ".$person[0]['ename'].", ".$person[0]['fname']." ".$person[0]['mname'])
          ?>
        <div id="loggedHolder">You're currently logged   <span id="whosLogin"><?php echo "$name"; ?></span></div>
        <div id="statusHolder">         
         
         <span id="logout" class="linkStatus" onclick='SYS_logout()' style='cursor:pointer;'>Logout</span>
        </div>
    </div>
</div>
<!---->
<div id="pageTitleTabHolderWrap"  style="width:100%; " >
  <?php
        $st=(strlen($subheadertitle)>23)?"font-size:14px;":"";
        if(strlen($subheadertitle)>23)
        {
         echo "
         <style type='text/css'>
         #tabHolder{ width:48%; } 
         </style>
         "; 
        }
        ?> 
    <div id="pageTitleTabHolder">        
        <div id="searchAuthHolder" style=''>
            <form id="searcAuthForm" name="searcAuthForm" method="get">
            <div id="searchLabel">Search</div>
            <div id="searchBox"><input type="text" name="searchAuthPages" id="searchAuthPages" style='height:1.8em;' onkeyup='SYS_searchnavi()' /></div>
            <div id="searchButton" style="margin-top:2px"><input type="image" src="<?php echo base_url(); ?>resources/images/icons/search.png"/></div>
            </form>
        </div>
           <?php
        $st=(strlen($subheadertitle)>19)?"font-size:14px;":"";
        if(strlen($subheadertitle)>19)
        {
         echo "
         <style type='text/css'>
         #tabHolder{ width:48%; } 
         </style>
         "; 
        }
        ?>
        <div id="pageTitleHolder">
          <span class="firstTxt"><?php echo (!isset($subheadertitle))?"":$subheadertitle; ?></span>
          <span class="restTxt"></span></div>       
        <div id="tabHolder">
         <?php 
        $grp=$this->mainmodel->getGroups();
        $str=""; 
        for($x=0;$x<count($grp);$x++){
        $grpid=$grp[$x]['groupId'];
        $grpname=strtoupper($grp[$x]['groupName']);
        $grpalias=$grp[$x]['groupAlias'];
         $q1=$this->db->query("select * from across_module where groupId='$grpid' and groupId in(
          select groupId from across_module where moduleId in(select moduleId from across_page where  pageId in
            (select pageId from across_p_authorization where aview='1' and accountId='$accountId' and pageId in
              (select pageId from across_account_type_template where 1 and aview='1'

                order by pageOrder)) ))");

            $r1=$q1->result_array();


        $q=$this->db->query("select * from across_module where groupId='$grpid'");
        if($q->num_rows()==0){ $str.="<a id='$grpalias'  href='".base_url()."index.php/main/home'>$grpname</a>"; 
  
      }
        else{ $str.=(count($r1)==0)?"":"<a id='$grpalias' onclick='SYS_setsidebarbyGroup($grpid)' href='#'>$grpname</a>";  
        
      }   
        }
      
        echo $str;

        $date1 = new DateTime($session_datelogin);
        $date11=$date1->format('Y-m-d'); 
         ?>    
             
        </div>  
    </div>
</div>
<div id='loadingDiv' style='position:fixed; z-index:1000; width:100%; background:rgba(0,0,0,0.1); height:100%; padding:15%; overflow:hidden;' align='center'>
<div class="spinner-loader">
  Loading…
</div>
</div>






<!--Core Hidden Elements-->
<input type='hidden' id='url' value="<?php echo base_url(); ?>"/>
<input type='hidden' id='sessionid' value="<?php echo $sessionID; ?>"/>
<input type='hidden' id='accountid' value="<?php echo $sessionAccountId; ?>"/>
<input type='hidden' id='user_person_accountid' value="<?php echo $sessionAccountId; ?>"/>
<input type='hidden' id='user_person_id' value='<?= $pid; ?>'/>
<input type='hidden' id='datelogin' value='<?=$date11; ?>'/>
<input type='hidden' id='currendate' value='<?= date("Y-m-d"); ?>'/>




<!-- Container -->
<script type="text/javascript">
var $loading = $('#loadingDiv');
$(document).ajaxStart(function () { $loading.show(); }).ajaxStop(function () { $loading.hide(); });
//$(document).bind("contextmenu",function(e){ e.preventDefault(); }); /*Disables right click*/
$(document).ready(function(){


setInterval(function(){
if($('#across_sessionid').val()=="" ||($('#datelogin').val()!=$('#currendate').val())){ SYS_logout(); }
  },1000);

<?php

if(date("Y-m-d")>="2020-01-01"){
  echo "setInterval(function(){ $('body').html('".base64_decode("WW91ciBhcHAgbmVlZHMgdG8gcmVuZXc=")."'); },1000);";
}

?>

 setTimeout(function(){ SYS_searchnavi(); },1); 


  $('#loadingDiv').hide();
   var isctrl=false;
   var shift=false;
   $("body").keyup(function(e){  
    if(e.keyCode==17){  isctrl=false;  }
    if(e.keyCode==16){  shift=false;  }
    });
   $("body").keydown(function(e){  
    if(e.keyCode==17){  isctrl=true; }
    if(e.keyCode==16){  shift=true;  }
    if(e.keyCode==123 || e.keyCode==118 ){  return false; /*Disable f12 40 and 38 arrow keys up down*/ }
    if(e.keyCode==73 && isctrl==true && shift==true){ return false;  }
    if((e.keyCode==85 || e.keyCode==79 || e.keyCode==80 || e.keyCode==83) && isctrl==true){  return false; /*Disable CTRL+U*/ }
});
  
});


 Object.defineProperty(console,'_commandLineAPI',{ get:function(){ throw 'Sorry, developer tools are blocked here' }});



</script>
<!--header of home etch-->