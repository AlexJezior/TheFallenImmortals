<?php
session_name("icsession");
session_start();
include('db.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);
$data = "";

if($char['life'] > 0){
	if($char['posx'] == "25" && $char['posy'] == "25"){
		$data .= "You are in the Duel Ground! A field full of blood and guts... choose your oponent wisly.<br /><br />";
		$time = time() - "600";
		$findCharacters = mysql_query("SELECT * FROM characters where level>'100' AND lastactive>'".$time."' AND username<>'".$char['username']."' ORDER BY level");
		$data .= "<table>";
		$data .= "<tr><td>Username</td><td colspan=\'2\'>Level</td></tr>";
		while($duel = mysql_fetch_array($findCharacters)){
			$data .= "<tr><td>".$duel['username']."</td><td>".number_format($duel['level'])."</td><td><a href=\'javascript: requestFight(\"".$duel['username']."\");\'>Request Fight</a></td></tr>";
		}
		$data .= "</table>";
	}else{
		$data .= "Would you like to go to the Duel Ground(Location: 25, 25)? <a href=\'javascript: goDuelGround(\"Yes\");\'>Yes</a>";
	}
}else{
	$data .= "Dead people cannot fight.";
}
print("fillDiv('displayArea','".$data."');");
include('active.php');
?>