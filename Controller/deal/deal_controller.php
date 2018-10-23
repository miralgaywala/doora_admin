<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/deal/deal_model.php");
class deal_controller
{
	public function __construct()
	{
		$this->deal_model=new deal_model();
	}
	public function view_deal()
	{
		$display_deal=$this->deal_model->getdisplay_deal();
		$display_tag=$this->deal_model->getdisplay_tag();
		$display_category=$this->deal_model->getdisplay_category();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
}
?>