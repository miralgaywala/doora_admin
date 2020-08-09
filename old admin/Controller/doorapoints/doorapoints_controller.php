<?php
include "../../Model/doorapoints/doorapoints_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$doorapoints_id=$_POST['id'];
		$doorapoints_controller=new doorapoints_controller();
		$result=$doorapoints_controller->delete_doorapoints($doorapoints_id);
		echo "#delete";

	}
	if($_POST['count_id'] == 'add')
	{
		$doora_dollor_points = $_POST['doora_dollor_points'];
		$code = $_POST['code'];
		$description = $_POST['description'];
		$points = $_POST['points'];
    	$doorapoints_controller=new doorapoints_controller();
	 	$result=$doorapoints_controller->add_doorapoints($doora_dollor_points,$code,$description,$points);
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
		$doora_dollor_points = $_POST['doora_dollor_points'];
		$code = $_POST['code'];
		$description = $_POST['description'];
		$points = $_POST['points'];
		$doorapoints_id = $_POST['doorapoints_id'];
    	$doorapoints_controller=new doorapoints_controller();
	 	$result=$doorapoints_controller->edit_dooradollors($doorapoints_id,$doora_dollor_points,$code,$description,$points);
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
class doorapoints_controller
{
	public function __construct()
	{
		$this->doorapoints_model=new doorapoints_model();
	}
	public function display_doorapoints($msg)
	{
		$display_points=$this->doorapoints_model->getdisplay_doorapoints();
		//print_r($display_tag);
		 include "../../View/doorapoints/displaydooraponits.php";
		// return $display_tag;
	}
	public function add_doorapoints($doora_dollor_points,$code,$description,$points)
	{
			$add_doorapoints=$this->doorapoints_model->add_doorapoints($doora_dollor_points,$code,$description,$points);
			return $add_doorapoints;
	}
	public function editlist_doorapoints($id)
	{
		$doorapoints=$this->doorapoints_model->editlist_doorapoints($id);
		include "../../View/doorapoints/editdoorapoints.php";
	}
	public function view_doorapoints($id)
	{
		$doorapoints=$this->doorapoints_model->editlist_doorapoints($id);
		include "../../View/doorapoints/viewdoorapoints.php";
	}
	public function edit_dooradollors($doorapoints_id,$doora_dollor_points,$code,$description,$points)
	{
		$edit_doorapoints=$this->doorapoints_model->edit_dooradollors($doorapoints_id,$doora_dollor_points,$code,$description,$points);
			return $edit_doorapoints;
	}
	public function delete_doorapoints($doorapoints_id)
	{
		$delete_doorapoints=$this->doorapoints_model->delete_doorapoints($doorapoints_id);
			return $delete_doorapoints;
	}
}
?>