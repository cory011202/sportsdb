<?php
//connect to the db
require_once('includes/connection.php');
//get html header
require_once('includes/header.php');  
require_once('includes/functions.php');
?>
<div id="title">Choose team to add players.</div>
<div id="wrapper">
<?php
//get Left Column
  require_once('includes/left_column.php');
?>
<div id="right_column">
</div>
<table id=""align="center" >
    <tr>
        <form method="POST" action="choose_player.php">
            <td>
                <tr>
                    <?php
                        populateTblHeaders('Choose,Date,Gender,Tourney,Away Team,Score,Home Team,Score');
                    ?>
                </tr>
<?php
//Query to get current games in db
$getCurrentGames = "SELECT g.ID, g.gameDate, g.boys,g.tournament,a.teamID,h.teamID, SUM(a.awayQ1 + a.awayQ2 + a.awayQ3 + a.awayQ3 + a.awayOt) as awaytotal,
                    SUM(h.homeQ1 + h.homeQ2 + h.homeQ3 + h.homeQ3 + h.homeOt) as hometotal 
                    FROM gameInfo g, awayInfo a, homeInfo h, teams t
                    WHERE g.awayTeamInfoID=a.ID
                    AND g.homeTeamInfoID = h.ID
                    AND a.teamID = t.ID
                    AND a.teamID = t.ID
                    Group By g.ID";
$result = mysql_query($getCurrentGames)
          or die(mysql_error());
          $i=0;
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
    $i++;
    $bgColor = setRowOddEven($i);
    $awayTeamID = $row['4'];
    $getAwayTeamName = "Select team_name from teams where ID = $awayTeamID";
    $resulta = mysql_query($getAwayTeamName)
              or die(mysql_errno());
    $awayTeamName = mysql_fetch_array($resulta);
    $homeTeamID = $row['5'];
    $getHomeTeamName = "Select team_name from teams where ID = $homeTeamID";
    $resultb = mysql_query($getHomeTeamName)
              or die(mysql_errno());
    $homeTeamName = mysql_fetch_array($resultb);
?>
    <tr class="<?php echo $bgColor;?>">
        <td align="center"><input type="radio" name="gameid[]" value="<?php echo $row['0'] . " " . $row['2'] . " " . $awayTeamID . " " . $homeTeamID;?>"></td>
        <td><?php echo $row['1'];?></td>
        <td align="center"><?php echo $gender;?></td>
        <td align="center"><?php echo $tournament;?></td>
        <td><?php echo $awayTeamName[0];?></td>
        <td align="center"><?php echo $row['6'];?></td>
        <td><?php echo $homeTeamName[0];?></td>
        <td align="center"><?php echo $row['7'];?></td>
    </tr>
    
<?php
}
?>
<tr>    
    <td colspan="7"><INPUT type="submit" value="Add Players" name="submit" /><INPUT type="reset" value="Clear" name="clear" /></td>
    </form>
</tr>
</tr>
</table>
</div>
