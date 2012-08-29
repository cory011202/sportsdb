<?php
function populateTeamCbo($team){
	echo "<select class = \"blue1\" name=\"" . $team . "\" >\n";
	echo "\t\t\t\t<option value=\"\">Choose Team</option>\n";
				//list teams name querery	
					$cur_teams = mysql_query("SELECT ID,team_name
                                              FROM teams")
					or die(mysql_error());
				$i=0;
				// loop to display info from db					
					while ( $row = mysql_fetch_array($cur_teams)) {
                        $i++;
                        //Begin the row for the table
                        //code to alternate color and build the table
                        if($i % 2){//this divied $i by 2 and if there is a remainder
                            $bgColor = "blue2";
                        }else {//This means that $i divided by 2 is an even number
                          $bgColor = "blue1";
                         }
						 //build the drop down menus with the appropriate team id
				    	 echo "\t\t\t\t<option class=\"" . $bgColor . "\" value=\"" . $row['0'] . "\">" . $row['team_name'] . "</option>\n";
			    //end loop	
				}
                //end the drop down
				echo "</select><br />";
                
}

function setTeamName($teamId){
    $getTeamName = mysql_query("SELECT team_name FROM teams WHERE ID ='$teamId'");
    $teamName = mysql_fetch_array($getTeamName);
    echo $teamName[0];
}

function populateTeamPlayers($sport,$teamId,$a){
    $i = "0";
    if($sport == "football"){
        $getPlayers = mysql_query("SELECT id,teamId,lName,fName FROM footballPlayerInfo WHERE teamId = '$teamId' ORDER BY lName");
        }
    else{
        $getPlayers = mysql_query("SELECT id,teamId,lName,fName FROM volleyballPlayerInfo WHERE teamId = '$teamId' ORDER BY lName");
    }
    //While loop to display the players for the team
    while ($player = mysql_fetch_array($getPlayers)){
        $i++;
        //code to alternate color and build the table
        if($i % 2){//this divided $i by 2 and if there is a remainder
            echo "<tr bgcolor=\"#dbe5f1\" id=\"row" . $i . "\">\n";}
        else {//This means that $i divided by 2 is an even number
             echo "<tr bgcolor=\"#b8cce4\" id=\"row" . $i . "\">\n";
        }
        echo "<td><input type=\"hidden\" name=\"player[] \" value=\"" . $player[0] . " " . $player[1] . " " . $player[2] . " " . $player[3] . "\" />" . $player[2] . " " . $player[3] . "</td>\n";        
            for ($r = 1; $r<=$a; $r++) {
                //insert the input boxes
                echo "<td><INPUT style=\" width:100%\" name=\"stat" . "$r" . "[]\" type=\"text\" size=\"1\"></td>\n";
            //End input box for loop
            }
        echo "</tr>\n";
    }
}

function populateScoresTblInput($args) {
	
	$options= array();
	$options=preg_split("/[,]+/",$args);
//print_r($options);
	foreach($options as $option){
	//	echo "hello";
		echo "\t\t<td><input style=\" width:100%\" class=\"blue1\" name=\"" . $option . "\" type=\"text\"" . "size=\"1\">" . "<br /></td>\n";
	}
}

function populateScoresTbl($args) {	
	$options= array();
	$options=preg_split("/[,]+/",$args);
//print_r($options);
	foreach($options as $option){
	//	echo "hello";
		echo "<td>" . $option . "</td>\n";
	}
}

function populateScoreSummaryTbl($aTeam,$hTeam,$i,$qtrScreen,$qtrPost){
    //Get the away team short name
    $getATeamName = mysql_query("SELECT team_ID FROM teams WHERE ID ='$aTeam'");
    $aTeamName = mysql_fetch_array($getATeamName);
    $aTeamShortName = $aTeamName[0];
    //Get the home team short name
    $getHTeamName = mysql_query("SELECT team_ID FROM teams WHERE ID ='$hTeam'");
    $hTeamName = mysql_fetch_array($getHTeamName);
    $hTeamShortName = $hTeamName[0];    
    //Build the selection box for scoring summary entry
    for($r = 1; $r<=$i; $r++){
                        //code to alternate color and build the table
                        if($r % 2){//this divided $i by 2 and if there is a remainder
                            $bgColor = "blue1";
                        }else {//This means that $i divided by 2 is an even number
                          $bgColor = "blue2";
                         }
        echo "<tr class=\" " . $bgColor . "\">
                <td><input style=\" width:100%\" type=\"hidden\" name=\"summary[]\" value=\"" . $r . "\"/><select class=\"blue1\" name=\"stat1[]\">
                    <option value=\"\">Team</option>
                    <option class=\"blue1\" value=\"" . $aTeam . "\">" . $aTeamShortName . "</option>
                    <option class=\"blue2\" value=\"" . $hTeam . "\">" . $hTeamShortName . "</option>                
                </td>               
                <td><input style=\" width:100%\" type=\"hidden\" name=\"stat2[]\" value=\"" . $qtrPost . "\"/>" . $qtrScreen . "</td>
                <td><input style=\" width:100%\" type=\"text\" name=\"stat3[]\" size=\"1\"/></td>
                <td><input style=\" width:100%\" type=\"text\" name=\"stat4[]\"/></td>                
              </tr>\n";

    } 
}

function populateTblHeaders($args) {
	
	$options= array();
	$options=preg_split("/[,]+/",$args);
//print_r($options);
            echo "<tr>";
	foreach($options as $option){
	//	echo "hello";
		echo "\t\t<th>" . $option . "</th>\n";
	}
        echo "</tr>";
}

function populatePlayerTblHeaders($args) {
    //opens the header row
    //echo "<tr>\n";
    //sets header for player box due to needing to be wider than the rest
	echo "\t<th style=\"table-layout: fixed; align: left; width: 100 px;\">Player</th>\n";
	$options= array();
	$options=preg_split("/[,]+/",$args);
	foreach($options as $option){
	 //sets headers for input boxes
		echo "\t<th>" . $option . "</th>\n";
	}
	//close the header row
	  //echo "</tr>\n";
}

function populatePlayerTblNames($Players, $location) {	  
     foreach($Players as $player) {
	   $player=preg_split("/[\s]+/",$player);
	   	  //Initialize the coutner for the alt row color if statement
	  	  $i++;
	  	  //Begin the row for the table
	  	  //code to alternate color and build the table
            if($i % 2){//this divied $i by 2 and if there is a remainder
	 	     echo "<tr bgcolor=\"#dbe5f1\" id=\"row" . $i . "\">\n";}
	 	    else {//This means that $i divided by 2 is an even number
	 	     echo "<tr bgcolor=\"#b8cce4\" id=\"row" . $i . "\">\n";
	 	    }
           
	      //list the player name for the team
	       echo "<td><input type=\"hidden\" name=\"" . $location. "[] \" value=\"" . $player[0] . " " . $player[1] . " " . $player[2] . "\" />" .
		   $player[1] . " " . $player[2] . "</td>\n";
		   //If statement to determine home or away players
          if ($location == "aplayer"){
            //For loop to insert input boxes for player stats
            for ($r = 1; $r<15; $r++) {
                //insert the input boxes
                echo "<td><INPUT name=\"astat" . "$r" . "[]\" type=\"text\" size=\"1\"></td>\n";
			//End input box for loop
            }
          //end If statement begin else
          }
          else{
          //For loop to insert input boxes for player stats
            for ($r = 1; $r<15; $r++) {
                //insert the input boxes
                echo "<td><INPUT name=\"hstat" . "$r" . "[]\" type=\"text\" size=\"1\"></td>\n";			
            }//End input box for loop
          }	//end IF Else Statement	
	      echo "</tr>\n";
		  //End player while loop
	  }
//End Function
}

function populateChoosePlayerTblNames($teamID, $location, $gender) {	  
      //Code to determine the year for the graduation year query
      $school_Yr = setSchoolYear();
      //split the current school year into two parts for query
      $school_Yr = preg_split("/[\/]+/",$school_Yr);
      //Set the school year variable
      $school_Yr = $school_Yr[1];
      
      //Query for players
      $boysQuery = "SELECT id, lName, fName
                    FROM bBallPlayerInfo 
                    WHERE teamId = '$teamID'
                    AND boy = '1'
                    ORDER BY lName";
      /*$boysQuery = "SELECT id, lName, fName
                    FROM bBallPlayerInfo 
                    WHERE teamId = '$teamID'
                    AND boy = '1'
                    AND gradYear >='$school_Yr'
                    ORDER BY lName";
      $girlsQuery = "SELECT id, lName, fName
                    FROM bBallPlayerInfo
                    WHERE teamId = '$teamID'
                    AND boy = '0'
                    AND gradYear >= '$school_Yr'
                    ORDER BY lName";*/
      $girlsQuery = "SELECT id, lName, fName
                    FROM bBallPlayerInfo
                    WHERE teamId = '$teamID'
                    AND boy = '0'
                    ORDER BY lName";
      if ($gender == "1"){
        $aPlayers = mysql_query($boysQuery)
      	or die(mysql_error());
      }
      else {
        $aPlayers = mysql_query($girlsQuery)
      	or die(mysql_error());  
      }
	  $i =0;
  	  //Loop to display players
	  while ($row = mysql_fetch_array($aPlayers)) {           
          $i++;
          $bgColor = setRowOddEven($i);
	      //list the player name for the team and add check boxes
          if ($location == "aplayer"){
            echo "\n<tr class=\"" .  $bgColor . "\"><td><input  type=\"checkbox\" name=\"aplayer[]\" value=\"" . $row['id'] . " " . $row['lName'] . " " . $row['fName'] . "\"  />"
			. $row['lName'] . " " . $row['fName'] . "</td></tr>\n";
            }
          ELSE{
            echo "\n<tr class=\"" .  $bgColor . "\"><td><input type=\"checkbox\" name=\"hplayer[]\" value=\"" . $row['id'] . " " . $row['lName'] . " " . $row['fName'] . "\"  />"
			. $row['lName'] . " " . $row['fName'] . "</td></tr>\n";    
          }
	      
		   
          //End player while loop
	  }//echo "</td>";
//End Function
}

function setSchoolYear(){
	$currentDate = date("Ym");
    $currentYear = date("Y");
	if($currentDate > $currentYear . "07"){
		//echo "School Year: " . $currentYear . "/" . ($currentYear + 1) ;
		$schoolYear = $currentYear . "/" . ($currentYear + 1);
		return $schoolYear;
	}
	else{
		//echo "School Year: " . ($currentYear - 1) . "/" . $currentYear;
		$schoolYear = ($currentYear - 1) . "/" . $currentYear;
		return $schoolYear;
	}	
}

function displayCurrentWorkingGame($gameID){
    //Query to get current games in db
    $getCurrentGames = "SELECT g.id, g.gameDate, g.boys,g.tournament,a.teamId,h.teamId, SUM(a.awayQ1 + a.awayQ2 + a.awayQ3 + a.awayQ3 + a.awayOt) as awaytotal,
                        SUM(h.homeQ1 + h.homeQ2 + h.homeQ3 + h.homeQ3 + h.homeOt) as hometotal 
                        FROM bBallGameInfo g, bBallAwayInfo a, bBallHomeInfo h, teams t
                        WHERE g.id = '$gameID'
                        AND g.awayTeamInfoId=a.id
                        AND g.homeTeamInfoId = h.id
                        AND a.teamId = t.id
                        AND a.teamId = t.id
                        Group By g.id";
    $result = mysql_query($getCurrentGames)
              or die(mysql_error());
    while($row = mysql_fetch_array($result)){
        //if statement to set gender and tourney
        if ($row['2']== 1){
            $gender = Boys;
        }else{
            $gender = Girls;
        }
            if ($row['3']== 1){
            $tournament = Yes;
        }else{
            $tournament = No;
        }
        $awayTeamID = $row['4'];
        $getAwayTeamName = "Select team_name from teams where id = $awayTeamID";
        $resulta = mysql_query($getAwayTeamName)
                  or die(mysql_errno());
        $awayTeamName = mysql_fetch_array($resulta);
        $homeTeamID = $row['5'];
        $getHomeTeamName = "Select team_name from teams where id = $homeTeamID";
        $resultb = mysql_query($getHomeTeamName)
                  or die(mysql_errno());
        $homeTeamName = mysql_fetch_array($resultb);
        ?>
        <table>
            <tr>
                <td colspan="3"><strong>Game you are entering players for:</strong></td>
            </tr>
            <tr>
                <td colspan="3">Date: <?php echo $row['1'];?></td>
            </tr>
            <tr>
                <td>Away Team:</td>            
                <td><?php echo $awayTeamName[0];?></td>
                <td><?php echo $row['6'];?></td>
            </tr>
            <tr>
                <td>Home Team:</td>
                <td><?php echo $homeTeamName[0];?></td>
                <td><?php echo $row['7'];?></td>
            </tr>
        </table>
        
    <?php
    //End of while loop
    }
    
//End of function
}

function getCurrentWorkingGame($location,$gameID){
        //Query to get current games in db
    $getCurrentGames = "SELECT g.id, g.gameDate, g.boys,g.tournament,a.teamId,h.teamId, SUM(a.awayQ1 + a.awayQ2 + a.awayQ3 + a.awayQ3 + a.awayOt) as awaytotal,
                        SUM(h.homeQ1 + h.homeQ2 + h.homeQ3 + h.homeQ3 + h.homeOt) as hometotal 
                        FROM bBallGameInfo g, bBallAwayInfo a, bBallHomeInfo h, teams t
                        WHERE g.id = '$gameID'
                        AND g.awayTeamInfoId=a.id
                        AND g.homeTeamInfoId = h.id
                        AND a.teamId = t.id
                        AND a.teamId = t.id
                        Group By g.id";
    $result = mysql_query($getCurrentGames)
              or die(mysql_error());
    while($row = mysql_fetch_array($result)){

        $awayTeamID = $row['4'];
        $getAwayTeamName = "Select team_name, conf_ID from teams where id = $awayTeamID";
        $resulta = mysql_query($getAwayTeamName)
                  or die(mysql_errno());
        $awayTeamName = mysql_fetch_array($resulta);
        $awayConfID = $awayTeamName[1]; 
        $homeTeamID = $row['5'];
        $getHomeTeamName = "Select team_name,conf_ID from teams where id = $homeTeamID";
        $resultb = mysql_query($getHomeTeamName)
                  or die(mysql_errno());
        $homeTeamName = mysql_fetch_array($resultb);
        $homeConfID = $homeTeamName[1];
        if($location == away){
        ?>
        <input type="hidden" name="agameid[]" value="<?php echo $row['0'] . " " . $awayConfID . " " . $awayTeamID?>">        
        <?php
        }else{
        ?>
            <input type="hidden" name="hgameid[]" value="<?php echo $row['0'] . " " . $homeConfID . " " . $homeTeamID?>">
        <?php
        }       
    //End of while loop
    }    
//End of function
}

function setRowOddEven($i){
                        //Begin the row for the table
                        //code to alternate color and build the table
                        if($i % 2){//this divied $i by 2 and if there is a remainder
                            $bgColor = "blue1";
                        }else {//This means that $i divided by 2 is an even number
                          $bgColor = "blue2";
                         }
                        return $bgColor;
}
?>
