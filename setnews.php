<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
include('functions.php');

$getguild = mysql_query("SELECT * FROM guilds WHERE name='".$char['guild']."'");
$guild = mysql_fetch_assoc($getguild);
if($charname == $guild['leader'] || $charname == $guild['coleader'])
{
	$news = htmlentities((carriage($_POST['news'])));

	$setguild = mysql_query("UPDATE guilds SET news='".$news."' WHERE name='".$char['guild']."'");
	print("viewGuild();");
}
?>