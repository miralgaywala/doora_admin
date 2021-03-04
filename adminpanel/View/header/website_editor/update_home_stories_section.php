<?php

	require_once "connection.php";
	$title = $_POST['title'];
	$img1 = $_FILES['image1']['name'];

	if ($img1 != ''){
		$up = "update home_section set stories_section_text='".$title."',stories_section_image='".$img1."', updated_at=now() where id=".$_POST['hid']; 
	 	mysqli_query($cn,$up);

		$up1 = "select * from home_section where id=".$_POST['hid'];
		$result = $cn->query($up1);
		if ($result->num_rows > 0) {
  			$row = $result->fetch_assoc();
  			$img1 = $row['stories_section_image'];
		}

		move_uploaded_file($_FILES['image1']['tmp_name'],SAVED_PATH_ADMIN.$img1);
	}else{
		$up = "update home_section set stories_section_text='".$title."', updated_at=now() where id=".$_POST['hid']; 
	 	mysqli_query($cn,$up);
	}
?>
