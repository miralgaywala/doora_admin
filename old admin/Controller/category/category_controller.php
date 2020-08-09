<?php
// include_once($_SERVER['DOCUMENT_ROOT']."/sprookr/adminpanel/Model/category/category_model.php");
include "../../Model/category/category_model.php";
if(isset($_POST['count_id']))
{
		if($_POST['count_id'] == 'add')
		{
		$categoryname = $_POST['categoryname'];
		$is_super_market = $_POST['is_super_market'];
		$category_image = $_POST['imagename'];
    	$category_controller=new category_controller();
	 	$result=$category_controller->add_category($categoryname,$category_image,$is_super_market);
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
		$category_id = $_POST['category_id'];
		$category_name = $_POST['categoryname'];
		$is_super_market = $_POST['is_super_market'];
		$category_image = $_POST['imagename'];
		
		$category_id=$_POST['category_id'];
    	$category_controller=new category_controller();
	 	$result=$category_controller->editcategory_data($category_id,$category_name,$category_image,$is_super_market);
	 	if($result == 1)
	 	{
	 		echo "#edit";
	 	}
	 	else
	 	{
	 		echo "#exists";
	 	}
	}
	if($_POST['count_id'] == 'delete')
	{
		$category_id=$_POST['id'];
		$category_controller=new category_controller();
		$result=$category_controller->delete_category($category_id);
		echo "#delete";
	}
}
class category_controller{
	public function __construct()
	{
		$this->cat_model=new category_model();
	}
	
	public function add_category($category_name,$category_image,$is_super_market)
	{

			$add_category=$this->cat_model->addcategory_data($category_name,$category_image,$is_super_market);
			return $add_category;

	}
	public function display_category()
	{
		$displaycategory=$this->cat_model->getcategorylist();
		
		include "../../View/category/displaycategory.php";
		return $displaycategory;
	}
	public function display_category1($msg)
	{
		$displaycategory=$this->cat_model->getcategorylist();
		include "../../View/category/displaycategory.php";
		return $displaycategory;
	}
	public function edit_category($category_id)
	{
		$editcategorylist=$this->cat_model->geteditcategorylist($category_id);
		
		include "../../View/category/editcategory.php";
		return $editcategorylist;
	}
	public function editcategory_data($category_id,$category_name,$category_image,$is_super_market)
	{
		
			$edit_categorydata=$this->cat_model->editcategorydata($category_id,$category_name,$category_image,$is_super_market);
			return $edit_categorydata;
}
	public function delete_category($category_id)
	{
		$this->cat_model->deletecategory($category_id);
		return true;
	}
	public function view_category($category_id)
	{
		$view_category=$this->cat_model->viewcategory($category_id);
		
		include "../../View/category/viewcategory.php";
		return $view_category;
	}
}
?>
