<?php
//connect to the db
require_once('includes/connection.php');
//get html header
require_once('includes/header.php');  
require_once('includes/functions.php');
?>
<div id="wrapper">
    <div id="title">Choose teams for this game.</div>

<?php
//get Left Column
  require_once('includes/left_column.php');
?>
<div id="right_column">
</div>
<table id=""align="center" >
    <tr>
        <form method="POST" action="addBasketballGameToDb.php">
            <td>
                <tr>
                    <td><input type="hidden" name="gender" value="boys" /></td>
                </tr>
                <tr>
                    <td>Date: <input class="blue1" id="datepicker" type="text" name="gamedate"></td>
                    <td>Tournament:<input type="checkbox" name="tournament"></td>
                </tr>
                <tr>
                    <?php
                        populateTblHeaders('Location,Teams,Q1,Q2,Q3,Q4,OT');
                    ?>
                </tr>
                <tr>		  
                    <td>Away Team</td>
                    <td>			
                        <?php
                            populateTeamCbo('aTeam');
                            populateScoresTblInput('aQ1,aQ2,aQ3,aQ4,aOt');
                        ?>	
                    </td>
                <tr>
                </tr>
                    <td>Home Team</td>
                    <td>
                        <?php
                            populateTeamCbo('hTeam');
                            populateScoresTblInput('hQ1,hQ2,hQ3,hQ4,hOt');
                        ?>		  
                    </td>                    
                </tr>
                <tr>
                    <td><INPUT type="submit" value="Submit" name="submit" /></td>
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
		  
		  
		  
		  
		  
		  	  
		  
		



 
