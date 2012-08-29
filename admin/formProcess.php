<?php
require_once("classes/class.php") ;
  echo $_POST['fName'] . "<br />";
  echo $_POST['lName'] . "<br />";
  echo $_POST['teamName'] . "<br />";
  echo $_POST['gradYear'] . "<br />";
  echo $_POST['number'] . "<br />";
  echo $_POST['gender'];
  $newPlayer = new Player($_POST['fName'],$_POST['lName'],$_POST['teamName'],$_POST['gradYear'],$_POST['number'],$_POST['gender']);
  $newPlayer->addPlayer();    
?>