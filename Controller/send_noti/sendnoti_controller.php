<?php
include "../../Model/send_noti/sendnoti_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'A4')
	{
		$controller = new sendnoti_controller();
		$result=$controller->filter_business();
	}
	if($_POST['count_id'] == 'A5')
	{
		$controller = new sendnoti_controller();
		$result=$controller->filter_customer();
	}
	if($_POST['count_id'] == 'A1')
	{
		$notification_body = $_POST['notification_body'];
		$notification_title = $_POST['notification_title'];
		$controller = new sendnoti_controller();
		$result=$controller->all_bucu($notification_body,$notification_title);
	}
	if($_POST['count_id'] == 'A2')
	{
		$notification_body = $_POST['notification_body'];
		$notification_title = $_POST['notification_title'];
		$controller = new sendnoti_controller();
		$result=$controller->all_business($notification_body,$notification_title);
	}
	if($_POST['count_id'] == 'A3')
	{
		$notification_body = $_POST['notification_body'];
		$notification_title = $_POST['notification_title'];
		$controller = new sendnoti_controller();
		$result=$controller->all_customer($notification_body,$notification_title);
	}
	if($_POST['count_id'] == 'sb')
	{
		$notification_body = $_POST['notification_body'];
		$notification_title = $_POST['notification_title'];
		$user_group = $_POST['usergroup_value'];
		$controller = new sendnoti_controller();
		$result=$controller->specific_business($notification_body,$notification_title,$user_group);
	}
	if($_POST['count_id'] == 'sc')
	{
		$notification_body = $_POST['notification_body'];
		$notification_title = $_POST['notification_title'];
		$user_group = $_POST['usergroup_value'];
		$controller = new sendnoti_controller();
		$result=$controller->specific_customer($notification_body,$notification_title,$user_group);
	}
}
class sendnoti_controller
{
	public function __construct()
	{
		$this->sendnoti_model=new sendnoti_model();
	}
	public function filter_business()
	{	
		$display_businessuser=$this->sendnoti_model->getdisplay_businessuser();
		include "../../View/send_noti/displaybusinessuser.php";
	}
	public function filter_customer()
	{	
		$display_businessuser=$this->sendnoti_model->getdisplay_customer();
		include "../../View/send_noti/displaybusinessuser.php";
	}
	public function all_bucu($notification_body,$notification_title)
	{
		$display_businessuser=$this->sendnoti_model->all_bucu($notification_body,$notification_title);
	}
	public function all_business($notification_body,$notification_title)
	{
		$display_businessuser=$this->sendnoti_model->all_business($notification_body,$notification_title);
	}
	public function all_customer($notification_body,$notification_title)
	{
		$display_businessuser=$this->sendnoti_model->all_customer($notification_body,$notification_title);
	}
	public function specific_business($notification_body,$notification_title,$user_group)
	{
		$display_businessuser=$this->sendnoti_model->specific_business($notification_body,$notification_title,$user_group);
	}
	public function specific_customer($notification_body,$notification_title,$user_group)
	{
		$display_businessuser=$this->sendnoti_model->specific_customer($notification_body,$notification_title,$user_group);
	}
}