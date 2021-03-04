<?php

	require_once "connection.php";
	$title = $_POST['title'];
	$desc1 = $_POST['desc1'];
	$desc2 = $_POST['desc2'];
	$desc3 = $_POST['desc3'];
    $desc4 = $_POST['desc4'];
    $desc5 = $_POST['desc5'];
    $desc6 = $_POST['desc6'];
	$btn_text = $_POST['btnname'];
	$img1 = $_FILES['image1']['name'];
    $img2 = $_FILES['image2']['name'];
    $img3 = $_FILES['image3']['name'];
    $img4 = $_FILES['image4']['name'];
    $img5 = $_FILES['image5']['name'];
    $img6 = $_FILES['image6']['name'];

	$str = "update merchant_section set technology_section_title='".$title."', technology_section_desc1='".$desc1."',technology_section_desc2='".$desc2."',technology_section_desc3='".$desc3."', technology_section_desc4='".$desc4."',technology_section_desc5='".$desc5."',technology_section_desc6='".$desc6."', technology_section_button_text='".$btn_text."', updated_at=now()";
	
	if ($img1 != ''){
        $str .= " ,technology_section_image1='".$img1."' ";
    }
    if ($img2 != ''){
        $str .= " ,technology_section_image2='".$img2."' ";
    }
    if ($img3 != ''){
        $str .= " ,technology_section_image3='".$img3."' ";
    }
    if ($img4 != ''){
        $str .= " ,technology_section_image4='".$img4."' ";
    }
    if ($img5 != ''){
        $str .= " ,technology_section_image5='".$img5."' ";
    }
    if ($img6 != ''){
        $str .= " ,technology_section_image6='".$img6."' ";
    }

	$up = $str . " where id=".$_POST['hid'];
	mysqli_query($cn,$up);

	$up1 = "select * from merchant_section where id=".$_POST['hid'];
	$result = $cn->query($up1);
	if ($result->num_rows > 0) {
  		$row = $result->fetch_assoc();
  		$img1 = $row['technology_section_image1'];
        $img2 = $row['technology_section_image2'];
        $img3 = $row['technology_section_image3'];
        $img4 = $row['technology_section_image4'];
        $img5 = $row['technology_section_image5'];
        $img6 = $row['technology_section_image6'];
	}

	move_uploaded_file($_FILES['image1']['tmp_name'],SAVED_PATH_ADMIN.$img1);
    move_uploaded_file($_FILES['image2']['tmp_name'],SAVED_PATH_ADMIN.$img2);
    move_uploaded_file($_FILES['image3']['tmp_name'],SAVED_PATH_ADMIN.$img3);
    move_uploaded_file($_FILES['image4']['tmp_name'],SAVED_PATH_ADMIN.$img4);
    move_uploaded_file($_FILES['image5']['tmp_name'],SAVED_PATH_ADMIN.$img5);
    move_uploaded_file($_FILES['image6']['tmp_name'],SAVED_PATH_ADMIN.$img6);
	
?>
	
