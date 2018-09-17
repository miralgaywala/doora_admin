<?php
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/category/category.php");
class category_model{
    public function __construct() {
        $this->db=new dbconfig();
    }
    public function addcategory_data($category_name,$category_image)
    {

    	$con= $this->db->connection();
    	$dt = new DateTime();
$date= $dt->format('Y-m-d H:i:s');

       //$add_category=$con->query("insert into category (category_name,category_image,created_at) values('".$category_name."','".$category_image."','".now()."')");  
        echo "insert into category (category_name,category_image,created_at) values('".$category_name."','".$category_image."','".$date."')";          
        //return $add_category;
    }
}
?>
