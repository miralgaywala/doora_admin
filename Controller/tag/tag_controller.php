<?php
include "../../Model/tag/tag_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$tag_id=$_POST['id'];
		$tag_controller=new tag_controller();
		$result=$tag_controller->delete_tag($tag_id);
		echo "#delete";

	}
	if($_POST['count_id'] == 'add')
	{
		$tag = $_POST['tag'];
    	$tag_controller=new tag_controller();
	 	$result=$tag_controller->add_tag($tag);
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
		$tag = $_POST['tag'];
		$tag_id = $_POST['tag_id'];
    	$tag_controller=new tag_controller();
	 	$result=$tag_controller->edit_tag($tag_id,$tag);
	 	if($result == 1)
	 	{
	 		echo "#edit";
	 	}
	 	else
	 	{
	 		echo "#exists";
	 	}
	}
}
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
		// return $display_tag;
	}
	public function add_tag($tag)
	{
			$add_tag=$this->tag_model->addtag_data($tag);
			return $add_tag;
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
	}
	public function edit_tag($tag_id,$tag)
	{
			$edit_tag=$this->tag_model->edittag_data($tag_id,$tag);
			return $edit_tag;
	}
	public function delete_tag($tag_id)
	{
		$this->tag_model->deletetag($tag_id);
		return true;
	}
}
?>