<?php
include 'facebook/flib/src/facebook.php';
include 'facebook/fconfig.php';
include 'facebook/authentication.php';
require_once  'varconfig.php';
require_once 'db_con.php';

if(isset($_GET['p']))
{
	$page = $_GET['p'];
}
else
{
	$page = "home";
}
include $page.'.php';
?>








