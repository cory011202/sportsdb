<?php
require_once("classes/class.php");

$newPlayer = new Player("Powell","Cory","kings","2011","23","male");
$newPlayer->setLName("GradKowski");
$newPlayer->setFName("George");
$newPlayer->setTeamName("Hawks");
$newPlayer->setGradyear("2012");
$newPlayer->setNumber("45");
$newPlayer->setGender("both");
$newPlayer->addPlayer();
$newPlayer->removePlayer("34");
?>
<?php
  //require_once("form.inc");
echo "<html><head><title>Form Creator</title></head><body align=\"center\">\n";
      $form = new Form("formProcess.php", "Submit Form");
      $form->addField("fName", "Last Name");
      $form->addField("lName", "First Name");
      $form->addField("teamName", "Team Name");
      $form->addField("gradYear", "Grad Year");
      $form->addField("number", "Number");
      $form->addField("gender", "Gender");
      $form->displayForm();  
echo "</body></html>"; 
?>