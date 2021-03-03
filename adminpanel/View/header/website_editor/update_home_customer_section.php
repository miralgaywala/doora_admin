<?php

	require_once "connection.php";
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$btn_text = $_POST['btnname'];

	$up = "update home_section set customer_section_title='".$title."',customer_section_description='".$desc."',customer_section_button_text='".$btn_text."' where id=".$_POST['hid']; 
	 
	mysqli_query($cn,$up);

?>
