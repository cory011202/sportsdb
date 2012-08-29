<?php
//connect to the db
	require_once('includes/connection.php');
//pulls in the header with an include
	require_once('includes/header.php');
//pulls in the left column
	require_once('includes/left_column.php');
?>
<h1><center>Choose a sport to add an athlete.</center></h1>

<div id="right_column">
<table id="loginoutertable"align="center">
  <tr><!-Form for adding an athlete->
    <form method="POST" action="player_add_process.php">
	  <td>	  
        <tr>
		  <td>Sport:<font color="red"><sup>*</sup></font></td>
			<td><select name="team_name">
			    <option value="">Choose Sport</option>
				<?php
				//list a teams names querery	
					$curSports = mysql_query("SELECT ID,type FROM sports")
					or die(mysql_error());
				
				// loop to display info from db
					$i = 0;
					while ( $row = mysql_fetch_array($curSports)) {
						$i++;
				    	echo "<option value=\"" . $row['ID'] . "\">" . $row['type'] . "</option>\n";
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
</table>
</div>
<?php
require_once('includes/footer.php');
?>
	