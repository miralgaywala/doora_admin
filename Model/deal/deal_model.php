<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/deal/deal.php");
class deal_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_deal()
    {
       $con=$this->db->connection();
       $getbranch=$con->query("select * from business_franchise where is_deleted=0");
       $branch=$getbranch->fetch_all();
       return $branch;
    }
    public function getdisplay_tag()
    {
      $con=$this->db->connection();
      $gettag=$con->query("select * from deal_tags where is_deleted=0");
      $tag=$gettag->fetch_all();
      return $tag;
    }
    public function getdisplay_category()
    {
      $con=$this->db->connection();
      $getcategory=$con->query("select * from category where is_deleted=0");
      $category=$getcategory->fetch_all();
      return $category;
    }
}
?>