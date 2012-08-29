<?php
#####################################################
# This page is the first page that sets up base     #
# game information. The is page will process to     #
# addFootballGameToDb.php                           #
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
                        populateTblHeaders('Location,Teams,Q1,Q2,Q3,Q4,OT,F Downs,Penalty,Penatly Yds');
                    ?>
                </tr>
                <tr>		  
                    <td>Away Team</td>
                    <td>			
                        <?php
                            populateTeamCbo('aTeam');
                            populateScoresTblInput('aQ1,aQ2,aQ3,aQ4,aOt,aFd,aPen,aPenYds');
                        ?>	
                    </td>
                <tr>
                </tr>
                    <td>Home Team</td>
                    <td>
                        <?php
                            populateTeamCbo('hTeam');
                            populateScoresTblInput('hQ1,hQ2,hQ3,hQ4,hOt,hFd,hPen,hPenYds');
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
		  
		  
		  
		  
		  
		  	  
		  
		



 