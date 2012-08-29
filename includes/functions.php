<?php
function populateTeamCbo($team){
	echo "<select name=\"" . $team . "\" >\n";
	echo "\t\t\t\t<option value=\"\">Choose Team</option>\n";
				//list a teams names querery	
					$cur_teams = mysql_query("SELECT ID,team_name 
											 FROM teams")
											 or die(mysql_error());
				
				// loop to display info from db
					$i = 0;
					while ( $row = mysql_fetch_array($cur_teams)) {
						$i++;
				    	echo "\t\t\t\t<option value=\"" . $row['ID'] . "\">" . $row['team_name'] . "</option>\n";
			    //end loop	
				}
				echo "</select><br />";
}


function populateScoresTblInput($args) {	
	$options= array();
	$options=preg_split("/[,]+/",$args);
//print_r($options);
	foreach($options as $option){
	//	echo "hello";
		echo "\t\t<td><INPUT name=\"" . $option . "\" type=\"text\"" . "size=\"1\">" . "<br /></td>\n";
	}
}

function populateScoresTbl($args) {	
	$options= array();
	$options=preg_split("/[,]+/",$args);
//print_r($options);
	foreach($options as $option){
	//	echo "hello";
		echo "\t\t<td>" . $option . "</td>";
	}
}

function populateScoresTblHeaders($args) {	
	$options= array();
	$options=preg_split("/[,]+/",$args);
//print_r($options);
	foreach($options as $option){
	//	echo "hello";
		echo "\t\t<td>" . $option . "</td>\n";
	}
}

function populatePlayerTblHeaders($args) {
    //opens the header row
    echo "<tr>\n";
    //sets header for player box due to needing to be wider than the rest
	echo "\t<th style=\"table-layout: fixed; align: left; width: 100 px;\" >Player</th>\n";
	$options= array();
	$options=preg_split("/[,]+/",$args);
	foreach($options as $option){
	 //sets headers for input boxes
		echo "\t<th>" . $option . "</th>\n";
	}
	//close the header row
	  echo "</tr>\n";
}

function populateQueryPlayerTblHeaders($args) {
    //opens the header row
   // echo "<tr>\n";
    //sets header for player box due to needing to be wider than the rest
	
	$options= array();
	$options=preg_split("/[,]+/",$args);
	foreach($options as $option){
	 //sets headers for input boxes
		echo "\t<th class=\"sorttable_numeric\">" . $option . "</th>\n";
	}
	//close the header row
	  echo "</tr>\n";
}

function populatePlayerTblNames($teamID) { 
	  //Query for players
	  $aPlayers = mysql_query("SELECT ID, l_name, f_name, number
	  						  FROM player_info
							  WHERE team_ID = '$teamID'
							  AND b_bball = '1'
							  ORDER BY number")
      						  or die(mysql_error());
  	  //Loop to display players
	  while ($row = mysql_fetch_array($aPlayers)) {
	   	  //Initialize the coutner for the alt row color if statement
	  	  $i++;
	  	  //Begin the row for the table
	  	  //code to alternate color and build the table
	  	  if($i % 2){//this divied $i by 2 and if there is a remainder
	 	    echo "<tr bgcolor=\"white\" id=\"row" . $i . "\">\n";}
	 	    else {//This means that $i divided by 2 is an even number
	 	    echo "<tr bgcolor=\"#aaaaaa\" id=\"row" . $i . "\">\n";
	 	    }
	      //list the player name for the team
	       echo "<td><input type=\"hidden\" name=\"aplayer[]\" value=\"" . $row["ID"] . " " .
		   $row["l_name"] . " " . $row["f_name"] . "\" />" . $row["l_name"] . " " . $row["f_name"] . "</td>\n";
		  //For loop to insert input boxes for player stats
	      for ($r = 1; $r<14; $r++) {
	       	//insert the input boxes
			echo "<td><INPUT name=\"stat" . "$r" . "[]\" type=\"text\" size=\"1\"></td>\n";
		  }//End input box for loop
	      echo "</tr>\n";  
		  //End player while loop
	  }
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
?>
