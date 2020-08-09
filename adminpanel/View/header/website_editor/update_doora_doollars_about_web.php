<?php
require_once "connection.php";
$tit = $_POST['title1'];
$desc = $_POST['desc1'];
$btn = $_POST['btn_text'];
$img = $_FILES['image_1']['name'];

// if(!empty($img))
// {
// 	$updt = "update doora_doollars_about_web set title='".$tit."',description='".$desc."',button_text='".$btn."',image1='".$img."' where id=".$_POST['ddid'];

// 	mysqli_query($cn,$updt);
// }
// else
// {
	$updt = "update doora_doollars_about_web set title='".$tit."',description='".$desc."',button_text='".$btn."' where id=".$_POST['ddid'];

	mysqli_query($cn,$updt);
// }


$up1 = "select * from doora_doollars_about_web where id=".$_POST['ddid'];
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $img = $row['image1'];
}


move_uploaded_file($_FILES['image_1']['tmp_name'],SAVED_PATH_ADMIN.$img);
?>