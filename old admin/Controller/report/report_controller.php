<?php
include "../../Model/report/report_model.php";
class report_controller
{
	public function __construct()
	{
		$this->report_model=new report_model();
	}
	public function display_dealpost($msg)
	{
		$business=$this->report_model->business_list();
		$category=$this->report_model->category_list();
		include "../../View/report/displayreport.php";
	}
	public function deal_purchased_year($msg)
	{
		$deal_purchased_year=$this->report_model->deal_purchased_year($msg);
		echo json_encode($deal_purchased_year);
	}
	public function gender_report($msg)
	{
		$active_gender=$this->report_model->gender_report($msg);
		echo json_encode($active_gender);
	}
	public function category_year($msg,$category)
	{
		$active_category=$this->report_model->category_report($msg,$category);
		echo json_encode($active_category);
	}
	public function dealfilter_report()
	{
		$deal_purchased_year=$this->report_model->dealfilter_report();
		echo json_encode($deal_purchased_year);
	}
	public function genderfilter_report()
	{
		$deal_purchased_year=$this->report_model->genderfilter_report();
		echo json_encode($deal_purchased_year);
	}
	public function categoryreport_filter()
	{
		$active_category=$this->report_model->categoryreport_filter();
		echo json_encode($active_category);
	}
	public function business_year($business_list,$business_year)
	{
		$active_category=$this->report_model->business_year($business_list,$business_year);
		echo json_encode($active_category);
	}
	public function businessdealfilter_report()
	{
		$active_category=$this->report_model->businessdealfilter_report();
		echo json_encode($active_category);
	}
	public function agefilter_year($age_year)
	{	
		$active_category=$this->report_model->agefilter_year($age_year);
		echo json_encode($active_category);
	}
	public function businessagefilter_report()
	{
		$active_category=$this->report_model->businessagefilter_report();
		echo json_encode($active_category);
	}
}
?>