<?php 
class subcategory
{
	public $sub_category_id;
	public $category_id;
	public $sub_category_name;
	public $sub_category_image;
	public $is_deleted;
	public $created_at;
	public $updated_at;

	public function __construct($sub_category_id,$category_id,$sub_category_name,$sub_category_image,$is_deleted,$created_at,$updated_at)
	{
		$this->sub_category_id=$sub_category_id;
		$this->category_id=$category_id;
		$this->sub_category_name=$sub_category_name;
		$this->sub_category_image=$sub_category_image;
		$this->is_deleted=$is_deleted;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
	}

	public function setsub_category_id($sub_category_id)
    {
        $this->sub_category_id=$sub_category_id;
    }
    public function setcategory_id($category_id)
    {
        $this->category_id=$category_id;
    }
    public function setsub_category_name($sub_category_name)
    {
        $this->sub_category_name=$sub_category_name;
    }
    public function setsub_category_image($sub_category_image)
    {
        $this->sub_category_image=$sub_category_image;
    }
    public function setis_deleted($is_deleted)
    {
        $this->is_deleted=$is_deleted;
    }
    public function setcreated_at($created_at)
    {
        $this->created_at=$created_at;
    }
    public function setupdated_at($updated_at)
    {
        $this->updated_at=$updated_at;
    }
}
?>