<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/offer_type/offer_model.php");
class offer_controller
{
	public function __construct()
	{
		$this->offer_model=new offer_model();
	}
	public function display_offer($msg)
	{
		$display_offer=$this->offer_model->getdisplay_offer();
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/offer_type/displayoffer.php');
		return $display_offer;
	}
	public function add_offer()
	{
		if(isset($_POST['offer_submit']) && !empty($_POST['offer_submit']))
		{			
			$offer=$_POST['offer_title'];
			$add_offer=$this->offer_model->addoffer_data($offer);
			if($add_offer=="1")
			{
			echo '<script>window.location.href="/doora/adminpanel/Controller/offer_type/displayoffercontroller.php?id=0";</script>';
			}
			else
			{
			echo '<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Offer Title already Exists!!
            </div>';         
			}	
		}
	}
	public function view_offer($offer_id)
	{
		$view_offer=$this->offer_model->viewoffer($offer_id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/offer_type/viewoffer.php');
		return $view_offer;
	}
	public function editlist_offer($offer_id)
	{
		$edit_offer=$this->offer_model->editofferlist($offer_id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/offer_type/editoffer.php');
		return $edit_offer;
	}
	public function edit_offer()
	{
		if(isset($_POST['offer_submit']) && !empty($_POST['offer_submit']))
		{
			$offer_id=$_POST['offer_id'];
			$offer=$_POST['offer_title'];
			$edit_offer=$this->offer_model->editoffer_data($offer_id,$offer);
			if($edit_offer=="1")                                                                                                                                    
			{
				echo '<script>window.location.href="/doora/adminpanel/Controller/offer_type/displayoffercontroller.php?id=2";</script>';
			}
			else
			{
				echo '<div class="alert alert-info alert-dismissible">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Offer Title already Exists!!
	            </div>';         
			}
		}
	}
	public function delete_offer($offer_id)
	{
		$this->offer_model->deleteoffer($offer_id);
		echo '<script>window.location.href="/doora/adminpanel/Controller/offer_type/displayoffercontroller.php?id=3";</script>';
	}
}
?>