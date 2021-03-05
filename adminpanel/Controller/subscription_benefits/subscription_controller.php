<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "../../Model/subscription_benefits/benefits_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$benefit_id=$_POST['id'];
		$subscription_controller=new subscription_controller();
		$result=$subscription_controller->delete_subscription($benefit_id);
		echo "#delete";

	}
	if($_POST['count_id'] == 'add')
	{
		$title =$_POST['title'];
		$is_main =$_POST['is_main'];
		$s_id =$_POST['sid'];
		
    	$subscription_controller=new subscription_controller();
	 	$result=$subscription_controller->add_subscription($title,$is_main,$s_id);
		echo $result;
	}
	if($_POST['count_id'] == 'edit')
	{
		$benefit_id= $_POST['benefit_id'];
		$title =$_POST['title'];
		$is_main =$_POST['is_main'];
		$s_id =$_POST['sid'];
	
		$subscription_controller=new subscription_controller();
	 	$result=$subscription_controller->edit_subscription($benefit_id,$title,$is_main,$s_id);
	 	echo $result;
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
		include "../../View/subscription_benefits/displaysubscription.php";
		return $display_subscription;
	}
	public function addlist_subscription()
	{
		$subscription=$this->subscription_model->get_subscription();
		include "../../View/subscription_benefits/addsubscription.php";
	}
	public function add_subscription($title,$is_main,$s_id)
	{
            $add_subscription=$this->subscription_model->addsubscription_benefit($title,$is_main,$s_id);
            return $add_subscription;
	}
	public function editlist_subscription($benefit_id)
	{
		$subscription=$this->subscription_model->get_subscription();
		$edit_subscription=$this->subscription_model->getedits_subscription($benefit_id);
		include "../../View/subscription_benefits/editsubscription.php";

	}
	public function edit_subscription($benefit_id,$title,$is_main,$s_id)
	{
		
            $add_subscription=$this->subscription_model->editsubscription_data($benefit_id,$title,$is_main,$s_id);
            return $add_subscription;
	}
	public function delete_subscription($benefit_id)
	{
		$this->subscription_model->delete_benefit($benefit_id);
		return true;
	}
	public function view_subscription($subscription_id)
	{
		$view_subscription=$this->subscription_model->getview_subscription($subscription_id);
		include "../../View/subscription_benefits/viewsubscription.php";
		return $view_subscription;
	}
}
?>