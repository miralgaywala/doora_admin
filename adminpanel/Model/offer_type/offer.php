<?php
class offer
{
	public $offer_id;
	public $offer_title;
	public $is_deleted;
	public $created_at;
	public $updated_at;

	public function __construct($offer_id,$offer_title,$is_deleted,$created_at,$updated_at)
	{
		$this->$offer_id=$offer_id;
		$this->offer_title=$offer_title;
        $this->is_deleted=$is_deleted;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
	}

	public function setoffer_id($offer_id)
    {
        $this->offer_id=$offer_id;
    }
    public function setoffer_title($offer_title)
    {
        $this->offer_title=$offer_title;
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
    public function getoffer_id()
    {
        return $this->offer_id;
    }
    public function getoffer_title()
    {
        return $this->offer_title;
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
