<html>

<head>

<title>Tri-State Sports Report Scoring and Statistics Reporting system.</title>

<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="http://www.hulettpublications.com/jquery/datepicker/css/ui-lightness/jquery-ui-1.8.6.custom.css">
<script src="http://www.hulettpublications.com/jquery/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="http://www.hulettpublications.com/jquery/datepicker/jquery.ui.core.js"></script>
<script src="http://www.hulettpublications.com/jquery/datepicker/jquery.ui.widget.js"></script>
<script src="http://www.hulettpublications.com/jquery/datepicker/jquery.ui.datepicker.js"></script>


<script  type="text/javascript">

function go_sport() 

{
window.location=document.getElementById("sport").value;
}

function go_conf() 

{
window.location=document.getElementById("conf").value;
}

function go_school() 

{
window.location=document.getElementById("school").value;
}

function go_player() 

{
window.location=document.getElementById("player").value;
}

function go_game() 

{
window.location=document.getElementById("game").value;
}

function makesure() {
  if (confirm('Are you sure you want to submit?')) {
    return true;
  }
  else {
    return false;
  }
 }
//Function for the calendar date picker for the game add
$(function() {
    $( "#datepicker" ).datepicker();
});
</script>

</head>

<body id="body" >