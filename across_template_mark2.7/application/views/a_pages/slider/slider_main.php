
<?php $this->load->view("a_pages/slider/a_js"); $this->load->view("a_pages/slider/a_css");  ?>
<style type="text/css">
.setCont{ display:none; }
</style>
<script type="text/javascript">
$(document).ready(function(){
setCont(1);
});
</script>
<div style='padding:2%;'>

<div id='setcont1' class='setcont'><?php $this->load->view("a_pages/slider/site_slides_tbl"); ?></div>
<div id='setcont2' class='setcont'><?php $this->load->view("a_pages/slider/site_slides_form"); ?></div>

</div>





