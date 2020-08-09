<?php
class tag
{
	public $tag_id;
	public $tag;
    public $is_deleted;
	public $created_at;
	public $updated_at;
	public function __construct($tag_id,$tag,$is_deleted,$created_at,$updated_at)
	{
		$this->$tag_id=$tag_id;
		$this->tag=$tag;
        $this->is_deleted=$is_deleted;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
	}
	public function settag_id($tag_id)
    {
        $this->tag_id=$tag_id;
    }
    public function settag($tag)
    {
    	$this->tag=$tag;
    }
    public function setcreated_at($created_at)
    {
        $this->created_at=$created_at;
    }
    public function setupdated_at($updated_at)
    {
        $this->updated_at=$updated_at;
    }
    public function setis_deleted($is_deleted)
    {
        $this->is_deleted=$is_deleted;
    }
    public function gettag_id()
    {
        return $this->tag_id;
    }
    public function gettag()
    {
    	return $this->tag;
    }
    public function getis_deleted()
    {
        return $this->is_deleted;
    }
    public function getcreated_at()
    {
        return $this->created_at;
    }
    public function getupdated_at()
    {
        return $this->updated_at;
    }
}
?>