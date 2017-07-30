<?php
include('db.php');
session_name("icsession");
session_start();

include('varset.php');

if($_POST['direction'] == "North" && $chary != "100")
$chary ++;

if($_POST['direction'] == "East" && $charx != "100")
$charx ++;

if($_POST['direction'] == "South" && $chary != "1")
$chary --;

if($_POST['direction'] == "West" && $charx != "1")
$charx --;

if($charx == "25" && $chary == "25"){
	$location = "Duel Ground";
}else{
	$location = "Castle";
}

if($_POST['goDuelGround'] == "Yes"){
	$charx = "25";
	$chary = "25";
	$location = "Duel Ground";
}

$query = mysql_query("UPDATE characters SET posx='".$charx."', posy='".$chary."', location='".$location."' WHERE username='".$charname."'");

if($_POST['goDuelGround'] == "Yes"){
	include('duelground.php');
}
include('updatestats.php');
?>