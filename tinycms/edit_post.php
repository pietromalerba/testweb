<?php
require_once 'orm/post.php';
require_once 'model/model_post.php';
$obj_post = new model_post();
if(isset($_POST['title']))
{
	$obj_post->set_post_id($_POST['post_id']);
	$obj_post->set_title($_POST['title']);
	$obj_post->set_description($_POST['description']);
	$obj_post->set_price($_POST['price']);
	$obj_post->set_start_date($_POST['start_date']);
	$obj_post->set_end_date($_POST['end_date']);
	$obj_post->set_button_label($_POST['button_label']);
	
	$check_update = $obj_post->update_post();
	if($check_update == true)
	{
		header('Location:index.php?p=home&c_e_p=1');
	}
	else
	{
		header('Location:index.php?p=home&c_e_p=0');
	}
}

?>