<?php

	require_once "connection.php";
	$title = $_POST['title'];
	$desc = $_POST['desc'];

	$up = "update home_section set notification_section_title='".$title."',notification_section_description='".$desc."' where id=".$_POST['hid']; 
	 
	mysqli_query($cn,$up);

?>
