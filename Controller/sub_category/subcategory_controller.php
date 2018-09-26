<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/sub_category/subcategory_model.php");
class subcategory_controller{
	public function __construct()
	{
		$this->subcat_model=new subcategory_model();
	}
	public function display_subcategory()
	{
		$displaysubcategory=$this->subcat_model->getsubcategorylist();
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/sub-category/displaysubcategory.php');
		return $displaysubcategory;
	}
}