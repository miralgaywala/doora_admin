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
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
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
	public function subcategoryfilter_deal($msg)
	{
		$display_deal=$this->deal_model->getsubcategory_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		echo json_encode($display_deal);
		// print_r($gettag);
		// print_r($getbusiness);
		// print_r($getcategory);
		//include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function branchfilter_deal($msg)
	{
		$display_deal=$this->deal_model->getbranch_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function categoryfilter_deal($msg)
	{
		$display_deal=$this->deal_model->getcategory_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$getsubcategory=$this->deal_model->getcategorylist($msg);
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function tagfilter_deal($msg)
	{
		$display_deal=$this->deal_model->gettag_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function businessfilter_deal($msg)
	{
		$display_deal=$this->deal_model->getbusiness_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$getbranch=$this->deal_model->getbranchlist($msg);
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function alldatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_deal();
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function activedatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_activedeal($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function deactivedatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_deactivedeal($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function expireddatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_expireddeal($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function purchaseddatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_purchaseddeal($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
}
?>