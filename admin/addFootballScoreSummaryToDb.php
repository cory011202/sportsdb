<?php
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
//Foreach loop to iterate through the players entered.
foreach($_POST['summary'] as $key => $player){

    //every row has the same key in the post array, so the key for

    //the player name's will be the same key for his stats. so we can do

    //Get the player info ID, L name, F name

    $teamId = $_POST['stat1'][$key];
    
    $qtr = $_POST['stat2'][$key];
    
    $time = $_POST['stat3'][$key];
    
    $summary = $_POST['stat4'][$key];
    
    if ($summary != NULL){
        echo $teamId . " " . $time . " " . $qtr . " " . $summary . " " . $lastGameRecordId[0] . "<br />";
        //Query to insert data into footballGameInformation table of the database
        $insertFootballGameInfoTbl = "INSERT INTO footballScoringSummary(id,gameId,teamId,time,quarter,summary)
                                      VALUES (NULL,'$lastGameRecordId[0]','$teamId','$time','$qtr','$summary')";
                                                           
        //execute the query
        $result = mysql_query($insertFootballGameInfoTbl)
                  or die(mysql_error());

    }
        

}
?>
    <div id="wrapper">
    <div id="title">Game Entered!</div>

    <?php
//get Left Column
    require_once('includes/left_column.php');
    ?>
    <div id="right_column">
        <table id="" align="center" >

            <tr>
               <td>
                    Game successfully added! Choose an action to the left.
               </td>
            </tr>
        </table>
     </div>
        <div>
        <?php
        //get html footer
          require_once('includes/footer.php');
        ?>
        </div>
    </div>
