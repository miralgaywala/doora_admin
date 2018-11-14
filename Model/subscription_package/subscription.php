<?php
class subscription
{
	public $subscription_plan_id;
	public $subscription_name;
	public $price;
	public $description;
	public $offer;
	public $per_deal_redeem_price;
	public $free_days;
	public $is_deleted;
	public $created_at;
	public $updated_at;

	public function __construct($subscription_plan_id,$subscription_name,$price,$description,$offer,$per_deal_redeem_price,$free_days,$is_deleted,$created_at,$updated_at)
	{
		$this->subscription_plan_id=$subscription_plan_id;
		$this->subscription_name=$subscription_name;
		$this->price=$price;
		$this->description=$description;
		$this->offer=$offer;
		$this->per_deal_redeem_price=$per_deal_redeem_price;
		$this->free_days=$free_days;
		$this->is_deleted=$is_deleted;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
	}
	public function setsubscription_plan_id($subscription_plan_id)
    {
        $this->subscription_plan_id=$subscription_plan_id;
    }
    public function setsubscription_name($subscription_name)
    {
        $this->subscription_name=$subscription_name;
    }
    public function setprice($price)
    {
        $this->price=$price;
    }
    public function setdescription($description)
    {
        $this->description=$description;
    }
    public function setoffer($offer)
    {
        $this->offer=$offer;
    }
    public function setper_deal_redeem_price($per_deal_redeem_price)
    {
        $this->per_deal_redeem_price=$per_deal_redeem_price;
    }
    public function setfree_days($free_days)
    {
        $this->free_days=$free_days;
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
    public function getsubscription_plan_id()
    {
        return $this->subscription_plan_id;
    }
    public function getsubscription_name()
    {
        return $this->subscription_name;
    }
    public function getprice()
    {
        return $this->price;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function getoffer()
    {
        return $this->offer;
    }
    public function getper_deal_redeem_price()
    {
        return $this->per_deal_redeem_price;
    }
    public function getfree_days()
    {
        return $this->free_days;
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
