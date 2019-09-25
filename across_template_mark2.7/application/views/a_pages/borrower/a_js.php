
<script type="text/javascript">



function create_loan(){

var customer="Sample Cusomer";

$('#dialog4').remove();
$('body').append("<div id='dialog4'></div>"); 
SYS_dialog3('#dialog4','600','1000px','Loan');
$("#dialog4").html(`
<div style='padding:1%;'>    

<div class="input-group" style="margin-bottom:1%;">
<input type="hidden" id="filter_cid1a" value="0">
  <span class="input-group-addon" id="basic-addon1">Customer</span>
  <input type="text" class="form-control" id="customername1aaa" aria-describedby="basic-addon1" style="border-top:none; border-right:none;background:#fff;" value='${customer}' disabled="">
</div>


<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Borrower Info</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Loan Details</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Schedule of Payments</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Other Info</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home"><div id='borrower_info_cont'></div></div>
    <div role="tabpanel" class="tab-pane" id="profile"></div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>




</div>
`).dialog("open");
  

setTimeout(function(){


},1000);




}





</script>
