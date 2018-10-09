<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/business/businessuser.php");
class business_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_businessuser()
    {
       $con=$this->db->connection();
       $getbusinessuser=$con->query("select * from users where is_deleted=0 AND is_business=1");
       $businessuser=$getbusinessuser->fetch_all();
       return $businessuser;
    }
    public function getbusinessbranchdetail($user_id)
    {
        $con=$this->db->connection();
        $viewbusinessbranch=$con->query("select * from business_franchise where business_user_id=".$user_id);
        $view=$viewbusinessbranch->fetch_all();
        return $view;
    }
    public function getbranchdetail($frenchise_id)
    {
        $con=$this->db->connection();
        $viewbranchdetail=$con->query("select * from business_franchise where franchise_id=".$frenchise_id);
        $view=$viewbranchdetail->fetch_all();
        return $view;
    }
}
?>