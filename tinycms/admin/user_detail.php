<?
session_start();
?>
<? if($_SESSION['key'] == 1)
{
?>
<? 
include 'varconfig.php';
require_once 'db_con.php';
require_once '/home8/linkdooc/public_html/tinycms/orm/user.php';
require_once '/home8/linkdooc/public_html/tinycms/model/model_user.php';
$obj_users = new model_user();
$result = $obj_users->get_all_users();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="src/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/enable_disable.js"></script>
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
	<div class="breadCrumb">
		<a href="http://www.linkdoo.com/tinycms/admin/index.php?p=home">Home</a> <img src="src/images/blank.gif" class="arrowB" /> Users
	</div>
	<div class="title">
		<div class="l">
			Users
		</div>
		<br class="c" />
	</div>
	<div  class="dt_grd">
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr class="h">
			<td width="120">Username</td>
			<td width="120">Usertype</td>
			<td width="120" class="r">Number of banners </td>
		    <td width="120" class="r">Enable/Disable</td>
		</tr>
<? if(mysql_num_rows($result)!=0)
{		
  while($row = mysql_fetch_array($result))		
		{ ?>
		<tr class="i">
			<td width="120"><a href="#"><? echo $row['user_name']; ?></a></td>
			<td width="120"><? echo $row['user_type']; ?></td>
			<td width="120"><? echo $row['ban_count'];?></td>
		    <td id='<?php echo $row['user_id'];?>' class='user_enable'>
			
			<input type='hidden' id='user_enable_status_<?php echo $row['user_id'];?>' value='<?php echo $row['is_active'];?>'/>
			<img src='images/<?php
								if($row['is_active']==0)
								{
								echo "publish_x.png";
								}
								else{
										echo "tick.png";
									}
							?>' title='<?php if($row['is_active']==0){echo "Enable User";}else{echo "Disable User";}?>'>
		
		   </td>
		</tr>
<? 
         }
}		
?>
</table>
</div>
</div>
</body>
</html>
<?
}
else
{
header('Location:http://www.linkdoo.com/tinycms/admin/index.php?p=login');
}
?>