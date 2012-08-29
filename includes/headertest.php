<html>
<head>
<title>Tri-State Sports Report Scoring and Statistics Reporting system.</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
<script  type="text/javascript">
function go_sport() 
{
window.location=document.getElementById("sport").value;

}
function go_conf() 
{
window.location=document.getElementById("conf").value;

}
function go_team() 
{
window.location=document.getElementById("team").value;

}
function go_player() 
{
window.location=document.getElementById("player").value;

}
function addRow(ObjID)
{
// grab the element, i.e. the table your editing, in this we're calling it 
// 'mySampleTable' and it is reffered to in the table further down on the page 
// with a unique of id of you guessed it, 'mySampleTable'
  var tbl = document.getElementById(ObjID);
// grab how many rows are in the table
  var lastRow = tbl.rows.length;
// if there's no header row in the table (there should be, code at least one 
//manually!), then iteration = lastRow + 1
  var iteration = lastRow;
// creates a new row
  var row = tbl.insertRow(lastRow);

// insert a cell
 /* var cellLeft = row.insertCell(0);
// here we're just using numbering the cell, like anything else you don't
// have to use this, but i've kinda noticed users tend to like them
  var textNode = document.createTextNode(iteration);
// takes what we did (create the plain text number) and appends it the cell
// we created in the row we created. NEAT!
  cellLeft.appendChild(textNode);*/
 
// select cell
  var cellRightSel = row.insertCell(0);
// create another element, this time a select box
  var sel = document.createElement('select');
// name it, once again with an iteration (selRow8 using the example above)
  sel.name = 'selRow' + iteration;
// crates options in an array
// the Option() function takes the first parameter of what is being displayed
// from within the drop down, and the second parameter of the value it is carrying over          
  sel.options[0] = new Option('Choose Player', 'value0');
  sel.options[1] = new Option('Jones', 'value1');
  sel.options[2] = new Option('Smith', 'value2');
// append our new element containing new options to our new cell          
  cellRightSel.appendChild(sel);          
} 

function removeRow(ObjID)
{
// grab the element again!
  var tbl = document.getElementById(ObjID);
// grab the length!
  var lastRow = tbl.rows.length;
// delete the last row if there is more than one row!
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
  }
</script>
</head>
<body id="body">