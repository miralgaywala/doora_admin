<?php
require_once "connection.php";

$d_btn = $_POST['doora_btn'];
$d_btn_icon = $_POST['d_btn_icon'];
$m_btn_icon = $_FILES['m_btn_icon']['name'];
$m_btn_r_url = $_POST['m_btn_r_url'];
$fb_btn_icon = $_FILES['fb_btn_icon']['name'];
$fb_btn_r_url = $_POST['fb_btn_r_url'];
$i_btn_icon = $_FILES['i_btn_icon']['name'];
$i_btn_r_url = $_POST['i_btn_r_url'];
$pp_link = $_POST['pp_link'];
$t_link = $_POST['t_link'];
$cr_text = $_POST['cr_text'];
$fid = $_POST['fid'];

// if(!empty($m_btn_icon) || !empty($fb_btn_icon) || !empty($i_btn_icon))
// {
// 	$up2 = "update home_footer_web set doora_btn_text='".$d_btn."',doora_btn_icon='".$d_btn_icon."',mail_button_icon='".$m_btn_icon."',mail_btn_redirection_url='".$m_btn_r_url."',fb_button_icon='".$fb_btn_icon."',fb_redirection_url='".$fb_btn_r_url."',insta_button_icon='".$i_btn_icon."',insta_redirection_url='".$i_btn_r_url."',privacy_policy_link='".$pp_link."',terms_link='".$t_link."',copyright_text='".$cr_text."',updated_at=now() where id=".$fid;

// 	mysqli_query($cn,$up2);
// }
// else
// {
	$up2 = "update home_footer_web set doora_btn_text='".$d_btn."',doora_btn_icon='".$d_btn_icon."',mail_btn_redirection_url='".$m_btn_r_url."',fb_redirection_url='".$fb_btn_r_url."',insta_redirection_url='".$i_btn_r_url."',privacy_policy_link='".$pp_link."',terms_link='".$t_link."',copyright_text='".$cr_text."',updated_at=now() where id=".$fid;

	mysqli_query($cn,$up2);
// }


$up1 = "select * from home_footer_web where id=".$fid;
$result = $cn->query($up1);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $m_btn_icon = $row['mail_button_icon'];
  $fb_btn_icon = $row['fb_button_icon'];
  $i_btn_icon = $row['insta_button_icon'];
}


move_uploaded_file($_FILES['m_btn_icon']['tmp_name'],SAVED_PATH_ADMIN.$m_btn_icon);
move_uploaded_file($_FILES['fb_btn_icon']['tmp_name'],SAVED_PATH_ADMIN.$fb_btn_icon);
move_uploaded_file($_FILES['i_btn_icon']['tmp_name'],SAVED_PATH_ADMIN.$i_btn_icon);

?>