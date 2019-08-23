<?php 
include "../../Model/dbconfig.php";
define('FIREBASE_WEB_KEY', 'AIzaSyAZPdGHzE8OaynkmSH2eG6q1wfaVhftlWQ');
class sendcode_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function send_code($email_name,$radioValue)
    {
    	$email_name=trim($email_name);
    	$con= $this->db->connection();
    	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select * from users where is_deleted=0 AND is_business=".$radioValue." AND email='".$email_name."'");
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
                $subject = "Customer Verification Email";

                $url = $this->makeDynamicLink($u_id);
                $html = new DOMDocument();
				$html->loadHTMLFile('../../Model/send_code/customer.php');
				$mail=$html->getElementById('confirm_mail');

				$mail->setAttribute('href', $url);

				$html->getElementById('name')->nodeValue =  htmlentities($business_name, ENT_QUOTES);

			    $updated_html=$html->saveHTML();
			     require("../../../api/sendgrid-php/sendgrid-php.php");
				$email = new \SendGrid\Mail\Mail(); 
				$email->setFrom("hello@doora.app");
				$email->setSubject($subject);
				$email->addTo($to);
				$email->addContent("text/html",$updated_html);

				

				$sendgrid = new \SendGrid(SG_KEY);
				try {
						    $response = $sendgrid->send($email);
						    return "send";

						} catch (Exception $e) {
							return "notsend";
						}
    }
    public function verifyBusinessMail($email,$user_id,$business_name)
    {
      
                  						$url = 'https://doora.app/doora/verifyBussiness/submittedocuments.php?id='.$user_id;
						    			$to = $email;
						                $subject = "Welcome to Doora!";
						                $html = new DOMDocument();
										$html->loadHTMLFile('../../Model/send_code/register_business.php');
										$mail=$html->getElementById('confirm_mail');
										$mail->setAttribute('href', $url);

										$html->getElementById('name')->nodeValue = htmlentities($business_name, ENT_QUOTES);

									    $updated_html=$html->saveHTML();
									   
						          		require("../../../api/sendgrid-php/sendgrid-php.php");
										$email = new \SendGrid\Mail\Mail(); 
										$email->setFrom("hello@doora.app");
										$email->setSubject($subject);
										$email->addTo($to);
										$email->addContent("text/html",$updated_html);
										$sendgrid = new \SendGrid(SG_KEY);
											try {
											    $response = $sendgrid->send($email);
											    return "send";

											} catch (Exception $e) {
												return "notsend";
											}

                      
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
  }
  ?>