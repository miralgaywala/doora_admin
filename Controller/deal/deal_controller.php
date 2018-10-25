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
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function viewdetail_deal($id)
	{
		$display_dealdetail=$this->deal_model->getdisplaydetail_deal($id);
		$deal_tag=$this->deal_model->getdealtag($id);
		$deal_cat=$this->deal_model->getdealcat($id);
		$deal_category=$this->deal_model->getdealcategory($id);
		$deal_rdm=$this->deal_model->getdealreedeam($id);
		$deal_purchased=$this->deal_model->getdealpurchased($id);
		$instore_rdm = $this->deal_model->gettotalrdminstore($id);
		$instore_pur= $this->deal_model->gettotalpurinstore($id);
		$isonline_pur= $this->deal_model->gettotalonlinepur($id);
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdealdetail.php");
	}

}
?>