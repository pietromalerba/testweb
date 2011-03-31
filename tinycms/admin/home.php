<?
session_start();
?>
<? if($_SESSION['key'] == 1)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="src/css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="outter">
	<div class="header">
		<div class="l">
			Webkul <img src="src/images/blank.gif" class="arrowW" /> Tinycms  <img src="src/images/blank.gif" class="arrowW" /> Admin
			
		</div>
		<div class="r">
			<a href="http://www.linkdoo.com/tinycms/admin/index.php?p=home">Home</a> &nbsp;  |  &nbsp; 
			<a href="<?=$appcallbackurl;?>admin/user_detail.php">users</a> &nbsp;  |  &nbsp; 
			<a href="<?=$appcallbackurl;?>admin/post_detail.php">post</a> &nbsp;  |  &nbsp;
			<a href="<?=$appcallbackurl;?>admin/">Logout</a>
		</div>
		<br class="c" />
	</div>
	<div class="dashboard">
		<div class="link l5"onclick="location.href='<?=$appcallbackurl;?>admin/user_detail.php'">
			<span>Users</span>Add / Remove user details
		</div>
	   <div class="link l2"onclick="location.href='<?=$appcallbackurl;?>admin/post_detail.php'">
			<span>Posts</span>Add / Remove banner details
		</div>
	</div>
</div>
</body>
<html>
<?
}
else
{
header('Location:http://www.linkdoo.com/tinycms/admin/index.php?p=login');
}
?>
