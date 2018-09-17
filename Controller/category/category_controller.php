<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/category/category_model.php");
class category_controller{
	public function __construct()
	{
		$this->cat_model=new category_model();
	}
	public function dashboard()
	{
		//include_once('View/category/addcategory.php');
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/dashboard.php');
	}
	public function add_category()
	{
		if(isset($_POST['category_submit']) && !empty($_POST['category_submit']))
		{
			echo $_POST['category_name'];
			$category_name=$_POST['category_name'];
			echo $category_name;
			//$category_image=$_POST['category_image'];
			//echo $category_image;
			$add_category=$this->cat_model->addcategory_data($category_name,"abc");
		}
	}
	public function display_category()
	{
		//echo "hii";
		//echo $_SERVER['DOCUMENT_ROOT'];

		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/category/displaycategory.php');
	}
}
?>