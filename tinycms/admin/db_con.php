<?php
$connection=mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname,$connection) or die (mysql_error());
?>