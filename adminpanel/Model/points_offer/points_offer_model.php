<?php 
include "../../Model/dbconfig.php";


class points_offer_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_points_offer()
    {
       $con=$this->db->connection();
       $getpoints_offer=$con->query("select * from points_offer where is_deleted=0");
       $tag = array();
      while ($row = $getpoints_offer->fetch_assoc()) {
        $tag[] = $row;
      }
       return $tag;
    }
    public function view_business()
    {
      $con=$this->db->connection();
       $getpoints_offer=$con->query("select * from users where is_deleted=0 AND is_business=1 AND is_active=1");
       $tag = array();
      while ($row = $getpoints_offer->fetch_assoc()) {
        $tag[] = $row;
      }
       return $tag;
    }
    public function add_points_offer($points_offer_desc,$points_number,$multipliers_points,$is_fixed_points,$number_of_purchase_offer,$busiess_offer_points,$offer_start_date,$offer_end_date)
    {
      $points_offer_desc=trim($points_offer_desc);
      $points_number=trim($points_number);
      $multipliers_points=trim($multipliers_points);
      $is_fixed_points=trim($is_fixed_points);
      $number_of_purchase_offer=trim($number_of_purchase_offer);
      $busiess_offer_points=trim($busiess_offer_points);
      $offer_start_date=trim($offer_start_date);
      $offer_end_date=trim($offer_end_date);
      $con= $this->db->connection();
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $tag=$con->query("insert into points_offer (offer_desc,is_fixed_points,points,multiplier,business_id,number_of_purchase,offer_start_date,offer_end_date,created_at,updated_at) values('".$points_offer_desc."',".$is_fixed_points.",".$points_number.",".$multipliers_points.",".$busiess_offer_points.",".$number_of_purchase_offer.",'".$offer_start_date."','".$offer_end_date."','".$date."','".$date."')"); 
        $addtag="1";   
       return $addtag;
    }
    public function edit_points_offer($points_offer_desc,$points_number,$multipliers_points,$is_fixed_points,$number_of_purchase_offer,$busiess_offer_points,$offer_start_date,$offer_end_date,$points_offer_id)
    {
      $points_offer_desc=trim($points_offer_desc);
      $points_number=trim($points_number);
      $multipliers_points=trim($multipliers_points);
      $is_fixed_points=trim($is_fixed_points);
      $number_of_purchase_offer=trim($number_of_purchase_offer);
      $busiess_offer_points=trim($busiess_offer_points);
      $offer_start_date=trim($offer_start_date);
      $offer_end_date=trim($offer_end_date);
      $con= $this->db->connection();
         $date = gmdate("Y-m-d\TH:i:s\Z");
         $tag=$con->query("update points_offer SET offer_desc='".$points_offer_desc."' ,is_fixed_points='".$is_fixed_points."' ,points='".$points_number."' ,multiplier='".$multipliers_points."' ,business_id='".$busiess_offer_points."' ,number_of_purchase='".$number_of_purchase_offer."' ,offer_start_date='".$offer_start_date."' ,offer_end_date='".$offer_end_date."' , updated_at='".$date."' where offer_id=".$points_offer_id); 
          $addtag="1";   
       return $addtag;
    }
    public function view_editdetail_poits_offer($id)
    {
      $con=$this->db->connection();
       $getpoints_offer=$con->query("select * from points_offer where is_deleted=0 AND offer_id=".$id);
       $tag = array();
      while ($row = $getpoints_offer->fetch_assoc()) {
        $tag[] = $row;
      }
       return $tag;
    }
    public function delete_points_offer($id)
    {
      $con=$this->db->connection();
      $date = gmdate("Y-m-d\TH:i:s\Z");
        $delete=$con->query("update points_offer SET is_deleted=1,updated_at='".$date."' where offer_id=".$id);
    }
    public function business_name($bid)
    {
      $con=$this->db->connection();
      $select=$con->query("select * from users where is_deleted=0 AND is_business=1 AND user_id=".$bid);
        $count=$select->num_rows;
        $edittag="";
        if($count > 0)
        {
           $tag = array();
            while ($row = $select->fetch_assoc()) {
              $tag[] = $row;
            }
        }
        else
        {
          $tag =0;   
        }  
        return $tag;
    }
}
?>