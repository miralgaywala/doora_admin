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
       $getsubscription=$con->query("select * from subscription_plans where NOT is_deleted=1");
      $subscription = array();
      while ($row = $getsubscription->fetch_assoc()) {
        $subscription[] = $row;
      }
       return $subscription;
    }
    public function addsubscription_data($price,$type, $desc)
    {
      $price=trim($price);
      $type=trim($type);
      $desc=trim($desc);

    

      // $free_days=trim($free_days);
      $con= $this->db->connection();
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
      $date = gmdate("Y-m-d H:i:s");
        $select=$con->query("select subscription_plan_id from subscription_plans where is_deleted=0 AND price=".$price);
        $count=$select->num_rows;
        $addsubscription="";
        if($count > 0)
        {
           $addsubscription="0";
        }
        else
        {
      $subscription=$con->query("insert into subscription_plans (subscription_name,price,description,created_at,updated_at) values('".$type."',".$price.",'".$desc."','".$date."','".$date."')"); 
     // echo "insert into subscription_plans (subscription_name,price,description,created_at,updated_at) values('".$type."',".$price.",'".$desc."','".$date."','".$date."')";
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
    public function editsubscription_data($subscription_plan_id,$price,$type,$desc)
    {
      $price=trim($price);
      $type=trim($type);
      $desc=trim($desc);
      // $free_days=trim($free_days);
      $con= $this->db->connection();
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
       $date = gmdate("Y-m-d H:i:s");
        $select=$con->query("select subscription_plan_id from subscription_plans where is_deleted=0 AND price=".$price." AND subscription_plan_id!=".$subscription_plan_id);
       
        $count=$select->num_rows;
        $addsubscription="";
        if($count > 0)
        {
           $addsubscription="0";
        }
        else
        {
      $subscription=$con->query("update subscription_plans set price=".$price.",subscription_name='".$type."',description='".$desc."', updated_at='".$date."' where subscription_plan_id=".$subscription_plan_id); 
     
      $addsubscription="1";   
    }
      return $addsubscription;
    }
  public function delete_subscription($subscription_id)
  {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d H:i:s ");
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

  public function getview_benefits($subscription_id)
  {
        $con=$this->db->connection();
       $getsubscription=$con->query("select * from subscription_benefits where is_deleted=0 and subscription_plan_id=".$subscription_id);
       $benefits = array();
      while ($row = $getsubscription->fetch_assoc()) {
        $benefits[] = $row;
      }
       return $benefits;
  }

  public function getview_benefit($benefit_id)
  {
        $con=$this->db->connection();
       $getbenefit=$con->query("select sb.*, sp.subscription_name from subscription_benefits sb left join subscription_plans sp on sb.subscription_plan_id = sp.subscription_plan_id where sb.is_deleted=0 and benefit_id=".$benefit_id);
       $benefit = array();
      while ($row = $getbenefit->fetch_assoc()) {
        $benefit[] = $row;
      }
       return $benefit;
  }
  }
?>
