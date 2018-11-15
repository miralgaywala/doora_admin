<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
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
       $getdealdetail=$con->query("select bd.*,bf.franchise_address,bf.business_user_id,us.user_id,us.business_name,dpt.tag_id,dt.tag,dps.sub_cat_id,sc.sub_category_name,ca.category_id,ca.category_name,oc.offer_title from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id left join deal_post_tag as dpt on bd.business_deal_id = dpt.deal_id left join deal_tags as dt on dpt.tag_id = dt.tag_id left join offer_category as oc on bd.offer_id = oc.offer_id left join deal_post_subcategory as dps on bd.business_deal_id = dps.deal_id left join sub_category as sc on dps.sub_cat_id = sc.sub_category_id left join category as ca on sc.category_id = ca.category_id where bd.business_deal_id=".$id." group by business_deal_id");
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
       public function getdealreedeam($id)
       {
          $con=$this->db->connection();
          $getdealrdm=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=1 OR upd.is_online=1) AND upd.business_deal_id=".$id." group by bd.business_deal_id");
          $deal_rdm=$getdealrdm->fetch_all();
          return $deal_rdm;   
       }
       public function getdealpurchased($id)
       {
          $con=$this->db->connection();
          $getdealpur=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=0 OR upd.is_online=1) AND upd.business_deal_id=".$id." group by bd.business_deal_id");
          $deal_pur=$getdealpur->fetch_all();
          return $deal_pur;
       }
       public function gettotalrdminstore($id)
       {
            $con=$this->db->connection();
              $getinstorerdm=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=1 AND upd.is_online=0) AND upd.business_deal_id=".$id." group by bd.business_deal_id");
              $instore_rdm=$getinstorerdm->fetch_all();
              return $instore_rdm;
       }
       public function gettotalpurinstore($id)
       {
            $con=$this->db->connection();
              $getinstorepur=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=0 AND upd.is_online=0) AND upd.business_deal_id=".$id." group by bd.business_deal_id");
              $instore_pur=$getinstorepur->fetch_all();
              return $instore_pur;
       }
       public function gettotalonlinepur($id)
       {
              $con=$this->db->connection();
              $getonlinepur=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where upd.is_online=1 AND upd.business_deal_id=".$id." group by bd.business_deal_id");
              $online_pur=$getonlinepur->fetch_all();
              return $online_pur;
       }
    public function getsubcategory_filter($msg)
    {
          $con=$this->db->connection();
              $getonlinepur=$con->query("select bd.*,dps.sub_cat_id from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id where dps.sub_cat_id=".$msg);
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getbranch_filter($msg)
    {
          $con=$this->db->connection();
              $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bf.franchise_id=".$msg);
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getcategory_filter($msg)
    {
          $con=$this->db->connection();
          if($msg == 0)
          {
             $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id group by bd.business_deal_id");
          }
            else
            {
              $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where ca.category_id=".$msg);
            }  
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getcategorylist($msg)
    {

              $con=$this->db->connection();
              $getonlinepur=$con->query("select sub_category_id,sub_category_name from sub_category where is_deleted=0 AND category_id=".$msg);
              $category=$getonlinepur->fetch_all();   
              return $category;
    }
    public function gettag_filter($msg)
    {
          $con=$this->db->connection();
          if($msg == 0 )
          {
            $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_tag as dpt on bd.business_deal_id=dpt.deal_id left join deal_tags as dt on dpt.tag_id=dt.tag_id group by bd.business_deal_id");
          }
             else
             { $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_tag as dpt on bd.business_deal_id=dpt.deal_id left join deal_tags as dt on dpt.tag_id=dt.tag_id where dpt.tag_id=".$msg);
         }
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getbranchlist($msg)
    {
              $con=$this->db->connection();
              $getonlinepur=$con->query("select franchise_id, franchise_address from business_franchise where is_deleted=0 AND business_user_id=".$msg);
              $branch=$getonlinepur->fetch_all();   
              return $branch;
    }
    public function getbusiness_filter($msg)
    {
          $con=$this->db->connection();
          if($msg == 0)
          {
                $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id");
          }
          else
          {

              $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bf.business_user_id=".$msg);
          }
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getdisplay_activedeal($msg)
    {
      $con=$this->db->connection();
              $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bd.is_active=1");
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getdisplay_deactivedeal($msg)
    {
      $con=$this->db->connection();
              $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bd.is_active=0");
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getdisplay_expireddeal($msg)
    {
      $con=$this->db->connection();
              $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bd.deal_end_time < now()");
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getdisplay_purchaseddeal($msg)
    {
      $con=$this->db->connection();
              $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=1 OR upd.is_online=1) group by bd.business_deal_id");
              $deal=$getonlinepur->fetch_all();
              return $deal;
    }
    public function getdisplay_tag()
    {
      $con=$this->db->connection();

              $gettag=$con->query("select tag_id,tag from deal_tags where is_deleted=0");
              $alltag=$gettag->fetch_all();
              return $alltag;
    }
    public function getdisplay_business()
    {
      $con=$this->db->connection();
              $gettag=$con->query("select user_id,business_name from users where is_deleted=0 AND is_business=1");
              $alltag=$gettag->fetch_all();
              return $alltag;
    }
    public function getdisplay_category()
    {
      $con=$this->db->connection();
              $gettag=$con->query("select category_id,category_name from category where NOT is_deleted=1");
              $alltag=$gettag->fetch_all();
              return $alltag;
    }
}
?>