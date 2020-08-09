<?php
class category{
	public $category_id;
	public $category_name;
	public $category_image;
	public $is_delete;
	public $created_at;
	public $updated_at;
	public $is_super_market;

	public function __construct($category_id,$category_name,$category_image,$is_delete,$created_at,$updated_at,$is_super_market)
	{
		$this->category_id=$category_id;
		$this->category_name=$category_name;
		$this->category_image=$category_image;
		$this->is_delete=$is_delete;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->is_super_market=$is_super_market;
	}
	public function setcategory_id($category_id)
    {
        $this->category_id=$category_id;
    }
    public function setcategory_name($category_name)
    {
        $this->category_name=$category_name;
    }
    public function setcategory_image($category_image)
    {
        $this->category_image=$category_image;
    }
    public function setis_delete($is_delete)
    {
        $this->is_delete=$is_delete;
    }
    public function setcreated_at($created_at)
    {
        $this->created_at=$created_at;
    }
    public function setupdated_at($updated_at)
    {
        $this->updated_at=$updated_at;
    }
    public function setissuper_market($is_super_market)
    {
        $this->is_super_market=$is_super_market;
    }
    public function getcategory_id()
    {
        return $this->category_id;
    }
    public function getcategory_name()
    {
        return $this->category_name;
    }
    public function getcategory_image()
    {
        return $this->category_image;
    }
    public function getis_delete()
    {
        return $this->is_delete;
    }
    public function getcreated_at()
    {
        return $this->created_at;
    }
    public function getupdated_at()
    {
        return $this->updated_at;
    }
    public function getissuper_market()
    {
        return $this->is_super_market;
    }
}
?>