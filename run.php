<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);
$display = "";
$display .= "";

if($char['changeusername'] == "1"){
	$display .= "Change Username Pass:<input type=\'input\' id=\'newUsername\'><input type=\'button\' value=\'Change\' onclick=\'changeUsername();\'><br />";
}


if($char['life'] <= "0"){
	$display .= "<input type=\'button\' id=\'ressurect\' value=\'Ressurect\' onClick=\'ressurectChar();\' />";
	$updatemonster = mysql_query("UPDATE characters SET enemylife='0' WHERE id='".$_SESSION['userid']."'");
	print("fillDiv('displayArea','".$display."');");
	die();
}
$display .= "<center>";
$display .="<select id=\'enemylist\'>";
$getenemies = mysql_query("SELECT * FROM enemies ORDER BY level");
while($enemies = mysql_fetch_array($getenemies))
{
    if($char['enemyid'] == $enemies['id'])
    {
        $display .= "<option value=\'".$enemies['id']."\' selected=\'selected\'>".$enemies['name']." (".$enemies['level'].")</option>";
    }

    else
    {
        $display .= "<option value=\'".$enemies['id']."\'>".$enemies['name']." (".$enemies['level'].")</option>";
    }
}

if($char['security'] == "1"){
    $top = mt_rand(1,400);
    $left = mt_rand(1,400);
    $display .= "</select> Run away button!!! Go catch it! <input type=\'button\' value=\'Fight\' onclick=\'this.disabled=true;this.value=\"Submitting...\";fightEnemy();\' style=\'position:absolute;top:".$top."px;left:".$left."px;\' /></center><br /><br />";
}else{
    $display .= "</select>";
	$display .= "<div id=\'fightingButton\'>";
    if($char['enemylife'] <= "0" && $char['auto'] == "0"){
		$display .= "<input name=\'btnSubmit\' type=\'button\' value=\'Fight\' onclick=\'this.disabled=true;this.value=\"Submitting...\";fightEnemy();\' />";
	}
    if($char['auto'] == "0"){
    	$display .= "<div id=\'autoButton\'><input type=\'button\' value=\'Auto\' onclick=\'autoFightEnemy();\' /></div>";
	}
	$display .= "</div>";
    $display .= "</center><br /><br />";
}

$getSmallDemons = mysql_query("SELECT * FROM demons WHERE health>'0' AND power='1'");
if(mysql_num_rows($getSmallDemons) > "0" && $char['level'] < '10000'){
    while($demon = mysql_fetch_array($getSmallDemons)){
        $display .= "".$demon['name']."/ Health:".number_format($demon['health'])." (".$demon['xpos'].", ".$demon['ypos'].")<br />";
    }
}
$getBigDemons = mysql_query("SELECT * FROM demons WHERE health>'0' AND power='2'");
if(mysql_num_rows($getBigDemons) > "0"){
    while($demon = mysql_fetch_array($getBigDemons)){
        $display .= "".$demon['name']."/ Health:".number_format($demon['health'])." (".$demon['xpos'].", ".$demon['ypos'].")<br />";
    }
}
print("fillDiv('displayArea','".$display."');");
if($char['auto'] > "0" && $char['security'] != "1")
{
	if($char['username'] == "Vulcan"){
		print("setTimeout('fightEnemy();', 2000);");
	}else{
		print("setTimeout('fightEnemy();', 2000);");
	}
}
?>