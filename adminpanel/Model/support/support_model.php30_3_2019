<?php
include "../../Model/dbconfig.php";
class support_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_support()
    {
       $con=$this->db->connection();
       $getsupport=$con->query("select s.*,user.name from support as s left join users as user on s.user_id = user.user_id where NOT s.is_deleted=1 order by s.created_at desc");
      $support = array();
      while ($row = $getsupport->fetch_assoc()) {
        $support[] = $row;
      }
       return $support;
    }
    public function getview_support($support_id)
    {
      $con=$this->db->connection();
       $getsupport=$con->query("select s.*,user.name from support as s left join users as user on s.user_id = user.user_id where s.support_id=".$support_id);
       $support = array();
      while ($row = $getsupport->fetch_assoc()) {
        $support[] = $row;
      }
       return $support;
    }
    public function deletesupport($support_id)
    {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $delete=$con->query("update support SET is_deleted=1,updated_at='".$date."' where support_id=".$support_id);
    }
    public function updateopen($id,$data)
    {
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $con=$this->db->connection();
        $success="";
        if($data==0)
        {
           $active=$con->query("update support SET is_open='1',updated_at='".$date."' WHERE support_id=".$id);
           $success="0";
        }
        else
        {
            $active=$con->query("update support SET is_open='0',updated_at='".$date."' WHERE support_id=".$id);
            $success="2";
        }
        return $success;
    }
    public function support_filter($support)
    {
      $con=$this->db->connection();
      if($support == "open")
      {
          $getsupport=$con->query("select s.*,user.name from support as s left join users as user on s.user_id = user.user_id where s.is_open=1");
      }
      else if($support == "close")
      {
        $getsupport=$con->query("select s.*,user.name from support as s left join users as user on s.user_id = user.user_id where s.is_open=0");
      }
      else
      {
         $getsupport=$con->query("select s.*,user.name from support as s left join users as user on s.user_id = user.user_id where NOT s.is_deleted=1 order by s.created_at desc");
      }
      $support = array();
      while ($row = $getsupport->fetch_assoc()) {
        $support[] = $row;
      }
       return $support;
    }
  }
  ?>