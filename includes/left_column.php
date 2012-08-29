<!-- This is where the code for the drop down menus start.-->
<!--Begin div for drop downs-->
<div id="left_column">
<div>
  <>Choose Sport<>
     <select id="sport" onchange="go_sport()">
	   <option>--Select a Sport--</option>
       <option value="football.php">Football</option>
	   <option value="basketball.php">Basketball</option>       
     </select>
</div>
<div>
  <>Conference Admin<>
     <select id="conf" onchange="go_conf()">
	   <option>--Choose an option--</option>
       <option value="conf_add.php">Add Conference</option>
	   <option value="conf_edit.php">Edit Conference</option>
	   <option value="conf_del.php">Delete Conference</option>       
     </select>
</div>
<div>
  <>Team Admin<>
     <select id="school" onchange="go_school()">
	   <option>--Choose an option--</option>
       <option value="team_add.php">Add a Team</option>
	   <option value="team_edit.php">Edit a Team</option>
	   <option value="team_del.php">Delete a Team</option>       
     </select>
</div>
<div>
  <>Player Admin<>
     <select id="player" onchange="go_player()">
	   <option>--Choose an option--</option>
       <option value="player_add.php">Add a player</option>
	   <option value="player_edit.php">Edit a player</option>
	   <option value="player_del.php">Delete a player</option>       
     </select>
</div>
</div>