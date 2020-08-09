<?php
include "../../Model/content_management/contentmanagement_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'add')
	{
		$content_id = $_POST['content_id'];
		$privacy_policy = addslashes($_POST['privacy']);
		$term_condition = addslashes($_POST['term']);
		$helpc = addslashes($_POST['helpc']);
		$helpb = addslashes($_POST['helpb']);
    	$content_controller=new content_controller();
	 	$result=$content_controller->addcontent_data($content_id,$privacy_policy,$term_condition,$helpc,$helpb);
	 	if($result == 0)
	 	{
	 		echo "#edit";
	 	}
	 	else
	 	{
	 		echo "#add";
	 	}
	}
}
class content_controller
{
	public function __construct()
	{
		$this->content_model=new content_model();
	}
	public function display_content($msg)
	{
		$display_content=$this->content_model->getdisplay_content();
		include "../../View/content_management/displaycontent.php";
		
		return $display_content;
	}
	public function addcontent_data($content_id,$privacy_policy,$term_condition,$helpc,$helpb)
	{
        $add_content=$this->content_model->addcontent_data($content_id,$privacy_policy,$term_condition,$helpc,$helpb);
        return $add_content;
	}
}
 ?>