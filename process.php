<?php

//away team results
$a_team = $_POST['a_team'];
$a_abbr = $_POST['a_abbr'];
$a_rec = $_POST['a_rec'];
$a_q1 = $_POST['a_q1'];
$a_q2 = $_POST['a_q2'];
$a_q3  = $_POST['a_q3'];
$a_q4  = $_POST['a_q4'];
$a_ot  = $_POST['a_ot'];
$a_final  = $a_q1 + $a_q2 + $a_q3 + $a_q4 + $a_ot;

//Away quarter info
//first quarter
$away_firstqtr_smry = $_POST['away_firstqtr_smry'];

//Second quarter
$away_secondqtr_smry = $_POST['away_secondqtr_smry'];

//Third quarter
$away_thirdqtr_smry = $_POST['away_thirdqtr_smry'];

//Fourth quarter
$away_fourthqtr_smry = $_POST['away_fourthqtr_smry'];

//Ot summary
$away_ot_smry = $_POST['away_ot_smry'];

//away game summary
//$a_ttl_fdwns =5;
$a_ttl_fdwns = $_POST['a_ttl_fdwns'];
$a_rush_fdwns = $_POST['a_rush_fdwns'];
$a_pass_fdwns = $_POST['a_pass_fdwns'];
$a_penalty_fdwns = $_POST['a_penalty_fdwns'];
$a_rush_att = $_POST['a_rush_att'];
$a_rush_yds = $_POST['a_rush_yds'];
$a_pass_comp = $_POST['a_pass_comp'];
$a_pass_att = $_POST['a_pass_att'];
$a_pass_int = $_POST['a_pass_int'];
$a_ttl_passyds = $_POST['a_ttl_passyds'];
$a_ttl_yds = $_POST['a_ttl_yds'];
$a_penalties = $_POST['a_penalties'];
$a_penalty_yds = $_POST['a_penalty_yds'];

//away individual stats
$a_rushers = $_POST['a_rushers'];
$a_passers = $_POST['a_passers'];
$a_recievers = $_POST['a_recievers'];

//home team results
$h_team = $_POST['h_team'];
$h_abbr = $_POST['h_abbr'];
$h_rec = $_POST['h_rec'];
$h_q1 = $_POST['h_q1'];
$h_q2 = $_POST['h_q2'];
$h_q3  = $_POST['h_q3'];
$h_q4  = $_POST['h_q4'];
$h_ot  = $_POST['h_ot'];
$h_final  = $h_q1 + $h_q2 + $h_q3 + $h_q4 + $h_ot;

//home quarter info
//first quarter
$home_firstqtr_smry = $_POST['home_firstqtr_smry'];

//Second quarter
$home_secondqtr_smry = $_POST['home_secondqtr_smry'];

//Third quarter
$home_thirdqtr_smry = $_POST['home_thirdqtr_smry'];

//Fourth quarter
$home_fourthqtr_smry = $_POST['home_fourthqtr_smry'];

//Ot summary
$home_ot_smry = $_POST['home_ot_smry'];

//home game summary

$h_ttl_fdwns = $_POST['h_ttl_fdwns'];
$h_rush_fdwns = $_POST['h_rush_fdwns'];
$h_pass_fdwns = $_POST['h_pass_fdwns'];
$h_penalty_fdwns = $_POST['h_penalty_fdwns'];
$h_rush_att = $_POST['h_rush_att'];
$h_rush_yds = $_POST['h_rush_yds'];
$h_pass_comp = $_POST['h_pass_comp'];
$h_pass_att = $_POST['h_pass_att'];
$h_pass_int = $_POST['h_pass_int'];
$h_ttl_passyds = $_POST['h_ttl_passyds'];
$h_ttl_yds = $_POST['h_ttl_yds'];
$h_penalties = $_POST['h_penalties'];
$h_penalty_yds = $_POST['h_penalty_yds'];


//home individual stats
$h_rushers = $_POST['h_rushers'];
$h_passers = $_POST['h_passers'];
$h_recievers = $_POST['h_recievers'];


?>
<table style="margin-left: auto; margin-right: auto; border=0;" border="0">

<tr>
<td style="text-align=center" colspan="8"><strong><?php echo $a_team . " " . $a_final . ", " . $h_team . " " . $h_final;?></strong></td>
</tr>
<tr>
<td style="text-align=center"></td>
<td style="text-align=center">Record</td>
<td style="text-align=center">Q1</td>
<td style="text-align=center">Q2</td>
<td style="text-align=center">Q3</td>
<td style="text-align=center">Q4</td>
<td style="text-align=center">OT</td>
<td style="text-align=center">Final</td>
</tr>
<tr>
<td style="text-align=center"><?php echo $h_abbr;?></td>
<td style="text-align=center"><?php echo $h_rec;?></td>
<td style="text-align=center"><?php echo $h_q1;?></td>
<td style="text-align=center"><?php echo $h_q2;?></td>
<td style="text-align=center"><?php echo $h_q3;?></td>
<td style="text-align=center"><?php echo $h_q4;?></td>
<td style="text-align=center"><?php echo $h_ot;?></td>
<td style="text-align=center"><?php echo $h_final;?></td>
</tr>
<tr>
<td style="text-align=center"><?php echo $a_abbr;?></td>
<td style="text-align=center"><?php echo $a_rec;?></td>
<td style="text-align=center"><?php echo $a_q1;?></td>
<td style="text-align=center"><?php echo $a_q2;?></td>
<td style="text-align=center"><?php echo $a_q3;?></td>
<td style="text-align=center"><?php echo $a_q4;?></td>
<td style="text-align=center"><?php echo $a_ot;?></td>
<td style="text-align=center"><?php echo $a_final;?></td>
</tr>
</table>
<strong>First Quarter</strong>

<?php
if ($away_firstqtr_smry != NULL){
	echo $a_abbr . " - " . $away_firstqtr_smry . " ";
}

if ($home_firstqtr_smry != NULL){
	echo $h_abbr . " - " . $home_firstqtr_smry . " ";
}?>

<strong>Second Quarter</strong>

<?php
if ($away_secondqtr_smry != NULL){
	echo $a_abbr . " - " . $away_secondqtr_smry . " ";
}

if ($home_secondqtr_smry != NULL){
	echo $h_abbr . " - " . $home_secondqtr_smry . " ";
}?>

<strong>Third Quarter</strong>


<?php
if ($away_thirdqtr_smry != NULL){
	echo $a_abbr . " - " . $away_thirdqtr_smry . " ";
}

if ($home_thirdqtr_smry != NULL){
	echo $h_abbr . " - " . $home_thirdqtr_smry . " ";
}?>

<strong>Fourth Quarter</strong>

<?php
if ($away_fourthqtr_smry != NULL){
	echo $a_abbr . " - " . $away_fourthqtr_smry . " ";
}

if ($home_fourthqtr_smry != NULL){
	echo $h_abbr . " - " . $home_fourthqtr_smry . " ";
}?>


<?php
if ($away_ot_smry != NULL or $home_ot_smry != NULL){
	echo "<strong>OT</strong>" . " ";
}

if ($away_ot_smry != NULL){
	echo $a_abbr . " - " . $away_ot_smry . " ";
}

if ($home_ot_smry != NULL){
	echo $h_abbr . " - " . $home_ot_smry . " ";
}?>

<table style="margin-left: auto; margin-right: auto;border=" border="0">
<tr>
<td style="text-align=center"></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_abbr;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_abbr;?></td>
</tr>
<tr>
<td style="text-align=center">First downs</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_ttl_fdwns;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_ttl_fdwns;?></td>
</tr>
<tr>
<td style="text-align=center">Rushing</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_rush_fdwns;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_rush_fdwns;?></td>
</tr>
<tr>
<td style="text-align=center">Passing</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_pass_fdwns;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_pass_fdwns;?></td>
</tr>
<tr>
<td style="text-align=center">Penalty</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_penalty_fdwns;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_penalty_fdwns;?></td>
</tr>
<tr>
<td style="text-align=center">Rushes-Yards</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_rush_att . " - " . $a_rush_yds;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_rush_att . " - " . $h_rush_yds;?></td>
</tr>
<tr>
<td style="text-align=center">Comp-Att-Int</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_pass_comp . " - " . $a_pass_att . " - " . $a_pass_int;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_pass_comp . " - " . $h_pass_att . " - " . $h_pass_int;?></td>
</tr>
<tr>
<td style="text-align=center">Passing Yards</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_ttl_passyds;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_ttl_passyds;?></td>
</tr>
<tr>
<td style="text-align=center">Total Yards</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_ttl_yds;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_ttl_yds;?></td>
</tr>
<tr>
<td style="text-align=center">Penalties-Yards</td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $a_penalties . " - " . $a_penalty_yds;?></td>
<td style="text-align=center"></td>
<td style="text-align=center"><?php echo $h_penalties . " - " . $h_penalty_yds;?></td>
</tr>
</table>
<strong>Rushing</strong>

<?php
if ($a_rushers != NULL){
	echo $a_abbr . " - " . $a_rushers . " ";
}

if ($h_rushers != NULL){
	echo $h_abbr . " - " . $h_rushers . " ";
}?>

<strong>Passing</strong>

<?php
if ($a_passers != NULL){
	echo $a_abbr . " - " . $a_passers . " ";
}

if ($h_passers != NULL){
	echo $h_abbr . " - " . $h_passers . " ";
}?>

<strong>Recieving</strong>

<?php
if ($a_recievers != NULL){
	echo $a_abbr . " - " . $a_recievers . " ";
}

if ($h_recievers != NULL){
	echo $h_abbr . " - " . $h_recievers . " ";
}?>
