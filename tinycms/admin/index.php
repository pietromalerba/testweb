<?php
session_start();
include 'varconfig.php';
if(isset($_GET['p']))
{
$page=$_GET['p'];
}
else
{
session_destroy();
$page=login;
}
include ($page.".php");
?>
