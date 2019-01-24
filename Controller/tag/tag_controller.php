<?php
include "../../Model/tag/tag_model.php";
class tag_controller
{
	public function __construct()
	{
		$this->tag_model=new tag_model();
	}
	public function display_tag($msg)
	{
		$display_tag=$this->tag_model->getdisplay_tag();
		//print_r($display_tag);
		include "../../View/tag/displaytag.php";
		return $display_tag;
	}
	public function add_tag()
	{
		if(isset($_POST['tag_submit']) && !empty($_POST['tag_submit']))
		{			
			$tag=$_POST['tag_name'];
			$add_tag=$this->tag_model->addtag_data($tag);
			if($add_tag=="1")
			{
			echo '<script>window.location.href="../../Controller/tag/displaytagcontroller.php?id=0";</script>';
			}
			else
			{
			echo '<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Tag already Exists!!
            </div>';         
			}	
		}
	}
	public function view_tag($tag_id)
	{
		$view_tag=$this->tag_model->viewtag($tag_id);
		include "../../View/tag/viewtag.php";
		
		return $view_tag;
	}
	public function editlist_tag($tag_id)
	{
		$edit_tag=$this->tag_model->edittaglist($tag_id);
		include "../../View/tag/edittag.php";
	
		return $edit_tag;
	}
	public function edit_tag()
	{
		if(isset($_POST['tag_submit']) && !empty($_POST['tag_submit']))
		{
			$tag_id=$_POST['tag_id'];
			$tag=$_POST['tag_name'];
			$edit_tag=$this->tag_model->edittag_data($tag_id,$tag);
			if($edit_tag=="1")
			{
				echo '<script>window.location.href="../../Controller/tag/displaytagcontroller.php?id=2";</script>';
			}
			else
			{
				echo '<div class="alert alert-info alert-dismissible">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Tag already Exists!!
	            </div>';         
			}
		}
	}
	public function delete_tag($tag_id)
	{
		$this->tag_model->deletetag($tag_id);
		echo '<script>window.location.href="../../Controller/tag/displaytagcontroller.php?id=3";</script>';
	}
}
?>