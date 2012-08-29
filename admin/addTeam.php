<?php
//connect to the db
	require_once('includes/connection.php');
//list teams names querery	
	$cur_teams = mysql_query('SELECT t.team_ID , t.team_name , t.team_div , c.conf_name FROM teams t , conference c WHERE t.conf_ID = c.ID ')
	or die(mysql_error());
//Create the number for the loop
	$num = mysql_numrows($cur_teams);
//list teams names querery	
	$cur_conf = mysql_query("SELECT * FROM conference")
	or die(mysql_error());
//Create the number for the loop
	$num = mysql_numrows($cur_conf);
//pulls in the header with java
	require_once('includes/header.php');

//pulls in the function
    require_once('includes/functions.php');
?>
<div id="title">Add a Team.</div>
<div id="wrapper">
<?php
   //pulls in the left column
    require_once('includes/left_column.php'); 
?>
<div id="right_column">
<table align="center">
  <tr><!-Form for adding a conference->
    <form method="POST" action="addTeamProcess.php">
	  <td>
	    <tr >
	      <td colspan="2"><strong><Center>Add a Team</Center></strong></td>
	    </tr>
	      <td>Team Name:</td>
	      <td><INPUT class="blue1" name="team_name" type="text" /><br /></td>
	    <tr>
		  <td>Team Short Name:</td>
		  <td><INPUT class="blue1" name="team_ID" type="text" /><br /></td>
	    </tr>
	    </tr>
	      <td>Division:</td>
	      <td><select class="blue1" name="team_div">
			    <option class="blue2" selected="">Choose Div</option>
			    <option class="blue1" value="1A">1A</option>
			    <option class="blue2" value="2A">2A</option>
			    <option class="blue1" value="3A">3A</option>
			    <option class="blue2" value="4A">4A</option>
			    <option class="blue1" value="5A">5A</option>
			    <option class="blue2" value="6A">6A</option>
			    <option class="blue1" value="7A">7A</option>
			    <option class="blue2" value="8A">8A</option>
				</select><br />
		  </td>
	    <tr>
		  <td>Conference:</td>
		  <td><select class="blue1" name="conf">
			    <option class="blue2" value="conf_ID">Choose Conf</option>
				<?php
				// loop to display info from db
					$i = 0;
					while ( $row = mysql_fetch_array($cur_conf)) {
						$i++;
                        $bgColor = setRowOddEven($i);
				    	echo "<option class=\"" . $bgColor . "\" value=\"" . $row['conf_ID'] . "\">" . $row['conf_ID'] . "</option>";
			    //end loop	
				}
				?>
			  </select><br />
		  </td>
	    </tr>
		<tr>
		  <td>&nbsp</td>
		  <td><INPUT type="submit" value="add" name="submit" /><INPUT type="reset" value="Clear" /></td>	  
        </tr>
      </td>
    </form>
  </tr>
</table>
<br />

<table align="center">
  <tr >
    <td colspan="2"><strong><Center>Currently added Teams</Center></strong></td>
  </tr>
  <tr>
    <td>Team ID</td>
    <td>Name</td>
    <td>Div</td>
    <td>Conference</td>
  </tr>    
<?php
// loop to display info from db
$i =0;
	while ( $row = mysql_fetch_array($cur_teams)) {	
        $i++;
        $bgColor = setRowOddEven($i);
	    echo "<tr class=\"" . $bgColor . "\">";
	    echo "<td>" . $row['team_ID'] . "</td>";
	    echo "<td>" . $row['team_name'] . "</td>";
	    echo "<td>" . $row['team_div'] . "</td>";
	    echo "<td>" . $row['conf_name'] . "</td>";
	    echo "</tr>";	
//end loop	
}
?>
</table>
</div>
</div>
<?php
require_once('includes/footer.php');
?>
	
