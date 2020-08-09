<?php

	require_once "connection.php";
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$btn = $_POST['btnname'];
	$redirect = $_POST['txtbtnredirect'];
	$icon = $_POST['icon'];

	$up = "update home_intro_web set title='".$title."',description='".$desc."',button_name='".$btn."',buttion_icon='".$icon."',button_redirect_url='".$redirect."' where id=".$_POST['hid']; 
	 
	mysqli_query($cn,$up);

?>
