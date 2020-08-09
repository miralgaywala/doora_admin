<?php 
include "../../Model/dbconfig.php";
include"../../Model/business/businessuser.php";

define('FIREBASE_WEB_KEY', 'AIzaSyAZPdGHzE8OaynkmSH2eG6q1wfaVhftlWQ');
define('SG_KEY', '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');
class business_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_businessuser()
    {
       $con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_business=1 AND is_deleted=0 order by user_id desc");
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
    public function edit_business($profile_pic,$company_name,$contact_number,$website_url,$user_id,$super_market,$pet_friendly)
    {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=gmdate("Y-m-d\TH:i:s\Z");
        $update=$con->query("update users SET business_name='".$company_name."', photo='".$profile_pic."' , mobile_no ='".$contact_number."', website_url='".$website_url."',is_super_market=".$super_market.",is_pet_friendly=".$pet_friendly.",updated_at='".$date."' where user_id=".$user_id);
        if($update) // will return true if succefull else it will return false
        {
            $success = 1;
        }
        else
        {
          $success = 0;
        }
        return $success;
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
   //  public function updateactive($id,$data)
   //  {
   //      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
   //      $date=gmdate("Y-m-d\TH:i:s\Z");
   //      $con=$this->db->connection();
        
        
   //      $success="";
   //      if($data==0)
   //      {
   //        $businessuser = array();
   // 		  $getbusinessdetail=$con->query("select * from users where is_business=1 AND user_id=".$id);
   //          while ($row = $getbusinessdetail->fetch_assoc()) {
   //          $businessuser = $row;
   //        }
   //         $email = $businessuser['email'];
   //         $name = $businessuser['business_name'];
   //         $url = $this->makeDynamicLink($id);
   //         $to = $email;

   //          $html = new DOMDocument();
			// $html->loadHTMLFile('../../../api/mail_template/register_business.php');
			// $mail=$html->getElementById('confirm_mail');

			// $mail->setAttribute('href', $url);
			// $html->getElementById('name')->nodeValue =  htmlentities($user['name'], ENT_QUOTES);
		 //    $updated_html=$html->saveHTML();

   //         $subject = "Doora Verification Email";
   //         require("../../../api/sendgrid-php/sendgrid-php.php");

   //                $email = new \SendGrid\Mail\Mail(); 
   //                $email->setFrom("hello@doora.app");
   //                $email->setSubject($subject);
   //                $email->addTo($to);
   //                $email->addContent("text/html",$updated_html);

                    

   //                  $sendgrid = new \SendGrid(SG_KEY);
   //                  try {
   //                      $response = $sendgrid->send($email);
   //                       $success="1";
   //                       $active=$con->query("update users SET is_active='1',updated_at='".$date."' WHERE user_id=".$id);

   //                  } catch (Exception $e) {
   //                     $success="0";
   //                      echo 'Caught exception: '. $e->getMessage() ."\n";
   //                  }

   //      }
   //      else
   //      {
   //          $active=$con->query("update users SET is_active='0',updated_at='".$date."' WHERE user_id=".$id);
   //          $success="2";
   //      }
   //      return $success;
   //  }
    public function updateactive($id,$data)
    {
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=gmdate("Y-m-d\TH:i:s\Z");
        $con=$this->db->connection();
        
        
        $success="";
        if($data==0)
        {
          $businessuser = array();
        $getbusinessdetail=$con->query("select * from users where is_business=1 AND user_id=".$id);
            while ($row = $getbusinessdetail->fetch_assoc()) {
            $businessuser = $row;
          }
           $email = $businessuser['email'];
           $name = $businessuser['business_name'];
           $url = $this->makeDynamicLink($id);
           $to = $email;

            $html = new DOMDocument();
      $html->loadHTMLFile('../../../api/mail_template/business_confirm_subscription.php');
      $mail=$html->getElementById('confirm_mail');

      $mail->setAttribute('href', $url);
      // $html->getElementById('name')->nodeValue =  htmlentities($user['name'], ENT_QUOTES);
        $updated_html=$html->saveHTML();

           $subject = "Doora Verification Email";
           require("../../../api/sendgrid-php/sendgrid-php.php");

                  $email = new \SendGrid\Mail\Mail(); 
                  $email->setFrom("hello@doora.app","Dooey from Doora");
                  $email->setSubject($subject);
                  $email->addTo($to);
                  $email->addContent("text/html",$updated_html);

                    

                    $sendgrid = new \SendGrid(SG_KEY);
                    try {
                        $response = $sendgrid->send($email);
                         $success="1";
                         $active=$con->query("update users SET is_active='1',updated_at='".$date."' WHERE user_id=".$id);

                    } catch (Exception $e) {
                       $success="0";
                        echo 'Caught exception: '. $e->getMessage() ."\n";
                    }

        }
        else
        {
            $active=$con->query("update users SET is_active='0',updated_at='".$date."' WHERE user_id=".$id);
            $success="2";
        }
        return $success;
    }
    public function makeDynamicLink($user_id)
    {
      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://firebasedynamiclinks.googleapis.com/v1/shortLinks?key=".FIREBASE_WEB_KEY,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\n  \"dynamicLinkInfo\": {\n    \"domainUriPrefix\": \"https://doora.page.link\",\n    \"link\": \"https://doora.app/$user_id\",\n     \"desktopInfo\":{\n     \t\"desktopFallbackLink\":\"https://doora.app/\"\n     } ,\n \"navigationInfo\":{\n     \t\"enableForcedRedirect\":\"false\"\n     } ,\n     \"iosInfo\": {\n      \"iosBundleId\": \"com.doora.dealapp\"\n  , \"iosAppStoreId\": \"1472272525\"\n  }\n   \n  }\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      // echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response);
      return $response->shortLink;
    }
    }


    public function deletebusiness($id)
    {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=gmdate("Y-m-d\TH:i:s\Z");
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
       $getbusinessinvoice=$con->query("select extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.month_start_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi WHERE bi.business_id = ".$user_id." group by bi.month_start_date");
       // $businessinvoice=fetch_all($getbusinessinvoice,MYSQLI_ASSOC);
       while ($row = $getbusinessinvoice->fetch_assoc()) {
        $businessinvoice[] = $row;
      }
       return $businessinvoice;
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
    public function getdealinvoicedetail($invoice_id)
    {
       $con=$this->db->connection();
        $businessinvoice=array();
       $getbusinessinvoice=$con->query("select extract(YEAR_MONTH from bi.month_start_date) as year_mon,bi.*,SUM(bi.total_amount) as total_amount,last_day(bi.month_start_date)as month_end_date,extract(month from bi.`month_start_date`) as month,extract(YEAR from bi.`month_start_date`) as year from business_invoice as bi WHERE bi.business_invoice_id = ".$invoice_id." GROUP BY bi.month_start_date");
       while ($row = $getbusinessinvoice->fetch_assoc()) {
        $businessinvoice[] = $row;
      }
       foreach ($businessinvoice as $value) {
       $user_id= $value['business_id'];
       $time = $value['bill_paid_date'];
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
    public function viewfreedaysdetail($id)
    {
       $con=$this->db->connection();
       $businessuser = array();
       $getbusinessdetail=$con->query("select * from users where is_business=1 AND user_id=".$id);
        while ($row = $getbusinessdetail->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
    public function add_business_free_days($id,$free_days,$new_day)
    {
        $free_days=trim($free_days);
        $con= $this->db->connection();
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $businessinvoicedeal = array();
        $getbusinessdeactivate=$con->query("select * from users where is_business=1 AND user_id=".$id);
         while ($row = $getbusinessdeactivate->fetch_assoc()) {
          $businessinvoicedeal[] = $row;
        }
        foreach ($businessinvoicedeal as $value) {
          $is_active = $value['is_active'];
          $free_trail_days = $value['is_free_trial_started'];
           $free_trial_exp_date = $value['free_trial_exp_date'];
            $date1 = date('Y-m-d H:i:s');
          }
         
          if($free_trial_exp_date >  $date1) 
          {
            $new_exp_date = date('Y-m-d H:i:s', strtotime($free_trial_exp_date . ' +'.$new_day.' day'));
            $freedays=$con->query("update users SET free_trail_days=".$free_days." , free_trial_exp_date='".$new_exp_date."' , updated_at='".$date."' where user_id=".$id); 
            $not_id=10; 

              $message=array(
                'message'=>"Your free trial days has been upgraded.",
                'id'=>$not_id,
                'user_id'=>$id
                );
              $is_iphone = 0;
              $device_id = "";
            $stmt = $con->query("SELECT device_id, is_iphone from users WHERE user_id = ".$id." AND is_deleted = 0");
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
            $freedays = 1;
          }
          elseif($free_trial_exp_date == "0000-00-00 00:00:00")
          {
            $freedays=$con->query("update users SET free_trail_days=".$free_days." , updated_at='".$date."' where user_id=".$id); 
            $not_id=10; 

              $message=array(
                'message'=>"Your free trial days has been upgraded.",
                'id'=>$not_id,
                'user_id'=>$id
                );
              $is_iphone = 0;
              $device_id = "";
            $stmt = $con->query("SELECT device_id, is_iphone from users WHERE user_id = ".$id." AND is_deleted = 0");
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
            $freedays = 1;
          }
          else
          {
            $freedays = 0;
          }
        return $freedays;
    }
}
?>