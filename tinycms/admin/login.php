<?php
include 'style.php';
?>
<div id="tinycms"><p>Tinycms</p></div>
<div id="login">
<div id="welcome"><p>Welcome Admin</p></div>
<form action="<?=$appcallbackurl ;?>admin/logincheck.php" method="POST">
<p>
   <label>Username<br>
   
   <input id="user_login" class="input" tabindex="10" size="20" type="text" name="username"/>
   </label>
 </p>
<p> 
    <label>Password<br>
	<input id="user_pass" class="input" tabindex="20" size="20" type="password" name="password"/>
	</label>
 </p>	
<p class="submit">
<input class="button" type="submit" tabindex="100" value="log in"/>
</p>
</form>
</div>
