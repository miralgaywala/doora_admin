<?php

	require_once "connection.php";
	$title = $_POST['title'];
    $subtitle1 = $_POST['subtitle1'];
	$desc1 = $_POST['desc1'];
    $subtitle2 = $_POST['subtitle2'];
	$desc2 = $_POST['desc2'];
    $subtitle3 = $_POST['subtitle3'];
	$desc3 = $_POST['desc3'];
	$subtitle4 = $_POST['subtitle4'];
	$desc4 = $_POST['desc4'];
	$img1 = $_FILES['image1']['name'];
    $chkimg = $_FILES['chkImage']['name'];

	$str = "update merchant_section set noapp_section_title='".$title."',noapp_section_subtitle1='".$subtitle1."',noapp_section_desc1='".$desc1."',noapp_section_subtitle2='".$subtitle2."',noapp_section_desc2='".$desc2."',noapp_section_subtitle3='".$subtitle3."',noapp_section_desc3='".$desc3."',noapp_section_subtitle4='".$subtitle4."',noapp_section_desc4='".$desc4."', updated_at=now()";
	
	if ($img1 != ''){
        $str .= " ,noapp_section_image='".$img1."' ";
    }
    if ($chkimg != ''){
        $str .= " ,noapp_section_checkbox_image='".$chkimg."' ";
    }

	$up = $str . " where id=".$_POST['hid'];
	mysqli_query($cn,$up);

	$up1 = "select * from merchant_section where id=".$_POST['hid'];
	$result = $cn->query($up1);
	if ($result->num_rows > 0) {
  		$row = $result->fetch_assoc();
  		$img1 = $row['noapp_section_image'];
        $chkimg = $row['noapp_section_checkbox_image'];
	}

	move_uploaded_file($_FILES['image1']['tmp_name'],SAVED_PATH_ADMIN.$img1);
    move_uploaded_file($_FILES['chkImage']['tmp_name'],SAVED_PATH_ADMIN.$chkimg);
	
?>
	
