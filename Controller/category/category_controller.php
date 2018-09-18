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
			
			$category_name=$_POST['category_name'];
			//echo $category_name;
			$category_image=$_FILES['category_image']['name'];
			//echo $category_image;
			$add_category=$this->cat_model->addcategory_data($category_name,$category_image);
		}
	}
	public function display_category()
	{
		
		//echo $_SERVER['DOCUMENT_ROOT'];
		$displaycategory=$this->cat_model->getcategorylist();
		//print_r($displaycategory);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/category/displaycategory.php');

		return $displaycategory;
	}
	public function edit_category($category_id)
	{
		$editcategorylist=$this->cat_model->geteditcategorylist($category_id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/category/editcategory.php');
		//print_r($editcategorylist);
		return $editcategorylist;
	}
	public function editcategory_data()
	{

		if(isset($_POST['category_submit']) && !empty($_POST['category_submit']))
		{
			
			$category_name=$_POST['category_name'];
			echo $category_name;
			$category_image=$_FILES['category_image']['name'];
			echo $category_image;
			$edit_categorydata=$this->cat_model->editcategorydata($category_name,$category_image);
		}
	}
	public function delete_category($category_id)
	{
		$delete_category=$this->cat_model->deletecategory($category_id);
	}
}
?>