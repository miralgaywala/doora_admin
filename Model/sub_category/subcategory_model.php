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
        $getsubcategory=$con->query("select * from sub_category where NOT is_deleted=1");
        $subcategory=$getsubcategory->fetch_all();   
        return $subcategory;
    }
    public function getcategorylist()
    {
                        if($_POST['category_name'])
                        {
                         $con=$this->db->connection();
                         $getcategory=$con->query("select * from sub_category where category_id=1");
                         $subcategory=$getcategory->fetch_all(); 
                         return $category;
                        }
                        else
                        {
                        $con=$this->db->connection();
                        $getsubcategory=$con->query("select * from sub_category where NOT is_deleted=1");
                        $subcategory=$getsubcategory->fetch_all(); 
                        //print_r($subcategory);  
                        return $subcategory;
                       }
    }
    public function getsubcategorydetail($subcategory_id)
    {
        $con=$this->db->connection();
        $viewsubcategory=$con->query("select * from sub_category where sub_category_id=".$subcategory_id);
        $view=$viewsubcategory->fetch_all();
        return $view;
    }
    public function deletesubcategory($subcategory_id)
    {
        $con=$this->db->connection();
        $dt = new DateTime();
        $date= $dt->format('Y-m-d H:i:s');
        //echo "update sub_category SET is_deleted=1,updated_at='".$date."' where sub_category_id=".$subcategory_id;
        $con->query("update sub_category SET is_deleted=1,updated_at='".$date."' where sub_category_id=".$subcategory_id);
    }
    public function getcategory()
    {
        $con=$this->db->connection();
        $category=$con->query("select * from category where is_deleted=0 AND NOT is_super_market=1 ");
        $getcategory=$category->fetch_all();
        return $getcategory;
    }
    public function addsubcategory_data($category_id,$subcategory_name,$subcategory_image)
    {
        $con= $this->db->connection();
        $dt = new DateTime();
        $date= $dt->format('Y-m-d H:i:s');
        //$add_subcategory=$con->query("insert into sub_category (category_id,sub_category_name,sub_category_image,created_at) values(".$category_id.",'".$subcategory_name."','".$subcategory_image."','".$date."')"); 
        echo "insert into sub_category (category_id,sub_category_name,sub_category_image,created_at) values(".$category_id.",'".$subcategory_name."','".$subcategory_image."','".$date."')";
        //return $add_subcategory;
    }
    public function geteditdata($subcategory_id)
    {
        $con=$this->db->connection();
        //$editdata=$con->query("select * from sub_category where sub_category_id=".$subcategory_id);
        $editdata=$con->query("select cat.category_name,sc.* from category as cat, sub_category as sc where cat.category_id=sc.category_id and sc.sub_category_id=".$subcategory_id);
        $geteditdata=$editdata->fetch_all();
        //  print_r($geteditdata);
        return $geteditdata;
    }
    public function editsubcategory_data($category_id,$subcategory_name,$subcategory_image,$subcategory_id)
    {
        $con= $this->db->connection();
        $dt = new DateTime();
        $date= $dt->format('Y-m-d H:i:s');
        //echo "update sub_category SET category_id=".$category_id." , sub_category_name='".$subcategory_name."' , updated_at='".$date."' ,sub_category_image='".$subcategory_image."' where sub_category_id=".$subcategory_id;
       $edit_category=$con->query("update sub_category SET category_id=".$category_id." , sub_category_name='".$subcategory_name."' , updated_at='".$date."' ,sub_category_image='".$subcategory_image."' where sub_category_id=".$subcategory_id); 
       return $edit_category;
    }
}
?>
