<?php 
include "../../Model/dbconfig.php";

class doora_dollor_terms_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function display_doora_dollor_terms()
    {
       $con=$this->db->connection();
       $gettag=$con->query("select * from doora_dollar_tearms where is_deleted=0");
       $tag = array();
      while ($row = $gettag->fetch_assoc()) {
        $tag[] = $row;
      }
       //echo "<pre>";print_r($tag);echo "</pre>";
       return $tag;
    }
    public function detail_doora_dollor_terms($id)
    {
      $con=$this->db->connection();
       $gettag=$con->query("select * from doora_dollar_tearms where is_deleted=0 AND id=".$id);
       $tag = array();
      while ($row = $gettag->fetch_assoc()) {
        $tag[] = $row;
      }
       //echo "<pre>";print_r($tag);echo "</pre>";
       return $tag;
    }
    public function edit_doora_dollor_terms($doora_dollor_terms_title,$doora_dollor_terms_desc,$doora_dollor_terms_id)
    {
      $doora_dollor_terms_title=trim($doora_dollor_terms_title);
      $doora_dollor_terms_desc=trim($doora_dollor_terms_desc);
      $doora_dollor_terms_id=trim($doora_dollor_terms_id);
      $con= $this->db->connection();
      //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
         $date = gmdate("Y-m-d\TH:i:s\Z");
        $tag=$con->query("update doora_dollar_tearms SET title='".$doora_dollor_terms_title."' , doora_dollar_tearms_desc='".$doora_dollor_terms_desc."' , updated_at='".$date."' where id=".$doora_dollor_terms_id); 
        $edittag="1";      
        return $edittag;
    }
}
?>