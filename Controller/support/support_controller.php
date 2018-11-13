<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/support/support_model.php");
class support_controller
{
	public function __construct()
	{
		$this->support_model=new support_model();
	}
	public function display_support($msg)
	{
		$display_support=$this->support_model->getdisplay_support();
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/support/displaysupport.php');
		return $display_support;
	}
	public function view_support($support_id)
	{
		$display_support=$this->support_model->getview_support($support_id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/support/viewsupport.php');
		return $display_support;
	}
	public function delete_support($support_id)
	{
		$this->support_model->deletesupport($support_id);
		echo '<script>window.location.href="/doora/adminpanel/Controller/support/viewsupport_controller.php?id=3";</script>';
	}
	public function is_open($id,$data)
	{

		$is_open=$this->support_model->updateopen($id,$data);
		if($is_open=="2")
		{
			echo "<script>window.location.href='/doora/adminpanel/Controller/support/viewsupport_controller.php?id=2';</script>";
		}
		else
		{
			echo "<script>window.location.href='/doora/adminpanel/Controller/support/viewsupport_controller.php?id=0';</script>";			
		}
	}
}