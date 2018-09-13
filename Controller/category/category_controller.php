<?php
//include_once("Model/category/category_model.php");
class category_controller{
	public function __construct()
	{
		//$this->cat_model=new category_model();
	}
	public function add_category()
	{
		include_once("View/category/addcategory.php");
	}
}
?>