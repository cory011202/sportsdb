<?php 
#####################################################
#This is the page that processes the base game stats#
#and sets up the page to enter Offensive stats. This#
#page is processed by addFoorballOfffToDb.php       #
#####################################################
require_once('includes/header.php');  
require_once('includes/functions.php');
require_once("includes/connection.php");
$date = $_POST["gameDate"];
//Away team stats
$aTeam = $_POST['aTeam'];
/*$aG1 = $_POST['aG1'];
$aG2 = $_POST['aG2'];
$aG3 = $_POST['aG3'];
$aG4 = $_POST['aG4'];
$aG5 = $_POST['aG5'];*/

//Home team stats
$hTeam = $_POST['hTeam'];
/*$hG1 = $_POST['hG1'];
$hG2 = $_POST['hG2'];
$hG3 = $_POST['hG3'];
$hG4 = $_POST['hG4'];
$hG5 = $_POST['hG5'];*/

//echo $date;
//Query to insert data into footballGameInformation table of the database
$insertVolleyballMatchInfoTbl = "INSERT INTO volleyballMatchInformation(ID,date,homeTeam,awayTeam)
                              VALUES (NULL,'$date','$hTeam','$aTeam')";
                                                   
//execute the query
$result = mysql_query($insertVolleyballMatchInfoTbl)
          or die(mysql_error());

//Build the query to get the game you just entered
$getLastGameRecordId = "SELECT MAX(Id) FROM volleyballMatchInformation";
//execute the query
$result = mysql_query($getLastGameRecordId)
          or die(mysql_error());
$lastGameRecordId = mysql_fetch_array($result);
//echo $lastGameRecordId["0"];
?>
<div id="wrapper">
    <div id="title">Enter game 1 data.</div>

<?php
//get Left Column
  require_once('includes/left_column.php');
?>
<div id="right_column">
</div>
<table align="center" width="780 px" name="aOffData">
    <tr><form method="post" action="addVolleyballOffToDb.php">
        <td align="center" colspan="14"><input type = "hidden" name="aTeam" value="<?php echo $aTeam;?>"><b>Away Team </b><?php setTeamName($aTeam);?></td>
    </tr><!--function to populate tbl headers-->
        <?php populatePlayerTblHeaders("Kills,Kill Err,Attack Att,Serve Succ,Serves,Aces,Assists,Digs,Block Asst,Block Solo");
              populateTeamPlayers("volleyball",$aTeam,"10");
        ?>
</table>
<table align="center" width="780 px" name="hOffData">
    <tr>
        <td align="center" colspan="14"><input type = "hidden" name="hTeam" value="<?php echo $hTeam;?>"><b>Home Team </b><?php setTeamName($hTeam);?></td>
    </tr><!--function to populate tbl headers-->
        <?php populatePlayerTblHeaders("Kills,Kill Err,Attack Att,Serve Succ,Serves,Aces,Assists,Digs,Block Asst,Block Solo");
              populateTeamPlayers("volleyball",$hTeam,"10");
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

