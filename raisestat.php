<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

$charname = $char['username'];
$statpoints = $char['stats'];

$charstr = $char['strength'];
$chardex = $char['dexterity'];
$charend = $char['endurance'];
$charint = $char['intelligence'];
$charcon = $char['concentration'];

if($statpoints >= $_POST['statAmount'] && $_POST['statAmount'] > "0" && is_numeric($_POST['statAmount']))
{
	$newstatpoints = $statpoints - $_POST['statAmount'];
	$raiseby = floor($_POST['statAmount'] * "1.10");
	if($_POST['statChoice'] == "Strength")
	{
		$newstr = $charstr + $raiseby;
		$raisestat = mysql_query("UPDATE characters SET strength='".$newstr."', stats='".$newstatpoints."' WHERE id='".$_SESSION['userid']."' ") or die(mysql_error());
	}
	elseif($_POST['statChoice'] == "Dexterity")
	{
		$newdex = $chardex + $raiseby;
		$raisestat = mysql_query("UPDATE characters SET dexterity='".$newdex."', stats='".$newstatpoints."' WHERE id='".$_SESSION['userid']."' ") or die(mysql_error());
	}
	elseif($_POST['statChoice'] == "Endurance")
	{
		$newend = $charend + $raiseby;
		$raisestat = mysql_query("UPDATE characters SET endurance='".$newend."', stats='".$newstatpoints."' WHERE id='".$_SESSION['userid']."' ") or die(mysql_error());
	}
	elseif($_POST['statChoice'] == "Intelligence")
	{
		$newint = $charint + $raiseby;
		$raisestat = mysql_query("UPDATE characters SET intelligence='".$newint."', stats='".$newstatpoints."' WHERE id='".$_SESSION['userid']."' ") or die(mysql_error());
	}
	elseif($_POST['statChoice'] == "Concentration")
	{
		$newcon = $charcon + $raiseby;
		$raisestat = mysql_query("UPDATE characters SET concentration='".$newcon."', stats='".$newstatpoints."' WHERE id='".$_SESSION['userid']."' ") or die(mysql_error());
	}
	$data = "<center>".$_POST['statChoice']." raised by ".$raiseby." at the cost of ".$_POST['statAmount']." Stat Points.<br />You have ".$newstatpoints." Stat Points to spend!<br />You will get a 10% bonus on the Stat you choose to raise.<br /><br /><select id=\'statchoice\'><option value=\'Strength\'>Strength</option><option value=\'Dexterity\'>Dexterity</option><option value=\'Endurance\'>Endurance</option><option value=\'Intelligence\'>Intelligence</option><option value=\'Concentration\'>Concentration</option></select> <input type=\'text\' id=\'amount\' /> <input type=\'button\' value=\'Raise\' onclick=\'raiseStat();\' /></center>";
}
else
{
	$data = "<center>That is not possible<br />You have ".$statpoints." Stat Points to spend!<br />You will get a 10% bonus on the Stat you choose to raise.<br /><br /><select id=\'statchoice\'><option value=\'Strength\'>Strength</option><option value=\'Dexterity\'>Dexterity</option><option value=\'Endurance\'>Endurance</option><option value=\'Intelligence\'>Intelligence</option><option value=\'Concentration\'>Concentration</option></select> <input type=\'text\' id=\'amount\' /> <input type=\'button\' value=\'Raise\' onclick=\'raiseStat();\' /></center>";
}

include('updatestats.php');
print("fillDiv('displayArea','".$data."');");
?>