<?php
$data=$_POST['category_image'];
list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);
$data = base64_decode($data);
//$imageName = mt_rand(1, 99999) . '.jpg';
$t=time();
$count=count (glob ('../../../images/category/*'));
//echo $count;
$imageName = "cate_".$t. '.jpg';
echo $imageName;
file_put_contents('../../../images/category/' . $imageName, $data);
?>