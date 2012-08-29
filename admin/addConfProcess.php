<?
//connect to the db
	require_once('includes/connection.php');
//Gets the Conference information from the conf admin page
	$conf_Name = $_POST['conf_name'];
	$conf_ID = $_POST['conf_ID'];
//Query to insert data into database
	$result = mysql_query("INSERT INTO conference (id, conf_ID, conf_name) VALUES (NULL, '$conf_ID', '$conf_Name') ") or die(mysql_error());  
//pulls in the header with java
	require_once('includes/header.php');
//pulls in the left column
	require_once('includes/left_column.php');
echo "<br />The " . $conf_Name . " conference with a short name of " . $conf_ID . " was succesfully added to the database";

	require_once('includes/footer.php'); 
?>
