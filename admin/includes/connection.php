<?php
//Database hostname
$db_host = 'localhost';
// your database username
#$db_user = 'hulettpu_statsdb';
$db_user = 'root';
//your database password
#$db_pass = 'ImDewy41Stat$';
$db_pass = 'FmintASS69';
//database for which you wish to connect to
$db_name = 'hulettpu_tssrstats';
//the db connection
$con = mysql_connect($db_host, $db_user, $db_pass);
if (!$con){
	die("Cannon connect. " . mysql_error());
}
//the db name selection
$dbselect = mysql_select_db($db_name);
if(!$dbselect) {
	die("Cannot select database. " . mysql_error());
}
?>
