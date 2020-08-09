<?php 
class admin
{
	public $admin_id;
	public $role_id;
	public $username;
	public $password;
	public $admin_name;
	public $email_address;
	public $phone_no;
	public $profile_image;
	public $is_deleted;
	public $created_at;
	public $updated_at;

	public function __construct($admin_id,$role_id,$username,$password,$admin_name,$email_address,$phone_no,$profile_image,$is_deleted,$created_at,$updated_at)
	{
		$this->admin_id=$admin_id;
		$this->role_id=$role_id;
		$this->username=$username;
		$this->password=$password;
		$this->admin_name=$admin_name;
		$this->email_address=$email_address;
		$this->phone_no=$phone_no;
		$this->profile_image=$profile_image;
		$this->is_deleted=$is_deleted;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
	}

	public function setadmin_id($admin_id)
	{
		$this->admin_id=$admin_id;
	}
	public function setrole_id($role_id)
	{
		$this->role_id=$role_id;
	}
	public function setusername($username)
	{
		$this->username=$username;
	}
	public function setpassword($password)
	{
		$this->password=$password;
	}
	public function setadmin_name($admin_name)
	{
		$this->admin_name=$admin_name;
	}
	public function setemail_address($email_address)
	{
		$this->email_address=$email_address;
	}
	public function setphone_no($phone_no)
	{
		$this->phone_no=$phone_no;
	}
	public function setprofile_image($profile_image)
	{
		$this->profile_image=$profile_image;
	}
	public function setis_deleted($is_deleted)
	{
		$this->is_deleted=$is_deleted;
	}
	public function setcreated_at($created_at)
	{
		$this->created_at=$created_at;
	}
	public function setupdated_at($updated_at)
	{
		$this->updated_at=$updated_at;
	}
	public function getadmin_id()
	{
		return $this->admin_id;
	}
	public function getrole_id()
	{
		return $this->role_id;
	}
	public function getusername()
	{
		return $this->getusername;
	}
	public function getpassword()
	{
		return $this->getpassword;
	}
	public function getadmin_name()
	{
		return $this->admin_name;
	}
	public function getemail_address()
	{
		return $this->email_address;
	}
	public function getphone_no()
	{
		return $this->phone_no;
	}
	public function getprofile_image()
	{
		return $this->profile_image;
	}
	public function getis_deleted()
	{
		return $this->is_deleted;
	}
	public function getcreated_at()
	{
		return $this->created_at;
	}
	public function getupdated_at()
	{
		return $this->updated_at;
	}
}
?>