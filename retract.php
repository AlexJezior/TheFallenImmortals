<?php 
session_name("icsession");
session_start();
include('db.php');

$findapplication = mysql_query("SELECT * FROM applications WHERE username='".$char['username']."'");
if(mysql_num_rows($findapplication) == 1){

	$removeApplication = mysql_query("DELETE FROM applications WHERE username='".$char['username']."'")or die(mysql_error());
	$data = "You can now apply to a different guild.";
	$giveTheGoldBack = mysql_query("UPDATE characters SET gold=gold+'900000' WHERE username='".$char['username']."'");

}else{
	
	$data = "Failed!";

}

print("fillDiv('displayArea','".$data."');");
include('updatestats.php');
?>