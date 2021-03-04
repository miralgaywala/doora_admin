<?php
	require_once "connection.php";
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$btn_text = $_POST['btnname'];
	$btn_icon = $_POST['btn_icon'];

	$up = "update customer_section set searchless_section_title='".$title."',searchless_section_description='".$desc."',searchless_section_button_text='".$btn_text."',searchless_section_button_icon='".$btn_icon."', updated_at=now() where id=".$_POST['hid']; 
	mysqli_query($cn,$up);
?>
