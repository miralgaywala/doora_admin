<?php
// include_once($_SERVER['DOCUMENT_ROOT']."/sprookr/adminpanel/Model/category/category_model.php");
include "../../Model/category/category_model.php";
class category_controller{
	public function __construct()
	{
		$this->cat_model=new category_model();
	}
	
	public function add_category()
	{
		if(isset($_POST['category_submit']) && !empty($_POST['category_submit']))
		{
			
			$category_name=$_POST['category_name'];
			$category_image=$_POST['imagename'];
			if(isset($_POST['is_super_market']))
                                  {
                                    $_POST['is_super_market']=1;
                                  }
                                  else
                                  {
                                    $_POST['is_super_market']=0;
                                  }
                 $is_super_market=$_POST['is_super_market'];

			$add_category=$this->cat_model->addcategory_data($category_name,$category_image,$is_super_market);
			if($add_category=="1")
			{
			echo '<script>window.location.href="../../Controller/category/displaycategorycontroller.php?id=0";</script>';
			}
			else
			{
			echo '<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Category already Exists!!
            </div>';         
			}
		}

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
	public function editcategory_data()
	{
		if(isset($_POST['category_submit']) && !empty($_POST['category_submit']))
		{
			$category_id=$_POST['category_id'];
			$category_name=$_POST['category_name'];
			$category_image=$_POST['imagename'];
			if(isset($_POST['is_super_market']))
                                  {
                                    $_POST['is_super_market']=1;
                                  }
                                  else
                                  {
                                    $_POST['is_super_market']=0;
                                  }
                 $is_super_market=$_POST['is_super_market'];
			$edit_categorydata=$this->cat_model->editcategorydata($category_id,$category_name,$category_image,$is_super_market);
			if($edit_categorydata=="1")
			{
			echo '<script>window.location.href="../../Controller/category/displaycategorycontroller.php?id=2";</script>';
			}
			else
			{
			echo '<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Category already Exists!!
            </div>';         
			}
	}
}
	public function delete_category($category_id)
	{
		$this->cat_model->deletecategory($category_id);
		echo "<script>window.location.href='../../Controller/category/displaycategorycontroller.php?id=3';</script>";
	}
	public function view_category($category_id)
	{
		$view_category=$this->cat_model->viewcategory($category_id);
		
		include "../../View/category/viewcategory.php";
		return $view_category;
	}
}
?>
