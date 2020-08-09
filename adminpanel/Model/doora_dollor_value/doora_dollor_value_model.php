<?php 
include "../../Model/dbconfig.php";

class doora_dollor_value_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function display_doora_dollor_value()
    {
       $con=$this->db->connection();
       $gettag=$con->query("select * from doora_dollar_values where is_deleted=0");
       $tag = array();
      while ($row = $gettag->fetch_assoc()) {
        $tag[] = $row;
      }
       //echo "<pre>";print_r($tag);echo "</pre>";
       return $tag;
    }
    public function detail_doora_dollor_value($id)
    {
      $con=$this->db->connection();
       $gettag=$con->query("select * from doora_dollar_values where is_deleted=0 AND id=".$id);
       $tag = array();
      while ($row = $gettag->fetch_assoc()) {
        $tag[] = $row;
      }
       //echo "<pre>";print_r($tag);echo "</pre>";
       return $tag;
    }
    public function edit_doora_dollor_value($doora_dollor_value_points,$doora_dollor_value_amount,$doora_dollor_value_id)
    {
      $doora_dollor_value_points=trim($doora_dollor_value_points);
      $doora_dollor_value_amount=trim($doora_dollor_value_amount);
      $doora_dollor_value_id=trim($doora_dollor_value_id);

      $con= $this->db->connection();
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
       
        $tag=$con->query("update doora_dollar_values SET points=".$doora_dollor_value_points." , amount=".$doora_dollor_value_amount." , updated_at='".$date."' where id=".$doora_dollor_value_id); 
        $edittag="1";      
        return $edittag;
    }
}
?>