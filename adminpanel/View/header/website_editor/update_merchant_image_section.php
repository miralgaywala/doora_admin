<?php

	require_once "connection.php";
	$img1 = $_FILES['image1']['name'];

	if ($img1 != ''){
        $up = "update merchant_section set updated_at=now(), image_section_image='".$img1."' where id=".$_POST['hid'];
        mysqli_query($cn,$up);

	    $up1 = "select * from merchant_section where id=".$_POST['hid'];
	    $result = $cn->query($up1);
	    if ($result->num_rows > 0) {
  		    $row = $result->fetch_assoc();
  		    $img1 = $row['image_section_image'];
	    }

	    move_uploaded_file($_FILES['image1']['tmp_name'],SAVED_PATH_ADMIN.$img1);
    }
?>
