<?php
require_once "connection.php";
$img1 = $_FILES['im_1']['name'];
$img2 = $_FILES['im_2']['name'];
$img3 = $_FILES['im_3']['name'];

$tit1 = $_POST['title_1'];
$tit2 = $_POST['title_2'];
$tit3 = $_POST['title_3'];

$desc1 = $_POST['desc_1'];
$desc2 = $_POST['desc_2'];
$desc3 = $_POST['desc_3'];

$custid = $_POST['custid'];


// if(!empty($img1) || !empty($img2) || !empty($img3))
// {
// 	$updt = "update customer_about_web set image1='".$img1."',image1_title='".$tit1."',image1_desc='".$desc1."',image2='".$img2."',image2_title='".$tit2."',image2_desc='".$desc2."',image3='".$img3."',image3_title='".$tit3."',image3_desc='".$desc3."',updated_at=now() where id=".$custid;
// }
// else
// {
	$updt = "update customer_about_web set image1_title='".$tit1."',image1_desc='".$desc1."',image2_title='".$tit2."',image2_desc='".$desc2."',image3_title='".$tit3."',image3_desc='".$desc3."',updated_at=now() where id=".$custid;
// }

mysqli_query($cn,$updt);


$up1 = "select * from customer_about_web where id=".$custid;
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $img1 = $row['image1'];
  $img2 = $row['image2'];
  $img3 = $row['image3'];
}


move_uploaded_file($_FILES['im_1']['tmp_name'],SAVED_PATH_ADMIN.$img1);
move_uploaded_file($_FILES['im_2']['tmp_name'],SAVED_PATH_ADMIN.$img2);
move_uploaded_file($_FILES['im_3']['tmp_name'],SAVED_PATH_ADMIN.$img3);
?>