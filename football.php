<html>
<body>

<table id=""align="center" >
  <tr><!-Form for logging in->
    <form method="POST" action="process.php">
	  <td>
        <table id="game summary" >
		  <tr >
		    <td colspan="2"><strong><Center>Box Score For Week: &nbsp;<INPUT name="week_number" type="text" size="1"/></Center></strong></td>
			<td colspan="2">&nbsp;<br /><br /><br /></td>
		  </tr>
		  <tr>
            <td style="text-align=center" colspan="2"></td>
			<td style="text-align=center">abbr</td>
			<td style="text-align=center">Record</td>
            <td style="text-align=center">Q1</td>
            <td style="text-align=center">Q2</td>
            <td style="text-align=center">Q3</td>
            <td style="text-align=center">Q4</td>
            <td style="text-align=center">OT</td>
          </tr>
		  <tr>
			<td>Away Team:</td>
			<td><INPUT name="a_team" type="text" /><br /></td>
			<td><INPUT name="a_abbr" type="text" size="1"/><br /></td>
			<td><INPUT name="a_rec" type="text" size="1"/><br /></td>
			<td><INPUT name="a_q1" type="text" size="1"/><br /></td>
			<td><INPUT name="a_q2" type="text" size="1"/><br /></td>
			<td><INPUT name="a_q3" type="text" size="1"/><br /></td>
			<td><INPUT name="a_q4" type="text" size="1"/><br /></td>
			<td><INPUT name="a_ot" type="text" size="1"/><br /></td>			
		  </tr>
		  <tr>
			<td>Home Team:</td>
			<td><INPUT name="h_team" type="text" /><br /></td>
			<td><INPUT name="h_abbr" type="text" size="1"/><br /></td>
			<td><INPUT name="h_rec" type="text" size="1"/><br /></td>
			<td><INPUT name="h_q1" type="text" size="1"/><br /></td>
			<td><INPUT name="h_q2" type="text" size="1"/><br /></td>
			<td><INPUT name="h_q3" type="text" size="1"/><br /></td>
			<td><INPUT name="h_q4" type="text" size="1"/><br /></td>
			<td><INPUT name="h_ot" type="text" size="1"/><br /></td>			
	      </tr>		  
		  <tr>
		    <td></td>
	      </tr>		  
		</table>
		<table id="scoring summary">
		  <tr>
		    <td>Scoring</td>			
		  </tr>
		  <tr>
		    <td></td>
			<td>away</td>
			<td>home</td>
		  </tr>
		  <tr>
		    <td>First Quarter</td>
			<td><textarea rows="5" cols="20"INPUT name="away_firstqtr_smry" type="text"></textarea></td>
			<td><textarea rows="5" cols="20"INPUT name="home_firstqtr_smry" type="text"></textarea></td>
		  </tr>
		  <tr>
		    <td>Second Quarter</td>
			<td><textarea rows="5" cols="20"INPUT name="away_secondqtr_smry" type="text"></textarea></td>
			<td><textarea rows="5" cols="20"INPUT name="home_secondqtr_smry" type="text"></textarea></td>
		  </tr>
		  <tr>
		    <td>Third Quarter</td>
			<td><textarea rows="5" cols="20"INPUT name="away_thirdqtr_smry" type="text"></textarea></td>
			<td><textarea rows="5" cols="20"INPUT name="home_thirdqtr_smry" type="text"></textarea></td>
		  </tr>
		  <tr>
		    <td>Fourth Quarter</td>
			<td><textarea rows="5" cols="20"INPUT name="away_fourthqtr_smry" type="text"></textarea></td>
			<td><textarea rows="5" cols="20"INPUT name="home_fourthqtr_smry" type="text"></textarea></td>
		  </tr>
		  <tr>
		    <td>OT</td>
			<td><textarea rows="5" cols="20"INPUT name="away_ot_smry" type="text"></textarea></td>
			<td><textarea rows="5" cols="20"INPUT name="home_ot_smry" type="text"></textarea></td>
		  </tr>
		</table>
        <table id="stats summary">
		  <tr>
		    <td>&nbsp;</td>
			<td colspan="3">away</td>
			<td colspan="3">home</td>
		  </tr>
		  <tr>
		    <td >First Downs</td>
			<td><INPUT name="a_ttl_fdwns" type="text" size="1"/><br /></td>
			<td></td>
			<td></td>
			<td><INPUT name="h_ttl_fdwns" type="text" size="1"/><br /></td>
		    <td></td>
			<td></td>
			<td></td>
		  </tr>
          <tr>
		    <td >Rushing</td>
			<td><INPUT name="a_rush_fdwns" type="text" size="1"/><br /></td>
			<td></td>
			<td></td>
			<td><INPUT name="h_rush_fdwns" type="text" size="1"/><br /></td>
		    <td></td>
			<td></td>
	        <td></td>
		  </tr>
		  <tr>
		    <td >Passing</td>
			<td><INPUT name="a_pass_fdwns" type="text" size="1"/><br /></td>
			<td></td>
			<td></td>
			<td><INPUT name="h_pass_fdwns" type="text" size="1"/><br /></td>
		    <td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td >Penalty</td>
			<td><INPUT name="a_penalty_fdwns" type="text" size="1"/><br /></td>
			<td></td>
			<td></td>
			<td><INPUT name="h_penalty_fdwns" type="text" size="1"/><br /></td>
		    <td></td>
			<td></td>
			<td></td>
		  </tr>
	      <tr>
		    <td >Rushes-Yards</td>
			<td><INPUT name="a_rush_att" type="text" size="1"/><br /></td>
			<td><INPUT name="a_rush_yds" type="text" size="1"/><br /></td>
			<td></td>
			<td><INPUT name="h_rush_att" type="text" size="1"/><br /></td>
		    <td><INPUT name="h_rush_yds" type="text" size="1"/><br /></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td>Comp-Att-Int</td>
			<td><INPUT name="a_pass_comp" type="text" size="1"/><br /></td>
			<td><INPUT name="a_pass_att" type="text" size="1"/><br /></td>
		    <td><INPUT name="a_pass_int" type="text" size="1"/><br /></td>
			<td><INPUT name="h_pass_comp" type="text" size="1"/><br /></td>
			<td><INPUT name="h_pass_att" type="text" size="1"/><br /></td>
			<td><INPUT name="h_pass_int" type="text" size="1"/><br /></td>
		  </tr>
		  <tr>
		    <td >Passing Yards</td>
			<td><INPUT name="a_ttl_passyds" type="text" size="1"/><br /></td>
			<td></td>
			<td></td>
			<td><INPUT name="h_ttl_passyds" type="text" size="1"/><br /></td>
		    <td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td >Total Yards</td>
			<td><INPUT name="a_ttl_yds" type="text" size="1"/><br /></td>
			<td></td>
			<td></td>
			<td><INPUT name="h_ttl_yds" type="text" size="1"/><br /></td>
		    <td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td >Penalties-Yards</td>
			<td><INPUT name="a_penalties" type="text" size="1"/><br /></td>
			<td><INPUT name="a_penalty_yds" type="text" size="1"/><br /></td>
			<td></td>
			<td><INPUT name="h_penalties" type="text" size="1"/><br /></td>
		    <td><INPUT name="h_penalty_yds" type="text" size="1"/><br /></td>
			<td></td>
			<td></td>
		  </tr>
	    </table>
		<table id="scoring summary">
		  <tr>
		    <td>player stats</td>			
		  </tr>
		  <tr>
		    <td></td>
			<td>away</td>
			<td>home</td>
		  </tr>
		  <tr>
		    <td>Rushing</td>
			<td><textarea rows="5" cols="20"INPUT name="a_rushers" type="text"></textarea></td>
			<td><textarea rows="5" cols="20"INPUT name="h_rushers" type="text"></textarea></td>
		  </tr>
		  <tr>
		    <td>Passing</td>
			<td><textarea rows="5" cols="20"INPUT name="a_passers" type="text"></textarea></td>
			<td><textarea rows="5" cols="20"INPUT name="h_passers" type="text"></textarea></td>
		  </tr>
		  <tr>
		    <td>Recieing</td>
			<td><textarea rows="5" cols="20"INPUT name="a_recievers" type="text"></textarea></td>
			<td><textarea rows="5" cols="20"INPUT name="h_recievers" type="text"></textarea></td>
		  </tr>	  
		</table>
		<!--<table id="stats summary">
		  <tr>
		    <td>&nbsp;</td>
			<td colspan="6">$away_abb</td>
			<td colspan="6">$home_abb</td>
		  </tr>
		  <tr>
		    <td >Rushing</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		    <td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td>Player-Rushes-Yards</td>
			<td><INPUT name="away_player" type="text" size="10"/><br /></td>
			<td><INPUT name="away_rsh_att" type="text" size="1"/><br /></td>
		    <td><INPUT name="away_rsh_yds" type="text" size="1"/><br /></td>
			<td colspan="3"></td>
			<td><INPUT name="home_player" type="text" size="10"/><br /></td>
			<td><INPUT name="home_rsh_att" type="text" size="1"/><br /></td>
			<td><INPUT name="home_rsh_yds" type="text" size="1"/><br /></td>
		  </tr>
		  <tr>
		    <td >Passing</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		    <td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td>Player-att-comp-int-yds</td>
			<td><INPUT name="away_player" type="text" size="10"/><br /></td>
			<td><INPUT name="away_pass_att" type="text" size="1"/><br /></td>
		    <td><INPUT name="away_pass_comp" type="text" size="1"/><br /></td>
			<td><INPUT name="away_pass_int" type="text" size="1"/><br /></td>
			<td><INPUT name="away_pass_yds" type="text" size="1"/><br /></td>
			<td></td>
			<td><INPUT name="home_player" type="text" size="10"/><br /></td>
			<td><INPUT name="home_pass_att" type="text" size="1"/><br /></td>
			<td><INPUT name="home_pass_comp" type="text" size="1"/><br /></td>
			<td><INPUT name="home_pass_int" type="text" size="1"/><br /></td>
			<td><INPUT name="home_pass_yds" type="text" size="1"/><br /></td>
		  </tr>
		  <tr>
		    <td >Recieving</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		    <td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td>Player-Recepts-Yards</td>
			<td><INPUT name="away_pass_comp" type="text" size="10"/><br /></td>
			<td><INPUT name="away_pass_att" type="text" size="1"/><br /></td>
		    <td><INPUT name="away_pass_int" type="text" size="1"/><br /></td>
			<td colspan="3"></td>
			<td><INPUT name="home_pass_comp" type="text" size="10"/><br /></td>
			<td><INPUT name="home_pass_att" type="text" size="1"/><br /></td>
			<td><INPUT name="home_pass_int" type="text" size="1"/><br /></td>
		  </tr>		  
	    </table>-->
	      <tr>
		    <td><INPUT type="submit" value="Submit" name="submit" /><INPUT type="reset" value="Clear" /></td>
		  </tr>
	  </td>
	  </form>	  
  </tr>
</table>

</body>
</html>
 