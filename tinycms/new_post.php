<?php
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
function doit()
{
	
	var query = FB.Data.query('select page_id from page_admin where uid={0}','1010977165');
	var page_info = FB.Data.query("select page_id , name from page where page_id in "+"(select page_id from {0})",query);
	page_info.wait(function(rows) {
	var names ="";
	//var names = "<select><option value='-1'>Select Page</option>";
	FB.Array.forEach(rows,function(row)
	{
		names +="<option value='"+row['page_id']+"'>";
		//names +=row['page_id'];
		names +=row['name'];
		names +="</option>";	
	});
	//names +="</select>";
    document.getElementById('page_id').innerHTML =names;     

 });
 
}
</script>
<div id="new_post">

<form method ="post" action="index.php?p=add_new_post">

<label>Entry Title :</label><br>
<input type="text" name="title" /><br><br>

<label>Primary Image</label><br>
<input type="file" name='primary_image'><br><br>

<label>Entry Description :</label><br>
<input type='text-area' name="description" "/><br><br>

<label>Price</label><br>
<input type="text" name="price" /><br><br>

<label>Start date</label><br>
<input type="text" name="start_date"/><br><br>


<label>End Date</label><br>
<input type="text" name="end_date" /><br><br>

<label>Button Label</label><br>
<input type="text" name="button_label" /><br><br>

<label>Select Page</label><br>
<select id="page_id" name="page_id">
	
</select>
<input type="submit" value="Submit Post"/>

</form>

</div>
<script>
	window.onload=doit();
</script>
<?php
include_once 'footer.php';
?>