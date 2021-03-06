<?php 
include "../../Model/dbconfig.php";
include"../../Model/sub_category/subcategory.php";

class subcategory_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getsubcategorylist()
    {
        $con=$this->db->connection();
        $getsubcategory=$con->query("select sc.* from category as cat,sub_category as sc where cat.category_id=sc.category_id and cat.is_deleted=0 and sc.is_deleted=0");
       $subcategory = array();
      while ($row = $getsubcategory->fetch_assoc()) {
        $subcategory[] = $row;
      }
        return $subcategory;
    }
    public function getcategorylist()
    {
                        if($_POST['category_name'])
                        {
                         $con=$this->db->connection();
                         $getcategory=$con->query("select * from sub_category where category_id=1");
                         $category = array();
                          while ($row = $getcategory->fetch_assoc()) {
                            $category[] = $row;
                          }
                         return $category;
                        }
                        else
                        {
                        $con=$this->db->connection();
                        $getsubcategory=$con->query("select * from sub_category where NOT is_deleted=1");
                        $subcategory = array();
                          while ($row = $getsubcategory->fetch_assoc()) {
                            $subcategory[] = $row;
                          }
                        //print_r($subcategory);  
                        return $subcategory;
                       }
    }
    public function getsubcategorydetail($subcategory_id)
    {
        $con=$this->db->connection();
        $viewsubcategory=$con->query("select cat.category_name,sc.* from category as cat,sub_category as sc where cat.category_id=sc.category_id and sc.sub_category_id=".$subcategory_id);
         $view = array();
          while ($row = $viewsubcategory->fetch_assoc()) {
           $view[] = $row;
        }
        return $view;
    }
    public function deletesubcategory($subcategory_id)
    {
        $con=$this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        //echo "update sub_category SET is_deleted=1,updated_at='".$date."' where sub_category_id=".$subcategory_id;
        $con->query("update sub_category SET is_deleted=1,updated_at='".$date."' where sub_category_id=".$subcategory_id);
    }
    public function getcategory()
    {
        $con=$this->db->connection();
        $category=$con->query("select * from category where is_deleted=0 AND NOT is_super_market=1");
        $getcategory = array();
          while ($row = $category->fetch_assoc()) {
           $getcategory[] = $row;
        }
        return $getcategory;
    }
    public function addsubcategory_data($category_id,$subcategory_name)
    {
        $subcategory_name=trim($subcategory_name);
        $con= $this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select * from sub_category where sub_category_name='".$subcategory_name."' AND category_id=".$category_id." AND is_deleted=0 ");
        $count=$select->num_rows;
       $add_subcategory="";
        if($count > 0)  
        {
            $add_subcategory="0";
        }
        else
        {
        $add_subcategory=$con->query("insert into sub_category (category_id,sub_category_name,created_at,updated_at) values(".$category_id.",'".$subcategory_name."','".$date."','".$date."')"); 
        //echo "insert into sub_category (category_id,sub_category_name,sub_category_image,created_at) values(".$category_id.",'".$subcategory_name."','".$subcategory_image."','".$date."')";
        $add_subcategory="1";
        }
        return $add_subcategory;
    }
    public function geteditdata($subcategory_id)
    {
        $con=$this->db->connection();
        //$editdata=$con->query("select * from sub_category where sub_category_id=".$subcategory_id);
        $editdata=$con->query("select cat.category_name,sc.* from category as cat,sub_category as sc where cat.category_id=sc.category_id and sc.sub_category_id=".$subcategory_id);
       $geteditdata = array();
          while ($row = $editdata->fetch_assoc()) {
           $geteditdata[] = $row;
        }
        return $geteditdata;
    }
    public function editsubcategory_data($category_id,$subcategory_name,$subcategory_id)
    {
        $subcategory_name=trim($subcategory_name);
        $con= $this->db->connection();
        //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $select=$con->query("select * from sub_category where is_deleted=0 AND category_id=".$category_id." AND sub_category_name='".$subcategory_name."' AND sub_category_id!=".$subcategory_id);
        $count=$select->num_rows;
        $edit_category="";
        if($count > 0)
        {
            $edit_category="0";
        }
        else
        {
           $edit_category=$con->query("update sub_category SET category_id=".$category_id." , sub_category_name='".$subcategory_name."' , updated_at='".$date."' where sub_category_id=".$subcategory_id); 
            $edit_category="1";
        }
       return $edit_category;
    }
    public function getsubcategoryfilter($msg)
    {
        $con=$this->db->connection();
        if($msg==0)
        {
            $getsubcategory=$con->query("select * from sub_category where is_deleted=0");
        }
        else
        {
        $getsubcategory=$con->query("select * from sub_category where is_deleted=0 AND category_id=".$msg);
        }
       $subcategory = array();
          while ($row = $getsubcategory->fetch_assoc()) {
           $subcategory[] = $row;
        } 
        return $subcategory;
    }
    public function getcategoryfilter($msg)
    {
        $con=$this->db->connection();
        $category=$con->query("select * from category where category_id=".$msg);
        $getcategory = array();
          while ($row = $category->fetch_assoc()) {
           $getcategory[] = $row;
        } 
        return $getcategory;
    }
}
?>
