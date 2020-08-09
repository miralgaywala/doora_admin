<?php 
include "../../Model/dbconfig.php";
class sendcode_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function send_code($email_name)
    {
    	$email_name=trim($email_name);
    	$con= $this->db->connection();
    	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select * from users where is_deleted=0 AND email='".$email_name."'");
        $count=$select->num_rows;
        $sendcode="";
        if($count > 0)
        {
              $data = array();
              while ($row = $select->fetch_assoc()) {
                $data[] = $row;
              }
              foreach ($data as $value) {
                  $u_id = $value['user_id'];
                  $business = $value['is_business'];
                  $email = $value['email'];
                  $business_name = $value['business_name'];
              }
              if($business == 0)
              {
                $sendcode=$this->verifyUserMail($email,$u_id);
              }
              else
              {
                $sendcode=$this->verifyBusinessMail($email,$u_id,$business_name);
              }

        }
        else
        {  
       	    $sendcode="not";   
        }  
       return $sendcode;
    }
    public function verifyUserMail($email,$user_id)
    {
            $con= $this->db->connection();
              $select=$con->query("select * from users where is_deleted=0 AND email='".$email."'");
              while ($row = $select->fetch_assoc()) {
                $data[] = $row;
              }
              foreach ($data as $value) {
                  $u_id = $value['user_id'];
                  $business = $value['is_business'];
                  $email = $value['email'];
                  $business_name = $value['name'];
              }
                $to = $email;

                include "../../Model/send_code/customer_mail.php";
                $subject = "Verification mail";
                $message = $my_var;
                $finalMessage = wordwrap( $message, 75, "\n" );
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= "Content-Transfer-Encoding: 64bit\r\n";
                $headers.= 'From: no-reply@doora.app'."\n";
                
                if( mail($to, $subject, $finalMessage, $headers) ) {
                    return "send";
                } else {
                    return "notsend";
                }
    }
    public function verifyBusinessMail($email,$user_id,$business_name)
    {
      
                  $url = 'https://doora.app/doora/verifyBussiness/submittedocuments.php?id='.$user_id;

                      $to = $email;
                      include "../../Model/send_code/business_mail.php";
                            $subject = "Business verification mail";

                            $headers = 'MIME-Version: 1.0' . "\r\n";
                            $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            $headers .= "Content-Transfer-Encoding: 64bit\r\n";
                            $headers.= 'From: no-reply@doora.app'."\n";

                            $message = $my_var;

                    $finalMessage = wordwrap( $message, 75, "\n" );

        
                // $headers = 'From: test@leocan.co' . "\r\n" .'Reply-To: no-reply' . "\r\n" .'X-Mailer: PHP/' . phpversion();
                
                if( mail($to, $subject, $finalMessage, $headers) ) {
                    return "send";
                } else {
                    return "notsend";
                }
    }
  }
  ?>