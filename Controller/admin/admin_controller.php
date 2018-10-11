<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/admin/admin_model.php");
class admin_controller
{
	public function __construct()
	{
		$this->admin_model=new admin_model();
	}
	public function display_admin($msg)
	{
		$display_admin=$this->admin_model->getdisplay_admin();
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/admin/displayadmin.php");
		return $display_admin;
	}
	public function viewadmin_detail($id)
	{
		$viewadmin_detail=$this->admin_model->getadmindetail($id);
		include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/View/admin/viewadmindetail.php');
		return $viewadmin_detail;
	}
	public function delete_admin($id)
	{
		$this->admin_model->deleteadmin($id);
		echo "<script>window.location.href='/doora/adminpanel/Controller/admin/displayadminlist_controller.php?id=3';</script>";
	}
	public function add_admin()
	{
		 if(isset($_POST['admin_submit']) && !empty($_POST['admin_submit']))
		 {
		 	$role =$_POST['role'];
            $user_name = $_POST['user_name'];
            $password=$_POST['password'];
            $password = md5($password);
            $admin_name=$_POST['admin_name'];
            $email_address = $_POST['email_address'];
            $phone_no=$_POST['phone_no'];
            $imagename = $_FILES['profile_image']['name'];
		 	$add_admin=$this->admin_model->addadmin($role,$user_name,$password,$admin_name,$email_address,$phone_no,$imagename);			
		 }
	}
}
?>