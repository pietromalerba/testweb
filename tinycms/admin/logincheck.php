<?php 
include 'varconfig.php';
require_once 'db_con.php';
$sql='select user_id,user_name,password,user_type,is_active from user where user_name'.'="'.$_POST[username].'" and password'.'="'.$_POST[password].'"';
$result=mysql_query($sql);
$count=count($result);
$row = mysql_fetch_array($result);
if($count==1 && $row[user_type] == 'a'&& $row[is_active] == 1)
{
session_start();
$_SESSION['key'] = 1;
header('Location: http://www.linkdoo.com/tinycms/admin/index.php?p=home');
}
else
{
header('Location:http://www.linkdoo.com/tinycms/admin/index.php?p=login');
}
?>