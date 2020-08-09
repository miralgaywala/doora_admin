<?php
require_once "connection.php";
$t1 = $_POST['title2'];
$d1 = $_POST['desc2'];
$b1 = $_POST['btn_text1'];
$id = $_POST['mid'];
$im = $_FILES['image_2']['name'];

// if(!empty($im))
// {
// 	$up1 = "update home_merchant_web set title='".$t1."', description='".$d1."',button_text='".$b1."',image1='".$im."' where id=".$id;
// }
// else
// {
	$up1 = "update home_merchant_web set title='".$t1."', description='".$d1."',button_text='".$b1."' where id=".$id;
// }


mysqli_query($cn,$up1);

$up1 = "select * from home_merchant_web where id=".$id;
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $im = $row['image1'];
}

move_uploaded_file($_FILES['image_2']['tmp_name'],SAVED_PATH_ADMIN.$im);

?>