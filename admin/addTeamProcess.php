<?
//connect to the db
	require_once('includes/connection.php');
//Gets the Conference information from the conf admin page
	$team_Name = $_POST['team_name'];
	$team_ID = $_POST['team_ID'];
	$team_Div = $_POST['team_div'];

	$conference = $_POST['conf'];
	if ($DEBUG == 1) {
		echo "$conference \n";
	}

//Query for primary key from conf_ID
	$conf_ID = mysql_query("SELECT ID FROM conference WHERE conf_ID='$conference'")
	or die(mysql_error());
	while ($row = mysql_fetch_array($conf_ID)) {
    	$conf_ID=$row["ID"]; }
	if ($DEBUG == 1) {
		
	}

//Query to insert data into database
	$result = mysql_query("INSERT INTO teams (ID, team_ID, team_name, team_div, conf_ID) VALUES ( NULL, '$team_ID', '$team_Name', '$team_Div', '$conf_ID') ") or die(mysql_error());  
//pulls in the header with java
	require_once('includes/header.php');
//pulls in the left column
	require_once('includes/left_column.php');
echo "<br />The " . $team_Name . " team with a short name of " . $team_ID . " was succesfully added to the database";

	require_once('includes/footer.php'); 
?>
