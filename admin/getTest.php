<?php
require_once('includes/header.php');  
require_once('includes/functions.php');
require_once("includes/connection.php"); 
    $gameId = $_GET["gameId"];
    echo $gameId;
    
//Build the query to get the game you just entered
$getLastGameRecordId = "SELECT * FROM footballGameInformation WHERE Id = '$gameId'";
//execute the query
$result = mysql_query($getLastGameRecordId)
          or die(mysql_error());
//Set the last game entered variable          
$lastGameRecordId = mysql_fetch_array($result);
//Set the home and away team game information
$gameDate = $lastGameRecordId['date'];
//home team results
$homeTeam = $lastGameRecordId['homeTeam'];
$homeFirstDowns = $lastGameRecordId['homeFirstDowns'];
$homeQ1 = $lastGameRecordId['homeQ1'];
$homeQ2 = $lastGameRecordId['homeQ2'];
$homeQ3 = $lastGameRecordId['homeQ3'];
$homeQ4 = $lastGameRecordId['homeQ4'];
$homeOt = $lastGameRecordId['homeOt'];
$homeFinal  = $homeQ1 + $homeQ2 + $homeQ3 + $homeQ4 + $homeOt;
//away team results
$awayTeam = $lastGameRecordId['awayTeam'];
$awayFirstDowns = $lastGameRecordId['awayFirstDowns'];
$awayQ1 = $lastGameRecordId['awayQ1'];
$awayQ2 = $lastGameRecordId['awayQ2'];
$awayQ3 = $lastGameRecordId['awayQ3'];
$awayQ4 = $lastGameRecordId['awayQ4'];
$awayOt = $lastGameRecordId['awayOt'];
$awayFinal  = $awayQ1 + $awayQ2 + $awayQ3 + $awayQ4 + $awayOt;
    //Get the away team short name
    $getATeamName = mysql_query("SELECT * FROM teams WHERE ID ='$awayTeam'");
    $aTeamName = mysql_fetch_array($getATeamName);
    $aTeamShortName = $aTeamName[1];
    $aTeamLongName = $aTeamName[2];
    //Get the home team short name
    $getHTeamName = mysql_query("SELECT * FROM teams WHERE ID ='$homeTeam'");
    $hTeamName = mysql_fetch_array($getHTeamName);
    $hTeamShortName = $hTeamName[1];
    $hTeamLongName = $hTeamName[2];

echo $gameDate . "<br />";
echo $homeTeam . " " . $homeFirstDowns . " " . $homeQ1 . " " . $homeQ2 . " " . $homeQ3 . " " . $homeQ4 . " " . $homeOt . " " . $homeFinal . "<br />";
echo $awayTeam . " " . $awayFirstDowns . " " . $awayQ1 . " " . $awayQ2 . " " . $awayQ3 . " " . $awayQ4 . " " . $awayOt . " " . $awayFinal . "<br />";
?>
<table style="margin-left: auto; margin-right: auto; border=0;" border="0" align="center">
    <tr>
        <td style="text-align:center" colspan="8"><strong><?php echo $gameDate . " " . $aTeamLongName . " " . $awayFinal . ", " . $hTeamLongName . " " . $homeFinal;?></strong></td>
    </tr>
    <tr>
        <th style="text-align:center"></th>
        <th style="text-align:center">Firsts</th>
        <th style="text-align:center">Q1</th>
        <th style="text-align:center">Q2</th>
        <th style="text-align:center">Q3</th>
        <th style="text-align:center">Q4</th>
        <th style="text-align:center">OT</th>
        <th style="text-align:center">Final</th>
    </tr>
    
    <tr>
        <td style="text-align:center"><?php echo $hTeamShortName;?></td>
        <td style="text-align:center"><?php echo $homeFirstDowns;?></td>
        <td style="text-align:center"><?php echo $homeQ1;?></td>
        <td style="text-align:center"><?php echo $homeQ2;?></td>
        <td style="text-align:center"><?php echo $homeQ3;?></td>
        <td style="text-align:center"><?php echo $homeQ4;?></td>
        <td style="text-align:center"><?php echo $homeOT;?></td>
        <td style="text-align:center"><?php echo $homeFinal;?></td>
    </tr>
    <tr>
        <td style="text-align:center"><?php echo $aTeamShortName;?></td>
        <td style="text-align:center"><?php echo $awayFirstDowns;?></td>
        <td style="text-align:center"><?php echo $awayQ1;?></td>
        <td style="text-align:center"><?php echo $awayQ2;?></td>
        <td style="text-align:center"><?php echo $awayQ3;?></td>
        <td style="text-align:center"><?php echo $awayQ4;?></td>
        <td style="text-align:center"><?php echo $awayOT;?></td>
        <td style="text-align:center"><?php echo $awayFinal;?></td>
    </tr>
</table>