<?php
include "../../Model/doora_dollor_terms/doora_dollor_terms_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$id = $_POST['id'];
    	$doora_dollor_terms_controller=new doora_dollor_terms_controller();
	 	$result=$doora_dollor_terms_controller->delete_doora_dollar_terms($id);
	 	if($result == 1)
	 	{
	 		echo "#delete";
	 	}
	 	else
	 	{
	 		echo "#exists";
	 	}
	}
	if($_POST['count_id'] == 'add')
	{
		$doora_dollor_terms_title = $_POST['doora_dollor_terms_title'];
		$doora_dollor_terms_desc = $_POST['doora_dollor_terms_desc'];
    	$doora_dollor_terms_controller=new doora_dollor_terms_controller();
	 	$result=$doora_dollor_terms_controller->add_doora_dollor_terms_model($doora_dollor_terms_title,$doora_dollor_terms_desc);
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
		$doora_dollor_terms_title = $_POST['doora_dollor_terms_title'];
		$doora_dollor_terms_desc = $_POST['doora_dollor_terms_desc'];
		$doora_dollor_terms_id = $_POST['doora_dollor_terms_id'];
    	$doora_dollor_terms_controller=new doora_dollor_terms_controller();
	 	$result=$doora_dollor_terms_controller->edit_doora_dollor_terms($doora_dollor_terms_title,$doora_dollor_terms_desc,$doora_dollor_terms_id);
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
class doora_dollor_terms_controller
{
	public function __construct()
	{
		$this->doora_dollor_terms_model=new doora_dollor_terms_model();
	}
	public function display_doora_dollor_terms($msg)
	{
		$display_tag=$this->doora_dollor_terms_model->display_doora_dollor_terms();
		//print_r($display_tag);
		 include "../../View/doora_dollor_terms/displaydoora_dollor_terms.php";
		// return $display_tag;
	}
	public function detail_doora_dollor_terms($id)
	{
		$detail_doora_dollor_terms=$this->doora_dollor_terms_model->detail_doora_dollor_terms($id);
		//print_r($display_tag);
		 include "../../View/doora_dollor_terms/editdoora_dollor_terms.php";
	}
	public function edit_doora_dollor_terms($doora_dollor_terms_title,$doora_dollor_terms_desc,$doora_dollor_terms_id)
	{
		$detail_doora_dollor_terms=$this->doora_dollor_terms_model->edit_doora_dollor_terms($doora_dollor_terms_title,$doora_dollor_terms_desc,$doora_dollor_terms_id);
		return $detail_doora_dollor_terms;
	}
	public function add_doora_dollor_terms()
	{
		 include "../../View/doora_dollor_terms/adddoora_dollor_terms.php";
	}
	public function add_doora_dollor_terms_model($doora_dollor_terms_title,$doora_dollor_terms_desc)
	{
		$detail_doora_dollor_terms=$this->doora_dollor_terms_model->add_doora_dollor_terms_model($doora_dollor_terms_title,$doora_dollor_terms_desc);
		return $detail_doora_dollor_terms;
	}
	public function delete_doora_dollar_terms($id){
		$detail_doora_dollor_terms=$this->doora_dollor_terms_model->dete_doora_dollor_terms_model($id);
		return $detail_doora_dollor_terms;
	}
}
?>
