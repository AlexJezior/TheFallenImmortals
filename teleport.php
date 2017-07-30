<?php
session_name("icsession");
session_start();
include('db.php');
$whom = ucwords(strtolower($_POST['whom']));
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);

if($char['teleporter'] == "Yes"){
	$xcord = $_POST['xcord'];
	$ycord = $_POST['ycord'];
	$lastTeleport = $char['teleportlast'] + 420;
	if($lastTeleport > time()){
		die("alert('You can only use the teleport once every 7 minutes.');");
	}
	if($xcord <= "100" && $xcord >= "1" && $ycord <= "100" && $ycord >= "1"){
		
		$timeTeleported = time();
		$updateLocation = mysql_query("UPDATE characters SET posx='".$xcord."', posy='".$ycord."', teleportlast='".$timeTeleported."' WHERE username='".$char['username']."'");
		$findMap = mysql_query("SELECT * FROM map WHERE xpos='".$xcord."' and ypos='".$ycord."'");
		$map = mysql_fetch_assoc($findMap);
		print("fillDiv('locationMap','<div style=\'width:480px;height:480px;background-color:#000000;background-image:url(".$map['background'].");padding:".$map['locationpadding'].";\'></div>');");
		print("fillDiv('cLocation','Current Location: (".$char['posx'].", ".$char['posy'].")');");
		print("alert('You awaken in ".$xcord.", ".$ycord.". Did you even fall asleep?');");
		
	}else{
		print("alert('Your new location cannot be beyond 100, 100. And below 1, 1.');");
	}

}else{
	print("alert('You need to buy a teleporter from the cash page.');");
}
include('updatestats.php');
?>