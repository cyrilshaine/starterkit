<div>
<div id='setpdfcontent'></div>
</div>



<pre>
When using this template to output PDF formatted Php

1.have an iframe tag
2.create a controller to have a link for your mpdf code
3. Change the "src" of the iframe you your desired controller url 

</pre>
<script type="text/javascript">
$(document).ready(function(){ //initialize Jquery
setYourPdf();
});



function setYourPdf(){ //create an iframe in your div tag
$('#setpdfcontent').html("<iframe src='"+URL+"index.php/sample_printview/loadPdfReport?yourdata=data_is_here"+"' style='width:100%; height:500px; border:none;'></iframe>");
}
</script>