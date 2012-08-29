<?php

//connect to the db

	require_once('includes/connection.php');

//get html header

    require_once('includes/header.php');

//Get functions

    require_once('includes/functions.php');





//Set the varible for the form

$year = $_POST['year'];

$sport = $_POST['sport'];

$team = $_POST['team'];



if (!isset($_POST['submit'])) {

?>

<div id="wrapper">

<div id="title">Tri-State Sports Report Statistics Reporting System</div>

<div id="subtitle">Your one stop for TSSR area statistics</div>

<div id="catselect">

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        Select Year:

            <SELECT name="year" size="1" />

                <OPTION value="" selected>Choose Year</OPTION>

                    <?php

                        //list a teams names querery	

                        $years = mysql_query("SELECT * FROM school_yr")

                                or die(mysql_error());

                        //Intialize $i

                        $i = 0;

                        // loop to display info from db

                        while ($row = mysql_fetch_array($years)) {

        				    $i++;

        				    echo "\t\t<option value=\"" . $row['ID'] . "\">" . $row['year1'] . "/" . $row['year2'] . "</option>\n";

                        }//End loop

                    ?>

            </SELECT />

        Select Sport:

            <SELECT name="sport" size="1" />

                <OPTION value="" selected>Choose Sport</OPTION>

                <OPTION value="boys_basketball">Boys Basketball</OPTION>

                <OPTION value="girls_basketball">Girls Basketball</OPTION>	

            </SELECT />

        Select Team:

            <SELECT name="team" size="1" />

                <OPTION value="0" selected>All TSSR Coverage</OPTION>

                    <?php

                        //list a teams names querery	

                        $teams = mysql_query("SELECT ID, team_name FROM teams")

        						or die(mysql_error());

                        //Initialze $i

                        $i = 0;

                        // loop to display info from db			

                        while ($row = mysql_fetch_array($teams)) {

                            $i++;

        				    echo "\t\t<option value=\"" . $row['ID'] . "\">" . $row['team_name'] . "</option>\n";

                        }//end loop

                    ?>

            </SELECT />

            <input type="submit" value="submit" name="submit" />

    </form>

</div>

<!--</div>-->

<?php

//get the footer

    require_once('includes/footer.php');



}

ELSE {

/*echo $year;

echo $sport;

echo $team;*/

//Build start of table

echo "<table class=\"sortable\" id=\"anyid\" cellpadding=\"0\" cellspacing=\"0\">";

//Display the table heaers

echo "<tr>";

echo "<th class=\"sorttable_nosort\">Player</th><th class=\"sorttable_nosort\">School</th>";

populateQueryPlayerTblHeaders("Games,fgM,fgA,fg%,ftM,ftA,ft%,3ptM,3ptA,3%,ttlpts,OReb,DReb,ttlrebs,Blocks,Assts,Steals,Fouls,TFouls,TOvrs");

//IF statement to decide to use all TSSR coverage or a specific team

if ($team == 0){

    //Query that will return all teams for chosen year and sport

    $query = "SELECT *

        FROM $sport

		WHERE school_yr='$year'
		AND conf_ID ='13'";

}

ELSE{

    //Query that will return selected team and sport and year

    $query = "SELECT *

        FROM $sport

		WHERE team_ID ='$team'

        AND school_yr='$year'
        AND conf_ID ='13'";

}

?>

<div id="wrapper">

<div id="title">Tri-State Sports Report Statistics Reporting System</div>

<div id="subtitle">Your one stop for TSSR area statistics</div>

<div id="catselect">

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        Select Year:

            <SELECT name="year" size="1" />

                <OPTION value="" selected>Choose Year</OPTION>

                    <?php

                        //list a teams names querery	

                        $years = mysql_query("SELECT * FROM school_yr")

                                or die(mysql_error());

                        //Intialize $i

                        $i = 0;

                        // loop to display info from db

                        while ($row = mysql_fetch_array($years)) {

        				    $i++;

        				    echo "\t\t<option value=\"" . $row['ID'] . "\">" . $row['year1'] . "/" . $row['year2'] . "</option>\n";

                        }//End loop

                    ?>

            </SELECT />

        Select Sport:

            <SELECT name="sport" size="1" />

                <OPTION value="" selected>Choose Sport</OPTION>

                <OPTION value="boys_basketball">Boys Basketball</OPTION>

                <OPTION value="girls_basketball">Girls Basketball</OPTION>	

            </SELECT />

        Select Team:

            <SELECT name="team" size="1" />

                <OPTION value="0" selected>All TSSR Coverage</OPTION>

                    <?php

                        //list a teams names querery	

                        $teams = mysql_query("SELECT ID, team_name FROM teams Where conf_ID='13'")

        						or die(mysql_error());

                        //Initialze $i

                        $i = 0;

                        // loop to display info from db			

                        while ($row = mysql_fetch_array($teams)) {

                            $i++;

        				    echo "\t\t<option value=\"" . $row['ID'] . "\">" . $row['team_name'] . "</option>\n";

                        }//end loop

                    ?>

            </SELECT />

            <input type="submit" value="submit" name="submit" />

    </form>

</div>



<?php

//Execute the query

$result = mysql_query($query)

        or die(mysql_error());

    //Create the array from above results

	while ($row = mysql_fetch_array( $result )) {

	   $i++;

    echo "<tr>\n<td>" . $row['l_name'] . " " . $row['f_name'] . "</td><td>" . $row['team_name'] . "</td><td>" . $row['games_played'] ."</td><td>" . $row['fg_made'] . "</td><td>"

        . $row['fg_attempts'] . "</td><td>" . $row['fg_percentage'] . "</td><td>" . $row['ft_made'] . "</td><td>" . $row['ft_attempts'] . "</td><td>"

        . $row['ft_percentage'] . "</td><td>" . $row['three_made'] . "</td><td>" . $row['three_attempts'] . "</td><td>" . $row['three_percentage'] . "</td><td>"

        . $row['ttl_pts'] . "</td><td>" . $row['off_rebs'] . "</td><td>" . $row['def_rebs'] . "</td><td>" . $row['ttl_rebs'] . "</td><td>" . $row['blocks'] . "</td><td>" 

        . $row['assists'] . "</td><td>" . $row['steals'] . "</td><td>" . $row['fouls'] . "</td><td>" . $row['tech_fouls'] . "</td><td>" . $row['turn_overs'] . "</td>\n</tr>\n";

    }//end loop

//Close the table

echo "</table>";

	}//end isset if else statement

    //Get the footer
//echo "<a href=\"http://www.tristatesportsreport.com\">Return to TSSR</a>";
    require_once('includes/footer.php');

?>