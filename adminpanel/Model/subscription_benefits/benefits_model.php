<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
       $getsubscription=$con->query("select sb.*, sp.subscription_name from subscription_benefits sb left join subscription_plans sp on sb.subscription_plan_id = sp.subscription_plan_id where sb.is_deleted=0");
      $subscription = array();
      while ($row = $getsubscription->fetch_assoc()) {
        $subscription[] = $row;
      }
       return $subscription;
    }

    public function get_subscription()
    {
       $con=$this->db->connection();
       $getsubscription=$con->query("select * from subscription_plans where is_deleted=0");
      $subscription = array();
      while ($row = $getsubscription->fetch_assoc()) {
        $subscription[] = $row;
      }
       return $subscription;
    }

    public function addsubscription_benefit($title,$is_main,$s_id)
    {
      $title=trim($title);
      $con= $this->db->connection();
      $subscription=$con->query("insert into subscription_benefits(subscription_plan_id, title, is_main) values(".$s_id.",'".$title."',".$is_main.")"); 
      if($subscription){
        return "success";
      }else{
        return "error";
      }

    }

    public function getedits_subscription($benefit_id)
    { 
      $con=$this->db->connection();

      //$str = "select * from subscription_benefits where is_deleted=0 and benefit_id=".$benefit_id;
      $getsubscription=$con->query("select * from subscription_benefits where is_deleted=0 and benefit_id=".$benefit_id);
    
      $subscription = array();
      while ($row = $getsubscription->fetch_assoc()) {
        $subscription[] = $row;
      }
      return $subscription;
    }
    public function editsubscription_data($benefit_id,$title,$is_main,$s_id)
    {
      $con= $this->db->connection();
      $date = gmdate("Y-m-d H:i:s");
      $str = "update subscription_benefits set title=".$title.",subscription_plan_id='".$s_id."',is_main='".$is_main."', updated_at='".$date."' where benefit_id=".$benefit_id;
      $subscription=$con->query("update subscription_benefits set title='".$title."',subscription_plan_id=".$s_id.",is_main=".$is_main.", updated_at='".$date."' where benefit_id=".$benefit_id); 
  
      if($subscription){
        return "1"; 
      }else{
        return "0";
      }
    }
  public function delete_benefit($benefit_id)
  {
        $con=$this->db->connection();
        $date = gmdate("Y-m-d H:i:s ");
        $delete=$con->query("update subscription_benefits SET is_deleted=1,updated_at='".$date."' where benefit_id=".$benefit_id);
  }
  }
?>
