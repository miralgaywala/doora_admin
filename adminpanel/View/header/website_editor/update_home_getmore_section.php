<?php

	require_once "connection.php";
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$btn_text = $_POST['btnname'];
	$btn_icon = $_POST['btn_icon'];
	$link_text = $_POST['link_text'];
    $link_url = $_POST['link_url'];

	$up = "update home_section set getmore_section_title='".$title."',getmore_section_description='".$desc."',getmore_section_button_text='".$btn_text."',getmore_section_button_icon='".$btn_icon."',getmore_section_link_text='".$link_text."', getmore_section_link_url = '". $link_url ."'  where id=".$_POST['hid']; 
	 
	mysqli_query($cn,$up);

?>
