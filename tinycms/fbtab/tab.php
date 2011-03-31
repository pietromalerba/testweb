<?php
$result_post = $obj_post->get_post_by_page_id($page_data['page']['id']);
if(mysql_num_rows($result_post)!=0)
{
	
	while($row = mysql_fetch_array($result_post))
	{
	?>
		<div class='img_post'><img src="images/img.jpg"/></div>
		
		<div class='post_detail'>
		
		<div class='deatil_item'><?php echo $row['title'];?></div>
		<div class='deatil_item'><?php echo $row['description'];?></div>
		<div class='deatil_item'><?php echo $row['start_date'];?></div>
		<div class='deatil_item'><?php echo $row['end_date'];?></div>
		<div class='deatil_item'><?php echo $row['button_label'];?></div>
	
		</div>
	<?php	
	}
	
}
?>
<a onclick="call_invite()">Invite</a>