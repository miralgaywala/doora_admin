<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/tag/tag_model.php");
public class tag_controller
{
	public function __construct()
	{
		$this->tag_model=new tag_model();
	}
	public function display_tag()
	{
		$display_tag=$this->tag_model->display_tag();
	}
}
?>