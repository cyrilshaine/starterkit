<?php
$imgid=$_POST['imgid'];

$img=$this->mainmodel->getImageDatas($imgid);

$loc=(count($img)==0)?"":base_url()."".$img[0]['img_location'];

echo ($loc=="")?"<span class='glyphicon glyphicon-user' style='background:#FFF; font-size:190px; margin-top:1%;'></span>":"<img class='img-responsive' src='$loc' style='width:200px; margin-top:5%; height:190px;'>";


?>