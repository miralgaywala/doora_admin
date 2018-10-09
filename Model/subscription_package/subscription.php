<?php
class subscription
{
	public $subscription_id;
	public $subscription_name;
	public $price;
	public $description;
	public $offer;
	public $is_monthly;
	public $post_deal_limit;
	public $is_deleted;
	public $created_at;
	public $updated_at;

	public function __construct($subscription_id,$subscription_name,$price,$description,$offer,$is_monthly,$post_deal_limit,$is_deleted,$created_at,$updated_at)
	{
		$this->subscription_id=$subscription_id;
		$this->subscription_name=$subscription_name;
		$this->price=$price;
		$this->description=$description;
		$this->offer=$offer;
		$this->is_monthly=$is_monthly;
		$this->post_deal_limit=$post_deal_limit;
		$this->is_deleted=$is_deleted;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
	}
	public function setsubscription_id($subscription_id)
    {
        $this->subscription_id=$subscription_id;
    }
}
?>
