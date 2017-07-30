<?php
session_name("icsession");
session_start();
include('db.php');


$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);
$charrel = explode(", ", $char['relativeLoc']);

$findMap = mysql_query("SELECT * FROM map WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."'");
$map = mysql_fetch_assoc($findMap);	
		//Show the teleporter if purchased
		$xtop = $char['posx'] + $char['foresight'];
		$xbottom = $char['posx'] - $char['foresight'];
		$ytop = $char['posy'] + $char['foresight'];
		$ybottom = $char['posy'] - $char['foresight'];
		$grabBag = mysql_query("SELECT * FROM `bagdrop` WHERE (`posx` BETWEEN ".$xbottom." AND ".$xtop.") AND (`posy` BETWEEN ".$ybottom." AND ".$ytop.")");
		$bag = mysql_fetch_assoc($grabBag);
		$there = mysql_num_rows($grabBag);
		if($there > "0"){
			$foresightBag = "-There is a bag at ".$bag['posx'].", ".$bag['posy']."<br />";
		}
		$findOre = mysql_query("SELECT * FROM ore WHERE (`xpos` BETWEEN ".$xbottom." AND ".$xtop.") AND (`ypos` BETWEEN ".$ybottom." AND ".$ytop.")");
		$there = mysql_num_rows($findOre);
		if($there > "0"){
			$ore = mysql_fetch_assoc($findOre);
			$foresightOre = "-An Ore was spotted at ".$ore['xpos'].",".$ore['ypos']."<br />";
		}
$data = "<div id=\"MainCanvas\" oncontextmenu=\"rightClickList(event);return false;\" style=\"position:relative; top:110px; width:1050px; height:550px; background-color:#000000; background-image:url(".$map['background'].");\">";
	$data .= "<div id=\'mineLocations\'>";
	$findOre = mysql_query("SELECT * FROM ore WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."'");
	while($ore = mysql_fetch_assoc($findOre)){
		$oreRel = explode(', ', $ore['relativeLoc']);
		$data .= "<div alt=\"Mining Ore\" style=\'position:absolute;left:".$oreRel[0]."px;top:".$oreRel[1]."px;width:33px;height:62px;z-index:1;background-image:url(images/map/locations/mining.png);\' onclick=\'mineOre(".$ore['id'].")\'></div>";
	}
	$data .= "</div>";

	$data .= "<div id=\'bagLocations\'>";
	$findBagDrops = mysql_query("SELECT * FROM bagdrop WHERE posx='".$char['posx']."' and posy='".$char['posy']."'");
	while($bag = mysql_fetch_assoc($findBagDrops)){
		$bagRel = explode(', ', $bag['relativeLoc']);
		$data .= "<div alt=\"Bag Drop\" style=\'position:absolute;left:".$bagRel[0]."px;top:".$bagRel[1]."px;width:32px;height:32px;background-image:url(images/map/locations/bag.png);\' onclick=\'grabBag(".$bag['id'].")\'></div>";
	}
	$data .= "</div>";

	$data .= "<div id=\'demonLocations\'>";
	$findDemons = mysql_query("SELECT * FROM demons WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."' and health>'0'");
	while($demon = mysql_fetch_assoc($findDemons)){
		$demonRel = explode(', ', $demon['relativeLoc']);
		$data .= "<div alt=\"Demon Spawn\" style=\'position:absolute;left:".$demonRel[0]."px;top:".$demonRel[1]."px;width:45px;height:45px;z-index:1;background-image:url(".$demon['image'].");\' onclick=\'fightDemon(".$demon['id'].")\'></div>";
	}
	$data .= "</div>";

	$data .= "<div id=\'otherPlayers\'>";
	$time = time() - "600";
	$findPlayers = mysql_query("SELECT * FROM characters WHERE posx='".$char['posx']."' and posy='".$char['posy']."' and username<>'".$char['username']."' and lastactive>'".$time."'");
	while($player = mysql_fetch_assoc($findPlayers)){
		$playerRel = explode(', ', $player['relativeLoc']);
		$data .= "<div id=\"".$player['username']."\" style=\'position:absolute;left:".$playerRel[0]."px;top:".$playerRel[1]."px;width:32px;height:48px;background-image:url(".$player['charimage'].");\' title=\'".$player['username']."\'><div id=\'otherCharHair\' style=\'position:absolute;width:32px;height:48px;background-image:url(".$player['charhair'].");\'><div id=\'otherCharLeggings\' style=\'position:absolute;width:32px;height:48px;background-image:url(".$player['charleggings'].");\'></div></div></div>";
	}
	$data .= "</div>";

	$data .= "<div style=\'position:relative;left:".$charrel[0]."px;top:".$charrel[1]."px;width:32px;height:48px;background-image:url(".$char['charimage'].");\' id=\"charLocation\"><div id=\'charDiv\'><div id=\'charHair\' style=\'position:absolute;width:32px;height:48px;background-image:url(".$char['charhair'].");\'><div id=\'charLeggings\' style=\'position:absolute;width:32px;height:48px;background-image:url(".$char['charleggings'].");\'></div></div></div></div>";

	//Loading the map background image and loading the right click event area. Hidden until right click executed.
	$data .= "<div id=\'rightClickList\' style=\'display: none;\'><a>Add Structure</a><br /><a>Add NPC</a><br /><a>Add Monster</a><br /><a onclick=\'closeRightClickList();\'>Cancel</a></div>";
	
	//Display character location in the corner
	$data .= "<div id=\"dispLocation\" style=\"position:absolute; top:0px; left:0px; font-size:10px;\">Location: (".$char['posx'].", ".$char['posy'].")</div>";


$data .= "</div>";


print("fillDiv('2dCanvas','".$data."');");
//require_once("travelOtherPlayers.php");
print("loadMap();");
?>