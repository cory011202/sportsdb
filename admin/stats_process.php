<?php
//connect to the db
	require_once('includes/connection.php');
//get html header                           
    require_once('includes/header.php');
//Get functions 
    require_once('includes/functions.php');
 foreach($_POST['agameid'] as $gameInfo) {
    //Split the game info by space and create an array called gameInfo
    $gameInfo=preg_split("/[\s]+/",$gameInfo);
    //Set gameID variable from the gameInfo array
    $gameID = $gameInfo[0];
    //Set aconfID variable from the gameInfo array
    $aConfID = $gameInfo[1];
    //Set aTeamID variable from the gameInfo array
    $aTeamID = $gameInfo[2];
 }
  foreach($_POST['hgameid'] as $gameInfo) {
    //Split the game info by space and create an array called gameInfo
    $gameInfo=preg_split("/[\s]+/",$gameInfo);
    //Set gameID variable from the gameInfo array
    //$gameID = $gameInfo[0];
    //Set hconfID variable from the gameInfo array
    $hConfID = $gameInfo[1];
    //Set hTeamID variable from the gameInfo array
    $hTeamID = $gameInfo[2];
 }
//Left Column
    require_once('includes/left_column.php');
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
			//Build the Query to insert data into database                                                                                               
			$aInsertQuery = "                                                                                                                             
			  INSERT INTO
                  bBallStats(id, gameInfoID, teamID, playerInfoID, confID, fgMade, fgAttempts, ftMade, ftAttempts,
                  threeMade, threeAttempts, offRebs, defRebs, blocks, assists, steals, fouls, techFouls, turnOvers, schoolYear)
              VALUES
                  (NULL,'$gameID','$aTeamID','$aplayerID','$aConfID','$fg_made','$fg_attempts','$ft_made','$ft_attempts','$three_made','$three_attempts','$off_rebs',
                  '$def_rebs','$blocks','$assists','$steals','$fouls','$tech_fouls','$turn_overs','$school_Yr')";
        //Execute the query
			$result = mysql_query($aInsertQuery)
			          or die(mysql_error());

}//End foreach loop
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
    //Build the Query to insert data into database
    $hInsertQuery = "
			  INSERT INTO
				  bBallStats(id, gameInfoID, teamID, playerInfoID, confID, fgMade, fgAttempts, ftMade, ftAttempts,
				  threeMade, threeAttempts, offRebs, defRebs, blocks, assists, steals, fouls, techFouls, turnOvers, schoolYear)
			  VALUES
				  (NULL,'$gameID','$hTeamID','$playerID','$hConfID','$fg_made','$fg_attempts','$ft_made','$ft_attempts','$three_made','$three_attempts','$off_rebs',
                  '$def_rebs','$blocks','$assists','$steals','$fouls','$tech_fouls','$turn_overs','$school_Yr')";
        //Execute the query                                                                                                       
			$result = mysql_query($hInsertQuery)
			          or die(mysql_error()); 
}//End foreach loop 
//get html footer   
  require_once('includes/footer.php');
?>
