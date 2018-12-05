<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/admin/admin.php");
class admin_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_admin()
    {
       $con=$this->db->connection();
       $getadmin=$con->query("select * from admin where is_deleted=0 order by admin_id desc");
       $admin=mysqli_fetch_all($getadmin,MYSQLI_ASSOC);
       return $admin;
    }
    public function getadmindetail($id)
    {
       $con=$this->db->connection();
       $getadmindetail=$con->query("select * from admin where is_deleted=0 AND admin_id=".$id);
       $adminuser=mysqli_fetch_all($getadmindetail,MYSQLI_ASSOC);
       return $adminuser;
    }
    public function deleteadmin($id)
    {
        $con=$this->db->connection();
        $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
        $delete=$con->query("update admin SET is_deleted=1,updated_at='".$date."' where admin_id=".$id);
    }
    public function addadmin($role,$user_name,$password,$admin_name,$email_address,$phone_no,$imagename)
    {
          $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
          $date=$date->format('y-m-d H:i:s');
          $con=$this->db->connection();
          $select=$con->query("select * from admin where is_deleted=0 AND email_address='".$email_address."'");
          $count=$select->num_rows;
          $add="";
          if($count > 0)
          {
            $add="1";
          }
          else
          {
          $add_admin=$con->query("insert into admin (role_id,username,password,admin_name,email_address,phone_no,profile_image,created_at) values(".$role.",'".$user_name."','".$password."','".$admin_name."','".$email_address."','".$phone_no."','".$imagename."','".$date."')"); 

          //echo "insert into admin (role_id,username,password,admin_name,email_address,phone_no,profile_image,created_at) values(".$role.",'".$user_name."','".$password."','".$admin_name."','".$email_address."','".$phone_no."',".$imagename.")";
          $add="2";
        }
        return $add;
    }
    public function editadmin($id,$role,$user_name,$password,$admin_name,$email_address,$phone_no,$imagename)
    {
          $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
          $date=$date->format('y-m-d H:i:s');
          $con=$this->db->connection();
          $select=$con->query("select * from admin where is_deleted=0 AND email_address='".$email_address."' AND admin_id!=".$id);
          $count=$select->num_rows;
          $edit="";
          if($count > 0)
          {
            $edit="1";
          }
          else
          {
          $edit_admin=$con->query("update admin SET role_id=".$role.", username='".$user_name."' , password='".$password."', admin_name='".$admin_name."', email_address='".$email_address."', phone_no='".$phone_no."', profile_image='".$imagename."', updated_at='".$date."' where admin_id=".$id); 

          //echo "insert into admin (role_id,username,password,admin_name,email_address,phone_no,profile_image,created_at) values(".$role.",'".$user_name."','".$password."','".$admin_name."','".$email_address."','".$phone_no."',".$imagename.")";
          $edit="2";
        }
        return $edit;
    }
}
?>