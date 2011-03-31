<?php
class model_user extends user
{
	public function get_all_users()
	{
	    $sql = "SELECT * FROM user";
		$result = mysql_query($sql) or die(mysql_error());
		return $result;
	}
	
	public function insert_user()
	{
		$sql = "Insert into user (user_id,user_name,user_type) values('$this->user_id','$this->user_name','$this->user_type')";
		$result = mysql_query($sql) or die(mysql_error());
		return $result;
	}
	
	public function check_user_already()
	{
		$sql = "select * from user where user_id='".$this->user_id."'";
		$result = mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result)==0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	 public function set_user_status()
	{
	    $sql = "UPDATE user SET is_active='$this->is_active' where (user_id =$this->user_id)";
		$result=mysql_query($sql) or die(mysql_error());
		return $result;
	}
	
}	
?>