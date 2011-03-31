<?php
include 'varconfig.php';
require_once 'db_con.php';
if(isset($_GET['user_id']))
{
	require_once '/home8/linkdooc/public_html/tinycms/orm/user.php';
    require_once '/home8/linkdooc/public_html/tinycms/model/model_user.php';
	$obj_user = new model_user();
	$user_id = $_GET['user_id'];
	$enable_status_before = $_GET['enable_status'];
	if($enable_status_before==0)
	{
		$enable_status_after = 1;
	}
	else
	{
		$enable_status_after = 0;
	}
	$obj_user->set_user_id($user_id);
	$obj_user->set_isactive($enable_status_after);
    $obj_user->set_user_status();
	$current_status = $enable_status_after;
    if($current_status==0)
	{
		echo "<img src='images/publish_x.png' title='Enable User'>";
		echo "<input type='hidden' id='user_enable_status_".$user_id."' value='".$current_status."''/>";
	}
	else{
		echo "<img src='images/tick.png' title='Disable User'>";
		echo "<input type='hidden' id='user_enable_status_".$user_id."' value='".$current_status."''/>";
		}
}
?>