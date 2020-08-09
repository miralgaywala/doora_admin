<?php
include "../../Model/points_offer/points_offer_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$id=$_POST['id'];
		$points_offer_controller=new points_offer_controller();
		$result=$points_offer_controller->delete_points_offer($id);
		echo "#delete";

	}
	if($_POST['count_id'] == 'add')
	{
		$points_offer_desc = $_POST['points_offer_desc'];
		$points_number = $_POST['points_number'];
		$multipliers_points = $_POST['multipliers_points'];
		$is_fixed_points = $_POST['is_fixed_points'];
		$number_of_purchase_offer = $_POST['number_of_purchase_offer'];
		$busiess_offer_points = $_POST['busiess_offer_points'];
		$offer_start_date = $_POST['offer_start_date'];
		$offer_end_date = $_POST['offer_end_date'];
    	$points_offer_controller=new points_offer_controller();
	 	$result=$points_offer_controller->add_points_offer($points_offer_desc,$points_number,$multipliers_points,$is_fixed_points,$number_of_purchase_offer,$busiess_offer_points,$offer_start_date,$offer_end_date);
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
		$points_offer_desc = $_POST['points_offer_desc'];
		$points_number = $_POST['points_number'];
		$multipliers_points = $_POST['multipliers_points'];
		$is_fixed_points = $_POST['is_fixed_points'];
		$number_of_purchase_offer = $_POST['number_of_purchase_offer'];
		$busiess_offer_points = $_POST['busiess_offer_points'];
		$offer_start_date = $_POST['offer_start_date'];
		$offer_end_date = $_POST['offer_end_date'];
		$points_offer_id = $_POST['points_offer_id'];
    	$points_offer_controller=new points_offer_controller();
	 	$result=$points_offer_controller->edit_points_offer($points_offer_desc,$points_number,$multipliers_points,$is_fixed_points,$number_of_purchase_offer,$busiess_offer_points,$offer_start_date,$offer_end_date,$points_offer_id);
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
class points_offer_controller
{
	public function __construct()
	{
		$this->points_offer_model=new points_offer_model();
	}
	public function display_points_offer($msg)
	{
		$displaypoints_offer=$this->points_offer_model->getdisplay_points_offer();
		//print_r($display_tag);
		 include "../../View/points_offer/displaypoints_offer.php";
		// return $display_tag;
	}
	public function view_business()
	{
		$view_business=$this->points_offer_model->view_business();
		//print_r($display_tag);
		 include "../../View/points_offer/addpoints_offer.php";
		// return $display_tag;
	}
	public function add_points_offer($points_offer_desc,$points_number,$multipliers_points,$is_fixed_points,$number_of_purchase_offer,$busiess_offer_points,$offer_start_date,$offer_end_date)
	{
		$displaypoints_offer=$this->points_offer_model->add_points_offer($points_offer_desc,$points_number,$multipliers_points,$is_fixed_points,$number_of_purchase_offer,$busiess_offer_points,$offer_start_date,$offer_end_date);
		return $displaypoints_offer;
	}
	public function view_editdetail_poits_offer($id)
	{
		$displaydetailpoints_offer=$this->points_offer_model->view_editdetail_poits_offer($id);
		$view_business=$this->points_offer_model->view_business();
		 include "../../View/points_offer/editpoints_offer.php";

	}
	public function edit_points_offer($points_offer_desc,$points_number,$multipliers_points,$is_fixed_points,$number_of_purchase_offer,$busiess_offer_points,$offer_start_date,$offer_end_date,$points_offer_id)
	{
		$displaypoints_offer=$this->points_offer_model->edit_points_offer($points_offer_desc,$points_number,$multipliers_points,$is_fixed_points,$number_of_purchase_offer,$busiess_offer_points,$offer_start_date,$offer_end_date,$points_offer_id);
		return $displaypoints_offer;
	}
	public function delete_points_offer($id)
	{
		$displaypoints_offer=$this->points_offer_model->delete_points_offer($id);
		return $displaypoints_offer;
	}
	public function view_detail_poits_offer($id,$bid)
	{
		$business_name = $this->points_offer_model->business_name($bid);
		$displaydetailpoints_offer=$this->points_offer_model->view_editdetail_poits_offer($id);
		 include "../../View/points_offer/viewpoints_offer.php";

	}
}
?>