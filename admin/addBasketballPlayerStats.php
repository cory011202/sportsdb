<?php 

//connect to the db

	require_once('includes/connection.php');

//get html header with java code

  require_once('includes/header.php');

  

    require_once('includes/functions.php'); 

/*$aPlayers = $_POST['aplayer'];

 //Loop to display players

foreach($aPlayers as $player) {

$Players=preg_split("/[\s]+/",$player);

echo "Hello " . $Players[0] . " " . $Players[1] . " " . $Players[2] . "<br>" ;

}

$hPlayers = $_POST['hplayer'];

foreach($hPlayers as $hplayer){

 //echo $hplayer;

}*/

$aTeam = $_POST['aTeam'];

$hTeam = $_POST['hTeam'];



//echo $aTeam;

//echo $hTeam;

	

?>

<div id="wrapper">

<div id="title">Enter basketball player stats below.</div>

<?php

//get html header with java code

  require_once('includes/left_column.php');
displayCurrentWorkingGame($_POST['gameid']);
?>                                          
<div id="right_column">
<table align="center" width="780 px" name="aStatsInput">

    <tr><form method="POST" action="addBasketballPlayerStatsToDb.php">
    <input type="hidden" name="gameid" value="<?php echo $_POST['gameid'];?>">

        <td align="center" colspan="14"><?php getCurrentWorkingGame("away",$_POST['gameid']);?><b>Away Team </b><?php echo $aTeam;?></td>

            </tr><!--function to populate tbl headers-->

                <?php populatePlayerTblHeaders("fgM,fgA,ftM,ftA,3ptM,3ptA,OReb,DReb,Blocks,Assts,Steals,Fouls,TFouls,Turnovrs");

                      populatePlayerTblNames($_POST['aplayer'], "aplayer");      

                ?>    

</table>

<table align="center" width="780 px" name="hStatsInput">

    <tr>

        <td align="center" colspan="14"><?php getCurrentWorkingGame("home",$_POST['gameid']);?><b>Home Team </b><?php echo $hTeam;?></td>

            </tr><!--function to populate tbl headers-->

                <?php populatePlayerTblHeaders("fgM,fgA,ftM,ftA,3ptM,3ptA,OReb,DReb,Blocks,Assts,Steals,Fouls,TFouls,Turnovrs");

                      populatePlayerTblNames($_POST['hplayer'], "hplayer");      

                ?>

</table>

<tr>    

    <td><INPUT type="submit" value="Submit" name="submit" onclick="return makesure();" ><INPUT type="reset" value="Clear" ></td>

</tr>

</form>      

</div>		  

<?php

//get html footer

  require_once('includes/footer.php');

?>

</div>  