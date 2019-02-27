<?php 
include "../../Model/dbconfig.php";
class deal_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_deal()
    {
       $con=$this->db->connection();
       $getdeal=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id group by business_deal_id order by bd.business_deal_id desc");
      $deal = array();
      while ($row = $getdeal->fetch_assoc()) {
        $deal[] = $row;
      }
       return $deal;
    }
    public function getdisplaydetail_deal($id)
    {
      $con=$this->db->connection();
       $getdealdetail=$con->query("select bd.*,bf.franchise_address,bf.business_user_id,us.user_id,us.business_name,dpt.tag_id,dt.tag,dps.sub_cat_id,sc.sub_category_name,ca.category_id,ca.category_name,oc.offer_title from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id left join deal_post_tag as dpt on bd.business_deal_id = dpt.deal_id left join deal_tags as dt on dpt.tag_id = dt.tag_id left join offer_category as oc on bd.offer_id = oc.offer_id left join deal_post_subcategory as dps on bd.business_deal_id = dps.deal_id left join sub_category as sc on dps.sub_cat_id = sc.sub_category_id left join category as ca on sc.category_id = ca.category_id where bd.business_deal_id=".$id." group by business_deal_id");
       $dealdetail = array();
      while ($row = $getdealdetail->fetch_assoc()) {
        $dealdetail[] = $row;
      }
       return $dealdetail;
    }
    public function getdealtag($id)
    {
      $con=$this->db->connection();
      $getdealtag=$con->query("select dt.* from business_deal as bd left join deal_post_tag as dpt on bd.business_deal_id=dpt.deal_id left join deal_tags as dt on dpt.tag_id=dt.tag_id where dpt.deal_id=".$id);
      $deal_tag = array();
      while ($row = $getdealtag->fetch_assoc()) {
        $deal_tag[] = $row;
      }
      return $deal_tag;
    }
    public function getdealcat($id)
    {
      $con=$this->db->connection();
      $getdealcat=$con->query("select sc.*,ca.category_name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where dps.deal_id=".$id);
      $deal_cat = array();
      while ($row = $getdealcat->fetch_assoc()) {
        $deal_cat[] = $row;
      }
      return $deal_cat;
    }
    public function getdealcategory($id)
    {
      $con=$this->db->connection();
      $getdealcategory=$con->query("select bd.business_deal_id,ca.category_name,ca.category_id from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where dps.deal_id=".$id." group by ca.category_id");
     
      $deal_category = array();
      while ($row = $getdealcategory->fetch_assoc()) {
        $deal_category[] = $row;
      }
      return $deal_category;   
       }
       public function getdealreedeam($id)
       {
          $con=$this->db->connection();
          $getdealrdm=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity),COALESCE(SUM(upd.quantity),0) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=1 OR upd.is_online=1) AND upd.business_deal_id=".$id." group by bd.business_deal_id");
          if ($getdealrdm->num_rows > 0) {
            $deal_rdm = array();
            while ($row = $getdealrdm->fetch_assoc()) {
              $deal_rdm[] = $row;
            }
      } else {
           $deal_rdm = 0;
      }
          
          return $deal_rdm;   
       }
       public function getdealpurchased($id)
       {
          $con=$this->db->connection();
          $getdealpur=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=0 OR upd.is_online=1) AND upd.business_deal_id=".$id." group by bd.business_deal_id");
           if ($getdealpur->num_rows > 0) {
         $deal_pur = array();
      while ($row = $getdealpur->fetch_assoc()) {
        $deal_pur[] = $row;
      }
       } else {
        $deal_pur = 0;
      }
          return $deal_pur;

       }
       public function gettotalrdminstore($id)
       {
            $con=$this->db->connection();
              $getinstorerdm=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=1 AND upd.is_online=0) AND upd.business_deal_id=".$id." group by bd.business_deal_id");
               if ($getinstorerdm->num_rows > 0) {
             $instore_rdm = array();
              while ($row = $getinstorerdm->fetch_assoc()) {
                $instore_rdm[] = $row;
              }
            }
            else
            {
              $instore_rdm = 0; 
            }
              return $instore_rdm;
           
       }
       public function gettotalpurinstore($id)
       {
            $con=$this->db->connection();
              $getinstorepur=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=0 AND upd.is_online=0) AND upd.business_deal_id=".$id." group by bd.business_deal_id");
              if ($getinstorepur->num_rows > 0) 
              {
              $instore_pur = array();
              while ($row = $getinstorepur->fetch_assoc()) {
                $instore_pur[] = $row;
              }
            }
            else
            {
              $instore_pur = 0;
            }

              return $instore_pur;
       }
       public function gettotalonlinepur($id)
       {
              $con=$this->db->connection();
              $getonlinepur=$con->query("select bd.business_deal_id,upd.is_cart,upd.is_online,SUM(upd.quantity) from business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where upd.is_online=1 AND upd.business_deal_id=".$id." group by bd.business_deal_id");
              $online_pur = array();
              while ($row = $getonlinepur->fetch_assoc()) {
                $online_pur[] = $row;
              }
              return $online_pur;
       }
    // public function getsubcategory_filter($msg)
    // {
    //       $con=$this->db->connection();
    //           $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id where sc.sub_category_id=".$msg." order by bd.business_deal_id desc");
    //           $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    // public function getbranch_filter($msg)
    // {
    //       $con=$this->db->connection();
    //           $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bf.franchise_id=".$msg." order by bd.business_deal_id desc");
    //           $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    // public function getcategory_filter($msg)
    // {
    //       $con=$this->db->connection();
    //       if($msg == 0)
    //       {
    //          $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id group by bd.business_deal_id order by bd.business_deal_id desc");
    //       }
    //         else
    //         {
    //           $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where ca.category_id=".$msg." order by bd.business_deal_id desc");
    //         }  
    //            $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    public function getsubcategorylist($id)
    {
              $con=$this->db->connection();
              $getonlinepur=$con->query("select sub_category_id,sub_category_name from sub_category where is_deleted=0 AND category_id=".$id);
             $deal = array();
              while ($row = $getonlinepur->fetch_assoc()) {
                $category[] = $row;
              }
              return $category;
    }
    // public function gettag_filter($msg)
    // {
    //       $con=$this->db->connection();
    //       if($msg == 0 )
    //       {
    //         $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_tag as dpt on bd.business_deal_id=dpt.deal_id left join deal_tags as dt on dpt.tag_id=dt.tag_id group by bd.business_deal_id order by bd.business_deal_id desc");
    //       }
    //          else
    //          { $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join deal_post_tag as dpt on bd.business_deal_id=dpt.deal_id left join deal_tags as dt on dpt.tag_id=dt.tag_id where dpt.tag_id=".$msg." order by bd.business_deal_id desc");
    //      }
    //          $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    public function getbranchlist($id)
    {
              $con=$this->db->connection();
              $getonlinepur=$con->query("select franchise_id, franchise_address from business_franchise where is_deleted=0 AND business_user_id=".$id);
              $branch = array();
              while ($row = $getonlinepur->fetch_assoc()) {
                $branch[] = $row;
              }
              return $branch;
    }
    // public function getbusiness_filter($msg)
    // {
    //       $con=$this->db->connection();
    //       if($msg == 0)
    //       {
    //             $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id order by bd.business_deal_id desc");
    //       }
    //       else
    //       {

    //           $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bf.business_user_id=".$msg." order by bd.business_deal_id desc");
    //       }
    //           $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    // public function getdisplay_activedeal($msg)
    // {
    //   $con=$this->db->connection();
    //           $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bd.is_active=1 order by bd.business_deal_id desc");
    //          $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    // public function getdisplay_deactivedeal($msg)
    // {
    //   $con=$this->db->connection();
    //           $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bd.is_active=0 order by bd.business_deal_id desc");
    //           $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    // public function getdisplay_expireddeal($msg)
    // {
    //   $con=$this->db->connection();
    //           $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id where bd.deal_end_time < now() order by bd.business_deal_id desc");
    //            $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    // public function getdisplay_purchaseddeal($msg)
    // {
    //   $con=$this->db->connection();
    //           $getonlinepur=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id where (upd.is_cart=1 OR upd.is_online=1) group by bd.business_deal_id order by bd.business_deal_id desc");
    //             $deal = array();
    //           while ($row = $getonlinepur->fetch_assoc()) {
    //             $deal[] = $row;
    //           }
    //           return $deal;
    // }
    public function getdisplay_tag()
    {
      $con=$this->db->connection();

              $gettag=$con->query("select tag_id,tag from deal_tags where is_deleted=0");
             $alltag = array();
              while ($row = $gettag->fetch_assoc()) {
                $alltag[] = $row;
              }
              return $alltag;
    }
    public function getdisplay_business()
    {
              $con=$this->db->connection();
              $gettag=$con->query("select user_id,business_name from users where is_deleted=0 AND is_business=1");
             $alltag = array();
              while ($row = $gettag->fetch_assoc()) {
                $alltag[] = $row;
              }
              return $alltag;
    }
    public function getdisplay_category()
    {
      $con=$this->db->connection();
              $gettag=$con->query("select category_id,category_name from category where NOT is_deleted=1");
               $alltag = array();
              while ($row = $gettag->fetch_assoc()) {
                $alltag[] = $row;
              }
              return $alltag;
    }
    public function loadfilter_deal($business_id,$branch,$tag,$sub_category,$category,$radio)
    {
      $con=$this->db->connection();
      $whereClauses = array(); 
    if ($business_id > 0) $whereClauses[] ="bf.business_user_id='".$business_id."'";
    if ($branch > 0) $whereClauses[] ="bf.franchise_id='".$branch."'"; 
    if ($tag > 0) $whereClauses[] ="dpt.tag_id='".$tag."'";
    if ($category > 0) $whereClauses[] ="ca.category_id='".$category."'"; 
    if ($sub_category > 0) $whereClauses[] ="dps.sub_cat_id='".$sub_category."'"; 
    if ($radio == 'active') $whereClauses[] ="bd.is_active=1"; 
    if ($radio == 'deactive') $whereClauses[] ="bd.is_active=0"; 
    if ($radio == 'expired') $whereClauses[] ="bd.deal_end_time < now()"; 
    if ($radio == 'purchased') $whereClauses[] ="(upd.is_cart=1 OR upd.is_online=1)"; 
    $where = ''; 
    if (count($whereClauses) > 0) { $where = ' WHERE '.implode(' AND ',$whereClauses); }
     $getonlinepur=$con->query("select bd.*,bf.franchise_address,bf.business_user_id,us.user_id,us.business_name,dpt.tag_id,dt.tag,dps.sub_cat_id,sc.sub_category_name,ca.category_id,ca.category_name,oc.offer_title,upd.is_cart,upd.is_online from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join users as us on bf.business_user_id = us.user_id left join deal_post_tag as dpt on bd.business_deal_id = dpt.deal_id left join deal_tags as dt on dpt.tag_id = dt.tag_id left join offer_category as oc on bd.offer_id = oc.offer_id left join deal_post_subcategory as dps on bd.business_deal_id = dps.deal_id left join sub_category as sc on dps.sub_cat_id = sc.sub_category_id left join category as ca on sc.category_id = ca.category_id" .$where. " group by business_deal_id desc");  
      $deal = array();
              while ($row = $getonlinepur->fetch_assoc()) {
                $deal[] = $row;
              }
              return $deal;
    }
}
?>