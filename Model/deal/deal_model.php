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
       $getdeal=$con->query("select bd.*,bf.franchise_address from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where us.is_deleted=0 group by business_deal_id order by bd.business_deal_id desc");
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
    public function active_deal($id,$data)
    {
      $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=gmdate("Y-m-d\TH:i:s\Z");
        $result=$con->query("update business_deal SET is_active=1,updated_at='".$date."' where business_deal_id=".$id);
        $result = 1;
        return $result;
    }
    public function deactive_deal($id,$data)
    { 
      $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=gmdate("Y-m-d\TH:i:s\Z");
        $result=$con->query("update business_deal SET is_active=0,updated_at='".$date."' where business_deal_id=".$id);
        $retrive_deal_info=$con->query("SELECT * FROM users WHERE user_id=(SELECT business_user_id FROM business_franchise WHERE franchise_id=(SELECT franchise_id FROM business_deal WHERE business_deal_id=".$id."))");
        $deal_info = array();
        while ($row = $retrive_deal_info->fetch_assoc()) {
          $deal_info[] = $row;
        }
         $deal_id = $id;
         $user_id = $deal_info[0]['user_id'];
         $user_photo = $deal_info[0]['photo'];
          $deal_information=$con->query("SELECT * FROM business_deal  WHERE business_deal_id=".$deal_id);
        $deal = array();
        while ($row = $deal_information->fetch_assoc()) {
          $deal[] = $row;
        }
        $name = "\"".$deal[0]['deal_title']."\"";
         $not_id=8; 
          $deal = $deal;
          $message=array(
              'message'=>"Your "."'".json_decode($name)."'"." deal is not available anymore.",
              'id'=>$not_id,
              'deal'=>$deal
          );
          $deal_info1=$con->query("SELECT u.* from user_purchase_deal as upd LEFT JOIN users as u ON u.user_id=upd.user_id WHERE upd.business_deal_id=".$deal_id." AND upd.is_cart=1 GROUP BY u.user_id");
          $deal_info_user = array();
          while ($row = $deal_info1->fetch_assoc()) {
            $deal_info_user[] = $row;
          }
          foreach ($deal_info_user as $value12) {
            $u_id = $value12['user_id'];
            $sender_user_id = $user_id;
            $deal_id = $deal_id;
            $noti_type_id = $not_id;
            $img = $user_photo;
            $is_send = 1;
            $time = gmmktime();
            $date = date("Y-m-d H:i:s", $time); 
            // echo "INSERT INTO `user_notification`( `user_id`, `sender_user_id`,`business_deal_id`, `notification_type_id`,`noti_image`,`is_send`,`created_at`)VALUES (".$u_id.",".$sender_user_id.",".$deal_id.",".$noti_type_id.",'".$img."',".$is_send.",'".$date."')";
            $result=$con->query("INSERT INTO `user_notification`( `user_id`, `sender_user_id`,`business_deal_id`, `notification_type_id`,`noti_image`,`is_send`,`created_at`)VALUES (".$u_id.",".$sender_user_id.",".$deal_id.",".$noti_type_id.",'".$img."',".$is_send.",'".$date."')");
              $sendcode=$this->sendPushMessage($message, $u_id);
          }
         $result = 1;
        return $result;
    }
    public function sendPushMessage($message, $user_id) {
      $con=$this->db->connection();
      $is_iphone = 0;
      $device_id = "";
    $stmt = $con->query("SELECT device_id, is_iphone from users WHERE user_id = ".$user_id." AND is_deleted = 0");
  $users = array();
    while ($row = $stmt->fetch_assoc()) {
      $users[] = $row;
    }
    $is_iphone = $users[0]['is_iphone'];
    $device_id = $users[0]['device_id'];
      if(strcmp($is_iphone, '0') == 0 ) {
        
        require_once '../../../api/sendNotification/GCM.php';  
        $gcm = new GCM();
        
        $registration_ids = array();
        $registration_ids[] = $device_id;
        $my= $gcm->send_notification($registration_ids, $message);
      } else if(strcmp($is_iphone, '1') == 0 ) {
        require_once '../../../api/sendNotification/IOSNoti.php'; 
        $IOSNotif = new IOSNoti();
        $result = $IOSNotif->sendPushNotification($message, $device_id, true);

      }
  }
    public function delete_deal($id)
    {
       $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $time = gmmktime();
            $date = date("Y-m-d H:i:s", $time); 
        $result=$con->query("DELETE FROM business_deal WHERE business_deal_id='".$id."'");
        $result = 1;
        // $retrive_deal_info=$con->query("SELECT * FROM users WHERE user_id=(SELECT business_user_id FROM business_franchise WHERE franchise_id=(SELECT franchise_id FROM business_deal WHERE business_deal_id=".$id."))");
        // $deal_info = array();
        // while ($row = $retrive_deal_info->fetch_assoc()) {
        //   $deal_info[] = $row;
        // }
        //  $deal_id = $id;
        //  $user_id = $deal_info[0]['user_id'];
        //  $user_photo = $deal_info[0]['photo'];
        //   $deal_information=$con->query("SELECT * FROM business_deal  WHERE business_deal_id=".$deal_id);
        // $deal = array();
        // while ($row = $deal_information->fetch_assoc()) {
        //   $deal[] = $row;
        // }
        // $name = "\"".$deal[0]['deal_title']."\"";
        //  $not_id=8; 
        //   $deal = $deal;
        //   $message=array(
        //       'message'=>"Your "."'".json_decode($name)."'"." deal is not available anymore.",
        //       'id'=>$not_id,
        //       'deal'=>$deal
        //   );
        //   $deal_info1=$con->query("SELECT u.* from user_purchase_deal as upd LEFT JOIN users as u ON u.user_id=upd.user_id WHERE upd.business_deal_id=".$deal_id." AND upd.is_cart=1 GROUP BY u.user_id");
        //   $deal_info_user = array();
        //   while ($row = $deal_info1->fetch_assoc()) {
        //     $deal_info_user[] = $row;
        //   }
        //   foreach ($deal_info_user as $value12) {
        //     $u_id = $value12['user_id'];
        //       $sendcode=$this->sendPushMessage($message, $u_id);
        //   }
       
        return $result;
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
       public function getdealreedeamalert($id)
       {
          $con=$this->db->connection();
          $getdealrdm=$con->query("SELECT count(*) as total_count FROM user_purchase_deal WHERE business_deal_id=".$id);
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
    if ($radio == 'all') $whereClauses[] ="us.is_deleted = 0"; 
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