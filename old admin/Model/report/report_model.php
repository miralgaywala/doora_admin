<?php 
include "../../Model/dbconfig.php";

class report_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function business_list()
    {
       $con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_business=1 order by user_id desc");
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
    public function category_list()
    {
              $con=$this->db->connection();
              $getcategory=$con->query("select * from category where is_deleted=0");
               $category = array();
              while ($row = $getcategory->fetch_assoc()) {
                $category[] = $row;
              }
              return $category;
    }
    public function deal_purchased_year($msg)
    {
      $con=$this->db->connection();
       $businessuser = array();
       if($msg == 'last 1 year')
       {
          $getbusinessuser=$con->query("SELECT count(bd.business_deal_id) as total_deal , oc.offer_title FROM business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join offer_category as oc on bd.offer_id = oc.offer_id WHERE DATE_FORMAT(bd.created_at, '%m-%Y') GROUP BY bd.offer_id");
       }
       elseif ($msg == 'last 30 days') {
          $getbusinessuser=$con->query("SELECT count(bd.business_deal_id) as total_deal , oc.offer_title FROM business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join offer_category as oc on bd.offer_id = oc.offer_id WHERE bd.created_at > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) GROUP BY bd.offer_id");
       }
       elseif ($msg == 'last 7 days') {
          $getbusinessuser=$con->query("SELECT count(bd.business_deal_id) as total_deal , oc.offer_title FROM business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join offer_category as oc on bd.offer_id = oc.offer_id WHERE bd.created_at > DATE_SUB(CURDATE(), INTERVAL 7 DAY) GROUP BY bd.offer_id");
       }
       else
       {
          $getbusinessuser=$con->query("SELECT count(bd.business_deal_id) as total_deal , oc.offer_title FROM business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join offer_category as oc on bd.offer_id = oc.offer_id WHERE bd.created_at > DATE_SUB(CURDATE(), INTERVAL 1 DAY) GROUP BY bd.offer_id");
       }
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }

    public function gender_report($msg)
    {
      $con=$this->db->connection();
       $businessuser = array();
       if($msg == 'last 1 year')
       {
          $getbusinessuser=$con->query("SELECT count(user_id) as users , gender FROM users WHERE is_active=1 AND DATE_FORMAT(last_visited_time, '%m-%Y') AND NOT gender = '' GROUP BY gender");
       }
       elseif ($msg == 'last 30 days') {
          $getbusinessuser=$con->query("SELECT count(user_id) as users , gender FROM users WHERE is_active=1 AND last_visited_time > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND NOT gender = '' GROUP BY gender");
       }
       elseif ($msg == 'last 7 days') {
          $getbusinessuser=$con->query("SELECT count(user_id) as users , gender FROM users WHERE is_active=1 AND last_visited_time > DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND NOT gender = '' GROUP BY gender");
       }
       else
       {
          $getbusinessuser=$con->query("SELECT count(user_id) as users , gender FROM users WHERE is_active=1 AND last_visited_time > DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND NOT gender = '' GROUP BY gender");
       }
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
    public function category_report($msg,$category)
    {
      $con=$this->db->connection();
       $businessuser = array();
      if($category == 'sub-category')
      {
          if($msg == 'last 1 year')
       {
          $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , sc.sub_category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id where DATE_FORMAT(bd.created_at, '%m-%Y') AND NOT sc.sub_category_name = '' GROUP BY sc.sub_category_id");
       }
       elseif ($msg == 'last 30 days') {
          $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , sc.sub_category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id where bd.created_at > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND NOT sc.sub_category_name = '' GROUP BY sc.sub_category_id");
       }
       elseif ($msg == 'last 7 days') {
          $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , sc.sub_category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id where bd.created_at > DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND NOT sc.sub_category_name = '' GROUP BY sc.sub_category_id");
       }
       else
       {
          $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , sc.sub_category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id where bd.created_at > DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND NOT sc.sub_category_name = '' GROUP BY sc.sub_category_id");
       }
      }
      else
      {
          if($msg == 'last 1 year')
       {
          $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal,ca.category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where DATE_FORMAT(bd.created_at, '%m-%Y') AND NOT ca.category_name = '' group by ca.category_id");
       }
       elseif ($msg == 'last 30 days') {
          $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal,ca.category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where bd.created_at > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND NOT ca.category_name = '' group by ca.category_id");
       }
       elseif ($msg == 'last 7 days') {
          $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal,ca.category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where bd.created_at > DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND NOT ca.category_name = '' group by ca.category_id");
       }
       else
       {
          $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal,ca.category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where bd.created_at > DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND NOT ca.category_name = '' group by ca.category_id");
       }
      }
      while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
    public function dealfilter_report()
    {
              $con=$this->db->connection();
              $category = array();
              $getcategory=$con->query("SELECT count(bd.business_deal_id) as total_deal , oc.offer_title FROM business_deal as bd left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join offer_category as oc on bd.offer_id = oc.offer_id WHERE DATE_FORMAT(bd.created_at, '%m-%Y') GROUP BY bd.offer_id");
               $category = array();
              while ($row = $getcategory->fetch_assoc()) {
                $category[] = $row;
              }
              return $category;
    }
    public function genderfilter_report()
    {
             $con=$this->db->connection();
             $category = array();
              $getcategory=$con->query("SELECT count(user_id) as users , gender FROM users WHERE is_active=1 AND DATE_FORMAT(last_visited_time, '%m-%Y') AND NOT gender = '' GROUP BY gender");
               $category = array();
              while ($row = $getcategory->fetch_assoc()) {
                $category[] = $row;
              }
              return $category;
    }
    public function categoryreport_filter()
    {
        $con=$this->db->connection();
        $category = array();
              $getcategory=$con->query("select count(bd.business_deal_id) as total_deal,ca.category_name as name from business_deal as bd left join deal_post_subcategory as dps on bd.business_deal_id=dps.deal_id left join user_purchase_deal as upd on bd.business_deal_id=upd.business_deal_id left join sub_category as sc on dps.sub_cat_id=sc.sub_category_id left join category as ca on sc.category_id=ca.category_id where DATE_FORMAT(bd.created_at, '%m-%Y') AND NOT ca.category_name = '' group by ca.category_id");
               $category = array();
              while ($row = $getcategory->fetch_assoc()) {
                $category[] = $row;
              }
              return $category;
    }
    public function business_year($business_list,$business_year)
    {
      $con=$this->db->connection();
      $businessuser = array();
      if($business_list != '')
      {
          if($business_year == 'last 1 year')
           {
              $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , DATE_FORMAT(bd.created_at, '%b,%Y') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where us.user_id = ".$business_list." AND bd.created_at group by DATE_FORMAT(bd.created_at, '%m-%Y')");
           }
           elseif ($business_year == 'last 30 days') 
           {
              $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal ,  DATE_FORMAT(bd.created_at, '%d,%b') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where us.user_id = ".$business_list." AND bd.created_at > (NOW() - INTERVAL 1 MONTH) group by DATE_FORMAT(bd.created_at, '%m-%Y')");
           }
           elseif ($business_year == 'last 7 days') 
           {
              $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , DATE_FORMAT(bd.created_at, '%d,%b') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where us.user_id = ".$business_list." AND bd.created_at > (NOW() - INTERVAL 7 DAY) group by DATE_FORMAT(bd.created_at, '%m-%Y')");
           }
           else
           {
              $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , DATE_FORMAT(bd.created_at, '%h:%i%p') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where us.user_id = ".$business_list." AND bd.created_at > (NOW() - INTERVAL 7 DAY) group by DATE_FORMAT(bd.created_at, '%m-%Y')");
           }
         }
         else
         {
            if($business_year == 'last 1 year')
           {
              $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , DATE_FORMAT(bd.created_at, '%b,%Y') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where bd.created_at group by DATE_FORMAT(bd.created_at, '%m-%Y')");
           }
           elseif ($business_year == 'last 30 days') 
           {
              $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal ,  DATE_FORMAT(bd.created_at, '%d,%b') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where bd.created_at > (NOW() - INTERVAL 1 MONTH) group by DATE_FORMAT(bd.created_at, '%m-%Y')");
           }
           elseif ($business_year == 'last 7 days') 
           {
              $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , DATE_FORMAT(bd.created_at, '%d,%b') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where bd.created_at > (NOW() - INTERVAL 7 DAY) group by DATE_FORMAT(bd.created_at, '%m-%Y')");
           }
           else
           {
              $getbusinessuser=$con->query("select count(bd.business_deal_id) as total_deal , DATE_FORMAT(bd.created_at, '%h:%i%p') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where bd.created_at > (NOW() - INTERVAL 7 DAY) group by DATE_FORMAT(bd.created_at, '%m-%Y')");
           }
         }
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
    public function businessdealfilter_report()
    {
      $con=$this->db->connection();
        $category = array();
              $getcategory=$con->query("select count(bd.business_deal_id) as total_deal , DATE_FORMAT(bd.created_at, '%b,%Y') as business_time , us.user_id from business_deal as bd left join business_franchise as bf on bd.franchise_id = bf.franchise_id left join users as us on bf.business_user_id = us.user_id where bd.created_at group by DATE_FORMAT(bd.created_at, '%m-%Y')");
               $category = array();
              while ($row = $getcategory->fetch_assoc()) {
                $category[] = $row;
              }
              return $category;
    }
    public function agefilter_year($age_year)
    {
      $con=$this->db->connection();
        $category = array();
        if($age_year == "last 1 year")
        {
              $getcategory=$con->query("SELECT 
      CASE WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 10 THEN '1-10'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 20 THEN '10-20'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 30 THEN '20-30'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 40 THEN '30-40'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 50 THEN '40-50'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 60 THEN '50-60'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 70 THEN '60-70'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 80 THEN '70-80'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 90 THEN '80-90'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 100 THEN '100+'
     END AS age, count(*) as users FROM users WHERE is_active=1 AND DATE_FORMAT(last_visited_time, '%m-%Y') AND NOT date_of_birth = '0000-00-00' group by age");

        }
        else if($age_year == "last 30 days")
        {
            $getcategory=$con->query("SELECT 
      CASE WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 10 THEN '1-10'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 20 THEN '10-20'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 30 THEN '20-30'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 40 THEN '30-40'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 50 THEN '40-50'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 60 THEN '50-60'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 70 THEN '60-70'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 80 THEN '70-80'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 90 THEN '80-90'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 100 THEN '100+'
     END AS age, count(*) as users FROM users WHERE is_active=1 AND last_visited_time > (NOW() - INTERVAL 1 MONTH) AND NOT date_of_birth = '0000-00-00' group by age");
        }
        else if($age_year == "last 7 days")
        {
            $getcategory=$con->query("SELECT 
      CASE WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 10 THEN '1-10'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 20 THEN '10-20'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 30 THEN '20-30'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 40 THEN '30-40'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 50 THEN '40-50'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 60 THEN '50-60'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 70 THEN '60-70'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 80 THEN '70-80'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 90 THEN '80-90'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 100 THEN '100+'
     END AS age, count(*) as users FROM users WHERE is_active=1 AND last_visited_time > (NOW() - INTERVAL 7 DAY) AND NOT date_of_birth = '0000-00-00' group by age");
        }
        else
        {
            $getcategory=$con->query("SELECT 
      CASE WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 10 THEN '1-10'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 20 THEN '10-20'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 30 THEN '20-30'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 40 THEN '30-40'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 50 THEN '40-50'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 60 THEN '50-60'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 70 THEN '60-70'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 80 THEN '70-80'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 90 THEN '80-90'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 100 THEN '100+'
     END AS age, count(*) as users FROM users WHERE is_active=1 AND last_visited_time > (NOW() - INTERVAL 1 DAY) AND NOT date_of_birth = '0000-00-00' group by age");
        }
               $category = array();
              while ($row = $getcategory->fetch_assoc()) {
                $category[] = $row;
              }
              return $category;
    }
    public function businessagefilter_report()
    {
      $con=$this->db->connection();
        $category = array();
              $getcategory=$con->query("SELECT 
      CASE WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 10 THEN '1-10'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 20 THEN '10-20'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 30 THEN '20-30'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 40 THEN '30-40'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 50 THEN '40-50'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 60 THEN '50-60'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 70 THEN '60-70'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 80 THEN '70-80'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 90 THEN '80-90'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_of_birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_of_birth, '00-%m-%d'))) <= 100 THEN '100+'
     END AS age, count(*) as users FROM users WHERE is_active=1 AND DATE_FORMAT(last_visited_time, '%m-%Y') AND NOT date_of_birth = '0000-00-00' group by age");
               $category = array();
              while ($row = $getcategory->fetch_assoc()) {
                $category[] = $row;
              }
              return $category;
    }
  }
  ?>