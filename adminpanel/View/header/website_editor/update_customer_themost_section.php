<?php

	require_once "connection.php";
	$title = $_POST['title'];
    $subtitle1 = $_POST['subtitle1'];
	$desc1 = $_POST['desc1'];
    $subtitle2 = $_POST['subtitle2'];
	$desc2 = $_POST['desc2'];
    $subtitle3 = $_POST['subtitle3'];
	$desc3 = $_POST['desc3'];
	$btn_text = $_POST['btnname'];
	$btn_icon = $_POST['btn_icon'];
	$img1 = $_FILES['image1']['name'];
    $img2 = $_FILES['image2']['name'];
    $img3 = $_FILES['image3']['name'];

	$str = "update customer_section set themost_section_title='".$title."',themost_section_subtitle1='".$subtitle1."',themost_section_desc1='".$desc1."',themost_section_subtitle2='".$subtitle2."',themost_section_desc2='".$desc2."',themost_section_subtitle3='".$subtitle3."',themost_section_desc3='".$desc3."',themost_section_button_text='".$btn_text."',themost_section_button_icon='".$btn_icon."', updated_at=now()";
	
	if ($img1 != ''){
        $str .= " ,themost_section_icon1='".$img1."' ";
    }
    if ($img2 != ''){
        $str .= " ,themost_section_icon2='".$img2."' ";
    }
    if ($img3 != ''){
        $str .= " ,themost_section_icon3='".$img3."' ";
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
	
