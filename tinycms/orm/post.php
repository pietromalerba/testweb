<?php
class post 
{
	protected $post_id,$user_id,$title,$description,$price,$start_date,$end_date,$button_label,$page_id,$is_active;
	
	public function set_user_id($user_id)
	{
		$this->user_id = $user_id;
	}
	public function get_user_id()
	{
	  return $this->user_id;
	}
	public function set_post_id($id)
	{
		$this->post_id = $id;
	}
    public function get_post_id()
	{
	  return $this->post_id;
	}
	public function set_title($title)
	{
		$this->title = $title;
	}
    public function get_title()
	{
	  return $this->title;
	}
	public function set_description($description)
	{
		$this->description = $description;
	}
    public function get_description()
	{
	  return $this->description;
	}
	public function set_price($price)
	{
		$this->price = $price;
	}
    public function get_price()
	{
	  return $this->price;
	}
	public function set_start_date($start_date)
	{
	  $this->start_date = $start_date;
	}
	public function get_start_date()
	{
	  return $this->start_date;
	}
	public function set_end_date($end_date)
	{
	 $this->end_date=$end_date;
	}
	public function get_end_date($end_date)
	{
	  return $this->end_date;
	}
	public function set_button_label($button_label)
	{
	 $this->button_label = $button_label;
	}
	public function get_button_label()
	{
	 return $this->button_label;
	}
	public function set_page_id($page_id)
	{
	  $this->page_id = $page_id; 
	}
	public function get_page_id()
	{
	  return $this->page_id;
	}
	public function set_is_active($is_active)
	{
	  $this->is_active = $is_active; 
	}
	public function get_is_active()
	{
	  return $this->is_active;
	}
	}

?>