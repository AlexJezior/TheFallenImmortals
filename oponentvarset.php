<?php

//Character & Player classifications
$oponentname = $oponent['username'];
$oponentulvl = $oponent['userlevel'];
$oponentclass = $oponent['class'];
$oponentguild = $oponent['guild'];
$oponentstatus = $oponent['status'];
$oponentip = $oponent['ip'];

//Level and experience
$oponentlvl = $oponent['level'];
$oponentexp = $oponent['expacq'];
$oponenttnl = $oponent['expreq'];

//Character stats
$oponentlevel = $oponent['level'];
$oponentstats = $oponent['stats'];
$oponentstr = $oponent['strength'];
$oponentdex = $oponent['dexterity'];
$oponentend = $oponent['endurance'];
$oponentint = $oponent['intelligence'];
$oponentcon = $oponent['concentration'];
$oponentlife = $oponent['life'];
$oponentauto = $oponent['auto'];

//Cash modified fields
$oponentcash = $oponent['cash'];
$oponentstatmulti = $oponent['statmult'] / 100;

//Modified stats from item bonuses (For display purposes only)
$getinv = mysql_query("SELECT * FROM inventory WHERE username='".$oponentname."' AND equipped='Yes'");
while($inv = mysql_fetch_array($getinv))
{
	$oponentstrmod += $inv['strength'];
	$oponentdexmod += $inv['dexterity'];
	$oponentendmod += $inv['endurance'];
	$oponentintmod += $inv['intelligence'];
	$oponentconmod += $inv['concentration'];
}
$oponentstrmod += $oponentstr;
$oponentdexmod += $oponentdex;
$oponentendmod += $oponentend;
$oponentintmod += $oponentint;
$oponentconmod += $oponentcon;
if($oponentlife > $oponentendmod)	$oponentlife = $oponentendmod;

//Location
$oponentloc = $oponent['location'];
$oponentx = $oponent['posx'];
$oponenty = $oponent['posy'];

//Anything that doesn't fall under the other categories
$oponentgold = $oponent['gold'];
$oponentbank = $oponent['bank'];

//Characters Guild
if($oponentguild != "None")
{
	$getguild = mysql_query("SELECT * FROM guilds WHERE name='".$oponentguild."'");
	$oponentguild = mysql_fetch_assoc($getguild);
}
?>