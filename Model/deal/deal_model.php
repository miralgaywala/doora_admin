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
       $getdeal=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id group by business_deal_id");
       $deal=$getdeal->fetch_all();
       return $deal;
    }
    public function getdisplaydetail_deal($id)
    {
      $con=$this->db->connection();
       $getdealdetail=$con->query("select bd.*,bf.franchise_address,bf.business_user_id,us.user_id,us.business_name,dpt.tag_id,dt.tag,dps.sub_cat_id,sc.sub_category_name,ca.category_id,ca.category_name from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id left join deal_post_tag as dpt on bd.business_deal_id = dpt.deal_id left join deal_tags as dt on dpt.tag_id = dt.tag_id left join deal_post_subcategory as dps on bd.business_deal_id = dps.deal_id left join sub_category as sc on dps.sub_cat_id = sc.sub_category_id left join category as ca on sc.category_id = ca.category_id where bd.business_deal_id=".$id." group by business_deal_id");
       $dealdetail=$getdealdetail->fetch_all();
       return $dealdetail;
    }
    public function getdealtag($id)
    {
      $con=$this->db->connection();
      $getdealtag=$con->query("select dt.* from business_deal as bd left join deal_post_tag as dpt on bd.business_deal_id=dpt.deal_id left join deal_tags as dt on dpt.tag_id=dt.tag_id where dpt.deal_id=".$id);
      $deal_tag=$getdealtag->fetch_all();
      return $deal_tag;
    }
    public function getdealcat($id)
    {
      $con=$this->db->connection();
      $getdealcat=$con->query("select sc.*,ca.category_name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where dps.deal_id=".$id);
      $deal_cat=$getdealcat->fetch_all();
      return $deal_cat;
    }
    public function getdealcategory($id)
    {
      $con=$this->db->connection();
      $getdealcategory=$con->query("select bd.business_deal_id,ca.category_name,ca.category_id from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where dps.deal_id=".$id." group by ca.category_id");
      $deal_category=$getdealcategory->fetch_all();
      return $deal_category;   
       }
    
}
?>