<?php
require_once 'orm/post.php';
require_once 'model/model_post.php';
$obj_post = new model_post();
$result_post = $obj_post->get_post_by_id($_GET['post_id']);

include_once 'header.php';

if(isset($_GET['post_id']))
{


if(mysql_num_rows($result_post)!=0)
{
	$row_post = mysql_fetch_array($result_post);
?>


<div id="edit_post">

<form method ="post" action="index.php?p=edit_post">
<input type="hidden" name="post_id" value="<?php echo $row_post['post_id'];?>"/>
<label>Entry Title :</label><br>
<input type="text" name="title" value="<?php echo $row_post['title'];?>"/><br><br>

<label>Primary Image</label><br>
<input type="file" name='primary_image'><br><br>

<label>Entry Description :</label><br>
<input type='text-area' name="description" value="<?php echo $row_post['description'];?>"/><br><br>

<label>Price</label><br>
<input type="text" name="price" value="<?php echo $row_post['price'];?>"/><br><br>

<label>Start date</label><br>
<input type="text" name="start_date"value="<?php echo $row_post['start_date'];?>"/><br><br>


<label>End Date</label><br>
<input type="text" name="end_date" value="<?php echo $row_post['end_date'];?>"/><br><br>

<label>Button Label</label><br>
<input type="text" name="button_label" value="<?php echo $row_post['button_label'];?>"/><br><br>

<input type="submit" value="Edit Post"/>

</form>

</div>
<?php
}



}



include_once 'footer.php';
?>