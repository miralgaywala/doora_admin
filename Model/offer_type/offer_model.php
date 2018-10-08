<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/offer_type/offer.php");
class offer_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_offer()
    {
       $con=$this->db->connection();
       $getoffer=$con->query("select * from offer_category where NOT is_deleted=1");
       $offer=$getoffer->fetch_all();
       return $offer;
    }
     public function addoffer_data($offer)
    {
    	$offer=trim($offer);
    	$con= $this->db->connection();
    	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
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
        $tag=$con->query("insert into offer_category (offer_title,created_at) values('".$offer."','".$date."')"); 
       	$addoffer="1";
        }  
       return $addoffer;
    }
    public function viewoffer($offer_id)
    {
    	 $con= $this->db->connection();
        $viewoffer=$con->query("select * from offer_category where offer_id=".$offer_id);
        $viewoffer=$viewoffer->fetch_all();
        return $viewoffer;
    }
    public function editofferlist($offer_id)
    {
    	 $con= $this->db->connection();
        $editoffer=$con->query("select * from offer_category where offer_id=".$offer_id);
        $editofferdata=$editoffer->fetch_all();
        return $editofferdata;
    }
    public function editoffer_data($offer_id,$offer)
    {
    	$offer=trim($offer);
    	$con= $this->db->connection();
    	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
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
        $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
        $delete=$con->query("update offer_category SET is_deleted=1,updated_at='".$date."' where offer_id=".$offer_id);
    }
}

?>