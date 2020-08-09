<?php
include "../../Model/send_code/sendcode_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'add')
	{
		$email_name = $_POST['email_name'];
    	$sendcode_controller=new sendcode_controller();
	 	$result=$sendcode_controller->send_code($email_name);
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
	public function send_code($email_name)
	{
			$sendcode_model=$this->sendcode_model->send_code($email_name);
			return $sendcode_model;
	}
}
?>