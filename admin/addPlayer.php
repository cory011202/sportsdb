<?php
//connect to the db
	require_once('includes/connection.php');
//pulls in the header with an include
	require_once('includes/header.php');

//pulls in the functions
    require_once('includes/functions.php');
?>
<div id="title">Add an Athlete.</div>
<div id="wrapper">
<?php
    //pulls in the left column
    require_once('includes/left_column.php');
?>
<div id="right_column">
<table align="center">
  <tr><!-Form for adding an athlete->
    <form method="POST" action="player_add_process.php">
	  <td>
	    <tr>
	      <td>Player Last Name:<font color="red"><sup>*</sup></font></td>
	      <td><INPUT class="blue1" name="l_name" type="text" /><br /></td>
	    </tr>
		<tr>
		  <td>Player First Name:<font color="red"><sup>*</sup></font></td>
		  <td><INPUT class="blue1" name="f_name" type="text" /><br /></td>
	    </tr>	  
        <tr>
		  <td>Team Name:<font color="red"><sup>*</sup></font></td>
			<td><select class="blue1" name="team_name">
			    <option class="blue2" value="">Choose Team</option>
				<?php
				//list a teams names querery	
					$cur_ateams = mysql_query("SELECT ID,team_name FROM teams")
					or die(mysql_error());
				
				// loop to display info from db
					$i = 0;
					while ( $row = mysql_fetch_array($cur_ateams)) {
						$i++;
                        $bgColor = setRowOddEven($i);
				    	echo "<option class=\"" . $bgColor . "\" value=\"" . $row['ID'] . "\">" . $row['team_name'] . "</option>";
			    //end loop	
				}
				?>
			  </select><br />
		    </td>
	    </tr>	    
	    <tr>
		  <td>Grad Year:<font color="red"><sup>*</sup></font></td>
			<td><select class="blue1" name="grad_year">
			    <option class="blue2" value="">Choose Year</option>
                <option class="blue1" value="2011">2011</option>
			    <option class="blue2" value="2012">2012</option>
			    <option class="blue1" value="2013">2013</option>
			    <option class="blue2" value="2014">2014</option>
			    </select><br />
		    </td>
	    </tr>
	    <tr>
		  <td>Number:<font color="red"><sup>*</sup></font></td>
		  <td><INPUT class="blue1" name="number" type="text" size="2" /><br /></td>
	    </tr>
	    <tr>
		  <td>Gender:<font color="red"><sup>*</sup></font></td>		  
		  <td><INPUT type="radio" name="gender" value="1">Boys <INPUT type="radio" name="gender" value="0">Girls</td>
        </tr>			
	    <tr>
		  <td>&nbsp</td>
		  <td><INPUT type="submit" value="add" name="submit" /><INPUT type="reset" value="Clear" /></td>	  
        </tr>
      </td>
    </form>
  </tr>
</table>
</div>

<?php
require_once('includes/footer.php');
?>
	