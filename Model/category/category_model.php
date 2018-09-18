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
    public function getcategorylist()
    {
        $con=$this->db->connection();
        $getcategory=$con->query("select * from category");

        $category=$getcategory->fetch_all();
        return $category;
    }
    public function geteditcategorylist($category_id)
    {
        $con=$this->db->connection();
        $geteditcategorylist=$con->query("select * from category where category_id=".$category_id);
        $editcategorylist=$geteditcategorylist->fetch_all();
        return $editcategorylist;
    }
    public function deletecategory($category_id)
    {
        $con=$this->db->connection();
        //$deletecategory=$con->query("delete * from category where category_id=".$category_id);
        echo "delete * from category where category_id=".$category_id;
    }
    public function editcategorydata($category_name,$category_image)
    {
        $con= $this->db->connection();
        $dt = new DateTime();
        $date= $dt->format('Y-m-d H:i:s');
        echo "update category SET category_name=".$category_name.""
    }
}
?>
