<?php
class businessuser
{
	public $user_id;
	public $business_name;
	public $name;
	public $gender;
	public $date_of_birth;
	public $photo;
	public $email;
	public $password;
	public $address;
	public $latitude;
	public $langitude;
	public $is_notification;
	public $mobile_no;
	public $stripe_customer_id;
	public $is_iphone;
	public $device_id;
	public $is_deleted;
	public $is_business;
	public $is_email_verified;
	public $access_token;
	public $created_at;
	public $updated_at;
	public $is_super_market;
	public $website_url;
	public $is_active;

	public function __construct($user_id,$business_name,$name,$gender,$date_of_birth,$photo,$email,$password,$address,$latitude,$langitude,$is_notification,$mobile_no,$stripe_customer_id,$is_iphone,$device_id,$is_deleted,$is_business,$is_email_verified,$access_token,$created_at,$updated_at,$is_super_market,$website_url,$is_active)
	{
		$this->user_id=$user_id;
		$this->business_name=$business_name;
		$this->name=$name;
		$this->gender=$gender;
		$this->date_of_birth=$date_of_birth;
		$this->photo=$photo;
		$this->email=$email;
		$this->password=$password;
		$this->address=$address;
		$this->latitude=$latitude;
		$this->langitude=$langitude;
		$this->is_notification=$is_notification;
		$this->mobile_no=$mobile_no;
		$this->stripe_customer_id=$stripe_customer_id;
		$this->is_iphone=$is_iphone;
		$this->device_id=$device_id;
		$this->is_deleted=$is_deleted;
		$this->is_business=$is_business;
		$this->is_email_verified=$is_email_verified;
		$this->access_token=$access_token;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->is_super_market=$is_super_market;
		$this->website_url=$website_url;
		$this->is_active=$is_active;
	}
	public function setuser_id($user_id)
    {
        $this->user_id=$user_id;
    }
    public function setbusiness_name($business_name)
    {
    	$this->business_name=$business_name;
    }
    public function setname($name)
    {
    	$this->name=$name;
    }
    public function setgender($gender)
    {
    	$this->gender=$gender;
    }
    public function setdate_of_birth($date_of_birth)
    {
    	$this->date_of_birth=$date_of_birth;
    }
    public function setphoto($photo)
    {
    	$this->photo=$photo;
    }
    public function setemail($email)
    {
    	$this->email=$email;
    }
    public function setpassword($password)
    {
    	$this->password=$password;
    }
    public function setaddress($address)
    {
    	$this->address=$address;
    }
    public function setlatitude($latitude)
    {
    	$this->latitude=$latitude;
    }
    public function setlangitude($langitude)
    {
    	$this->langitude=$langitude;
    }
    public function setis_notification($is_notification)
    {
    	$this->is_notification=$is_notification;
    }
    public function setmobile_no($mobile_no)
    {
    	$this->mobile_no=$mobile_no;
    }
    public function setstripe_customer_id($stripe_customer_id)
    {
    	$this->stripe_customer_id=$stripe_customer_id;
    }
    public function setis_iphone($is_iphone)
    {
    	$this->is_iphone=$is_iphone;
    }
    public function setdevice_id($device_id)
    {
    	$this->device_id=$device_id;
    }
    public function setis_deleted($is_deleted)
    {
    	$this->is_deleted=$is_deleted;
    }
    public function setis_business($is_business)
    {
    	$this->is_business=$is_business;
    }
    public function setis_email_verified($is_email_verified)
    {
    	$this->is_email_verified=$is_email_verified;
    }
    public function setaccess_token($access_token)
    {
    	$this->access_token=$access_token;
    }
    public function setcreated_at($created_at)
    {
    	$this->created_at=$created_at;
    }
    public function setupdated_at($updated_at)
    {
    	$this->updated_at=$updated_at;
    }
    public function setis_super_market($is_super_market)
    {
    	$this->is_super_market=$is_super_market;
    }
    public function setwebsite_url($website_url)
    {
    	$this->website_url=$website_url;
    }
    public function setis_active($is_active)
    {
    	$this->is_active=$is_active;
    }
    public function getuser_id()
    {
        return $this->user_id;
    }
    public function getbusiness_name()
    {
        return $this->business_name;
    }
    public function getname()
    {
        return $this->name;
    }
    public function getgender()
    {
        return $this->gender;
    }
    public function getdate_of_birth()
    {
        return $this->date_of_birth;
    }
    public function getphoto()
    {
        return $this->photo;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function getaddress()
    {
        return $this->address;
    }
    public function getlatitude()
    {
        return $this->latitude;
    }
    public function getlongitude()
    {
        return $this->longitude;
    }
    public function geis_notification()
    {
        return $this->is_notification;
    }
    public function getmobile_no()
    {
        return $this->mobile_no;
    }
    public function getstripe_customer_id()
    {
        return $this->stripe_customer_id;
    }
    public function getis_iphone()
    {
        return $this->is_iphone;
    }
    public function getdevice_id()
    {
        return $this->device_id;
    }
    public function getis_deleted()
    {
        return $this->is_deleted;
    }
    public function getis_business()
    {
        return $this->is_business;
    }
    public function getis_email_verified()
    {
        return $this->is_email_verified;
    }
    public function getaccess_token()
    {
        return $this->access_token;
    }
    public function getcreated_at()
    {
        return $this->created_at;
    }
    public function getupdated_at()
    {
        return $this->updated_at;
    }
    public function getis_super_market()
    {
        return $this->is_super_market;
    }
    
    public function getwebsite_url()
    {
        return $this->website_url;
    }
    public function gettag_id()
    {
        return $this->is_active;
    }
}
?>