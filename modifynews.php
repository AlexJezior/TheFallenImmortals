<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');

$getguild = mysql_query("SELECT * FROM guilds WHERE name='".$charguild."'");
$guild = mysql_fetch_assoc($getguild);
if($charname == $guild['leader'] || $charname == $guild['coleader'])
{
	$news = str_replace("[br]", "\\r", addslashes($guild['news']));
	$data .= "<textarea id=\'guildnews\' rows=\'12\' cols=\'70\'>".$news."</textarea><input type=\'button\' onclick=\'javascript: setNews();\' value=\'Modify\' />";
	print("fillDiv('guildsettings','".$data."');");
}
?>