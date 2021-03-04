<?php
	require_once "connection.php";
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$btn_text = $_POST['btnname'];

	$up = "update merchant_section set makestories_section_title='".$title."',makestories_section_description='".$desc."',makestories_section_button_text='".$btn_text."', updated_at=now() where id=".$_POST['hid']; 
	mysqli_query($cn,$up);
?>
