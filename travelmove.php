<?php
session_name("icsession");
session_start();
include('db.php');
$time = time();
$setactive = mysql_query("UPDATE characters SET lastactive='".$time."' WHERE id='".$_SESSION['userid']."'");
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);
$relLoc = explode(", ", $char['relativeLoc']);
$updateMap = "False";
$findMap = mysql_query("SELECT * FROM map WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."'");
$map = mysql_fetch_assoc($findMap);
$findOre = mysql_query("SELECT * FROM ore WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."'");
$ore = mysql_fetch_assoc($findOre);
$oreRel = explode(', ', $ore['relativeLoc']);
$oreXtop = $oreRel[0]+16;
$oreXbottom = $oreRel[0]-16;
$oreYtop = $oreRel[1]+16;
$oreYbottom = $oreRel[1]-16;
$findDemons = mysql_query("SELECT * FROM demons WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."' and health>'0'");
$demon = mysql_fetch_assoc($findDemons);
$demonRel = explode(', ', $demon['relativeLoc']);
$demonXtop = $demonRel[0]+16;
$demonXbottom = $demonRel[0]-16;
$demonYtop = $demonRel[1]+16;
$demonYbottom = $demonRel[1]-16;



if(!isset($_POST['direction'])){
	die('alert("Invalid movement.");');
}else{
	if($_POST['direction'] == "up"){
		//for sprite up movement animation
		//top, right, bottom, left
		$up = array("top:-144px;left:0px;clip: rect(144px, 32px, 192px, 0px);","left:-32px;top:-144px;clip: rect(144px, 64px, 192px, 32px);","top:-144px;left:-64px;clip: rect(144px, 96px, 192px, 64px);","top:-144px;left:-96px;clip: rect(144px, 128px, 192px, 96px);");
		if($char['animationSequence'] < 3){
			$animationSequence = $char['animationSequence']+1;
		}else{
			$animationSequence = 0;
		}
		$animation = $up[$animationSequence];
		
	
		//Border detection
		if(($map['locationpadding'] == "-32px 0px 0px 0px" ||  $map['locationpadding'] == "-32px 0px 0px -32px" ||  $map['locationpadding'] == "-32px -32px 0px 0px") && $relLoc[1] <= "32"){
			die();
		}
		
		$relLoc[1] -= 16;
		
		//Finding Ore collision
		if(mysql_num_rows($findOre) >= "1" && ($oreXtop >= $relLoc[0] && $oreXbottom <= $relLoc[0]) && ($oreYtop >= $relLoc[1] && $oreYbottom <= $relLoc[1])){
			die();
		}
		//Finding Demon collision
		if(mysql_num_rows($findDemons) >= "1" && ($demonXtop >= $relLoc[0] && $demonXbottom <= $relLoc[0]) && ($demonYtop >= $relLoc[1] && $demonYbottom <= $relLoc[1])){
			die();
		}
		if($relLoc[1]<0){
			//550 pixels from the top subtracting character height of 48 pixels
			$relLoc[1] = 502;
			mysql_query("UPDATE characters SET posy=posy+'1' WHERE username='".$char['username']."'");
			$updateMap = "True";
		}
		mysql_query("UPDATE characters SET relativeLoc='".$relLoc[0].", ".$relLoc[1]."', animationSequence='".$animationSequence."' WHERE username='".$char['username']."'") or die(mysql_error());
		
	}elseif($_POST['direction'] == "left"){
		/* top, right, bottom, left*/
		$left = array("top:-48px;left:0px;clip: rect(48px, 32px, 96px, 0px);","left:-32px;top:-48px;clip: rect(48px, 64px, 96px, 32px);","top:-48px;left:-64px;clip: rect(48px, 96px, 96px, 64px);","top:-48px;left:-96px;clip: rect(48px, 128px, 96px, 96px);");
		if($char['animationSequence'] < 3){
			$animationSequence = $char['animationSequence']+1;
		}else{
			$animationSequence = 0;
		}
		$animation = $left[$animationSequence];
	
		//Border detection
		if($relLoc[0] <= "32" && ($map['locationpadding'] == "0px 0px -32px -32px" || $map['locationpadding'] == "0px 0px 0px -32px" || $map['locationpadding'] == "-32px 0px 0px -32px")){
			die();
		}
		
		$relLoc[0] -= 16;
		
		if(mysql_num_rows($findOre) >= "1" && ($oreXtop >= $relLoc[0] && $oreXbottom <= $relLoc[0]) && ($oreYtop >= $relLoc[1] && $oreYbottom <= $relLoc[1])){
			die();
		}
		//Finding Demon collision
		if(mysql_num_rows($findDemons) >= "1" && ($demonXtop >= $relLoc[0] && $demonXbottom <= $relLoc[0]) && ($demonYtop >= $relLoc[1] && $demonYbottom <= $relLoc[1])){
			die();
		}
		if($relLoc[0]<0){
			$relLoc[0] = 1018;
			mysql_query("UPDATE characters SET posx=posx-'1' WHERE username='".$char['username']."'");
			$updateMap = "True";
		}
		mysql_query("UPDATE characters SET relativeLoc='".$relLoc[0].", ".$relLoc[1]."', animationSequence='".$animationSequence."' WHERE username='".$char['username']."'");
		
	}elseif($_POST['direction'] == "right"){
		/* top, right, bottom, left*/
		$right = array("top:-96px;left:0px;clip: rect(96px, 32px, 144px, 0px);","left:-32px;top:-96px;clip: rect(96px, 64px, 144px, 32px);","top:-96px;left:-64px;clip: rect(96px, 96px, 144px, 64px);","top:-96px;left:-96px;clip: rect(96px, 128px, 144px, 96px);");
		if($char['animationSequence'] < 3){
			$animationSequence = $char['animationSequence']+1;
		}else{
			$animationSequence = 0;
		}
		$animation = $right[$animationSequence];
	
		//Border detection
		if($relLoc[0] >= "986" && ($map['locationpadding'] == "0px -32px -32px 0px" || $map['locationpadding'] == "0px -32px 0px 0px" || $map['locationpadding'] == "-32px -32px 0px 0px")){
			die();
		}
		
		$relLoc[0] += 16;
		
		if(mysql_num_rows($findOre) >= "1" && ($oreXtop >= $relLoc[0] && $oreXbottom <= $relLoc[0]) && ($oreYtop >= $relLoc[1] && $oreYbottom <= $relLoc[1])){
			die();
		}
		//Finding Demon collision
		if(mysql_num_rows($findDemons) >= "1" && ($demonXtop >= $relLoc[0] && $demonXbottom <= $relLoc[0]) && ($demonYtop >= $relLoc[1] && $demonYbottom <= $relLoc[1])){
			die();
		}
		if($relLoc[0]>1018){
			$relLoc[0] = 0;
			mysql_query("UPDATE characters SET posx=posx+'1' WHERE username='".$char['username']."'");
			$updateMap = "True";
		}
		mysql_query("UPDATE characters SET relativeLoc='".$relLoc[0].", ".$relLoc[1]."', animationSequence='".$animationSequence."' WHERE username='".$char['username']."'");
		
	}elseif($_POST['direction'] == "down"){
	
		/* top, right, bottom, left*/
		$down = array("left:0px;clip: rect(0px, 32px, 48px, 0px);","left:-32px;clip: rect(0px, 64px, 48px, 32px);","left:-64px;clip: rect(0px, 96px, 48px, 64px);","left:-96px;clip: rect(0px, 128px, 48px, 96px);");
		if($char['animationSequence'] < 3){
			$animationSequence = $char['animationSequence']+1;
		}else{
			$animationSequence = 0;
		}
		$animation = $down[$animationSequence];
	
		//Border detection
		if($relLoc[1] >= "460" AND ($map['locationpadding'] == "0px 0px -32px 0px" || $map['locationpadding'] == "0px 0px -32px -32px" || $map['locationpadding'] == "0px -32px -32px 0px")){
			die();
		}
	
		$relLoc[1] += 16;
		
		if(mysql_num_rows($findOre) >= "1" && ($oreXtop >= $relLoc[0] && $oreXbottom <= $relLoc[0]) && ($oreYtop >= $relLoc[1] && $oreYbottom <= $relLoc[1])){
			die();
		}
		//Finding Demon collision
		if(mysql_num_rows($findDemons) >= "1" && ($demonXtop >= $relLoc[0] && $demonXbottom <= $relLoc[0]) && ($demonYtop >= $relLoc[1] && $demonYbottom <= $relLoc[1])){
			die();
		}
		if($relLoc[1] > 502){
			$relLoc[1] = 0;
			mysql_query("UPDATE characters SET posy=posy-'1' WHERE username='".$char['username']."'");
			$updateMap = "True";
		}
		mysql_query("UPDATE characters SET relativeLoc='".$relLoc[0].", ".$relLoc[1]."', animationSequence='".$animationSequence."' WHERE username='".$char['username']."'");
		
	}else{
		die('alert("Invalid movement.");');
	}
	if($updateMap == "True"){
		$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
		$char = mysql_fetch_assoc($getchar);
		$findMap = mysql_query("SELECT * FROM map WHERE xpos='".$char['posx']."' and ypos='".$char['posy']."'");
		$map = mysql_fetch_assoc($findMap);
		print("
			var MainCanvas = document.getElementById('MainCanvas');
			MainCanvas.style.cssText = 'position:relative; top:110px; width:1050px; height:550px; background-color:#000000; background-image:url(".$map['background'].");';
		");
		
		
		print("fillDiv('dispLocation','Location: (".$char['posx'].", ".$char['posy'].")');");
		
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
			$oreLoc .= "<div alt=\"Mining Ore\" style=\'position:absolute;left:".$oreRel[0]."px;top:".$oreRel[1]."px;width:33px;height:62px;z-index:1;background-image:url(images/map/locations/mining.png);\' onclick=\'mineOre(".$ore['id'].")\'></div>";
		}
		print("fillDiv('mineLocations','".$oreLoc."');");
	}
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
	
	
	
	
	
	print("
	var charLocation = document.getElementById('charLocation');
	charLocation.style.cssText = 'position:absolute;left:".$relLoc[0]."px;top:".$relLoc[1]."px;width:32px;height:48px;transition: 0.21s;-webkit-transition: 0.21s;';
	
	var charDiv = document.getElementById('charDiv');
	charDiv.style.cssText = 'position:absolute;width:130px;height:194px;background-image:url(".$char['charimage'].");".$animation."';
	
	var charHair = document.getElementById('charHair');
	charHair.style.cssText = 'position:absolute;width:130px;height:194px;background-image:url(".$char['charhair'].");';
	
	var charLeggings = document.getElementById('charLeggings');
	charLeggings.style.cssText = 'position:absolute;width:130px;height:194px;background-image:url(".$char['charleggings'].");';
	");
}
?>