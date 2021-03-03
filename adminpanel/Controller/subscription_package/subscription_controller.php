<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "../../Model/subscription_package/subscription_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$subscription_id=$_POST['id'];
		$subscription_controller=new subscription_controller();
		$result=$subscription_controller->delete_subscription($subscription_id);
		echo "#delete";

	}
	if($_POST['count_id'] == 'add')
	{
		// $price =$_POST['price'];
        // $per_deal_redeem_price =$_POST['per_deal_redeem_price'];
        // // $free_days =$_POST['free_days'];
    	// $subscription_controller=new subscription_controller();
	 	// $result=$subscription_controller->add_subscription($price,$per_deal_redeem_price);
	 	// if($result == 1)
	 	// {
	 	// 	echo "#add";
	 	// }
	 	// else
	 	// {
	 	// 	echo "#exists";
	 	// }


		$price =$_POST['price'];
		$type =$_POST['type'];
		$desc =$_POST['desc'];
        // $per_deal_redeem_price =$_POST['per_deal_redeem_price'];
        // $free_days =$_POST['free_days'];
    	$subscription_controller=new subscription_controller();
	 	$result=$subscription_controller->add_subscription($price,$type,$desc);
	 	if($result == 1)
	 	{
	 		echo "#add";
	 	}
	 	else
	 	{
	 		echo "#exists";
	 	}
	}
	if($_POST['count_id'] == 'edit')
	{
		$subscription_plan_id= $_POST['subscription_plan_id'];
		$price =$_POST['price'];
		$type =$_POST['type'];
		$desc =$_POST['desc'];

		// echo "price: "+$price;
		// echo "type: "+$type;
		// echo "desc: "+$desc;
        // $free_days =$_POST['free_days'];
    	
		$subscription_controller=new subscription_controller();
	 	$result=$subscription_controller->edit_subscription($subscription_plan_id,$price,$type,$desc);
	 	if($result == 1)
	 	{
	 		echo "#edit";
	 	}
	 	else
	 	{
	 		echo "#exists";
	 	}
	}
}
class subscription_controller
{
	public function __construct()
	{
		$this->subscription_model=new subscription_model();
	}
	public function display_subscription($msg)
	{
		$display_subscription=$this->subscription_model->getdisplay_subscription();
		include "../../View/subscription_package/displaysubscription.php";
		return $display_subscription;
	}
	public function add_subscription($price,$type,$desc)
	{
		
            $add_subscription=$this->subscription_model->addsubscription_data($price,$type,$desc);
            return $add_subscription;
	}
	public function editlist_subscription($subscription_id)
	{
		$edit_subscription=$this->subscription_model->getedits_subscription($subscription_id);
		include "../../View/subscription_package/editsubscription.php";
		
	}
	public function edit_subscription($subscription_plan_id,$price,$type,$desc)
	{
		
            $add_subscription=$this->subscription_model->editsubscription_data($subscription_plan_id,$price,$type,$desc);
            return $add_subscription;
	}
	public function delete_subscription($subscription_id)
	{
		$this->subscription_model->delete_subscription($subscription_id);
		return true;
	}
	public function view_subscription($subscription_id)
	{
		$view_subscription=$this->subscription_model->getview_subscription($subscription_id);
		include "../../View/subscription_package/viewsubscription.php";
		return $view_subscription;
	}
}
?>