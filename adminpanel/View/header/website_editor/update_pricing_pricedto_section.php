<?php
require_once "connection.php";
$t1 = $_POST['title'];
$t2 = $_POST['title1'];

$up1 = "update pricing_section set pricing_section_title1='".$t1."',pricing_section_title2='".$t2."', updated_at=now() where id=".$_POST['hid'];

mysqli_query($cn,$up1);

?>