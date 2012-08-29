<?
//connect to the db
	require_once('includes/connection.php');
//Gets the athlete information from the Athlete page
	//$school_Yr = $_POST['school_yr'];
	$lName = $_POST['lName'];
	$fName = $_POST['fName'];
	$teamID = $_POST['teamName'];
	$gradYear = $_POST['gradYear'];
//Query to insert data into database
	$result = mysql_query("
	  INSERT INTO
		  footballPlayerInfo(id, teamID, lName, fName, gradYear)
	  VALUES
		  (NULL, '$teamID', '$lName', '$fName','$gradYear') 
		")//End Query
	  or die(mysql_error());  
//pulls in the header with java
	require_once('includes/header.php');
//pulls in the left column
	require_once('includes/left_column.php');
//Lets the user know the athelte was succesfully added
echo "<br />" . $fName . " " . $lName . " was succesfully added to the database.<br />";
//Code to give the option to add another athlete.
echo "Click <a href=\"addFootballPlayer.php\"><font color=\"red\" size=\"3px\">here</font></a> to add another Football player or Choose another action on from the left.";
//Get the footer for the page.
require_once('includes/footer.php'); 
?>
