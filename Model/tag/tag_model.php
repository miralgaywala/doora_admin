<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/dbconfig.php");
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/tag/tag.php");
class tag_model
{
	public function __construct() {
        $this->db=new dbconfig();
    }
    public function getdisplay_tag()
    {
       $con=$this->db->connection();
       $gettag=$con->query("select * from deal_tags where NOT is_deleted=1");
       $tag=$gettag->fetch_all();
       return $tag;
    }

    public function addtag_data($tag)
    {
    	$tag=trim($tag);
    	$con= $this->db->connection();
    	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
        $select=$con->query("select * from deal_tags where is_deleted=0 AND tag='".$tag."'");
        $count=$select->num_rows;
        $addtag="";
        if($count > 0)
        {
           $addtag="0";
        }
        else
        {
       	//echo "insert into deal_tags(tag,created_at) values('".$tag."','".$date."')";    
        $tag=$con->query("insert into deal_tags (tag,created_at) values('".$tag."','".$date."')"); 
       	$addtag="1";   
        }  
       return $addtag;
    }
    public function viewtag($tag_id)
    {
    	 $con= $this->db->connection();
        $viewtag=$con->query("select * from deal_tags where tag_id=".$tag_id);
        $viewtag=$viewtag->fetch_all();
        return $viewtag;
    }
    public function edittaglist($tag_id)
    {
    	$con= $this->db->connection();
        $edittag=$con->query("select * from deal_tags where tag_id=".$tag_id);
        $edittagdata=$edittag->fetch_all();
        return $edittagdata;
    }
    public function edittag_data($tag_id,$tag)
    {
    	$tag=trim($tag);
    	$con= $this->db->connection();
    	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
        $select=$con->query("select tag_id from deal_tags where is_deleted=0 AND tag='".$tag."' AND tag_id!=".$tag_id);
        $count=$select->num_rows;
        $edittag="";
        if($count > 0)
        {
           $edittag="0";
        }
        else
        {
        $tag=$con->query("update deal_tags SET tag='".$tag."' , updated_at='".$date."' where tag_id=".$tag_id); 
       	$edittag="1";      
        }  
        return $edittag;
    }
    public function deletetag($tag_id)
    {
    	$con=$this->db->connection();
        $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date=$date->format('y-m-d H:i:s');
        $delete=$con->query("update deal_tags SET is_deleted=1,updated_at='".$date."' where tag_id=".$tag_id);
    }
}
?>