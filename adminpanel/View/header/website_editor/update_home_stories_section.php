<?php

	require_once "connection.php";
	$title = $_POST['title'];

	$up = "update home_section set stories_section_text='".$title."' where id=".$_POST['hid']; 
	 
	mysqli_query($cn,$up);

?>
