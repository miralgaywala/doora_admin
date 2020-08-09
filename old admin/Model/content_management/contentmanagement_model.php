<?php 
include "../../Model/dbconfig.php";
class content_model
{
  public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_content()
    {
       $con=$this->db->connection();
       $getcontent=$con->query("select * from content_management");
       $content = array();
       while ($row = $getcontent->fetch_assoc()) {
        $content[] = $row;
      }
       return $content;
    }
    public function addcontent_data($content_id,$privacy_policy,$term_condition,$helpc,$helpb)
    {
        $privacy_policy=trim($privacy_policy);
        $term_condition=trim($term_condition);
        $helpc=trim($helpc);
        $helpb=trim($helpb);
        $con= $this->db->connection();
        $date = date("Y-m-d H:i:s");
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        //$date=gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select * from content_management");
        $count=$select->num_rows;
        $add="";
        if($count == 0)
        {
        // echo "insert into content_management (privacy_policy,terms_and_condition,help_customer,help_business,created_at) values('".$privacy_policy."','".$term_condition."','".$helpc."','".$helpb."','".$date."')";
           $add=$con->query("insert into content_management (privacy_policy,terms_and_condition,help_customer,help_business,created_at) values('".$privacy_policy."','".$term_condition."','".$helpc."','".$helpb."','".$date."')"); 
            $add="1";

        }
        else
        {
        // echo "update content_management set privacy_policy='".$privacy_policy."',terms_and_condition='".$term_condition."',help_customer='".$helpc."',help_business='".$helpb."',updated_at='".$date."' where content_management_id=".$content_id;
          $update = $con->query("update content_management set privacy_policy='".$privacy_policy."' , terms_and_condition = '".$term_condition."' , help_customer = '".$helpc."' , help_business = '".$helpb."' , updated_at = '".$date."' where content_management_id = '".$content_id."'");
        //$add=$con->query("update content_management set privacy_policy='".$privacy_policy."',terms_and_condition='".$term_condition."',help_customer='".$helpc."',help_business='".$helpb."',updated_at='".$date."' where content_management_id=".$content_id); 
         $add="0";
        }
        return $add;
    }
}
?>