<?php
//connect to the db
	require_once('includes/connection.php');
//get html header
    require_once('includes/header.php');
//Get functions
    require_once('includes/functions.php');
?>
<div id="wrapper">
<?php  
//Left Column
    require_once('includes/left_column.php');
//away team results
$aTeam = $_POST['aTeam'];
$aOrec = $_POST['aOrec'];
$aCrec = $_POST['aCrec'];
$aQ1 = $_POST['aQ1'];
$aQ2 = $_POST['aQ2'];
$aQ3  = $_POST['aQ3'];
$aQ4  = $_POST['aQ4'];
$aOt  = $_POST['aOt'];
$aFinal  = $aQ1 + $aQ2 + $aQ3 + $aQ4 + $aOt;
//Set away short name
//list teams names querery	
/*	$a_abbr = mysql_query("SELECT team_name FROM teams WHERE ID='$aTeamID'")
	or die(mysql_error());
	while ($row = mysql_fetch_array($a_abbr)) {
    $aTeam=$row["team_name"]; }*/

//home team results
$hTeam = $_POST['hTeam'];
$hOrec = $_POST['hOrec'];
$hCrec = $_POST['hCrec'];
$hQ1 = $_POST['hQ1'];
$hQ2 = $_POST['hQ2'];
$hQ3  = $_POST['hQ3'];
$hQ4  = $_POST['hQ4'];
$hOt  = $_POST['hOt'];
$hFinal  = $hQ1 + $hQ2 + $hQ3 + $hQ4 + $hOt;

//list teams names querery	
/*	$h_abbr = mysql_query("SELECT team_name FROM teams WHERE ID='$hTeamID'")
	or die(mysql_error());
	while ($row = mysql_fetch_array($h_abbr)) {
    //echo $row["ID"]
    $hTeam=$row["team_name"]; }*/
?>
<!--Start copying here-->
<table style="margin-left: auto; margin-right: auto; border=0;" border="0" align="center">
    <tr>
        <td style="text-align=center" colspan="8"><strong><?php echo $aTeam . " " . $aFinal . ", " . $hTeam . " " . $hFinal;?></strong></td>
    </tr>
    <tr>
        <?php
        //This function puts the headers on the basketball_process.php page.
          populateScoresTblHeaders("Teams, Rec, Conf, Q1, Q2, Q3, Q4, OT, Final");
    	?>
    </tr>
    <tr>
        <?php
        //This is the function that will post and display the team and quarter information from basketball.php
          populateScoresTbl("$aTeam, $aOrec, $aCrec, $aQ1, $aQ2, $aQ3, $aQ4, $aOt, $aFinal");
    	?>
    </tr>
    <tr>
        <?php
        //This is the function that will post and display the team and quarter information from basketball.php
          populateScoresTbl("$hTeam, $hOrec, $hCrec, $hQ1, $hQ2, $hQ3, $hQ4, $hOt, $hFinal");
    	?>
    </tr>		
</table>
<table>
  <tr>
  	<?php
    //This function puts the headers on the away team.
      populatePlayerTblHeaders("fgM,fgA,ftM,ftA,3ptM,3ptA,OReb,DReb,Blocks,Assts,Steals,Fouls,TFouls,Turnovrs");
	?>
  </tr>
<?php
//Code to determine the year to put in the stats
$school_Yr = setSchoolYear();
//split the current school year into two parts for query
$school_Yr = preg_split("/[\/]+/",$school_Yr);
//Query to determine the ID of the school year for entry
$schoolYearQuery = "SELECT ID
					FROM school_yr
					WHERE year1 = $school_Yr[0] AND year2 = $school_Yr[1]";
//Execute the school year ID query
$result = mysql_query($schoolYearQuery)
							 or die(mysql_error());
//Create the array from the school year query
while($row = mysql_fetch_array( $result )) {	
		$school_Yr = $row[0];
		}			

//POST the team IDs from the basketball process page
$aTeamID = $_POST['aTeamID'];
$hTeamID = $_POST['hTeamID'];
//Get the players and info for the away team
foreach($_POST['aplayer'] as $key => $player){
	//every row has the same key in the post array, so the key for
	//the player name's will be the same key for his stats. so we can do
	//Get the player info ID, L name, F name
	$aplayerName = $_POST['aplayer'][$key];
	//Delimit $playerName by space 
	$aplayerName = preg_split("/[\s]+/",$aplayerName);
	//Get the player ID out of the delimiter
	$aplayerID = $aplayerName[0];
	$afg_made = $_POST['astat1'][$key];
	$afg_attempts = $_POST['astat2'][$key];
	$aft_made = $_POST['astat3'][$key];
	$aft_attempts = $_POST['astat4'][$key];
	$athree_made = $_POST['astat5'][$key];
	$athree_attempts = $_POST['astat6'][$key];
	$aoff_rebs = $_POST['astat7'][$key];
	$adef_rebs = $_POST['astat8'][$key];
    $ablocks = $_POST['astat9'][$key];
	$aassists = $_POST['astat10'][$key];
	$asteals = $_POST['astat11'][$key];
	$afouls = $_POST['astat12'][$key];
	$atech_fouls = $_POST['astat13'][$key];
	$aturn_overs = $_POST['astat14'][$key];
	echo "<tr>\n";
	//Check to see if the player is in the db already
	$aplayerExistence = "SELECT COUNT(player_ID),school_yr
						FROM basketball_stats
						WHERE player_ID='$aplayerID'
						GROUP BY 'player_ID'";
	$aplayerExistence = mysql_query($aplayerExistence)
							 or die(mysql_error());
	//Create Array from playerExistence query
    while($row = mysql_fetch_array($aplayerExistence)){
	$aplayerExist = $row[0];
	$schoolYearExistence = $row[1];
   /* print_r($row);
    echo "this " . $aplayerExist;*/
}
//IF statement to see if the player exists and it is the current year or not
IF ($aplayerExist == 1 AND $schoolYearExistence == $school_Yr){			
	//Get current db stats for players
	$curStats = "SELECT player_ID, fg_made, fg_attempts, ft_made, ft_attempts, three_made, three_attempts,
				off_rebs, def_rebs, blocks assists, steals, fouls, tech_fouls, turn_overs, games_played
				FROM basketball_stats
				WHERE player_ID='$aplayerID'";
	//Execute the query for current stats
	$aresult = mysql_query($curStats)
							 or die(mysql_error());	
	//Create the array from the current stats query
    while($row = mysql_fetch_array( $aresult )) {
		$acur_fg_made = $row['fg_made'];
		$acur_fg_attempts = $row['fg_attempts'];
		$acur_ft_made = $row['ft_made'];
		$acur_ft_attempts = $row['ft_attempts'];
		$acur_three_made = $row['three_made'];
		$acur_three_attempts = $row['three_attempts'];
		$acur_off_rebs = $row['off_rebs'];
		$acur_def_rebs = $row['def_rebs'];
        $acur_blocks = $row['blocks'];
		$acur_assists = $row['assists'];
		$acur_steals = $row['steals'];
		$acur_fouls = $row['fouls'];
		$acur_tech_fouls = $row['tech_fouls'];
		$acur_turn_overs = $row['turn_overs'];
        $acur_games_played = $row['games_played'];
		
		//Varibales for the update
		$afg_made = $acur_fg_made + $afg_made;
		$afg_attempts = $acur_fg_attempts + $afg_attempts;
		$aft_made = $acur_ft_made + $aft_made;
		$aft_attempts = $acur_ft_attempts + $aft_attempts;
		$athree_made = $acur_three_made + $athree_made;
		$athree_attempts = $acur_three_attempts + $athree_attempts;
		$aoff_rebs = $acur_off_rebs + $aoff_rebs;
		$adef_rebs = $acur_def_rebs + $adef_rebs;
        $ablocks = $acur_blocks + $ablocks;
		$aassists = $acur_assists + $aassists;
		$asteals = $acur_steals + $asteals;
		$afouls = $acur_fouls + $afouls;
		$atech_fouls = $acur_tech_fouls + $atech_fouls;
		$aturn_overs = $acur_turn_overs + $aturn_overs;
        $agames_played = $acur_games_played+1;
		
		$updateQuery ="
			  UPDATE
				  basketball_stats
			  SET
			      fg_made='$afg_made', fg_attempts='$afg_attempts', ft_made='$aft_made', ft_attempts='$aft_attempts', 
				  three_made='$athree_made', three_attempts='$athree_attempts', off_rebs='$aoff_rebs', def_rebs='$adef_rebs', blocks='$ablocks',
                  assists='$aassists', steals='$asteals', fouls='$afouls', tech_fouls='$atech_fouls', turn_overs='$aturn_overs', school_yr = '$school_Yr',
                  games_played = '$agames_played'
			  WHERE player_ID='$aplayerID'";
		$result = mysql_query($updateQuery)
							  or die(mysql_error());
	}//END While loop for update query
}//End IF statement
ELSE {
            $agames_played =1;
			//Build the Query to insert data into database
			$insertQuery = "
			  INSERT INTO
				  basketball_stats(id, player_ID, sports_ID, conf_ID, team_ID, fg_made, fg_attempts, ft_made, ft_attempts, 
				  three_made, three_attempts, off_rebs, def_rebs, blocks, assists, steals, fouls, tech_fouls, turn_overs, school_yr, games_played)
			  VALUES
				  (NULL,'$aplayerID','2','12','$aTeamID','$afg_made','$afg_attempts','$aft_made','$aft_attempts','$athree_made','$athree_attempts'
                  ,'$aoff_rebs','$adef_rebs', '$ablocks', '$aassists','$asteals','$afouls','$atech_fouls','$aturn_overs','$school_Yr', '$agames_played')";
        //Execute the query
			$result = mysql_query($insertQuery)
									 or die(mysql_error());
}//end ELSE statement   
			//Display the information on the page.
			echo "<td>" . $aplayerName[1] . " " . $aplayerName[2]. "</td>\n<td>" . $afg_made . "</td>\n<td>" . $afg_attempts . 
			  "</td>\n<td>" . $aft_made . "</td>\n<td>" . $aft_attempts . "</td>\n<td>" . $athree_made . 
			  "</td>\n<td>" . $athree_attempts . "</td>\n<td>" . $aoff_rebs . "</td>\n<td>" . $adef_rebs . "</td>\n<td>" . $ablocks . 
			  "</td>\n<td>" . $aassists . "</td>\n<td>" . $asteals . "</td>\n<td>" . $afouls . 
			  "</td>\n<td>" . $atech_fouls . "</td>\n<td>" . $aturn_overs . "</td>";	
			echo "</tr>\n";
}//End foreach loop

echo "<tr>";
  	
    //This function puts the headers on home team.
      populatePlayerTblHeaders("fgM,fgA,ftM,ftA,3ptM,3ptA,OReb,DReb,Blocks,Assts,Steals,Fouls,TFouls,Turnovrs");

echo "</tr>";		
		
//Get the players and info for the home team
foreach($_POST['hplayer'] as $key => $player){
	//every row has the same key in the post array, so the key for
	//the player name's will be the same key for his stats. so we can do
	//Get the player info ID, L name, F name
	$playerName = $_POST['hplayer'][$key];
	//Delimit $playerName by space 
	$playerName = preg_split("/[\s]+/",$playerName);
	//Get the player ID out of the delimiter
	$playerID = $playerName[0];
	$fg_made = $_POST['hstat1'][$key];
	$fg_attempts = $_POST['hstat2'][$key];
	$ft_made = $_POST['hstat3'][$key];
	$ft_attempts = $_POST['hstat4'][$key];
	$three_made = $_POST['hstat5'][$key];
	$three_attempts = $_POST['hstat6'][$key];
	$off_rebs = $_POST['hstat7'][$key];
	$def_rebs = $_POST['hstat8'][$key];
    $blocks = $_POST['hstat9'][$key];
	$assists = $_POST['hstat10'][$key];
	$steals = $_POST['hstat11'][$key];
	$fouls = $_POST['hstat12'][$key];
	$tech_fouls = $_POST['hstat13'][$key];
	$turn_overs = $_POST['hstat14'][$key];
	echo "<tr>\n";
	//Check to see if the player is in the db already
	$playerExistence = "SELECT COUNT(player_ID),school_yr
						FROM basketball_stats
						WHERE player_ID='$playerID'
						GROUP BY 'player_ID'";
	$playerExistence = mysql_query($playerExistence)
							 or die(mysql_error());
	//Create Array from playerExistence query
    while($row = mysql_fetch_array($playerExistence)){
	$hplayerExist = $row[0];
	$schoolYearExistence = $row[1];
}

//IF statement to see if the player exists and it is the current year or not
IF ($hplayerExist == 1 AND $schoolYearExistence == $school_Yr){			
	//Get current db stats for players
	$curStats = "SELECT player_ID, fg_made, fg_attempts, ft_made, ft_attempts, three_made, three_attempts,
				off_rebs, def_rebs, blocks, assists, steals, fouls, tech_fouls, turn_overs, games_played
				FROM basketball_stats
				WHERE player_ID='$playerID'";
	//Execute the query for current stats
	$hresult = mysql_query($curStats)
							 or die(mysql_error());	
    //Create the array from the current stats query
	while($row = mysql_fetch_array( $hresult )) {
		$cur_fg_made = $row['fg_made'];
		$cur_fg_attempts = $row['fg_attempts'];
		$cur_ft_made = $row['ft_made'];
		$cur_ft_attempts = $row['ft_attempts'];
		$cur_three_made = $row['three_made'];
		$cur_three_attempts = $row['three_attempts'];
		$cur_off_rebs = $row['off_rebs'];
		$cur_def_rebs = $row['def_rebs'];
        $cur_blocks = $row['blocks'];
		$cur_assists = $row['assists'];
		$cur_steals = $row['steals'];
		$cur_fouls = $row['fouls'];
		$cur_tech_fouls = $row['tech_fouls'];
		$cur_turn_overs = $row['turn_overs'];
	    $cur_games_played = $row['games_played'];
		//Varibales for the update
		$fg_made = $cur_fg_made + $fg_made;
		$fg_attempts = $cur_fg_attempts + $fg_attempts;
		$ft_made = $cur_ft_made + $ft_made;
		$ft_attempts = $cur_ft_attempts + $ft_attempts;
		$three_made = $cur_three_made + $three_made;
		$three_attempts = $cur_three_attempts + $three_attempts;
		$off_rebs = $cur_off_rebs + $off_rebs;
		$def_rebs = $cur_def_rebs + $def_rebs;
        $blocks = $cur_blocks + $blocks;
		$assists = $cur_assists + $assists;
		$steals = $cur_steals + $steals;
		$fouls = $cur_fouls + $fouls;
		$tech_fouls = $cur_tech_fouls + $tech_fouls;
		$turn_overs = $cur_turn_overs + $turn_overs;
		$games_played = $cur_games_played+1;
		$updateQuery ="
			  UPDATE
				  basketball_stats
			  SET
			      fg_made='$fg_made', fg_attempts='$fg_attempts', ft_made='$ft_made', ft_attempts='$ft_attempts', 
				  three_made='$three_made', three_attempts='$three_attempts', off_rebs='$off_rebs', def_rebs='$def_rebs', blocks='$blocks',
                   assists='$assists', steals='$steals', fouls='$fouls', tech_fouls='$tech_fouls', turn_overs='$turn_overs', school_yr='$school_Yr',
                   games_played='1' 
			  WHERE player_ID='$playerID'";
		$result = mysql_query($updateQuery)
							  or die(mysql_error());
	}//END While loop for update query
}//End IF statement
ELSE {
            $games_played=1;
			//Build the Query to insert data into database
			$insertQuery = "
			  INSERT INTO
				  basketball_stats(id, player_ID, sports_ID, conf_ID, team_ID, fg_made, fg_attempts, ft_made, ft_attempts, 
				  three_made, three_attempts, off_rebs, def_rebs, blocks, assists, steals, fouls, tech_fouls, turn_overs, school_yr, games_played)
			  VALUES
				  (NULL,'$playerID','2','12','$hTeamID','$fg_made','$fg_attempts','$ft_made','$ft_attempts','$three_made','$three_attempts','$off_rebs', 
                  '$def_rebs','$blocks','$assists','$steals','$fouls','$tech_fouls','$turn_overs','$school_Yr', '$games_played')";
        //Execute the query
			$result = mysql_query($insertQuery)
									 or die(mysql_error());

}//end ELSE statement   

			//Display the information on the page.
		echo "<td>" . $playerName[1] . " " . $playerName[2]. "</td>\n<td>" . $fg_made . "</td>\n<td>" . $fg_attempts . 
			  "</td>\n<td>" . $ft_made . "</td>\n<td>" . $ft_attempts . "</td>\n<td>" . $three_made . 
			  "</td>\n<td>" . $three_attempts . "</td>\n<td>" . $off_rebs . "</td>\n<td>" . $def_rebs . "</td>\n<td>" . $blocks . 
			  "</td>\n<td>" . $assists . "</td>\n<td>" . $steals . "</td>\n<td>" . $fouls . 
			  "</td>\n<td>" . $tech_fouls . "</td>\n<td>" . $turn_overs . "</td>";	
			echo "</tr>\n";;
}//End foreach loop

?>
</table>
<!--Stop Copying Here-->

<?php
//get html footer
  require_once('includes/footer.php');
?>
</div>