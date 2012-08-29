<?php
//connect to the db
require_once('../includes/connection.php');
//get all girls in the current database that has no graduated yet
$getCurrentPlayers = "Select team_ID, l_name, f_name, number,grad_year,b_bball
                      from hulettpu_tssrstats.player_info
                      Where grad_year > 2010
                      AND b_bball = 1 " ;
$result = mysql_query($getCurrentPlayers)
          or die(mysql_error());
$i=0;
while($row = mysql_fetch_array($result)){
    $i++;
    $teamID = $row[0];
    $lName = mysql_real_escape_string($row[1]);
    $fName = $row[2];
    $number = $row[3];
    $gradYear = $row[4];
    
    echo $i . $row{0} . " " . $row{1} . " " . $row{2} . " " . $row{3} . " " . $row{4} . " " . $row{5} . "<br />";
    echo $i . $teamID . " " . $lName . " " . $fName . " " . $number . " " . $gradYear . " " . $row{5} . "<br />";
    
    $insertCurrentPlayers = "INSERT INTO bBallPlayerInfo(ID,teamID,lName,fName,gradYear,number,boy)
                          VALUES (NULL,'$teamID','$lName','$fName','$gradYear','$number','1')";
    //execute the query
    //$resultin = mysql_query($insertCurrentPlayers)
    //        or die(mysql_error());
        
}
 echo "SUCCESS!!!"     ;
?>
