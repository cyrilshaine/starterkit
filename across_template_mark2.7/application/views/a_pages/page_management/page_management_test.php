<?php



$directoryName = './application/views/a_pages/aaa';
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755, true);
echo "Folder created";



}



$my_file = $directoryName.'/file1.php';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

$data = '
<?php  
echo "dsfgdgd";
echo "dsfgdgd";
 ?>';
fwrite($handle, $data);





$my_file = $directoryName.'/file2.php';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

$data = '
<?php  
echo "111111";
echo "dsfgdgd";
 ?>';
fwrite($handle, $data);


?>