<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/sub_category/subcategory_model.php");
class subcategory_controller{
	public function __construct()
	{
		$this->subcat_model=new subcategory_model();
	}
	public function display_subcategory()
	{
		$category_view=$this->subcat_model->getcategory();
		$displaysubcategory=$this->subcat_model->getsubcategorylist();
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/sub-category/displaysubcategory.php');
	}
	public function display_subcategorydata()
	{
		$displaysubcategory=$this->subcat_model->getcategorylist();
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/sub-category/displaysubcategory.php');
	}
	public function view_subcategory($subcategory_id)
	{
		$view_subcategory=$this->subcat_model->getsubcategorydetail($subcategory_id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/sub-category/viewsubcategory.php');
		return $view_subcategory;
	}
	public function delete_subcategory($subcategory_id)
	{
		$this->subcat_model->deletesubcategory($subcategory_id);
	}
	public function bind_category()
	{
		$category=$this->subcat_model->getcategory();
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/sub-category/addsubcategory.php');
		return $category;
	}
	public function add_subcategory()
	{
		//echo "hii";
		if(isset($_POST['subcategory_submit']) && !empty($_POST['subcategory_submit']))
		{
			
			$subcategory_name=$_POST['sub_category_name'];
			//echo $subcategory_name;
			$subcategory_image=$_FILES['sub_category_image']['name'];
			//echo $subcategory_image;
			$category_id=$_POST['category_name'];

			$add_subcategory=$this->subcat_model->addsubcategory_data($category_id,$subcategory_name,$subcategory_image);
			return $add_subcategory;
		}
	}
	public function edit_subcategory($subcategory_id)
	{
		$category_view=$this->subcat_model->getcategory();
		$editdisplaycategory=$this->subcat_model->geteditdata($subcategory_id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/sub-category/editsubcategory.php');
	}
	public function edit_subcategorydata()
	{
		if(isset($_POST['subcategory_submit']) && !empty($_POST['subcategory_submit']))
		{
			$subcategory_id=$_POST['sub_category_id'];
			$subcategory_name=$_POST['sub_category_name'];
			//echo $subcategory_name;
			$subcategory_image=$_FILES['sub_category_image']['name'];
			//echo $subcategory_image;
			$category_id=$_POST['category_name'];
			//echo $category_id;
			$edit_subcategory=$this->subcat_model->editsubcategory_data($category_id,$subcategory_name,$subcategory_image,$subcategory_id);
			return $edit_subcategory;
		}
	}
}
