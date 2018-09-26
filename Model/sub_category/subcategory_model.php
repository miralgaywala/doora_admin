<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/sub_category/subcategory.php");
class subcategory_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getsubcategorylist()
    {

        $con=$this->db->connection();
        $getsubcategory=$con->query("select * from sub_category");
        $subcategory=$getsubcategory->fetch_all();
        return $subcategory;

    }
}
?>
