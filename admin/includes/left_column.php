<!-- This is where the code for the drop down menus start.-->
<!--Begin div for drop downs-->

<div id="left_column">
    <div>
      <div>Choose Sport</div>
         <select class="blue1" id="sport" onchange="go_sport()">
    	   <option class="blue2">--Select a Sport--</option>
           <option class="blue1" value="addFootballGame.php">Football</option>
           <option class="blue2" value="addVolleyballMatch.php">Volleyball</option>
    	   <option class="blue1" value="addBoysBasketballGame.php">Boys Basketball</option>
           <option class="blue2" value="addGirlsBasketballGame.php">Girls Basketball</option>
         </select>
    </div>
    <div>
        <div>Conference Admin</div>
         <select class="blue1" id="conf" onchange="go_conf()">
    	   <option class="blue2">--Choose an option--</option>
           <option class="blue1" value="addconf.php">Add Conference</option>
    	   <!--<option class="blue2" value="conf_edit.php">Edit Conference</option>
    	   <option class="blue1" value="conf_del.php">Delete Conference</option>-->
         </select>
    </div>
    <div>
        <div>Team Admin</div>
         <select class="blue1" id="school" onchange="go_school()">
    	   <option class="blue2">--Choose an option--</option>
           <option class="blue1" value="addTeam.php">Add a Team</option>
    	   <!--<option class="blue2" value="editTeam.php">Edit a Team</option>
    	   <option class="blue1" value="deleteTeam.php">Delete a Team</option>-->
         </select>
    </div>
    <div>
        <div>Player Admin</div>
         <select class="blue1" id="player" onchange="go_player()">
    	   <option class="blue2">--Choose an option--</option>
           <option class="blue1" value="addBasketballPlayer.php">Add a basketball player</option>
           <!--<option class="blue2" value="editBasketballPlayer.php">Edit a basketyball player</option>-->
           <option class="blue1" value="addFootballPlayer.php">Add a football player</option>
    	   <!--<option class="blue2" value="editFootballPlayer.php">Edit a football player</option>-->
           <option class="blue1" value="addVolleyballPlayer.php">Add a volleyball player</option>
    	   <!--<option class="blue2" value="editVolleyballPlayer.php">Edit a volleyball player</option>-->
    	   <option class="blue1" value="deletePlayer.php">Remove a player</option>
         </select>
    </div>
        <div>
        <div>Game Admin</div>
         <select class="blue1" id="game" onchange="go_game()">
           <option class="blue2">--Choose an option--</option>
           <option class="blue1" value="listBasketballGames.php">List Basketball Games</option>
           <!--<option class="blue2" value="editGames.php">Edit Game Stats</option>-->
         </select>
    </div>
</div>
