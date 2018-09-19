<?php
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/category/category.php");
class category_model{
    public function __construct() {
        $this->db=new dbconfig();
    }
    public function addcategory_data($category_name,$category_image,$is_super_market)
    {

        //echo $is_super_market;

    	$con= $this->db->connection();
    	$dt = new DateTime();
        $date= $dt->format('Y-m-d H:i:s');
        $is_delete=0;
        /*if($is_super_market==1)
        {
            echo "update category set is_super_market=0";
        }*/
      //$add_category=$con->query("insert into category (category_name,category_image,is_deleted,created_at,is_super_market) values('".$category_name."','".$category_image."',".$is_delete.",'".$date."',".$is_super_market.")"); 
       
       echo "insert into category (category_name,category_image,is_delete,created_at,is_super_market) values('".$category_name."','".$category_image."',".$is_delete.",'".$date."',".$is_super_market.")";    
       //echo $add_category;      
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
        $con->query("delete from category where category_id=".$category_id);
        //echo "delete * from category where category_id=".$category_id;
       
    }
    public function editcategorydata($category_id,$category_name,$category_image,$is_super_market)
    {
        $con= $this->db->connection();
        $dt = new DateTime();
        $date= $dt->format('Y-m-d H:i:s');
        //echo $date;
        $edit_category=$con->query("update category SET category_name='".$category_name."' , category_image='".$category_image."' , updated_at='".$date."' , is_super_market=".$is_super_market." where category_id=".$category_id); 
        return $edit_category;
        //echo "update category SET category_name='".$category_name."' , category_image='".$category_image."' , upadted_at='".$date."' , is_super_market=".$is_super_market." where category_id=".$category_id;
    }
    public function viewcategory($category_id)
    {
        $con= $this->db->connection();
        $viewcategory=$con->query("select * from category where category_id=".$category_id);
        $viewcategory=$viewcategory->fetch_all();
        return $viewcategory;
    }
    public function issupermarket()
    {
        $con=$this->db->connection();
        $issupermarket=$con->query("select count(*) from category where is_super_market=1");
        return $issupermarket;
    }
}
?>
