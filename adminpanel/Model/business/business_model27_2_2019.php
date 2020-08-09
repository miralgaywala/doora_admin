<?php 
include "../../Model/dbconfig.php";
include"../../Model/business/businessuser.php";

class business_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_businessuser()
    {
       $con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_business=1 order by user_id desc");
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
    public function getbusinessbranchdetail($user_id)
    {
        $con=$this->db->connection();
        $view = array();
        $viewbusinessbranch=$con->query("select * from business_franchise where business_user_id=".$user_id);
        while ($row = $viewbusinessbranch->fetch_assoc()) {
        $view[] = $row;
      }
        return $view;
    }
    public function getbranchdetail($frenchise_id)
    {
        $con=$this->db->connection();
        $view = array();
        $viewbranchdetail=$con->query("select * from business_franchise where franchise_id=".$frenchise_id);
       while ($row = $viewbranchdetail->fetch_assoc()) {
        $view[] = $row;
      }
        return $view;
    }
    public function updateactive($id,$data)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
        $con=$this->db->connection();
        $success="";
        if($data==0)
        {
           $active=$con->query("update users SET is_active='1',updated_at='".$date."' WHERE user_id=".$id);
           $success="1";
        }
        else
        {
            $active=$con->query("update users SET is_active='0',updated_at='".$date."' WHERE user_id=".$id);
            $success="2";
        }
        return $success;
    }
    public function deletebusiness($id)
    {
        $con=$this->db->connection();
        $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
        $delete=$con->query("update users SET is_deleted=1,updated_at='".$date."' where user_id=".$id);
    }
    public function getbusinessdetail($id)
    {
       $con=$this->db->connection();
       $businessuser = array();
       $getbusinessdetail=$con->query("select * from users where is_business=1 AND user_id=".$id);
        while ($row = $getbusinessdetail->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
    public function getactivatefilter($msg)
    {
       $con=$this->db->connection();
       $businessactivate= array();
       $getbusinessactivate=$con->query("select * from users where is_deleted=0 AND is_business=1 AND is_active=1 order by user_id desc");
       while ($row = $getbusinessactivate->fetch_assoc()) {
        $businessactivate[] = $row;
      }
       return $businessactivate;
    }
    public function getdeactivatefilter($msg)
    {
       $con=$this->db->connection();
       $businessdeactivate = array();
       $getbusinessdeactivate=$con->query("select * from users where is_deleted=0 AND is_business=1 AND is_active=0 order by user_id desc");
       while ($row = $getbusinessdeactivate->fetch_assoc()) {
        $businessdeactivate[] = $row;
      }
       return $businessdeactivate;
    }
    public function getdeleteedilter($msg)
    {
       $con=$this->db->connection();
       $businessdelete = array();
       $getbusinessdelete=$con->query("select * from users where is_deleted=1 AND is_business=1 order by user_id desc");
        while ($row = $getbusinessdelete->fetch_assoc()) {
        $businessdelete[] = $row;
      }
       return $businessdelete;
    }
    public function getbusinessinvoice($user_id)
    {
      $con=$this->db->connection();
      $businessinvoice=array();
       $getbusinessinvoice=$con->query("select extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.month_start_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi WHERE bi.business_id = ".$user_id." GROUP BY extract(YEAR from bi.`month_start_date`),extract(month from bi.`month_start_date`) ORDER BY extract(YEAR from bi.`month_start_date`) desc ,extract(month from bi.`month_start_date`) desc ");
       // $businessinvoice=fetch_all($getbusinessinvoice,MYSQLI_ASSOC);
       while ($row = $getbusinessinvoice->fetch_assoc()) {
        $businessinvoice[] = $row;
      }
       return $businessinvoice;
    }
    public function getinvoicedetail($invoice_id)
    {
      $con=$this->db->connection();
      $businessinvoice=array();
       $getbusinessinvoice=$con->query("select extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.month_start_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi WHERE bi.business_invoice_id = ".$invoice_id." GROUP BY extract(YEAR from bi.`month_start_date`),extract(month from bi.`month_start_date`) ORDER BY extract(YEAR from bi.`month_start_date`) desc ,extract(month from bi.`month_start_date`) desc ");
       while ($row = $getbusinessinvoice->fetch_assoc()) {
        $businessinvoice[] = $row;
      }
       //echo "<pre>";print_r($businessinvoice); echo "</pre>";
       return $businessinvoice;
    }
    public function getdealinvoicedetail($invoice_id)
    {
       $con=$this->db->connection();
        $businessinvoice=array();
       $getbusinessinvoice=$con->query("select extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.month_start_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi WHERE bi.business_invoice_id = ".$invoice_id." GROUP BY extract(YEAR from bi.`month_start_date`),extract(month from bi.`month_start_date`) ORDER BY extract(YEAR from bi.`month_start_date`) desc ,extract(month from bi.`month_start_date`) desc ");
       while ($row = $getbusinessinvoice->fetch_assoc()) {
        $businessinvoice[] = $row;
      }
       foreach ($businessinvoice as $value) {
       $user_id= $value['business_id'];
       $month=$value['month'];
       $year=$value['year'];
       }
       $getbusinessdealinvoice=$con->query("SELECT * FROM business_invoice WHERE business_id = " .$user_id." and MONTH(month_start_date) = ".$month." and YEAR(month_start_date) = ".$year);
       $businessinvoicedeal = array();
        while ($row = $getbusinessdealinvoice->fetch_assoc()) {
        $businessinvoicedeal[] = $row;
      }
       foreach ($businessinvoicedeal as $value) {
        
        $deal_id=$value['deal_id'];
        $getbusinessdeal=$con->query("SELECT bd.*,(select count(*) from user_purchase_deal where business_deal_id=".$deal_id." and is_online=1 and is_cart=1)as online_redeem,(select count(*) from user_purchase_deal where business_deal_id=".$deal_id." and is_online=0 and is_cart=1)as offline_redeem,(select count(*) from user_purchase_deal where business_deal_id=".$deal_id." and is_online=1 and is_cart=0)as online_purchase,(select count(*) from user_purchase_deal where business_deal_id=".$deal_id." and is_online=1 and is_cart=1)as offline_purchase FROM `business_deal` as bd WHERE bd.business_deal_id=".$deal_id." and bd.is_active = 1 GROUP BY bd.business_deal_id");
         while ($row = $getbusinessdeal->fetch_assoc()) {
        $businessinvoicedealdetail[] = $row;
          }
       }
       $businessinvoicedealdetail = $businessinvoicedealdetail;
       // echo "<pre>";print_r($businessinvoicedealdetail); echo "</pre>";
       return $businessinvoicedealdetail;
    }
    public function getbusinessverificartiondetail($id)
    {
      $con=$this->db->connection();
       $businessuser = array();
       $getverificationdetail=$con->query("select bv.*,us.is_active,us.is_deleted from bussiness_verification as bv left join users as us on bv.business_id = us.user_id where bv.business_id=".$id);
        while ($row = $getverificationdetail->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
}
?>