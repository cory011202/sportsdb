<?php 
#######################################################
#This is the page that processes the defensive stats  #
#and sets up the page to enter Kicking/Punt stats.    #
#This page is processed by addScoringSummaryToDb.php  #
#######################################################
require_once('includes/header.php');  
require_once('includes/functions.php');
require_once("includes/connection.php");
//Build the query to get the game you just entered
$getLastGameRecordId = "SELECT MAX(Id),homeTeam,awayTeam FROM footballGameInformation";
//execute the query
$result = mysql_query($getLastGameRecordId)
          or die(mysql_error());
//Set the last game entered variable          
$lastGameRecordId = mysql_fetch_array($result);
//Set the home and away team names
$hTeam = $lastGameRecordId[1];
$aTeam = $lastGameRecordId[2];
echo $hTeam;
echo $aTeam;

//Foreach loop to iterate through the players entered.
foreach($_POST['player'] as $key => $player){

    //every row has the same key in the post array, so the key for

    //the player name's will be the same key for his stats. so we can do

    //Get the player info ID, L name, F name

    $playerName = $_POST['player'][$key];

    //Delimit $playerName by space 

    $playerName = preg_split("/[\s]+/",$playerName);

    //Get the player ID out of the delimiter

    $playerId = $playerName[0];
    
    $teamId = $playerName[1];

    $puntRet = $_POST['stat1'][$key];
    
    $puntRetYds = $_POST['stat2'][$key];
    
    $puntRetTd = $_POST['stat3'][$key];
    
    $kickRet = $_POST['stat4'][$key];
    
    $kickRetYds = $_POST['stat5'][$key];
    
    $kickRetTd = $_POST['stat6'][$key];
        
//Query to insert data into footballGameInformation table of the database
$insertFootballGameInfoTbl = "INSERT INTO footballKickPuntReturns(id,gameId,playerId,teamId,puntRet,puntRetyards,puntRetTd,kickRet,kickRetYards,                                                                        kickRetTd)
                              VALUES (NULL,'$lastGameRecordId[0]','$playerId','$teamId','$puntRet','$puntRetYds','$puntRetTd','$kickRet','$kickRetYds'                                                                  ,'$kickRetTd')";
                                                   
//execute the query
$result = mysql_query($insertFootballGameInfoTbl)
          or die(mysql_error());

}
?>  
<div id="wrapper">
    <div id="title">Enter Scoring Summary data.</div>

<?php
//get Left Column
  require_once('includes/left_column.php');
?>
<div id="right_column">
</div>
<table align="center" width="780 px" name="aDefData">
    <tr><form method="post" action="addFootballScoreSummaryToDb.php">
        <td align="center">
        <!--function to populate tbl headers-->
        <?php 
                            
              echo "<tr><td colspan=\"4\" align=\"center\">1st Quarter</td></tr>";
              populateTblHeaders("Team,Qtr,Time,Score Summary");
              echo "<!--This is the 1st Qtr Row-->";
              populateScoreSummaryTbl($aTeam,$hTeam,"10","1st","1");
              echo "<!--This is the 2nd Qtr Row-->";
              echo "<tr><td colspan=\"4\" align=\"center\">2nd Quarter</td></tr>";
              populateScoreSummaryTbl($aTeam,$hTeam,"10","2nd","2");
              echo "<!--This is the 3rd Qtr Row-->";
              echo "<tr><td colspan=\"4\" align=\"center\">3rd Quarter</td></tr>";
              populateScoreSummaryTbl($aTeam,$hTeam,"10","3rd","3");
              echo "<!--This is the 4th Qtr Row-->";
              echo "<tr><td colspan=\"4\" align=\"center\">4th Quarter</td></tr>";
              populateScoreSummaryTbl($aTeam,$hTeam,"10","4th","4");
              echo "<!--This is the OT Row-->";
              echo "<tr><td colspan=\"4\" align=\"center\">Over Time</td></tr>";
              populateScoreSummaryTbl($aTeam,$hTeam,"10","OT","ot");
        ?>
        <tr>
            <td><INPUT type="submit" value="Submit" name="submit" /></td>
            <td><INPUT type="reset" value="Clear" name="clear" /></td> 
        </tr>
    </td>
    </tr>
</table>

</form>
</div>          
<?php
//get html footer
  require_once('includes/footer.php');
?>      
</div>  