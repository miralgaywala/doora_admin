<?php 
include "../../Model/customer/customer_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$id=$_POST['id'];
		$customer_controller=new customer_controller();
		$result=$customer_controller->delete_customer($id);
		echo "#delete";

	}
	if($_POST['count_id'] == 'request')
	{
		$id=$_POST['id'];
		$data=$_POST['value'];
		$customer_controller=new customer_controller();
		$result=$customer_controller->is_active($id,$data);
		if($result==1)
		{
			echo "#active";
			
		}
		else
		{
			echo "#deactive";
		}

	}
	
}
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
		return $is_active;
	}
	public function delete_customer($id)
	{
		$this->customer_model->deletecustomer($id);
		return true;
	}
	public function filter_business($msg)
	{
		if($msg == "f1")
		{
			$display_customer=$this->customer_model->getactivatefilter($msg);
			include "../../View/customer/displaycustomer.php";
			
		}
		elseif ($msg == "f2") {
			$display_customer=$this->customer_model->getdeactivatefilter($msg);
			include "../../View/customer/displaycustomer.php";
		}
		elseif ($msg == "f3") {
			$display_customer=$this->customer_model->getdeleteedilter($msg);
			include "../../View/customer/displaycustomer.php";
		}
		else
		{
			$display_customer=$this->customer_model->getdisplay_customer();
			include "../../View/customer/displaycustomer.php";
		}
		
	}
}
?>