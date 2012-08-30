<?php
#######################################################
#This is the page that processes the defensive stats  #
#and sets up the page to enter Kicking/Punt stats.    #
#This page is processed by addFootballKickPuntToDb.php#
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
/*$hTeam = 5;
$aTeam = 19;*/
/*echo "Printing Array";
print_r($_POST['player']) ;*/
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

    $tackleSolo = $_POST['stat1'][$key];

    $tackleAsst = $_POST['stat2'][$key];

    $tackleForLoss = $_POST['stat3'][$key];

    $interceptions = $_POST['stat4'][$key];

    $intYds = $_POST['stat5'][$key];

    $intTd = $_POST['stat6'][$key];

    $fumbleRec = $_POST['stat7'][$key];

    $fumbleYds = $_POST['stat8'][$key];

    $fumbleTd = $_POST['stat9'][$key];
    //Create an array out of the stats that can be checked for null values
    $statsArray = array($tackleSolo,
                        $tackleAsst,
                        $tackleForLoss,
                        $interceptions,
                        $intYds,
                        $intTd,
                        $fumbleRec,
                        $fumbleYds,
                        $fumbleTd);

//Query to insert data into footballGameInformation table of the database
    $insertFootballGameInfoTbl = "INSERT INTO footballDefStats(id,gameId,playerId,teamId,tackleSolo,tackleAsst,tackleFLoss,interceptions,intYards,intTd,                                                                            fumbleRec,fumbleYards,fumbleTd)
                              VALUES (NULL,'$lastGameRecordId[0]','$playerId','$teamId','$tackleSolo','$tackleAsst','$tackleForLoss','$interceptions',                                                   '$intYds','$intTd','$fumbleRec','$fumbleYds','$fumbleTd')";

    //if statement that checks the array for all keys to be null and if they are all null
    //do not put the name in the database
    if (array_filter($statsArray) != null){
        //execute the query
        $result = mysql_query($insertFootballGameInfoTbl)
            or die(mysql_error());
    }
}
?>
<div id="wrapper">
    <div id="title">Enter Kicking/Punting game data.</div>

    <?php
//get Left Column
    require_once('includes/left_column.php');
    ?>
    <div id="right_column">
    </div>
    <table align="center" width="780 px" name="aDefData">
        <tr><form method="post" action="addFootballKickPuntToDb.php">
            <td align="center" colspan="14"><input type = "hidden" name="aTeam" value="<?php echo $aTeam;?>"><b>Away Team </b><?php setTeamName($aTeam);?></td>
        </tr><!--function to populate tbl headers-->
        <?php
        populatePlayerTblHeaders("PAT Att,PAT Made,Two PT,FG Att,FG Made,FG Long,Punt,Punt Yds,Kickoff T-Backs");
        populateTeamPlayers("football",$aTeam,"9");
        ?>
    </table>
    <table align="center" width="780 px" name="hDefData">
        <tr>
            <td align="center" colspan="14"><input type = "hidden" name="hTeam" value="<?php echo $hTeam;?>"><b>Home Team </b><?php setTeamName($hTeam);?></td>
        </tr><!--function to populate tbl headers-->
        <?php
        populatePlayerTblHeaders("PAT Att,PAT Made,Two PT,FG Att,FG Made,FG Long,Punt,Punt Yds,Kickoff T-Backs");
        populateTeamPlayers("football",$hTeam,"9");
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

