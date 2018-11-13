<?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/content_management/contentmanagement_model.php");
class content_controller
{
	public function __construct()
	{
		$this->content_model=new content_model();
	}
	public function display_content($msg)
	{
		$display_content=$this->content_model->getdisplay_content();
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/content_management/displaycontent.php');
		return $display_content;
	}
	public function add_content()
	{
		if(isset($_POST['content_submit']) && !empty($_POST['content_submit']))
		{
                     $content_id =$_POST['content_id'];
                     $privacy_policy =$_POST['privacy_policy'];
                     $term_condition =$_POST['term_condition'];
                     $help =$_POST['help'];
                     $add_content=$this->content_model->addcontent_data($content_id,$privacy_policy,$term_condition,$help);
                     	if($add_content=="0")
						{
						echo '<script>window.location.href="/doora/adminpanel/Controller/content_management/addcontentmanagement_controller.php?id=0";</script>';
						}
						else
						{
						echo '<script>window.location.href="/doora/adminpanel/Controller/content_management/addcontentmanagement_controller.php?id=2";</script>';
						}	
        }
	}
}
 ?>