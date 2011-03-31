<?php class model_post extends post{		
public function get_posts_by_user()		
{				
$sql = "select * from post where user_id='".$this->user_id."'";				
$result = mysql_query($sql) or die(mysql_error());				
return $result;			
}


public function update_post()
{
	$sql ="update post set title='$this->title',description='$this->description',price='$this->price',start_date='$this->start_date',end_date='$this->end_date',button_label='$this->button_label'  where post_id=$this->post_id";
	
	$result = mysql_query($sql) or die(mysql_error());
	return $result;
}



public function insert_post()
{
	$sql ="insert into post (user_id,title,description,price,start_date,end_date,button_label,page_id) values('$this->user_id','$this->title','$this->description','$this->price','$this->start_date','$this->end_date','$this->button_label','$this->page_id')";
	
	$result = mysql_query($sql) or die(mysql_error());
	return $result;
}


public function get_all_post()
	{
	    $sql = "SELECT * FROM post";
		$result = mysql_query($sql) or die(mysql_error());
		return $result;
	}
	
	
public function get_post_by_id($post_id)
{
	$sql ="select * from post where post_id='".$post_id."'";
	$result = mysql_query($sql) or die(mysql_error());
	return $result;
}
 public function set_post_status()
	{
	    $sql = "UPDATE post SET is_active='$this->is_active' where (post_id =$this->post_id)";
		$result=mysql_query($sql) or die(mysql_error());
		return $result;
	}


public function get_post_by_page_id($page_id)
{
	$sql ="select * from post where page_id='".$page_id."'";
	$result = mysql_query($sql) or die(mysql_error());
	return $result;
}
	
}
?>