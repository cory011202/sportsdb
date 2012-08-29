<?php
//connect to the db
	require_once('includes/connection.php');
//list conference names querery	
	$cur_conf = mysql_query("SELECT * FROM conference")
	or die(mysql_error());
//Create the number for the loop
	$num = mysql_numrows($cur_conf);
//pulls in the header with php
	require_once('includes/header.php');
    //pulls in the function
    require_once('includes/functions.php');

?>
<div id="title">Add a Conference.</div>
<div id="wrapper">
<?php
   //pulls in the left column
    require_once('includes/left_column.php'); 
?>
<div id="right_column">
<table align="center">
  <tr><!-Form for adding a conference->
    <form method="POST" action="addconfprocess.php">
	  <td>
	    <tr >
	      <td colspan="2"><strong><Center>Add a Conference</Center></strong></td>
	    </tr>
	      <td>Conference Name:</td>
	      <td><INPUT class="blue1" name="conf_name" type="text" /><br /></td>
	    <tr>
		  <td>Conference Short Name:</td>
		  <td><INPUT class="blue1" name="conf_ID" type="text" /><br /></td>
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
    <td colspan="2"><strong><Center>Currently added Conferences</Center></strong></td>
  </tr>
  <tr>
    <td>Conference ID</td>
    <td>Conference Name</td>
  </tr>    
<?php
$i;
// loop to display info from db
	while ( $row = mysql_fetch_array($cur_conf)) {
        $i++;
    $bgColor = setRowOddEven($i);	
	echo "<tr class=\"" . $bgColor . "\">";
	echo "<td>" . $row['conf_ID'] . "</td>";
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
	
