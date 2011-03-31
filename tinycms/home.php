<?php
require_once 'orm/post.php';
require_once 'model/model_post.php';

$user = $facebook->api('/'.$userid);
//$params = array('method' => 'pages.isadmin', 'callback' => '');

//$pages = $facebook->api($params);
//var_dump($pages);
$obj_post = new model_post();
$obj_post->set_user_id($user['id']);
$result_post = $obj_post->get_posts_by_user();

include_once 'header.php';
?>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({
    appId  : '162657113787999',
    status : true, // check login status
    cookie : true, // enable cookies to allow the server to access the session
    xfbml  : true  // parse XFBML
  });
</script>

<script>
//var option="vinay";
function doit()
{
	var query = FB.Data.query('select page_id from page_admin where uid={0}','1010977165');
	var page_info = FB.Data.query("select page_id , name from page where page_id in "+"(select page_id from {0})",query);
	page_info.wait(function(rows) {
	var names = "<select><option value='-1'>Select Page</option>";
	FB.Array.forEach(rows,function(row)
	{
		names +="<option value='"+row['page_id']+"'>";
		//names +=row['page_id'];
		names +=row['name'];
		names +="</option>";	
	});
	names +="</select>";
    document.getElementById('doit').innerHTML ='Your name is '+names;     
 /*	var i;
		i=0;
		//var names = "";
		//var names="first"; 
		for(i=0;i<=rows.length;i++)
		{
		 names=FB.api(rows[i]['page_id'], function(response) {
		  
		  names=response.name;
          return names;
});
 document.getElementById('doit').innerHTML ='Your name is '+names;
}

		//alert('hi');
		 //var a1 = new Array();
	//alert(rows[i]['page_id']);
		/* var query2 = FB.Data.query('select page_id,name from page where page_id ={0}',rows[i]['page_id']);
		query2.wait(function(rows2)
		{
		  //var a2=; 
		alert(rows2[i]['name']);
   
		});
		//i=i+1;
*/
	 
	
	// document.write(names);*/
 });
 /*var options="vinay";
 for(i=0;i<=rows1.length;i++)
		{
		 var names=FB.api(rows1[i]['page_id'], function(response) {
		  
		  return response.name;
          //return names;
});
  options=options+names;           
}*/
//alert(options);
}
</script>

<p><a href="index.php?p=new_post">Add New Post</a></p>

<?php

if(isset($_GET['c_e_p']))
{
	if($_GET['c_e_p']==1)
	{
		echo "Update has been done successfully.";
	}
	else
	{
		echo "There was some problem in updating.";
	}
}


if(isset($_GET['c_i_p']))
{
	if($_GET['c_i_p']==1)
	{
		echo "Insertion of new post has been done successfully.";
	}
	else
	{
		echo "There was some problem in inserting.";
	}
}
	
?>	
<div id ="postsbyuser">
<table>
<tr>
<th>Date</th><th>Title</th><th>Action</th>
</tr>
<?php
	if(mysql_num_rows($result_post)==0)
	{
		echo "<tr><td>There is no post by You.</td></tr>";
	}
	else
	{
		while($row_post = mysql_fetch_array($result_post))
		{
		?>
			<tr>
			<th><?php echo $row_post['start_date'];?></th>
			<th><?php echo $row_post['title'];?></th>
			<th><a href='index.php?p=custom_post&post_id=<?php echo $row_post["post_id"];?>'>Edit</a> <a>Delete</a></th>
			</tr>
		<?php	
		}
	}
?>
</table>
</div>
<?php
include_once 'footer.php';
?>