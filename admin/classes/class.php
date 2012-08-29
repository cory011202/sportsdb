<?php #stats.tristatespeedreview.com/admin classes

class Player {
    //Sets the variables for the class to use
    var $lName;
    var $fName;
    var $teamName;
    var $gradYear;
    var $number;
    var $gender;
    //Constructor for the class
    function __construct($lName,$fName,$teamName,$gradYear,$number,$gender){
        $this->lName = $lName;
        $this->fName = $fName;
        $this->teamName = $teamName;
        $this->gradYear = $gradYear;
        $this->number = $number;
        $this->gender = $gender;
    }
    function addPlayer(){
        echo $this->lName;
        echo $this->fName;
        echo $this->teamName;
        echo $this->gradYear;
        echo $this->number;
        echo $this->gender . "<br />";
        //Add player to the database
    }
    function setLName($newLName){
        $this->lName = $newLName;
        //Update the database
    }
    function setFName($newFName){
        $this->fName = $newFName;
        //Update the database
    }
    function setTeamName($newTeamName){
        $this->teamName = $newTeamName;
        //Update the database
    }
    function setGradyear($newGradYear){
        $this->gradYear = $newGradYear;
        //Update the database
    }    
    function setNumber($newNumber){
        $this->number = $newNumber;
        //Update the database
    }    
    function setGender($newGender){
        $this->gender = $newGender;
        //Update the database
    }
    function removePlayer($playerId){
        //Update the database
        echo $playerId;        
    }
}
    
class Form {
    var $fields=array();
    var $processor;
    var $submit = "Submit Form";
    var $Nfields = 0;
    /* Constructor: This will be set when you instatiate the class. This will tell the form
     * What to set for the process form and what the value of the submit button shall be.
     */
    function __construct($processor, $submit){
        $this->processor = $processor;
        $this->submit = $submit;
    }
    /*Function that will actually display the form on the page.
     */
    function displayForm(){                 
        echo "<form action='{$this->processor}' method='post'>\n";
        echo "<table width='300px'>\n";
        for($j=1;$j<=sizeof($this->fields);$j++){
                echo "<tr><td align=\"left\">
                    {$this->fields[$j - 1]['label']}:
                    </td>\n";
                echo "<td align=\"left\">
                        <input type ='text'
                            name='{$this->fields[$j - 1]['name']}' value='{$this->fields[$j - 1]['label']}'>
                        </td>\n</tr>\n";                
             }
        echo "<tr><td colspan=2 align= \"center\">
                      <input type=\"submit\" value='{$this->submit}'>
                      <input type=\"reset\" value='Clear'>    
                      </td>\n</tr>\n";
        echo "</table>\n</form>\n";
    }
    function addField($name,$label){
             $this->fields[$this->Nfields]['name'] = $name;
             $this->fields[$this->Nfields]['label'] = $label;
             $this->Nfields = $this->Nfields + 1;
    }
}


?>