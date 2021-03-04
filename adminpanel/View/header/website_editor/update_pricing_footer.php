<?php

	require_once "connection.php";
	$btn_text = $_POST['btnname'];
	$btn_icon = $_POST['btn_icon'];
	$icon1 = $_POST['icon1'];
	$icon2 = $_POST['icon2'];
	$icon3 = $_POST['icon3'];

	$up = "update pricing_section set footer_button_text='".$btn_text."',footer_button_icon='".$btn_icon."',footer_icon1='".$icon1."',footer_icon2='".$icon2."',footer_icon3='".$icon3."' where id=".$_POST['hid']; 
	 
	mysqli_query($cn,$up);

?>
