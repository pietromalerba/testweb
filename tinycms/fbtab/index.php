<?php
include '../facebook/flib/src/facebook.php';
include '../facebook/fconfig.php';
//include 'facebook/authentication.php';
require_once  '../varconfig.php';
require_once '../db_con.php';
require_once '../orm/post.php';
require_once '../model/model_post.php';
$obj_post = new model_post();


require_once 'parse.php';
if(isset($_GET['p']))
{
	$page = $_GET['p'];
}
else
{
	$page = "tab";
}
include_once 'header.php';
?>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/it_IT/all.js"></script>
<script>
FB.init({ appId:'<?php echo $APIappId;?>', cookie:true, status: true, xfbml:true });
</script>
<script src="http://static.ak.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript"></script>
<script>
function call_invite()
{
alert('hi');
FB.ui({
 method: 'apprequests', 
  message: 'Invita 10 amici per scaricare 10 fantastici brani inediti del tour live di ELIO!!', 
 data: 'tracking information for the user'
 });
}	
</script>

<?php
include $page.'.php';



?>