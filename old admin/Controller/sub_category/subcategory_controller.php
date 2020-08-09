<?php
include "../../Model/sub_category/subcategory_model.php";
if(isset($_POST['count_id']))
{
		if($_POST['count_id'] == 'add')
		{
		$category_id = $_POST['category_name'];
		$subcategory_name = $_POST['subcategoryname'];
		//$subcategory_image = $_POST['imagename'];
    	$subcategory_controller=new subcategory_controller();
	 	$result=$subcategory_controller->add_subcategory($category_id,$subcategory_name);
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
		$category_id = $_POST['category_name'];
		$subcategory_name = $_POST['subcategoryname'];
		//$subcategory_image = $_POST['imagename'];
		$subcategory_id=$_POST['sub_category_id'];
    	$subcategory_controller=new subcategory_controller();
	 	$result=$subcategory_controller->edit_subcategorydata($category_id,$subcategory_name,$subcategory_id);
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
		$subcategory_id=$_POST['id'];
		$subcategory_controller=new subcategory_controller();
		$result=$subcategory_controller->delete_subcategory($subcategory_id);
		echo "#delete";
	}
}
class subcategory_controller{
	
	public function __construct()
	{
		// parent::__construct();
		$this->subcat_model=new subcategory_model();
	}
	public function display_subcategory1($msg)
	{
		//echo "from sub-categpry1    ".$msg;
		$category_view=$this->subcat_model->getcategory();
		$displaysubcategory=$this->subcat_model->getsubcategorylist();
		include "../../View/sub-category/displaysubcategory.php";
		
	}
	public function display_subcategorydata()
	{
		$displaysubcategory=$this->subcat_model->getcategorylist();
		include "../../View/sub-category/displaysubcategory.php";
	}
	public function view_subcategory($subcategory_id)
	{
		$view_subcategory=$this->subcat_model->getsubcategorydetail($subcategory_id);
		include "../../View/sub-category/viewsubcategory.php";
		
		return $view_subcategory;
	}
	public function delete_subcategory($subcategory_id)
	{
		$this->subcat_model->deletesubcategory($subcategory_id);
	}
	public function bind_category()
	{
		$category=$this->subcat_model->getcategory();
		include "../../View/sub-category/addsubcategory.php";
		return $category;
	}
	public function add_subcategory($category_id,$subcategory_name)
	{
			$add_subcategory=$this->subcat_model->addsubcategory_data($category_id,$subcategory_name);
			return $add_subcategory;
	}
	public function edit_subcategory($subcategory_id)
	{
		$category_view=$this->subcat_model->getcategory();
		$editdisplaycategory=$this->subcat_model->geteditdata($subcategory_id);
		include "../../View/sub-category/editsubcategory.php";
		
	}
	public function edit_subcategorydata($category_id,$subcategory_name,$subcategory_id)
	{
		
			$edit_subcategory=$this->subcat_model->editsubcategory_data($category_id,$subcategory_name,$subcategory_id);
			return $edit_subcategory;
	}
	public function filter_subcategory($msg)
	{
		$category_view=$this->subcat_model->getcategory();
		$category=$this->subcat_model->getcategoryfilter($msg);
		$displaysubcategory=$this->subcat_model->getsubcategoryfilter($msg);
		include "../../View/sub-category/displaysubcategory.php";
	}
}
