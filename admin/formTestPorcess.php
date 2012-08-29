<?php 

//Foreach loop to iterate through the players entered.
foreach($_POST['summary'] as $key => $player){

    //every row has the same key in the post array, so the key for

    //the player name's will be the same key for his stats. so we can do

    //Get the player info ID, L name, F name

    $teamId = $_POST['stat1'][$key];
    
    $time = $_POST['stat2'][$key];
    
    $qtr = $_POST['stat3'][$key];
    
    $summary = $_POST['stat4'][$key];
echo $teamId . " " . $time . " " . $qtr . " " . $summary . "<br />";
        

}
?>