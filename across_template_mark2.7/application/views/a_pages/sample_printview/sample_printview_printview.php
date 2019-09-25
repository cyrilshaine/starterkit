<?php
$this->load->view("mpdf60/mpdf");
$this->load->view("mpdf60/mpdfstyletables.php");

$yourdata=$_GET['yourdata']; //this is you passed data


$str="";

//$str.=printtablestyle().""; //uncomment this to add style to your tables

$str.="
<h1>$yourdata</h1>
<table class='table table-bordered' style='color:#000; font-size:12px; width:100%; margin-bottom:5%;' border='1'>
<tr>
<td><b>Account Name</b></td>
<td style='width:30%;' align='right'><b>Amount</b></td>
</tr>
</table>
";



$header = '
<div style="margin-bottom:1000pt;">
<table width="100%" style="font-family:arial; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000; ">
<tr>
<td width="33%" align="center">
<span style="font-size:11pt; font-family:arial;"><b>Title</b></span>
</td>
</tr>
<tr>
<td width="33%" align="center"><span style="font-size:11pt; font-family:arial;"><b>Income Statement</b></span></td>
</tr>
<tr>
<td width="33%" style="text-align: right;" align="center"><span style="font-weight: bold;">2017</span></td>
</tr>
</table>
</div>
';


$footer = '<div style="font-size:8pt;">
<div style="float:left">Date printed:'.date("m/d/Y").'</div>
<div style="float:right">Printed by:</div>

</div>';


$mpdf=new mPDF('c','A4','','',15,15,34,25,16,13,'L'); 

//$mpdf=new mPDF('c','A4', '', '', 15, 15, 16, 16, 9, 9, 'L');
$mpdf->SetDisplayMode('fullpage');


$mpdf->SetHTMLHeader($header); //sets header
$mpdf->SetHTMLFooter($footer); //sets footer


$mpdf->WriteHTML($str);
$mpdf->Output("Income_statement_Report_".date("Y-m-d").".pdf","I"); //this is where you will place the output filename
exit;

?>