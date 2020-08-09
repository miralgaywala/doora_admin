<?php
require_once "connection.php";
$t1 = $_POST['title3'];
$d1 = $_POST['desc3'];
$b1 = $_POST['btn_text3'];
$id = $_POST['did'];
$im = $_FILES['image_3']['name'];

// if(!empty($im))
// {
// 	$up1 = "update home_doora_dollars_web set title='".$t1."', description='".$d1."',button_text='".$b1."',image1='".$im."',updated_at=now() where id=".$id;
// 	echo $up1;
// }
// else
// {
	$up1 = "update home_doora_dollars_web set title='".$t1."', description='".$d1."',button_text='".$b1."',updated_at=now() where id=".$id;
// }

mysqli_query($cn,$up1);


$up1 = "select * from home_doora_dollars_web where id=".$id;
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $im = $row['image1'];
}


move_uploaded_file($_FILES['image_3']['tmp_name'],SAVED_PATH_ADMIN.$im);

?>