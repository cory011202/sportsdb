<?php
#####################################################
# This page is the first page that sets up base     #
# game information. The is page will process to     #
# addVolleyballGameToDb.php                         #
#####################################################

//connect to the db
require_once('includes/connection.php');
//get html header
require_once('includes/header.php');  
require_once('includes/functions.php');
?>
<div id="wrapper">
    <div id="title">Enter game data.</div>

<?php
//get Left Column
  require_once('includes/left_column.php');
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
                        populateTblHeaders('Location,Teams,Game 1,Game2,Game 3,Game 4,Game 5');
                    ?>
                </tr>
                <tr>		  
                    <td>Away Team</td>
                    <td>			
                        <?php
                            populateTeamCbo('aTeam');
                            populateScoresTblInput('aG1,aG2,aG3,aG4,aG5');
                        ?>	
                    </td>
                <tr>
                </tr>
                    <td>Home Team</td>
                    <td>
                        <?php
                            populateTeamCbo('hTeam');
                            populateScoresTblInput('hG1,hG2,hG3,hG4,hG5');
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
		  
		  
		  
		  
		  
		  	  
		  
		



 