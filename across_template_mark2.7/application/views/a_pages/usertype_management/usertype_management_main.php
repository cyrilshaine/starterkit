<?php $this->load->view("a_pages/usertype_management/a_js"); $this->load->view("a_pages/usertype_management/a_css");  ?>
<div id='t_content'>


<div class='setcont' id='setcont1'><?php $this->load->view("a_pages/usertype_management/usertype_management_tbl"); ?></div>
<div class='setcont' id='setcont2'><?php $this->load->view("a_pages/usertype_management/usertype_management_form"); ?></div>




</div>
<script type="text/javascript">
$(document).ready(function(){
setcont(1);
});


</script>



