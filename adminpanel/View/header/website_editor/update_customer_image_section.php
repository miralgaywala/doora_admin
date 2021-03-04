<?php

	require_once "connection.php";
	$img1 = $_FILES['image1']['name'];
    $img2 = $_FILES['image2']['name'];
    $img3 = $_FILES['image3']['name'];

    $str = "update customer_section set updated_at=now()";

	if ($img1 != ''){
        $str .= " ,image_section_image1='".$img1."' ";
    }
    if ($img2 != ''){
        $str .= " ,image_section_image2='".$img2."' ";
    }
    if ($img3 != ''){
        $str .= " ,image_section_image3='".$img3."' ";
    }

    $up = $str . " where id=".$_POST['hid']; 
	mysqli_query($cn,$up);

	$up1 = "select * from customer_section where id=".$_POST['hid'];
	$result = $cn->query($up1);
	if ($result->num_rows > 0) {
  		$row = $result->fetch_assoc();
  		$img1 = $row['image_section_image1'];
        $img2 = $row['image_section_image2'];
        $img3 = $row['image_section_image3'];
	}

	move_uploaded_file($_FILES['image1']['tmp_name'],SAVED_PATH_ADMIN.$img1);
    move_uploaded_file($_FILES['image2']['tmp_name'],SAVED_PATH_ADMIN.$img2);
    move_uploaded_file($_FILES['image3']['tmp_name'],SAVED_PATH_ADMIN.$img3);
?>
