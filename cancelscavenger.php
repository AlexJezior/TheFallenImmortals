<?php
session_name("icsession");
session_start();
include('db.php');
$whom = ucwords(strtolower($_POST['whom']));
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'")or die("Not logged in!");
$char = mysql_fetch_assoc($getchar);
$data = "";

if(isset($_POST['adventureid'])){
	$findAdventureInQuestion = mysql_query("SELECT * FROM scavenger WHERE id='".$_POST['adventureid']."' AND username='".$char['username']."'")or die("alert(\'Problem finding adventure!\');");
	$adventure = mysql_fetch_assoc($findAdventureInQuestion);
		if($char['username'] == $adventure['username']){
			
			mysql_query("DELETE FROM scavenger WHERE id='".$adventure['id']."'");

		}else{
			$data .= "This is not your adventure.<br />";
		}
}else{
	$data .= "Unable to find this fake adventure your have created.";
}

print("fillDiv('displayArea','".$data."');");
include('updatestats.php');
?>