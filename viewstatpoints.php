<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);

$statpoints = $char['stats'];

print("fillDiv('displayArea','<center>You have ".$statpoints." Stat Points to spend!<br />You will get a 10% bonus on the Stat you choose to raise.<br /><br /><select id=\'statchoice\'><option value=\'Strength\'>Strength</option><option value=\'Dexterity\'>Dexterity</option><option value=\'Endurance\'>Endurance</option><option value=\'Intelligence\'>Intelligence</option><option value=\'Concentration\'>Concentration</option></select> <input type=\'text\' id=\'amount\' /> <input type=\'button\' value=\'Raise\' onclick=\'raiseStat();\' /></center>');");
?>