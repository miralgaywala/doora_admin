<?php 
include "../../Model/dbconfig.php";
class sendnoti_model
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
    public function getdisplay_customer()
    {
    	$con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_business=0 AND is_deleted=0 order by user_id desc");
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
       return $businessuser;
    }
    public function all_bucu($notification_body,$notification_title)
    {
      $con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_deleted=0 order by user_id desc");
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
        $data = 0;
        $noti_id = 10;
         $message = array(
                      'message' => $notification_body,
                      'id' => $noti_id
                  );
      if (!empty($businessuser)) {
          foreach ($businessuser as $data_value) {
                $is_iphone = $data_value['is_iphone'];
                $device_id = $data_value['device_id'];
                if(strcmp($is_iphone, '0') == 0 ) 
                {
                    require_once '../../../api/sendNotification/GCM.php';  
                    $gcm = new GCM();
                    $registration_ids = array();
                    $registration_ids[] = $device_id;
                    $result= $gcm->send_notification($registration_ids, $message);
                    $data = 1;
                } 
                else if(strcmp($is_iphone, '1') == 0 ) 
                {
                    require_once '../../../api/sendNotification/IOSNoti.php'; 
                    $IOSNotif = new IOSNoti();
                    $result = $IOSNotif->sendPushNotification($message, $device_id, true);
                    $data = 1;
                }
            }
        }
        else
        {

        }
        echo $data;
       return $businessuser;
    }
    public function all_business($notification_body,$notification_title)
    {
      $con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_business=1 AND is_deleted=0 order by user_id desc");
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
      $data =0;
      $noti_id = 10;
        $message = array(
                      'message' => $notification_body,
                      'id' => $noti_id
                  );
      if (!empty($businessuser)) {
          foreach ($businessuser as $data_value) {
                $is_iphone = $data_value['is_iphone'];
                $device_id = $data_value['device_id'];
                if(strcmp($is_iphone, '0') == 0 ) 
                {
                    require_once '../../../api/sendNotification/GCM.php';  
                    $gcm = new GCM();
                    $registration_ids = array();
                    $registration_ids[] = $device_id;
                    $result= $gcm->send_notification($registration_ids, $message);
                    $data = 1;
                } 
                else if(strcmp($is_iphone, '1') == 0 ) 
                {
                    require_once '../../../api/sendNotification/IOSNoti.php'; 
                    $IOSNotif = new IOSNoti();
                    $result = $IOSNotif->sendPushNotification($message, $device_id, true);
                    $data = 1;
                }
            }
        }
        else
        {

        }
        echo $data;
       return $businessuser;
    }
    public function all_customer($notification_body,$notification_title)
    {
      $con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_business=0 AND is_deleted=0 order by user_id desc");
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
      $noti_id = 10;
      $data = 0;
        $message = array(
                      'message' => $notification_body,
                      'id' => $noti_id
                  );
      if (!empty($businessuser)) {
          foreach ($businessuser as $data_value) {
                $is_iphone = $data_value['is_iphone'];
                $device_id = $data_value['device_id'];
                if(strcmp($is_iphone, '0') == 0 ) 
                {
                    require_once '../../../api/sendNotification/GCM.php';  
                    $gcm = new GCM();
                    $registration_ids = array();
                    $registration_ids[] = $device_id;
                    $result= $gcm->send_notification($registration_ids, $message);
                    $data = 1;
                } 
                else if(strcmp($is_iphone, '1') == 0 ) 
                {
                    require_once '../../../api/sendNotification/IOSNoti.php'; 
                    $IOSNotif = new IOSNoti();
                    $result = $IOSNotif->sendPushNotification($message, $device_id, true);
                    $data = 1;
                }
            }
        }
        else
        {

        }
        echo $data;
       return $businessuser;
    }
    public function specific_business($notification_body,$notification_title,$user_group)
    {
      $usergroup_value = implode(",",$user_group);
      $con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_business=1 AND is_deleted=0 AND user_id IN (".$usergroup_value.") order by user_id desc");
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
       $data = 0;
      $noti_id = 10;
        $message = array(
                      'message' => $notification_body,
                      'id' => $noti_id
                  );
      if (!empty($businessuser)) {
          foreach ($businessuser as $data_value) {
                $is_iphone = $data_value['is_iphone'];
                $device_id = $data_value['device_id'];
                if(strcmp($is_iphone, '0') == 0 ) 
                {
                    require_once '../../../api/sendNotification/GCM.php';  
                    $gcm = new GCM();
                    $registration_ids = array();
                    $registration_ids[] = $device_id;
                    $result= $gcm->send_notification($registration_ids, $message);
                     $data = 1;
                } 
                else if(strcmp($is_iphone, '1') == 0 ) 
                {
                    require_once '../../../api/sendNotification/IOSNoti.php'; 
                    $IOSNotif = new IOSNoti();
                    $result = $IOSNotif->sendPushNotification($message, $device_id, true);
                     $data = 1;
                }
            }
        }
        else
        {

        }
        echo $data;
       return $businessuser;
    }
    public function specific_customer($notification_body,$notification_title,$user_group)
    {
        $usergroup_value = implode(",",$user_group);
      $con=$this->db->connection();
       $businessuser = array();
       $getbusinessuser=$con->query("select * from users where is_business=0 AND is_deleted=0 AND user_id IN (".$usergroup_value.") order by user_id desc");
       while ($row = $getbusinessuser->fetch_assoc()) {
        $businessuser[] = $row;
      }
      $data = 0;
      $noti_id = 10;
        $message = array(
                      'message' => $notification_body,
                      'id' => $noti_id
                  );
      if (!empty($businessuser)) {
          foreach ($businessuser as $data_value) {
                $is_iphone = $data_value['is_iphone'];
                $device_id = $data_value['device_id'];
                if(strcmp($is_iphone, '0') == 0 ) 
                {
                    require_once '../../../api/sendNotification/GCM.php';  
                    $gcm = new GCM();
                    $registration_ids = array();
                    $registration_ids[] = $device_id;
                    $result= $gcm->send_notification($registration_ids, $message);
                    $data = 1;
                } 
                else if(strcmp($is_iphone, '1') == 0 ) 
                {
                    require_once '../../../api/sendNotification/IOSNoti.php'; 
                    $IOSNotif = new IOSNoti();
                    $result = $IOSNotif->sendPushNotification($message, $device_id, true);
                    $data = 1;
                }
            }
        }
        else
        {

        }
        echo $data;
       return $businessuser;
    }
}
?>