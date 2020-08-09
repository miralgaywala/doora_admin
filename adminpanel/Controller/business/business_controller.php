<?php
include "../../Model/business/business_model.php";
if(isset($_POST['count_id']))
{
	if($_POST['count_id'] == 'delete')
	{
		$id=$_POST['id'];
		$business_controller=new business_controller();
		$result=$business_controller->delete_business($id);
		echo "#delete";

	}
	if($_POST['count_id'] == 'free_add')
	{
		$id=$_POST['user_id'];
		$free_days=$_POST['free_days'];
		$new_day = $_POST['new_day'];
		$business_controller=new business_controller();
		$result=$business_controller->add_business_free_days($id,$free_days,$new_day);
		if($result == 1)
		{
			echo "#add";
		}
		else
		{
			echo "#not";
		}
	}
	if($_POST['count_id'] == 'request')
	{
		$id=$_POST['id'];
		$data=$_POST['value'];
		$business_controller=new business_controller();
		$result=$business_controller->is_active($id,$data);
		if($result==1)
		{
			echo "#deactive";
		}
		else if($result == 0)
		{
			echo "#notdeactive";
		}
		else
		{
			echo "#active";
		}

	}
	if($_POST['count_id'] == 'edit_value')
	{
		$id=$_POST['id'];
		$business_controller=new business_controller();
		$result=$business_controller->getedituservalue($id);
		include "../../View/business/editbusinessuser.php";

	}
	if($_POST['count_id'] == 'edit_business')
	{
		
		
		$profile_img = $_FILES['profile_image'];
		if($_FILES['profile_image']['name'] == "")
		{
			$profile_pic = $_POST['profile_pic'];
			
			// $address = $_POST['address'];
			// $lat = $_POST['lat'];
			// $log = $_POST['log'];
			
		}
		else
		{
			// $company_name = $_POST['company_name'];
			// $contact_number = $_POST['contact_number'];
			// $website_url = $_POST['website_url'];
			// $address = $_POST['address'];
			// $lat = $_POST['lat'];
			// $log = $_POST['log'];
			// $super_market = $_POST['super_market'];
			// $pet_friendly = $_POST['pet_friendly'];
			$user_id = $_POST['user_id'];
			$ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
			$profile_pic = $user_id.".".$ext;
			move_uploaded_file($_FILES["profile_image"]["tmp_name"], "../../../images/profile/" . $profile_pic);
		}
		$company_name = $_POST['company_name'];
			$contact_number = $_POST['contact_number'];
			$website_url = $_POST['website_url'];
			$user_id = $_POST['user_id'];
			$super_market = $_POST['super_market'];
			$pet_friendly = $_POST['pet_friendly'];
		$business_controller=new business_controller();
		$result=$business_controller->edit_business($profile_pic,$company_name,$contact_number,$website_url,$user_id,$super_market,$pet_friendly);
		if($result == 1)
		{
			echo "#update";
		}
		else
		{
			echo "#notupdate";
		}
	}
	
}
class business_controller
{
	public function __construct()
	{
		$this->business_model=new business_model();
	}
	public function edit_business($profile_pic,$company_name,$contact_number,$website_url,$user_id,$super_market,$pet_friendly)
	{
		$display_businessuser=$this->business_model->edit_business($profile_pic,$company_name,$contact_number,$website_url,$user_id,$super_market,$pet_friendly);
		return $display_businessuser;
	}
	public function getedituservalue($id)
	{
		$display_businessuser=$this->business_model->getbusinessdetail($id);
		return $display_businessuser;
	}
	public function display_businessuser($msg)
	{
		$display_businessuser=$this->business_model->getdisplay_businessuser();
		include "../../View/business/displaybusinessuser.php";
		return $display_businessuser;
	}
	public function view_businessbranch($user_id)
	{
		$view_businessbranch=$this->business_model->getbusinessbranchdetail($user_id);
		include "../../View/business/viewbusinessbranch.php";
		
		return $view_businessbranch;
	}
	public function view_branch($frenchise_id)
	{
		$view_branch=$this->business_model->getbranchdetail($frenchise_id);
		include "../../View/business/viewbranchdetail.php";
		return $view_branch;
	}
	public function is_active($id,$data)
	{
		$is_active=$this->business_model->updateactive($id,$data);
		return $is_active;
	}
	public function delete_business($id)
	{
		$this->business_model->deletebusiness($id);
		return true;
	}
	public function viewbusiness_detail($id)
	{
		$viewbusiness_detail=$this->business_model->getbusinessdetail($id);
		include "../../View/business/viewbuisnessdetail.php";
		
		return $viewbusiness_detail;
	}
	public function filter_business($msg)
	{
		if($msg == "f1")
		{
			$display_businessuser=$this->business_model->getactivatefilter($msg);
			include "../../View/business/displaybusinessuser.php";
			
		}
		elseif ($msg == "f2") {
			$display_businessuser=$this->business_model->getdeactivatefilter($msg);
			include "../../View/business/displaybusinessuser.php";
		}
		elseif ($msg == "f3") {
			$display_businessuser=$this->business_model->getdeleteedilter($msg);
			include "../../View/business/displaybusinessuser.php";
		}
		else
		{
			$display_businessuser=$this->business_model->getdisplay_businessuser();
			include "../../View/business/displaybusinessuser.php";
		}
		
	}
	public function view_invoices($user_id)
	{
		$view_invoices=$this->business_model->getbusinessinvoice($user_id);
		include "../../View/business/viewbuisnessinvoice.php";
		
		return $view_invoices;
	}
	public function viewinvoice_detail($invoice_id)
	{
		$view_invoice_detail=$this->business_model->getinvoicedetail($invoice_id);
		$view_deal_invoice_detail=$this->business_model->getdealinvoicedetail($invoice_id);
		include "../../View/business/viewbuisnessinvoicedetail.php";
	}
	public function viewverificationdetail($id)
	{
		$viewverification_detail=$this->business_model->getbusinessverificartiondetail($id);
		include "../../View/business/viewbuisnessverificationdetail.php";
	}
	public function viewfreedaysdetail($id)
	{
		$viewverification_detail=$this->business_model->viewfreedaysdetail($id);
		include "../../View/business/viewbuisnessfreedays.php";
	}
	public function add_business_free_days($id,$free_days,$new_day)
	{
		$add_business_free_days=$this->business_model->add_business_free_days($id,$free_days,$new_day);
		return $add_business_free_days;
	}
}
?>