<?php 
include "../../Model/subscription_package/subscription_model.php";
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
	public function add_subscription()
	{
		if(isset($_POST['subscription_submit']) && !empty($_POST['subscription_submit']))
		{
            $price =$_POST['price'];
            $per_deal_redeem_price =$_POST['per_deal_redeem_price'];
            $free_days =$_POST['free_days'];
            $add_subscription=$this->subscription_model->addsubscription_data($price,$per_deal_redeem_price,$free_days);
            if($add_subscription=="1")
			{
			echo '<script>window.location.href="../../Controller/subscription_package/displaysubscription_controller.php?id=0";</script>';
			}
			else
			{
				echo '<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Subscription plan already Exists!!
            </div>'; 
			}
        }
	}
	public function editlist_subscription($subscription_id)
	{
		$edit_subscription=$this->subscription_model->getedits_subscription($subscription_id);
		include "../../View/subscription_package/editsubscription.php";
	
		return $edit_subscription;
	}
	public function edit_subscription()
	{
		if(isset($_POST['subscription_submit']) && !empty($_POST['subscription_submit']))
		{
			$subscription_plan_id= $_POST['subscription_plan_id'];
            $price =$_POST['price'];
            $per_deal_redeem_price =$_POST['per_deal_redeem_price'];
            $free_days =$_POST['free_days'];
            $add_subscription=$this->subscription_model->editsubscription_data($subscription_plan_id,$price,$per_deal_redeem_price,$free_days);
            if($add_subscription=="2")
			{
			echo '<script>window.location.href="../../Controller/subscription_package/displaysubscription_controller.php?id=2";</script>';
			}
			else
			{
					echo '<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Subscription plan already Exists!!
            </div>'; 
			}
        }
	}
	public function delete_subscription($subscription_id)
	{
		$this->subscription_model->delete_subscription($subscription_id);
		echo '<script>window.location.href="../../Controller/subscription_package/displaysubscription_controller.php?id=3";</script>';
	}
	public function view_subscription($subscription_id)
	{
		$view_subscription=$this->subscription_model->getview_subscription($subscription_id);
		include "../../View/subscription_package/viewsubscription.php";
		return $view_subscription;
	}
}
?>