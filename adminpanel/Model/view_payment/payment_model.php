<?php 
include "../../Model/dbconfig.php";
class payment_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_payment()
    {
       $con=$this->db->connection();
       $payment = array();
       $getpaymentbusiness = array();
       $getpayment=$con->query("select u.`business_name`,extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.bill_paid_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi left join users as u on u.`user_id`=bi.business_id GROUP BY bi.business_id ,extract(YEAR from bi.`month_start_date`),extract(month from bi.`month_start_date`)ORDER BY extract(YEAR from bi.`month_start_date`) desc ,extract(month from bi.`month_start_date`) desc limit 1");
       while ($row = $getpayment->fetch_assoc()) {
        $getpaymentbusiness[] = $row;
        }
        foreach ($getpaymentbusiness as $value) {
          $year = $value['year'];
          $month = $value['month'];
         }
           $getpayment=$con->query("select u.`business_name`,extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.bill_paid_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi left join users as u on u.`user_id`=bi.business_id where extract(YEAR from bi.`month_start_date`)='".$year."' AND extract(month from bi.`month_start_date`)='".$month."' GROUP BY bi.month_start_date");
           while ($row = $getpayment->fetch_assoc()) {
            $payment[] = $row;
            }
        //echo "<pre>";print_r($payment); echo "</pre>";
       return $payment;
    }
    public function getinvoicedetail($invoice_id)
    {
      $con=$this->db->connection();
      $businessinvoice1=array();
       $getbusinessinvoice=$con->query("select extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.month_start_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi WHERE bi.business_invoice_id = ".$invoice_id." GROUP BY extract(YEAR from bi.`month_start_date`),extract(month from bi.`month_start_date`) ORDER BY extract(YEAR from bi.`month_start_date`) desc ,extract(month from bi.`month_start_date`) desc ");
       while ($row = $getbusinessinvoice->fetch_assoc()) {
        $businessinvoice1[] = $row;
      }
      foreach ($businessinvoice1 as $value) {
       $user_id= $value['business_id'];
       $time = $value['bill_paid_date'];
       }
       $getbusinessdealinvoice=$con->query("SELECT *,bi.*,SUM(bi.total_amount) as total_amount FROM business_invoice as bi WHERE bi.business_id = ".$user_id." AND bi.bill_paid_date='".$time."'");
       $businessinvoice = array();
        while ($row = $getbusinessdealinvoice->fetch_assoc()) {
        $businessinvoice[] = $row;
      }
       return $businessinvoice;
    }
    public function getyear()
    {
      $con=$this->db->connection();
      $businessinvoice=array();
       $getbusinessinvoice=$con->query("select u.business_name,extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.bill_paid_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi left join users as u on u.`user_id`=bi.business_id GROUP BY extract(YEAR from bi.`month_start_date`)");
       while ($row = $getbusinessinvoice->fetch_assoc()) {
        $businessinvoice[] = $row;
      }
       //echo "<pre>";print_r($businessinvoice); echo "</pre>";
       return $businessinvoice;
    }
    public function getmonthyear()
    {
      $con=$this->db->connection();
      $getmonthyear=array();
       $getmonth=$con->query("select u.`business_name`,extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.bill_paid_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi left join users as u on u.`user_id`=bi.business_id GROUP BY bi.business_id ,extract(YEAR from bi.`month_start_date`),extract(month from bi.`month_start_date`)ORDER BY extract(YEAR from bi.`month_start_date`) desc ,extract(month from bi.`month_start_date`) desc limit 1");
       while ($row = $getmonth->fetch_assoc()) {
        $getmonthyear[] = $row;
      }
       //echo "<pre>";print_r($getmonthyear); echo "</pre>";
       return $getmonthyear;
    }
    public function getbusiness_name()
    {
      $con=$this->db->connection();
      $businessinvoice=array();
       $getbusinessinvoice=$con->query("select u.user_id,u.business_name from business_invoice as bi left join users as u on u.`user_id`=bi.business_id group by business_id");
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
       $getbusinessinvoice=$con->query("select extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.bill_paid_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi WHERE bi.business_invoice_id = ".$invoice_id." GROUP BY extract(YEAR from bi.`month_start_date`),extract(month from bi.`month_start_date`) ORDER BY extract(YEAR from bi.`month_start_date`) desc ,extract(month from bi.`month_start_date`) desc");
       while ($row = $getbusinessinvoice->fetch_assoc()) {
        $businessinvoice[] = $row;
      }
       foreach ($businessinvoice as $value) {
        $time = $value['bill_paid_date'];
       $user_id= $value['business_id'];
       $month=$value['month'];
       $year=$value['year'];
       }
       $getbusinessdealinvoice=$con->query("SELECT * FROM business_invoice WHERE business_id = ".$user_id." AND bill_paid_date='".$time."'");
       $businessinvoicedeal = array();
        while ($row = $getbusinessdealinvoice->fetch_assoc()) {
        $businessinvoicedeal[] = $row;
      }
       foreach ($businessinvoicedeal as $value) {
        
        $deal_id=$value['deal_id'];
        $getbusinessdeal=$con->query("SELECT bd.*,(select count(*) from user_purchase_deal where business_deal_id=".$deal_id." and is_online=1 and is_cart=1)as online_redeem,(select count(*) from user_purchase_deal where business_deal_id=".$deal_id." and is_online=0 )as offline_redeem,(select count(*) from user_purchase_deal where business_deal_id=".$deal_id." and is_online=1 and is_cart=0)as online_purchase,(select count(*) from user_purchase_deal where business_deal_id=".$deal_id." and is_online=0 and is_cart=0)as offline_purchase FROM `business_deal` as bd WHERE bd.business_deal_id=".$deal_id." GROUP BY bd.business_deal_id");
         while ($row = $getbusinessdeal->fetch_assoc()) {
        $businessinvoicedealdetail[] = $row;
         
          }
        
       }
       $businessinvoicedealdetail = $businessinvoicedealdetail;
       // echo "<pre>";print_r($businessinvoicedealdetail); echo "</pre>";
       return $businessinvoicedealdetail;
       
    }
    public function loadfilter_payment($year,$month,$business_invoice)
    {
      $con=$this->db->connection();
      $whereClauses = array(); 
    if ($year > 0) $whereClauses[] ="extract(YEAR from bi.`month_start_date`)='".$year."'";
    if ($month > 0) $whereClauses[] ="extract(month from bi.`month_start_date`)='".$month."'"; 
    if ($business_invoice > 0) $whereClauses[] ="bi.business_id='".$business_invoice."'"; 
    $where = ''; 
    if (count($whereClauses) > 0) { $where = ' WHERE '.implode(' AND ',$whereClauses); }
     $getonlinepur=$con->query("select u.`business_name`,extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.bill_paid_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi left join users as u on u.`user_id`=bi.business_id ".$where." GROUP BY bi.month_start_date");

      $deal = array();
              while ($row = $getonlinepur->fetch_assoc()) {
                $deal[] = $row;
              }
              return $deal;
    }
  }