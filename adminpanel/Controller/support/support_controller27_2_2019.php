<?php
include "../../Model/support/support_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$support_id=$_POST['id'];
		$support_controller=new support_controller();
		$result=$support_controller->delete_support($support_id);
		echo "#delete";

	}
	if($_POST['count_id'] == 'request')
	{
		$id=$_POST['id'];
		$data=$_POST['value'];
		$support_controller=new support_controller();
		$result=$support_controller->is_open($id,$data);
		if($result==2)
		{
			echo "#open";
		}
		else
		{
			echo "#close";
		}

	}
	
}
class support_controller
{
	public function __construct()
	{
		$this->support_model=new support_model();
	}
	public function display_support($msg)
	{
		$display_support=$this->support_model->getdisplay_support();
		//print_r($display_support);
		include "../../View/support/displaysupport.php";
	
		return $display_support;
	}
	public function view_support($support_id)
	{
		$display_support=$this->support_model->getview_support($support_id);
		include "../../View/support/viewsupport.php";
	
		return $display_support;
	}
	public function delete_support($support_id)
	{
		$this->support_model->deletesupport($support_id);
	}
	public function is_open($id,$data)
	{
		$is_open=$this->support_model->updateopen($id,$data);
		return $is_open;
	}
}