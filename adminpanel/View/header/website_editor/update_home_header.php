<?php
require_once 'connection.php';

$im = $_FILES['img1']['name'];
$id = $_POST['hid'];


// if(!empty($im))
// {
// 	$up1 = "update home_header_web set image1='".$im."',updated_at=now() where id=".$id;
// 	mysqli_query($cn,$up1);	
// }
// else
// {
	$up1 = "update home_header_web set updated_at=now() where id=".$id;
	mysqli_query($cn,$up1);
// }


$up1 = "select * from home_header_web where id=".$id;
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $im = $row['image1'];
}


move_uploaded_file($_FILES['img1']['tmp_name'],SAVED_PATH_ADMIN_NEW.$im);

?>