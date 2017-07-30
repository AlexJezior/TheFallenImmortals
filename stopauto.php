<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

$stopAuto = mysql_query("UPDATE characters SET auto='0' WHERE id='".$char['id']."'");
$data = "<center>Auto stopped! <a href=\'Javascript: runAway();\'>Back to Fight</a>!</center>";
print("fillDiv('displayArea','".$data."');");
?>