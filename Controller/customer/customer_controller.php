<?php 
include "../../Model/customer/customer_model.php";
class customer_controller
{
	public function __construct()
	{
		$this->customer_model=new customer_model();
	}
	public function display_customer($msg)
	{
		$display_customer=$this->customer_model->getdisplay_customer();
		include "../../View/customer/displaycustomer.php";
		return $display_customer;
	}
	public function viewcustomer_detail($id)
	{
		$viewcustomer_detail=$this->customer_model->getcustomerdetail($id);
		include "../../View/customer/viewcustomer_detail.php";
		
		return $viewcustomer_detail;
	}
	public function is_active($id,$data)
	{
		$is_active=$this->customer_model->updateactive($id,$data);
		if($is_active=="1")
		{
			echo "<script>window.location.href='../../Controller/customer/displaycustomerlist_controller.php?id=2';</script>";
		}
		else
		{
			echo "<script>window.location.href='../../Controller/customer/displaycustomerlist_controller.php?id=1';</script>";			
		}
	}
	public function delete_customer($id)
	{
		$this->customer_model->deletecustomer($id);
		echo "<script>window.location.href='../../Controller/customer/displaycustomerlist_controller.php?id=3';</script>";
	}
}
?>