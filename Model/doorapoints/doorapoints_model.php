<?php 
include "../../Model/dbconfig.php";
class doorapoints_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_doorapoints()
    {
       $con=$this->db->connection();
       $getpoints=$con->query("select * from doora_dollar_points where is_deleted=0");
       $points = array();
      while ($row = $getpoints->fetch_assoc()) {
        $points[] = $row;
      }
       //echo "<pre>";print_r($tag);echo "</pre>";
       return $points;
    }
    public function add_doorapoints($doora_dollor_points,$code,$description,$points)
    {
      $doora_dollor_points=trim($doora_dollor_points);
      $code=trim($code);
      $description=trim($description);
      $points=trim($points);
      $con= $this->db->connection();
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select * from doora_dollar_points where is_deleted=0 AND type='".$doora_dollor_points."'");
        $count=$select->num_rows;
        $adddoorapoints="";
        if($count > 0)
        {
           $adddoorapoints="0";
        }
        else
        {
        //echo "insert into deal_tags(tag,created_at) values('".$tag."','".$date."')";    
        $tag=$con->query("insert into doora_dollar_points (type,code,doora_dollar_points_desc,points,created_at,updated_at) values('".$doora_dollor_points."',".$code.",'".$description."',".$points.",'".$date."','".$date."')"); 
        $adddoorapoints="1";   
        }  
       return $adddoorapoints;
    }
    public function editlist_doorapoints($id)
    {
       $con=$this->db->connection();
       $getpoints=$con->query("select * from doora_dollar_points where is_deleted=0 AND id=".$id);
       $points = array();
      while ($row = $getpoints->fetch_assoc()) {
        $points[] = $row;
      }
       //echo "<pre>";print_r($tag);echo "</pre>";
       return $points;
    }
    public function edit_dooradollors($doorapoints_id,$doora_dollor_points,$code,$description,$points)
    {
      $doora_dollor_points=trim($doora_dollor_points);
      $code=trim($code);
      $description=trim($description);
      $points=trim($points);
      $id=trim($doorapoints_id);
      $con= $this->db->connection();
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select id from doora_dollar_points where is_deleted=0 AND type='".$doora_dollor_points."' AND id!=".$id);
        $count=$select->num_rows;
        $editdoora="";
        if($count > 0)
        {
           $editdoora="0";
        }
        else
        {
        $tag=$con->query("update doora_dollar_points SET type='".$doora_dollor_points."' , code='".$code."' , doora_dollar_points_desc='".$description."' , points='".$points."' , updated_at='".$date."' where id=".$id); 
        $editdoora="1";      
        }  
        return $editdoora;
    }
    public function delete_doorapoints($doorapoints_id)
    {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $delete=$con->query("update doora_dollar_points SET is_deleted=1,updated_at='".$date."' where id=".$doorapoints_id);
    }
}
?>