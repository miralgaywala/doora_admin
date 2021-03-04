<?php

	require_once "connection.php";
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$img1 = $_FILES['image1']['name'];
	$btn_text = $_POST['btnname'];
	$btn_icon = $_POST['btn_icon'];
	$link_text = $_POST['link_text'];
    $link_url = $_POST['link_url'];

	if ($img1 != ''){
		$up = "update home_section set getmore_section_title='".$title."',getmore_section_description='".$desc."',getmore_section_image='".$img1."',getmore_section_button_text='".$btn_text."',getmore_section_button_icon='".$btn_icon."',getmore_section_link_text='".$link_text."', getmore_section_link_url = '". $link_url ."', updated_at=now()  where id=".$_POST['hid']; 
		mysqli_query($cn,$up);

		$up1 = "select * from home_section where id=".$_POST['hid'];
		$result = $cn->query($up1);
		if ($result->num_rows > 0) {
  			$row = $result->fetch_assoc();
  			$img1 = $row['getmore_section_image'];
		}

		move_uploaded_file($_FILES['image1']['tmp_name'],SAVED_PATH_ADMIN.$img1);
	}else{
		$up = "update home_section set getmore_section_title='".$title."',getmore_section_description='".$desc."',getmore_section_button_text='".$btn_text."',getmore_section_button_icon='".$btn_icon."',getmore_section_link_text='".$link_text."', getmore_section_link_url = '". $link_url ."', updated_at=now()  where id=".$_POST['hid']; 
		mysqli_query($cn,$up);
	}

?>
