<?php
require_once 'orm/user.php';
require_once 'model/model_user.php';
$user = $facebook->api('/'.$userid);

$obj_user = new model_user();
$obj_user->set_user_id($user['id']);
$obj_user->set_username($user['name']);
$obj_user->set_usertype('u');

$user_already = $obj_user->check_user_already();

if($user_already === false)
{
	$result = $obj_user->insert_user();
}


header('Location:index.php?p=home');
?>