<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/business/business_model.php");
class business_controller
{
	public function __construct()
	{
		$this->business_model=new business_model();
	}
	public function display_businessuser($msg)
	{
		$display_businessuser=$this->business_model->getdisplay_businessuser();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/business/displaybusinessuser.php");
		return $display_businessuser;
	}
	public function view_businessbranch($user_id)
	{
		$view_businessbranch=$this->business_model->getbusinessbranchdetail($user_id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/business/viewbusinessbranch.php');
		return $view_businessbranch;
	}
	public function view_branch($frenchise_id)
	{
		$view_branch=$this->business_model->getbranchdetail($frenchise_id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/business/viewbranchdetail.php');
		return $view_branch;
	}
	public function is_active($id,$data)
	{
		$is_active=$this->business_model->updateactive($id,$data);
		if($is_active=="1")
		{
			echo "<script>window.location.href='/doora/adminpanel/Controller/business/displaybusinesslist_controller.php?id=2';</script>";
		}
		else
		{
			echo "<script>window.location.href='/doora/adminpanel/Controller/business/displaybusinesslist_controller.php?id=1';</script>";			
		}
	}
	public function delete_business($id)
	{
		$this->business_model->deletebusiness($id);
		echo "<script>window.location.href='/doora/adminpanel/Controller/business/displaybusinesslist_controller.php?id=3';</script>";
	}
	public function viewbusiness_detail($id)
	{
		$viewbusiness_detail=$this->business_model->getbusinessdetail($id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/business/viewbuisnessdetail.php');
		return $viewbusiness_detail;
	}
}
?>