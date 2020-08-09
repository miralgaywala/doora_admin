<?php
include "../../Model/doora_dollor_value/doora_dollor_value_model.php";
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
		$doora_dollor_value_points = $_POST['doora_dollor_value_points'];
		$doora_dollor_value_amount = $_POST['doora_dollor_value_amount'];
		$doora_dollor_value_id = $_POST['doora_dollor_value_id'];
    	$doora_dollor_value_controller=new doora_dollor_value_controller();
	 	$result=$doora_dollor_value_controller->edit_doora_dollor_value($doora_dollor_value_points,$doora_dollor_value_amount,$doora_dollor_value_id);
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
class doora_dollor_value_controller
{
	public function __construct()
	{
		$this->doora_dollor_value_model=new doora_dollor_value_model();
	}
	public function display_doora_dollor_value($msg)
	{
		$display_tag=$this->doora_dollor_value_model->display_doora_dollor_value();
		//print_r($display_tag);
		 include "../../View/doora_dollor_value/displaydoora_dollor_value.php";
		// return $display_tag;
	}
	public function detail_doora_dollor_value($id)
	{
		$detail_doora_dollor_value=$this->doora_dollor_value_model->detail_doora_dollor_value($id);
		//print_r($display_tag);
		 include "../../View/doora_dollor_value/editdoora_dollor_value.php";
	}
	public function edit_doora_dollor_value($doora_dollor_value_points,$doora_dollor_value_amount,$doora_dollor_value_id)
	{
		$detail_doora_dollor_value=$this->doora_dollor_value_model->edit_doora_dollor_value($doora_dollor_value_points,$doora_dollor_value_amount,$doora_dollor_value_id);
		return $detail_doora_dollor_value;
	}
}
?>
