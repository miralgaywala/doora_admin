<?php 
include "../../Model/dbconfig.php";
include"../../Model/customer/customer.php";

class customer_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_customer()
    {
       $con=$this->db->connection();
       $getcustomer=$con->query("select * from users where is_business=0 AND is_deleted=0 order by user_id desc");
      $customer = array();
      while ($row = $getcustomer->fetch_assoc()) {
        $customer[] = $row;
      }
       return $customer;
    }
    public function getcustomerdetail($id)
    {
       $con=$this->db->connection();
       $getcustomerdetail=$con->query("select * from users where is_business=0 AND user_id=".$id);
       $customeruser = array();
      while ($row = $getcustomerdetail->fetch_assoc()) {
        $customeruser[] = $row;
      }
       return $customeruser;
    }
    public function updateactive($id,$data)
    {
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $con=$this->db->connection();
        $success="";
        if($data==0)
        {
           $active=$con->query("update users SET is_active='1',updated_at='".$date."' WHERE user_id=".$id);
           $success="1";
        }
        else
        {
            $active=$con->query("update users SET is_active='0',updated_at='".$date."' WHERE user_id=".$id);
            $success="2";
        }
        return $success;
    }
    public function deletecustomer($id)
    {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $delete=$con->query("update users SET is_deleted=1,updated_at='".$date."' where user_id=".$id);
    }
    public function getactivatefilter($msg)
    {
       $con=$this->db->connection();
       $customeractivate= array();
       $getcustomeractivate=$con->query("select * from users where is_deleted=0 AND is_business=0 AND is_active=1 order by user_id desc");
       while ($row = $getcustomeractivate->fetch_assoc()) {
        $customeractivate[] = $row;
      }
       return $customeractivate;
    }
    public function getdeactivatefilter($msg)
    {
       $con=$this->db->connection();
       $customerdeactivate = array();
       $getcustomerdeactivate=$con->query("select * from users where is_deleted=0 AND is_business=0 AND is_active=0 order by user_id desc");
       while ($row = $getcustomerdeactivate->fetch_assoc()) {
        $customerdeactivate[] = $row;
      }
       return $customerdeactivate;
    }
    public function getdeleteedilter($msg)
    {
       $con=$this->db->connection();
       $customerdelete = array();
       $getcustomerdelete=$con->query("select * from users where is_deleted=1 AND is_business=0 order by user_id desc");
        while ($row = $getcustomerdelete->fetch_assoc()) {
        $customerdelete[] = $row;
      }
       return $customerdelete;
    }
    public function customer_earn_points($id)
    {
      $con=$this->db->connection();
       $customerpoints = array();
       $customer_earn_points=$con->query("select * from customer_earn_points where is_deleted=0 AND customer_id=".$id);
        while ($row = $customer_earn_points->fetch_assoc()) {
        $customerpoints[] = $row;
      }
       return $customerpoints;
    }
    public function customer_reward_points($id)
    {
       $con=$this->db->connection();
       $customerpoints = array();
       $customer_reward_points=$con->query("select * from customer_rewards_point where is_deleted=0 AND customer_id=".$id);
        while ($row = $customer_reward_points->fetch_assoc()) {
        $customerpoints[] = $row;
      }
       return $customerpoints;
    }
    public function customer_earned_cashback($id)
    {
      $con=$this->db->connection();
       $customerpoints = array();
       $customer_cashback=$con->query("select * from customer_cashback where is_deleted=0 AND customer_id=".$id);
        while ($row = $customer_cashback->fetch_assoc()) {
        $customerpoints[] = $row;
      }
       return $customerpoints;
    }
}
?>