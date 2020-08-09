<?php 
include "../../Model/dbconfig.php";
include"../../Model/offer_type/offer.php";

class offer_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_offer()
    {
       $con=$this->db->connection();
       $getoffer=$con->query("select * from offer_category where NOT is_deleted=1");
       $offer = array();
      while ($row = $getoffer->fetch_assoc()) {
        $offer[] = $row;
      }
       return $offer;
    }
     public function addoffer_data($offer)
    {
    	$offer=trim($offer);
    	$con= $this->db->connection();
    	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select * from offer_category where is_deleted=0 AND offer_title='".$offer."'");
        $count=$select->num_rows;
        $addoffer="";
        if($count > 0)
        {
           $addoffer="0";
        }
        else
        {
       	//echo "insert into deal_tags(tag,created_at) values('".$tag."','".$date."')";    
        $tag=$con->query("insert into offer_category (offer_title,created_at,updated_at) values('".$offer."','".$date."','".$date."')"); 
       	$addoffer="1";
        }  
       return $addoffer;
    }
    public function viewoffer($offer_id)
    {
    	 $con= $this->db->connection();
        $viewoffer1=$con->query("select * from offer_category where offer_id=".$offer_id);
       $viewoffer = array();
      while ($row = $viewoffer1->fetch_assoc()) {
        $viewoffer[] = $row;
      }
        return $viewoffer;
    }
    public function editofferlist($offer_id)
    {
    	 $con= $this->db->connection();
        $editoffer=$con->query("select * from offer_category where offer_id=".$offer_id);
        $editofferdata = array();
      while ($row = $editoffer->fetch_assoc()) {
        $editofferdata[] = $row;
      }
        return $editofferdata;
    }
    public function editoffer_data($offer_id,$offer)
    {
    	$offer=trim($offer);
    	$con= $this->db->connection();
    	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select offer_id from offer_category where is_deleted=0 AND offer_title='".$offer."' AND offer_id!=".$offer_id);
        $count=$select->num_rows;
        $editoffer="";
        if($count > 0)
        {
           $editoffer="0";
        }
        else
        {
        $tag=$con->query("update offer_category SET offer_title='".$offer."' , updated_at='".$date."' where offer_id=".$offer_id); 
       	$editoffer="1";      
        }  
       return $editoffer;
    }
    public function deleteoffer($offer_id)
    {
    	$con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $delete=$con->query("update offer_category SET is_deleted=1,updated_at='".$date."' where offer_id=".$offer_id);
    }
}

?>