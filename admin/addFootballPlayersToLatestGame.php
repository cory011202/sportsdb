<?php 
require_once('includes/header.php');  
require_once('includes/functions.php');
require_once("includes/connection.php");
//Build the query to get the game you just entered
$getLastGameRecordId = "SELECT MAX(Id) FROM footballGameInformation";
//execute the query
$result = mysql_query($getLastGameRecordId)
          or die(mysql_error());
//Set the last game entered variable          
$lastGameRecordId = mysql_fetch_array($result);
//echo $lastGameRecordId;
?>
<div id="right_column">
</div>
<table id=""align="center" >
    <tr>
        <form method="POST" action="addFootballGameToDb.php">
            <td>
                <tr>
                    <td colspan="8">Date: <input class="blue1" id="datepicker" type="text" name="gameDate"></td>
                </tr>
                <tr>
                    <?php
                        populateTblHeaders('Location,Teams,Q1,Q2,Q3,Q4,OT,F Downs');
                    ?>
                </tr>
                <tr>          
                    <td>Away Team</td>
                    <td>            
                        <?php
                            populateTeamCbo('aTeam');
                            populateScoresTblInput('aQ1,aQ2,aQ3,aQ4,aOt,aFd');
                        ?>    
                    </td>
                <tr>
                </tr>
                    <td>Home Team</td>
                    <td>
                        <?php
                            populateTeamCbo('hTeam');
                            populateScoresTblInput('hQ1,hQ2,hQ3,hQ4,hOt,hFd');
                        ?>          
                    </td>                    
                </tr>
                <tr>
                    <td><INPUT type="submit" value="Submit" name="submit" /></td>
                    <td><INPUT type="reset" value="Clear" name="clear" /></td> 
                </tr>
            </td>
        </form>
    </tr>
</table>
</div>          
<?php
//get html footer
  require_once('includes/footer.php');
?>      
</div>    