<?php
session_name("icsession");
session_start();
include('db.php');
$whom = ucwords(strtolower($_POST['whom']));
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);
$data = "";

if($_POST['enemyid'] != NULL){
	
	$lookforScavenger = mysql_query("SELECT * FROM scavenger WHERE username='".$char['username']."'");
	if(mysql_num_rows($lookforScavenger) >= 1){
		print("alert('You can only accept one adventures at a time!');");
		die();
	}
	
	$findEnemy = mysql_query("SELECT * FROM enemies WHERE id='".$_POST['enemyid']."'")or die("alert('Tell the admin that you monster doesn\'t exist.');");
	$enemy = mysql_fetch_assoc($findEnemy);
	$level = $char['scavenges'] + 1;
	$locx = rand(1,100);
	$locy = rand(1,100);
	
	$howmanyItems = rand(1,4);
	if($howmanyItems == 1){
		$itemname = "Heads";
	}elseif($howmanyItems == 2){
		$itemname = "Spirits";
	}elseif($howmanyItems == 3){
		$itemname = "Weapons";
	}elseif($howmanyItems == 4){
		$itemname = "Followers";
	}else{
		$data .= "No such item to find!";
		die();
	}
	
	
	$amountNeeded = floor($level * (mt_rand(10,20)/10));
	$data .= "Adventure Details:<br /><br />Monster: ".$enemy['name']."<br />Location: ".$locx.",".$locy."<br />Level: ".number_format($level)."<br />".$itemname." needed is  0/".$amountNeeded."";
	$addAdventure = mysql_query("INSERT INTO scavenger(`username`, `level`, `location`, `monster`, `itemname`, `collect`) VALUES('".$char['username']."', '".$level."', '".$locx.", ".$locy."', '".$enemy['name']."', '".$itemname."', '0/".$amountNeeded."')");
	
	
}else{
	$data .= "<center>Good evening friend,<br />I am the Scavenger, you shall not call me anything other. I am always needing supplies for my colony, but you will never find me there. My locations are secret to keep my people alive. All you need to do is collect supplies for me and in exchange I will pay you for your time.</center>";
	
	$openScavenger = mysql_query("SELECT * FROM scavenger WHERE username='".$char['username']."'");
	$watchaGot = mysql_num_rows($openScavenger);
	if($watchaGot < 5){
		$data .= "<center><select id=\'enemylist\'>";
		$getenemies = mysql_query("SELECT * FROM enemies ORDER BY level");
		while($enemies = mysql_fetch_array($getenemies))
		{
		    if($char['enemyid'] == $enemies['id'])
		    {
		        $data .= "<option value=\'".$enemies['id']."\' selected=\'selected\'>".$enemies['name']." (".$enemies['level'].")</option>";
		    }
		
		    else
		    {
		        $data .= "<option value=\'".$enemies['id']."\'>".$enemies['name']." (".$enemies['level'].")</option>";
		    }
		}
		$data .= "</select><input name=\'btnSubmit\' type=\'button\' value=\'Begin Adventure\' onclick=\'this.disabled=true;this.value=\"Scavenging for an adventure...\";startScavenge();\' /></center>";
	}
}

$data .= "<br /><table border=\'1\'>";
$findScavenges = mysql_query("SELECT * FROM characters ORDER BY scavenges DESC LIMIT 50");
$data .= "<tr><td><u>User</u></td><td><u>Scavenges</u></td></tr>";
while($tscavenger = mysql_fetch_assoc($findScavenges)){
	$data .= "<tr><td>".$tscavenger['username']."</td><td>".$tscavenger['scavenges']."</td></tr>";
}
$data .= "</table>";



print("fillDiv('displayArea','".$data."');");
include('updatestats.php');
?>