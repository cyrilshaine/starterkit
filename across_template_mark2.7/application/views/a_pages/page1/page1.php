<?php $this->load->view("main"); ?>
<script type="text/javascript">
SYS.ready(function(){ Startup(); });
function Startup(){
var user_pid=$('#user_person_id').val();
var user_accountId=$('#accountid').val();
var link=URL+"index.php/page1/loadMain";   //we shall create a controller
var contentname="#content";
SYS_redirect(link,contentname,user_pid,user_accountId);
}
</script>