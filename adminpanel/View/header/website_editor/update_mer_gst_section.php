<?php
require_once "connection.php";
$title1 = $_POST['title1'];
$title2 = $_POST['title2'];
$title3 = $_POST['title3'];
$img = $_FILES['image']['name'];

$up = "update merchant_gst_section set title1 = '".$title1."' , title2 = '".$title2."', title3 = '".$title3."',  updated_at = now() where id = ".$_POST['mgid'];

mysqli_query($cn,$up);

$up1 = "select * from merchant_gst_section where id=".$_POST['mgid'];
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $img = $row['image']; 
}
// move_uploaded_file($_FILES['image']['tmp_name'],SAVED_PATH_ADMIN.$img);
move_uploaded_file($_FILES['image']['tmp_name'],"Upload/".$img);

?>