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
$aQ1 = $_POST['aQ1'];
$aQ2 = $_POST['aQ2'];
$aQ3 = $_POST['aQ3'];
$aQ4 = $_POST['aQ4'];
$aOt = $_POST['aOt'];
$aFd = $_POST['aFd'];
$aPen = $_POST['aPen'];
$aPenYds= $_POST['aPenYds'];

//Home team stats
$hTeam = $_POST['hTeam'];
$hQ1 = $_POST['hQ1'];
$hQ2 = $_POST['hQ2'];
$hQ3 = $_POST['hQ3'];
$hQ4 = $_POST['hQ4'];
$hOt = $_POST['hOt'];
$hFd = $_POST['hFd'];
$hPen = $_POST['hPen'];
$hPenYds= $_POST['hPenYds'];
//echo $date;
//Query to insert data into footballGameInformation table of the database
$insertFootballGameInfoTbl = "INSERT INTO footballGameInformation(ID,date,
                                            homeTeam,homeFirstDowns,homePenalties,homePenaltyYards,homeQ1,homeQ2,homeQ3,homeQ4,homeOt,
                                            awayTeam,awayFirstDowns,awayPenalties,awayPenaltyYards,awayQ1,awayQ2,awayQ3,awayQ4,awayOt)
                              VALUES (NULL,'$date','$hTeam','$hFd','$hPen','$hPenYds','$hQ1','$hQ2','$hQ3','$hQ4','$hOt',
                                                   '$aTeam','$aFd','$aPen','$aPenYds','$aQ1','$hQ2','$hQ3','$hQ4','$hOt')";
                                                   
//execute the query
$result = mysql_query($insertFootballGameInfoTbl)
          or die(mysql_error());

//Build the query to get the game you just entered
$getLastGameRecordId = "SELECT MAX(Id) FROM footballGameInformation";
//execute the query
$result = mysql_query($getLastGameRecordId)
          or die(mysql_error());
$lastGameRecordId = mysql_fetch_array($result);
//echo $lastGameRecordId["0"];
?>
<div id="wrapper">
    <div id="title">Enter Offense game data.</div>

<?php
//get Left Column
  require_once('includes/left_column.php');
?>
<div id="right_column">
</div>
<table align="center" width="780 px" name="aOffData">
    <tr><form method="post" action="addFootballOffToDb.php">
        <td align="center" colspan="14"><input type = "hidden" name="aTeam" value="<?php echo $aTeam;?>"><b>Away Team </b><?php setTeamName($aTeam);?></td>
    </tr><!--function to populate tbl headers-->
        <?php
              populatePlayerTblHeaders("Rush Att,Rush Yds,Rush Td,Pass Att,Pass Comp,Pass Yds,Pass Td,Pass Int,Rec,Rec Yds,Rec Td");
              populateTeamPlayers("football",$aTeam,"11");
        ?>
</table>
<table align="center" width="780 px" name="hOffData">
    <tr>
        <td align="center" colspan="14"><input type = "hidden" name="hTeam" value="<?php echo $hTeam;?>"><b>Home Team </b><?php setTeamName($hTeam);?></td>
    </tr><!--function to populate tbl headers-->
        <?php
              populatePlayerTblHeaders("Rush Att,Rush Yds,Rush Td,Pass Att,Pass Comp,Pass Yds,Pass Td,Pass Int,Rec,Rec Yds,Rec Td");
              populateTeamPlayers("football",$hTeam,"11");
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

