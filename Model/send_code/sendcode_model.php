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
      
                $to = $email;
                $subject = "Verification mail";
                $message = "Dear user,"."\n\nYou have to verify your email to use doora App.\n\nSo please click on link below.\n\n http://leocan.co/sprookr/verify?user_id=$user_id";
                $headers = 'From: test@leocan.co' . "\r\n" .'Reply-To: no-reply' . "\r\n" .'X-Mailer: PHP/' . phpversion();
                
                if( mail($to, $subject, $message, $headers) ) {
                    return "send";
                } else {
                    return "notsend";
                }
    }
    public function verifyBusinessMail($email,$user_id,$business_name)
    {
      
                  $url = 'https://doora.app/doora/verifyBussiness/submittedocuments.php?id='.$user_id;

                      $to = $email;
                            $subject = "Business verification mail";

                            $headers = 'MIME-Version: 1.0' . "\r\n";
                            $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            $headers .= "Content-Transfer-Encoding: 64bit\r\n";
                            $headers.= 'From: <test@leocan.co> '."\n";

                            $message  = '<html><head></head>';
                    $message .= '<body>';
                    $message .= '<img alt="LOGO" src="https://doora.app/doora/images/mail_logo.png" style="float:left; height:233px; width:300px" />';
                    
                    $message .= '<p>&nbsp;</p>';
                    $message .= '<p>&nbsp;</p>';
                    $message .= '<p>&nbsp;</p>';
                    $message .= '<p>&nbsp;</p>';
                    $message .= '<p>&nbsp;</p>';
                    $message .= '<p>&nbsp;</p>';
                    $message .= '<p>&nbsp;</p>';
                    $message .= '<p>&nbsp;</p>';
                    
                    $message .= '<br>';                                                                                               
                    $message .= '<div><hr></div>';
                    $message .= '<p>&nbsp;</p>';
                    $message .= '<h1 style="color:black">Welcome to Doora<span>&#33;</span></h1>';
                    $message .= '<p style="color:black; font-size:22px; font-family:sans-serif">Hi, <b>'.$business_name.'</b></p>';
                    $message .= '<div><p style="color:black; font-size:16px; font-family:sans-serif">Doora is a dynamic advertising platform, we provide your Business the opportunity to post instant enticing deals in order to attract Customers into your store or directly to your website.</p>';
                    
                    $message .= '<p style="color:black; font-size:16px; font-family:sans-serif">How does this work?</p>';
                    
                    $message .= "<p style='color:black; font-size:16px; font-family:sans-serif'>1. You post a deal via the App when you want more traffic through your doors or online.</p>";
                    $message .= "<p style='color:black; font-size:16px; font-family:sans-serif'>2. Customers will find your deal via the App.</p>";
                    $message .= "<p style='color:black; font-size:16px; font-family:sans-serif'>3. Customers can redeem your deal and provide you with instant feedback.</p>";
                                  
                    $message .= '<p style="color:black; font-size:16px; font-family:sans-serif">Advertising is expensive and never timely, Doora allows you to be in control throughout the whole process. You only need to post a deal when business is slow or you<span>&#39;</span>re introducing something new and exciting that you want to share.</p>';
                    
                    $message .= "<p style='color:black; font-size:16px; font-family:sans-serif'>You will receive 30 days free, once your free trial is up you will pay an annual subscription of $200 and $2 for every deal redeemed<span>&#33;</span></p>";
                    $message .= "<p style='color:black; font-size:16px; font-family:sans-serif;'>&bull; If the deal is Online the Customer will be redirected to the Businesses website.</p>";
                    $message .= "<p style='color:black; font-size:16px; font-family:sans-serif'>&bull; If the deal is in store the Customer will redeem the deal and use the App to scan the Businesses QR Code to confirm the offer.</p>";

                    $message .= '<p style="color:black; font-size:16px;font-family:sans-serif">Any questions please don<span>&#39;</span>t hesitate to contact us at hello@doora.app.</p>';
                    
                    $message .= '<p style="color:black; font-size: 16px;font-family: sans-serif">Please click on the link and fill out the details to finalise your business registration<span>&#33;</span></p></div>';
                    
                    
                    
                    // $message .="\n $url";
                    $message .='<a href='.$url.'> Click here </a>';
                    $message .= '<p>&nbsp;</p>';
                    
                    $message .= '<hr />';
                    
                    $message .= '<center><p style="color:black; font-size: 13px;font-family: sans-serif">'.date('Y').' Doora Group - www.doora.app</p><center>';
                    $message .= '</body></html>';

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