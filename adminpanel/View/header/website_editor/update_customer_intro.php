<?php
require_once "connection.php";
$t1 = $_POST['title1'];
$t2 = $_POST['title2'];
$d1 = $_POST['desc1'];
$b1 = $_POST['btn_text'];
$bi = $_POST['btn_ic'];
$id = $_POST['hiddenid'];

$up1 = "update customer_intro_web set title_1='".$t1."',title_2='".$t2."',description='".$d1."',button_text='".$b1."',button_icon='".$bi."',updated_at=now() where id=".$id;

mysqli_query($cn,$up1);

?>