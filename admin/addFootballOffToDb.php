<?php 
#####################################################
#This is the page that processes the offensive stats#
#and sets up the page to enter Defensive stats. This#
#page is processed by addFoorballDefToDb.php        #
#####################################################
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

    $rushAtt = $_POST['stat1'][$key];
    
    $rushYds = $_POST['stat2'][$key];
    
    $rushTd = $_POST['stat3'][$key];
    
    $passAtt = $_POST['stat4'][$key];
    
    $passComp = $_POST['stat5'][$key];
    
    $passYds = $_POST['stat6'][$key];
    
    $passTd = $_POST['stat7'][$key];
    
    $passInt = $_POST['stat8'][$key];
    
    $receptions = $_POST['stat9'][$key];
    
    $recYds = $_POST['stat10'][$key];
    
    $recTd = $_POST['stat11'][$key];
//Query to insert data into footballGameInformation table of the database
$insertFootballGameInfoTbl = "INSERT INTO footballOffStats(id,gameId,playerId,teamId,rushAtt,rushYards,rushTd,passAtt,passComp,passYards,passTd,
                                                                          passInt,receptions,recYards,recTd)
                              VALUES (NULL,'$lastGameRecordId[0]','$playerId','$teamId','$rushAtt','$rushYds','$rushTd','$passAtt','$passComp',
                                                   '$passYds','$passTd','$passInt','$receptions','$recYds','$recTd')";
                                                   
//execute the query
$result = mysql_query($insertFootballGameInfoTbl)
          or die(mysql_error());

}
?>  
<div id="wrapper">
    <div id="title">Enter Defense game data.</div>

<?php
//get Left Column
  require_once('includes/left_column.php');
?>
<div id="right_column">
</div>
<table align="center" width="780 px" name="aDefData">
    <tr><form method="post" action="addFootballDefToDb.php">
        <td align="center" colspan="14"><input type = "hidden" name="aTeam" value="<?php echo $aTeam;?>"><b>Away Team </b><?php setTeamName($aTeam);?></td>
    </tr><!--function to populate tbl headers-->
        <?php 
              populatePlayerTblHeaders("Tackle Solo,Tackle Asst,Tackle For Loss,Int,Int Yds,Int Td,Fumble Rec,Fumble Yds,Fumble Td");
              populateTeamPlayers($aTeam,"9");     
        ?>
</table>
<table align="center" width="780 px" name="hDefData">
    <tr>
        <td align="center" colspan="14"><input type = "hidden" name="hTeam" value="<?php echo $hTeam;?>"><b>Home Team </b><?php setTeamName($hTeam);?></td>
    </tr><!--function to populate tbl headers-->
        <?php 
              populatePlayerTblHeaders("Tackle Solo,Tackle Asst,Tackle For Loss,Int,Int Yds,Int Td,Fumble Rec,Fumble Yds,Fumble Td");
              populateTeamPlayers($hTeam,"9");     
        ?>
        <tr>
            <td><INPUT type="submit" value="Submit" name="submit" /></td>
            <td><INPUT type="reset" value="Clear" name="clear" /></td> 
        </tr></form>
</table>
</div>          
<?php
//get html footer
  require_once('includes/footer.php');
?>      
</div>  