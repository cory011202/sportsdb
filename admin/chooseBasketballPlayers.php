<?php
//connect to the db
	require_once('includes/connection.php');
//get html header
    require_once('includes/header.php');
//Get Functions  
    require_once('includes/functions.php');
//Foreach statement to take the game info and split it out for the individual vataibles need for the rest of the page.
foreach($_POST['gameid'] as $gameInfo) {
    //Split the game info by space and create an array called gameInfo
    $gameInfo=preg_split("/[\s]+/",$gameInfo);
    //Set gameID variable from the gameInfo array
    $gameID = $gameInfo[0];
    //Set gender variable from the gameInfo array
    $gender = $gameInfo[1];
    //Set aTeamID variable from the gameInfo array
    $aTeamID = $gameInfo[2];
    //Set hTeamID variable from the gameInfo array
    $hTeamID = $gameInfo[3];
} 
//echo $gender;
//away team 
$result = mysql_query("SELECT * FROM teams WHERE ID = '$aTeamID'")
      	or die(mysql_error());
while ($row = mysql_fetch_array($result)) {    
    $aTeam = $row['team_name'];
}


$result = mysql_query("SELECT * FROM teams WHERE ID = '$hTeamID'")
      	or die(mysql_error());
while ($row = mysql_fetch_array($result)) {
    $hTeam = $row['team_name'];
}
?>
<div id="title">Choose a player below.</div>
<div id="wrapper">
<?php

//get Left Column
  require_once('includes/left_column.php');
?>
<div id="right_column">
    <table align="center">
        <form method="POST" action="addBasketballPlayerStats.php">
            <tr>
                <td colspan="2" id="title"><input type="hidden" name="gameid" value="<?php echo $gameID;?>"/></td>
            </tr>
            <tr>
                <td align="center" width="200"><input type="hidden" name="aTeam" value="<?php echo $aTeam;?>"/><?php echo $aTeam;?></td>
                <td align="center" width="200"><input type="hidden" name="hTeam" value="<?php echo $hTeam;?>"/><?php echo $hTeam;?></td>
            </tr>
            <tr>
                <td align="center" width="200">
                    <table >
                        <tr>
                            <td><?php populateChoosePlayerTblNames($aTeamID, "aplayer", $gender);?></td>
                        </tr>                    
                    </table>
                </td>
                <td align="center" width="200">
                    <table>
                        <tr>
                            <td><?php populateChoosePlayerTblNames($hTeamID, "hplayer", $gender);?></td>
                        </tr>                    
                    </table>
                </td>
            <tr>
			    <?php
                    //populateChoosePlayerTblNames($aTeamID, "aplayer", $gender);                        
                
                    //populateChoosePlayerTblNames($hTeamID, "hplayer", $gender);
                ?>              
            </tr>
            <tr>
                <td align="center" colspan="3"><INPUT type="submit" value="Submit" name="submit" /><INPUT type="reset" value="Clear" /></td>
            </tr>
        </form>
    </table>            
</div> 
</div>   
<?php
//get html footer
  require_once('includes/footer.php');
?>
