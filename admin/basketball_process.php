<?php
//connect to the db
	require_once('includes/connection.php');
//get html header
    require_once('includes/header.php');
//Get Functions  
    require_once('includes/functions.php');
//Set boys or girls variable
$gender = $_POST['gender'];

//away team results
$aTeamID = $_POST['aTeam'];
$hTeamID = $_POST['hTeam'];


//get html header with java code
  require_once('includes/left_column.php');
?>
<div id="right_column">
		
</table>
     <?php
      //Open the form
	  echo "<form method=\"POST\" action=\"stats_process.php\">\n";
	  //Table for Away stats input
      echo"<table align=\"center\" width=\"780 px\" name=\"aStatsInput\">\n";
      echo "<tr>\n";
      echo"<td align=\"center\" colspan=\"14\"><INPUT type = \"hidden\" name=\"aTeamID\" value=\"" . $aTeamID . "\"/>
	  <b>Away Team </b>" .
	  $aTeam . "</td>\n";
      echo "</tr>\n";
      //function to populate tbl headers
	  populatePlayerTblHeaders("fgM, fgA, ftM, ftA, 3ptM, 3ptA, OReb, DReb, Assts, Steals, Fouls, TFouls, Turnovrs");
	  populatePlayerTblNames($aTeamID, "aplayer", $gender);
	  //ends the away table
	  echo "</table>\n";
	  //Table for Home stats input
	  echo"<table align=\"center\" width=\"780 px\"  id=\"hStatsInput\">\n";
      echo "<tr>";
      echo"<td align=\"center\" colspan=\"14\"><INPUT type = \"hidden\" name=\"hTeamID\" value=\"" . $hTeamID . "\"/>
	  <b>Home Team </b>" .
	  $hTeam . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
	  populatePlayerTblHeaders("fgM, fgA, ftM, ftA, 3ptM, 3ptA, OReb, DReb, Assts, Steals, Fouls, TFouls, Turnovrs");
	  populatePlayerTblNames($hTeamID, "hplayer", $gender);	
	  echo "<tr>\n";
	  echo "<td style=\"table-layout: fixed; align: center; colspan=\"14\"\" align=\"center\" colspan=\"14\">
	  <INPUT type=\"submit\" value=\"Submit\" name=\"submit\" /><INPUT type=\"reset\" value=\"Clear\" /></td>\n";
	  echo "</tr>\n";
	  //ends the home table
	  echo "</table>\n";
	  echo "</form>\n";
	 ?>

<?php
//get html footer
  require_once('includes/footer.php');
?>