<?php
include "../../Model/send_code/sendcode_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'add')
	{
		$email_name = $_POST['email_name'];
		$radioValue = $_POST['radioValue'];
    	$sendcode_controller=new sendcode_controller();
	 	$result=$sendcode_controller->send_code($email_name,$radioValue);
	 	//print_r($result);
	 	if($result == "send")
	 	{
	 		echo "#send";
	 	}
	 	elseif($result == "notsend")
	 	{
	 		echo "#notsend";
	 	}
	 	else
	 	{
	 		echo "#not";
	 	}
	}
}
class sendcode_controller
{
	public function __construct()
	{
		$this->sendcode_model=new sendcode_model();
	}
	public function send_code($email_name,$radioValue)
	{
			$sendcode_model=$this->sendcode_model->send_code($email_name,$radioValue);
			return $sendcode_model;
	}
}
?>