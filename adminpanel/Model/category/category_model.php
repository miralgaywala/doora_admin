<?php
include "../../Model/dbconfig.php";
include"../../Model/category/category.php";

class category_model{
    public function __construct() {
        $this->db=new dbconfig();
    }
    public function addcategory_data($category_name,$category_image,$is_super_market)
    {
        $category_name=trim($category_name);
    	$con= $this->db->connection();
    	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=gmdate("Y-m-d\TH:i:s\Z");
        if($is_super_market==1)
        {
            $con->query("update category set is_super_market=0");
        }
        $select=$con->query("select * from category where is_deleted=0 AND category_name='".$category_name."'");
        $count=$select->num_rows;
        $add_category="";
       //echo $count;
        if($count > 0)
        {
           $add_category="0";
        }
        else
        {
        $add_category=$con->query("insert into category (category_name,category_image,created_at,updated_at,is_super_market) values('".$category_name."','".$category_image."','".$date."','".$date."',".$is_super_market.")"); 
       $add_category="1";
        //echo "insert into category (category_name,category_image,created_at,is_super_market) values('".$category_name."','".$category_image."','".$date."',".$is_super_market.")";    
        }  
        return $add_category;
    }
    public function getcategorylist()
    {
        $con=$this->db->connection();
        $category = array();
        $getcategory=$con->query("select * from category where NOT is_deleted=1");
       while ($row = $getcategory->fetch_assoc()) {
        $category[] = $row;
      }
        return $category;
    }
    public function geteditcategorylist($category_id)
    {
        $con=$this->db->connection();
        $editcategorylist = array();
        $geteditcategorylist=$con->query("select * from category where category_id=".$category_id);
        while ($row = $geteditcategorylist->fetch_assoc()) {
        $editcategorylist[] = $row;
      }
        return $editcategorylist;
    }
    public function deletecategory($category_id)
    {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=gmdate("Y-m-d\TH:i:s\Z");
        $delete=$con->query("update category SET is_deleted=1,updated_at='".$date."' where category_id=".$category_id);
        //echo "update category SET is_deleted=1 where category_id=".$category_id;   
    }
    public function editcategorydata($category_id,$category_name,$category_image,$is_super_market)
    {
        $category_name=trim($category_name);
        $con= $this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=gmdate("Y-m-d\TH:i:s\Z");
        if($is_super_market == 1)
        {
            $con->query("update category set is_super_market=0");
        }
        $edit_category="";
        $select=$con->query("select category_id from category where is_deleted=0 AND category_name='".$category_name."' AND category_id!=".$category_id);
        $count=$select->num_rows;
        if($count > 0)
        {
            $edit_category="0";   
        }
        else
        {
            //echo "update category SET category_name='".$category_name."' , category_image='".$category_image."' , upadted_at='".$date."' , is_super_market=".$is_super_market." where category_id=".$category_id;
        $edit_category=$con->query("update category SET category_name='".$category_name."' , category_image='".$category_image."' , updated_at='".$date."' , is_super_market=".$is_super_market." where category_id=".$category_id); 
        $edit_category="1";
        }
         return $edit_category;
    }
    public function viewcategory($category_id)
    {
        $con= $this->db->connection();
        $viewcategory = array();
        $viewcategory1=$con->query("select * from category where category_id=".$category_id);
       while ($row = $viewcategory1->fetch_assoc()) {
        $viewcategory[] = $row;
      }
        return $viewcategory;
    }
}
?>
