<?php
//connect to the db
    require_once('includes/connection.php');
//pulls in the header with an include
    require_once('includes/header.php');
//pulls in the functions
    require_once('includes/functions.php');

$getCurrentPLayersInfo = "SELECT p.ID, p.lName, p.fName, p.gradYear, p.number,p.boy, t.team_name
                          FROM bBallPlayerInfo p, teams t
                          WHERE p.teamID = t.ID
                          ORDER BY p.lName, p.fName";
?>

<div id="title">Choose a plaer to edit below.</div>
<div id="wrapper">
<?php
    //pulls in the left column
    require_once('includes/left_column.php');
?>
<div id="right_column">
     
            <table align="center" id="listPlayers"> 
            <form method="POST" action="editbasketballplayerinfo.php" >               
                <?php 
                    populateTblHeaders('Choose,LName,FName,GradYear,Number,Gender,Team');
                    $results = mysql_query($getCurrentPLayersInfo);
                    $i=0;
                    while($row  = mysql_fetch_array($results)){
                        if($row['5'] == 1){
                            $gender = Boy;
                        }else{
                            $gender = Girl;
                        }
                         $i++;
                         $bgColor = setRowOddEven($i);
                        ?>
                        <tr class="<?php echo $bgColor;?>" ><td><input type="radio" name="player[]" value="<?php echo $row['0'];?>"></td><td><?php echo $row['1'] . "</td><td>" . $row['2'] . "</td>                        <td align=\"center\">" . $row['3'] . "</td><td align=\"center\">" . $row['4'] . "</td><td align=\"center\">" . $gender . "</td><td>" . $row['6']; ?></td></tr>
                        <?php
                    }
                ?>
                <tr>
                    <td colspan="6" ><INPUT type="submit" value="Submit" name="submit" /></td>
                </tr>
                </form>   
            </table>      

</div> 
<?php
    //pulls in the footer
    require_once('includes/footer.php')
?>
</div>