<?php 
include "../../Model/dbconfig.php";
include"../../Model/subscription_package/subscription.php";

class subscription_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_subscription()
    {
       $con=$this->db->connection();
       $getsubscription=$con->query("select * from subscription_plans where NOT is_deleted=1");
      $subscription = array();
      while ($row = $getsubscription->fetch_assoc()) {
        $subscription[] = $row;
      }
       return $subscription;
    }
    public function addsubscription_data($price,$per_deal_redeem_price,$free_days)
    {
      $price=trim($price);
      $per_deal_redeem_price=trim($per_deal_redeem_price);
      $free_days=trim($free_days);
      $con= $this->db->connection();
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
      $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select subscription_plan_id from subscription_plans where is_deleted=0 AND price=".$price." AND per_deal_redeem_price=".$per_deal_redeem_price." AND free_days=".$free_days);
        $count=$select->num_rows;
        $addsubscription="";
        if($count > 0)
        {
           $addsubscription="0";
        }
        else
        {
      $subscription=$con->query("insert into subscription_plans (price,per_deal_redeem_price,free_days,created_at,updated_at) values(".$price.",".$per_deal_redeem_price.",".$free_days.",'".$date."','".$date."')"); 
      $addsubscription="1"; 
      }  
      return $addsubscription;
    }
    public function getedits_subscription($subscription_id)
    { 
      $con=$this->db->connection();
       $getsubscription=$con->query("select * from subscription_plans where subscription_plan_id=".$subscription_id);
       $subscription = array();
      while ($row = $getsubscription->fetch_assoc()) {
        $subscription[] = $row;
      }
       return $subscription;
    }
    public function editsubscription_data($subscription_plan_id,$price,$per_deal_redeem_price,$free_days)
    {
      $price=trim($price);
      $per_deal_redeem_price=trim($per_deal_redeem_price);
      $free_days=trim($free_days);
      $con= $this->db->connection();
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
       $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select subscription_plan_id from subscription_plans where is_deleted=0 AND price=".$price." AND per_deal_redeem_price=".$per_deal_redeem_price." AND free_days=".$free_days." AND subscription_plan_id!=".$subscription_plan_id);
        $count=$select->num_rows;
        $addsubscription="";
        if($count > 0)
        {
           $addsubscription="0";
        }
        else
        {
      $subscription=$con->query("update subscription_plans set price=".$price.",per_deal_redeem_price=".$per_deal_redeem_price.",free_days=".$free_days.",updated_at='".$date."' where subscription_plan_id=".$subscription_plan_id); 
      $addsubscription="1";   
    }
      return $addsubscription;
    }
  public function delete_subscription($subscription_id)
  {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $delete=$con->query("update subscription_plans SET is_deleted=1,updated_at='".$date."' where subscription_plan_id=".$subscription_id);
  }
  public function getview_subscription($subscription_id)
  {
        $con=$this->db->connection();
       $getsubscription=$con->query("select * from subscription_plans where subscription_plan_id=".$subscription_id);
       $subscription = array();
      while ($row = $getsubscription->fetch_assoc()) {
        $subscription[] = $row;
      }
       return $subscription;
  }
  }
?>
