<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);


if($_POST['auto'] == "Yes")
{
	$randomCAPTCHA = rand(1,45);
	if($randomCAPTCHA == 1 && $char['auto'] == 0 && $char['username']=="Ajezior"){
		$amount_of_time = 600+ time();
		$setupCaptcha = mysql_query("UPDATE characters SET auto='0', captcha='Active', captcha_time_limit='".$amount_of_time."' WHERE username='".$char['username']."'");
		$data = "<strong>You have <u>10 minutes</u> to complete CAPTCHA security, from the time it was given, before your account gets suspended.</strong><br /><div id=\"recaptcha_div\"></div><br />";
		$data .= "<input type=\"button\" value=\"Check answer\" onClick=\"verifyCaptcha();\">";
		print("fillDiv('displayArea','".$data."');");
		print("showRecaptcha('recaptcha_div');");
		die();
	}else{
		if($char['auto'] > "0"){
			print("alert('Auto Attack is already running cheater!');");
			die();
		}else{
			$charauto = "".$char['automax']."";
			$query = mysql_query("UPDATE characters SET auto='".$char['automax']."', lastfight='0' WHERE id='".$_SESSION['userid']."'");
		}
	}
}elseif($char['auto'] == "0"){
	$randomCAPTCHA = rand(1,1500);
	if($randomCAPTCHA == 1 && $char['username']=="Ajezior"){
		$amount_of_time = 600 + time();
		$setupCaptcha = mysql_query("UPDATE characters SET auto='0', captcha='Active', captcha_time_limit='".$amount_of_time."' WHERE username='".$char['username']."'");
		$data = "<strong>You have <u>10 minutes</u> to complete CAPTCHA security, from the time it was given, before your account gets suspended.</strong><br /><div id=\"recaptcha_div\"></div><br />";
		$data .= "<input type=\"button\" value=\"Check answer\" onClick=\"verifyCaptcha();\">";
		print("fillDiv('displayArea','".$data."');");
		print("showRecaptcha('recaptcha_div');");
		die();
	}
}





$getenemy = mysql_query("SELECT * FROM enemies WHERE id='".$_POST['enemyid']."'");
$enemy = mysql_fetch_assoc($getenemy);

$enemyid = $enemy['id'];
$enemyname = $enemy['name'];
$enemylvl = $enemy['level'];
if($char['enemylife'] > "0"){
	$enemylife = $char['enemylife'];
}else{
	$enemylife = "1" + $enemylvl * "23";
}

if($enemylife < "1"){
	$enemylife = "1" + $enemylvl * "23";
}
$date = time();


$updatechar = mysql_query("UPDATE characters SET enemyid='".$enemyid."', enemylife='".$enemylife."', lastactive='".$date."' WHERE id='".$_SESSION['userid']."'");



$data = $data."<center><select id=\'enemylist\'>";
$getenemies = mysql_query("SELECT * FROM enemies ORDER BY level");
while($enemies = mysql_fetch_array($getenemies))
{
	if($enemyid == $enemies['id'])
	{
		$data = $data."<option value=\'".$enemies['id']."\' selected=\'selected\'>".$enemies['name']." (".$enemies['level'].")</option>";
	}
	else
	{
		$data = $data."<option value=\'".$enemies['id']."\'>".$enemies['name']." (".$enemies['level'].")</option>";
	}
}
$data .= "</select>";

$data .= "<br />You engage battle with the ".$enemyname."<br />Your HP: ".$char['life']." - Your MP: ".$char['mana']." (".$enemyname." HP left: ".$enemylife.")<br /></center>";
if($char['auto'] == "0" && $char['security'] != "1")
{
	$randomNumber = rand(10,10);
	$random = $randomNumber / 10;
	sleep($random);
}else{
	
}


include('attackenemy.php');
?>