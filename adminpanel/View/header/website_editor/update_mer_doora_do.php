<?php
require_once "connection.php";
$img1 = $_FILES['img1']['name'];
$img2 = $_FILES['img2']['name'];
$img3 = $_FILES['img3']['name'];
$img4 = $_FILES['img4']['name'];
$img5 = $_FILES['img5']['name'];
$img6 = $_FILES['img6']['name'];

$desc1 = $_POST['m_desc1'];
$desc2 = $_POST['m_desc2'];
$desc3 = $_POST['m_desc3'];
$desc4 = $_POST['m_desc4'];
$desc5 = $_POST['m_desc5'];
$desc6 = $_POST['m_desc6'];

$did = $_POST['did'];


// if(!empty($img1) || !empty($img2) || !empty($img3) ||!empty($img4) ||!empty($img5)||!empty($img6))
// {
// 	$up1 = "update merchant_doora_do_web set image1='".$img1."',image1_desc='".$desc1."',image2='".$img2."',image2_desc='".$desc2."',image3='".$img3."',image3_desc='".$desc3."',image4='".$img4."',image4_desc='".$desc4."',image5='".$img5."',image5_desc='".$desc5."',image6='".$img6."',image6_desc='".$desc6."',updated_at=now() where id=".$did;
// }
// else
// {
	$up1 = "update merchant_doora_do_web set image1_desc='".$desc1."',image2_desc='".$desc2."',image3_desc='".$desc3."',image4_desc='".$desc4."',image5_desc='".$desc5."',image6_desc='".$desc6."',updated_at=now() where id=".$did;
// }
// echo $up1;
mysqli_query($cn,$up1);


$up1 = "select * from merchant_doora_do_web where id=".$did;
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $img1 = $row['image1'];
  $img2 = $row['image2'];
  $img3 = $row['image3'];
  $img4 = $row['image4'];
  $img5 = $row['image5'];
  $img6 = $row['image6'];
}


move_uploaded_file($_FILES['img1']['tmp_name'],SAVED_PATH_ADMIN_NEW.$img1);
move_uploaded_file($_FILES['img2']['tmp_name'],SAVED_PATH_ADMIN_NEW.$img2);
move_uploaded_file($_FILES['img3']['tmp_name'],SAVED_PATH_ADMIN_NEW.$img3);
move_uploaded_file($_FILES['img4']['tmp_name'],SAVED_PATH_ADMIN_NEW.$img4);
move_uploaded_file($_FILES['img5']['tmp_name'],SAVED_PATH_ADMIN_NEW.$img5);
move_uploaded_file($_FILES['img6']['tmp_name'],SAVED_PATH_ADMIN_NEW.$img6);

?>