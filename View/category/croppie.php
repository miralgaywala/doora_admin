<?php
$data=$_POST['category_image'];
list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);
$data = base64_decode($data);
//$imageName = mt_rand(1, 99999) . '.jpg';
$count=count (glob ($_SERVER['DOCUMENT_ROOT'].'/doora/images/category/*'));
//echo $count;
$imageName = $count + 1 . '.jpg';
echo $imageName;
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/doora/images/category/' . $imageName, $data);
?>