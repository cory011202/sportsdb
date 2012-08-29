<?php
//connect to the db
require_once('includes/connection.php');
//get html header
require_once('includes/header.php');  
require_once('includes/functions.php');
//game date
$gameDate = $_POST['gamedate'];

//tournament
$tournament = $_POST['tournament'];
//gender
$gender = $_POST['gender'];

//away team results

$aTeam = $_POST['aTeam'];

$aQ1 = $_POST['aQ1'];

$aQ2 = $_POST['aQ2'];

$aQ3  = $_POST['aQ3'];

$aQ4  = $_POST['aQ4'];

$aOt  = $_POST['aOt'];

$aFinal  = $aQ1 + $aQ2 + $aQ3 + $aQ4 + $aOt;

//home team results

$hTeam = $_POST['hTeam'];

$hQ1 = $_POST['hQ1'];

$hQ2 = $_POST['hQ2'];

$hQ3  = $_POST['hQ3'];

$hQ4  = $_POST['hQ4'];

$hOt  = $_POST['hOt'];

//if statements to set variable for tournament and gender
if($tournament == on){
    $tournament=1;
}
if($gender == boys){
    $gender=1;
}
//get Left Column
  require_once('includes/left_column.php');
?>
<div id="right_column">
<?php
$hFinal  = $hQ1 + $hQ2 + $hQ3 + $hQ4 + $hOt; 
echo "Tournament: " . $tournament;
echo "<br />Game date: " . $gameDate;
echo "<br />boys: " . $gender;
echo "<br /> Away Final: " . $aFinal . "<br />Home Final: " . $hFinal;

//query to get last homeInfo record inserted
$getLastGameRecordID = "select MAX(id) from bBallGameInfo";
//execute the query
$result = mysql_query($getLastGameRecordID)
          or die(mysql_error());
$lastGameRecordID = mysql_fetch_array($result);

$lastGameRecordID = $lastGameRecordID[0];
$lastGameRecordID++;
//echo " Game ID " . $lastGameRecordID[0];
//query to insert home info data
$insertIntoHomeInfoTbl = "INSERT INTO bBallHomeInfo(id,gameInfoId, teamId,homeQ1,homeQ2,homeQ3,homeQ4,homeOt)
                          VALUES (NULL,'$lastGameRecordID','$hTeam','$hQ1','$hQ2','$hQ3','$hQ4','$hOt')";
//execute the query
$result = mysql_query($insertIntoHomeInfoTbl)
          or die(mysql_error());
//query to get last homeInfo record inserted
$getLastHomeInfoRecordID = "select MAX(id) from bBallHomeInfo";
//execute the query
$result = mysql_query($getLastHomeInfoRecordID)
          or die(mysql_error());
$lastHomeTeamInfoID = mysql_fetch_array($result);

///query to insert away info data
$insertIntoAwayInfoTbl = "INSERT INTO bBallAwayInfo(id,gameInfoId,teamId,awayQ1,awayQ2,awayQ3,awayQ4,awayOt)
                          VALUES (NULL,'$lastGameRecordID','$aTeam','$aQ1','$aQ2','$aQ3','$aQ4','$aOt')";
//execute the query
$result = mysql_query($insertIntoAwayInfoTbl)
          or die(mysql_error());
//query to get last awayInfo record inserted
$getLastAwayInfoRecordID = "select MAX(id) from bBallAwayInfo";
//execute the query
$result = mysql_query($getLastAwayInfoRecordID)
          or die(mysql_error());
$lastAwayTeamInfoID = mysql_fetch_array($result);

//query to insert data into gameinfo table
$insertIntoGameInfoTbl = "INSERT INTO bBallGameInfo(id,gameDate,boys,tournament,awayTeamInfoId,homeTeamInfoId)
                          VALUES (NULL,'$gameDate','$gender','$tournament','$lastAwayTeamInfoID[0]','$lastHomeTeamInfoID[0]')";
//execute the query
$result = mysql_query($insertIntoGameInfoTbl)
          or die(mysql_error());
?>
</div>
<?php
//get html footer
  require_once('includes/footer.php');
?>      
