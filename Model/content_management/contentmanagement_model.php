<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
class content_model
{
  public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_content()
    {
       $con=$this->db->connection();
       $getcontent=$con->query("select * from content_management");
       $content=mysqli_fetch_all($getcontent,MYSQLI_ASSOC);
       return $content;
    }
    public function addcontent_data($content_id,$privacy_policy,$term_condition,$helpc,$helpb)
    {
        $privacy_policy=trim($privacy_policy);
        $term_condition=trim($term_condition);
        $helpc=trim($helpc);
        $helpb=trim($helpb);
        $con= $this->db->connection();
        $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
        $select=$con->query("select * from content_management");
        $count=$select->num_rows;
        $add="";
        if($count == 0)
        {
           $tag=$con->query("insert into content_management (privacy_policy,terms_and_condition,help_customer,help_business,created_at) values('".$privacy_policy."','".$term_condition."','".$helpc."','".$helpb."','".$date."')"); 
            $add="0";

        }
        else
        {
        $addcontent=$con->query("update content_management set privacy_policy='".$privacy_policy."',terms_and_condition='".$term_condition."',help_customer='".$helpc."',help_business='".$helpb."',updated_at='".$date."' where content_management_id=".$content_id); 
         $add="1";
        }
        return $add;
    }
}
?>