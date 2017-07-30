<?php
session_name("icsession");
session_start();
include('db.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);
$charrel = explode(", ", $char['relativeLoc']);

$findMap = mysql_query("SELECT * FROM map WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."'");
$map = mysql_fetch_assoc($findMap);

	//////Map Filler
		$findBagDrops = mysql_query("SELECT * FROM bagdrop WHERE posx='".$char['posx']."' and posy='".$char['posy']."'");
		$bagLoc = "";
		while($bag = mysql_fetch_assoc($findBagDrops)){
			$bagRel = explode(', ', $bag['relativeLoc']);
			$bagLoc .= "<div alt=\"Bag Drop\" style=\'position:absolute;left:".$bagRel[0]."px;top:".$bagRel[1]."px;width:32px;height:32px;background-image:url(images/map/locations/bag.png);\' onclick=\'grabBag(".$bag['id'].")\'></div>";
		}
		print("fillDiv('bagLocations','".$bagLoc."');");
		$findOre = mysql_query("SELECT * FROM ore WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."'");
		$oreLoc = "";
		while($ore = mysql_fetch_assoc($findOre)){
			$oreRel = explode(', ', $ore['relativeLoc']);
			$oreLoc .= "<div alt=\"Mining Spot\" style=\'position:absolute;left:".$oreRel[0]."px;top:".$oreRel[1]."px;width:33px;height:62px;z-index:1;background-image:url(images/map/locations/mining.png);\' onclick=\'mineOre(".$ore['id'].")\'></div>";
		}
		print("fillDiv('mineLocations','".$oreLoc."');");
		$playerFill = "";
		$time = time() - "600";
		$findPlayers = mysql_query("SELECT * FROM characters WHERE posx='".$char['posx']."' and posy='".$char['posy']."' and username<>'".$char['username']."' and lastactive>'".$time."'");
		while($player = mysql_fetch_assoc($findPlayers)){
			$playerRel = explode(', ', $player['relativeLoc']);
			print("
				var otherCharLocation = document.getElementById('".$player['username']."');
				otherCharLocation.style.cssText = 'position:absolute;left:".$playerRel[0]."px;top:".$playerRel[1]."px;width:32px;height:48px;background-image:url(".$player['charimage'].");transition: 0.21s;-webkit-transition: 0.21s;';
			");
			$playerFill .= "<div alt=\"".$player['username']."\" style=\'position:absolute;left:".$playerRel[0]."px;top:".$playerRel[1]."px;width:32px;height:48px;background-image:url(".$player['charimage'].");transition: 0.21s;-webkit-transition: 0.21s;\' title=\'".$player['username']."\'></div>";
		}
		
		$demonFill = "";
		$findDemons = mysql_query("SELECT * FROM demons WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."' and health>'0'");
		while($demon = mysql_fetch_assoc($findDemons)){
			$demonRel = explode(', ', $demon['relativeLoc']);
			$demonFill .= "<div alt=\"Demon Spawn\" style=\'position:absolute;left:".$demonRel[0]."px;top:".$demonRel[1]."px;width:45px;height:45px;z-index:1;background-image:url(".$demon['image'].");\' onclick=\'fightDemon(".$demon['id'].")\'></div>";
		}
		print("fillDiv('demonLocations','".$demonFill."');");
		
		
	/////foresight div filler(See it before it hits the map)
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
		print("fillDiv('foresightDiv','".$foresightBag."".$foresightOre."');");

?>