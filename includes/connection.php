<?php
//Database hostname
$db_host = 'localhost';
// your database username
$db_user = 'hulettpu_statsdb';
//your database password
$db_pass = 'ImDewy41Stat$';
//database for which you wish to connec to
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
