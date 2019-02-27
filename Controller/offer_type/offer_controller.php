<?php
include "../../Model/offer_type/offer_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{

		$offer_id=$_POST['id'];
		$offer_controller=new offer_controller();
		$result=$offer_controller->delete_offer($offer_id);
		echo "#delete";
	}
	if($_POST['count_id'] == 'add')
	{
		$offer = $_POST['offer_title'];
    	$offer_controller=new offer_controller();
	 	$result=$offer_controller->add_offer($offer);
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
		$offer = $_POST['offer'];
		$offer_id = $_POST['offer_id'];
    	$offer_controller=new offer_controller();
	 	$result=$offer_controller->edit_offer($offer_id,$offer);
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
class offer_controller
{
	public function __construct()
	{
		$this->offer_model=new offer_model();
	}
	public function display_offer($msg)
	{
		$display_offer=$this->offer_model->getdisplay_offer();
		include "../../View/offer_type/displayoffer.php";
	
		return $display_offer;
	}
	public function add_offer($offer)
	{
			$add_offer=$this->offer_model->addoffer_data($offer);
			return $add_offer;
	}
	public function view_offer($offer_id)
	{
		$view_offer=$this->offer_model->viewoffer($offer_id);
		include "../../View/offer_type/viewoffer.php";
		return $view_offer;
	}
	public function editlist_offer($offer_id)
	{
		$edit_offer=$this->offer_model->editofferlist($offer_id);
			include "../../View/offer_type/editoffer.php";
		return $edit_offer;
	}
	public function edit_offer($offer_id,$offer)
	{
			$edit_offer=$this->offer_model->editoffer_data($offer_id,$offer);
			return $edit_offer;
	}
	public function delete_offer($offer_id)
	{
		$this->offer_model->deleteoffer($offer_id);
		return true;
	}
}
?>