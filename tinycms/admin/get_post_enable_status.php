<?php
include 'varconfig.php';
require_once 'db_con.php';
if(isset($_GET['post_id']))
{
	require_once '/home8/linkdooc/public_html/tinycms/orm/post.php';
    require_once '/home8/linkdooc/public_html/tinycms/model/model_post.php';
	$obj_user = new model_post();
	$post_id = $_GET['post_id'];
	$enable_status_before = $_GET['enable_status'];
	if($enable_status_before==0)
	{
		$enable_status_after = 1;
	}
	else
	{
		$enable_status_after = 0;
	}
	$obj_user->set_post_id($post_id);
	$obj_user->set_is_active($enable_status_after);
    $obj_user->set_post_status();
	$current_status = $enable_status_after;
    if($current_status==0)
	{
		echo "<img src='images/publish_x.png' title='Enable Post'>";
		echo "<input type='hidden' id='post_enable_status_".$post_id."' value='".$current_status."''/>";
	}
	else{
		echo "<img src='images/tick.png' title='Disable User'>";
		echo "<input type='hidden' id='post_enable_status_".$post_id."' value='".$current_status."''/>";
		}
}
?>