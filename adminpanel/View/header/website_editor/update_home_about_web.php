<?php
require_once "connection.php";
$img1 = $_FILES['image1']['name'];
$img2 = $_FILES['image2']['name'];
$img3 = $_FILES['image3']['name'];

// if(!empty($img1) || !empty($img2) || !empty($img3))
// {
// 	$upt = "update home_about_web set image1='".$img1."',image2='".$img2."',image3='".$img3."',updated_at=now() where id=".$_POST['hid'];
// 	mysqli_query($cn,$upt);

// }
// else
// {
	$upt = "update home_about_web set updated_at=now() where id=".$_POST['hid'];
	mysqli_query($cn,$upt);

// }


$up1 = "select * from home_about_web where id=".$_POST['hid'];
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $img1 = $row['image1'];
  $img2 = $row['image2'];
  $img3 = $row['image3'];
}



move_uploaded_file($_FILES['image1']['tmp_name'],SAVED_PATH_ADMIN.$img1);
move_uploaded_file($_FILES['image2']['tmp_name'],SAVED_PATH_ADMIN.$img2);
move_uploaded_file($_FILES['image3']['tmp_name'],SAVED_PATH_ADMIN.$img3);

?>