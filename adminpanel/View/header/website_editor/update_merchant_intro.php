<?php
require_once "connection.php";
$t1 = $_POST['m_title1'];
$t2 = $_POST['m_title2'];
$d1 = $_POST['m_desc1'];
$b1 = $_POST['m_btn_text'];
$bi = $_POST['m_btn_ic'];
$id = $_POST['mid'];

$up1 = "update merchant_intro_web set title1='".$t1."',title2='".$t2."',description='".$d1."',button_text='".$b1."',button_icon='".$bi."',updated_at=now() where id=".$id;

mysqli_query($cn,$up1);
// mysqli_query($cn,$up1);

?>