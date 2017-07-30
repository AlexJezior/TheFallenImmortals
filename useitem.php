<?php 
session_name("icsession");
session_start();
include('db.php');

if($_POST['itemid'] != "Nothing"){
	
	$data = "";
	$querty = mysql_query("SELECT * FROM inventory WHERE id='".$_POST['itemid']."' AND username='".$char['username']."'");
	$inventory = mysql_fetch_assoc($querty);
	if($inventory['type'] == "Item" && $inventory['username'] == $char['username']){
		
		if($inventory['itemname'] == "Mammons Sachel"){
			$itemname = rand(1, 5);
			if($itemname == 1){
				$itemname = "Mammons Icepick";
				$itemtype = "Weapon";
			}elseif($itemname == 2){
				$itemname = "Mammons Chest";
				$itemtype = "Armour";
			}elseif($itemname == 3){
				$itemname = "Mammons Hands";
				$itemtype = "Gloves";
			}elseif($itemname == 4){
				$itemname = "Mammons Legs";
				$itemtype = "Leggings";
			}elseif($itemname == 5){
				$itemname = "Mammons Feet";
				$itemtype = "Boots";
			}
			
			$percentrange = rand(1, 10);
			if($percentrange <= 5){
				$percent = rand(1, 15);
			}elseif($percentrange >= 6 && $percentrange <= 8){
				$percent = rand(16, 35);
			}elseif($percentrange >= 9 && $percentrange <= 10){
				$percent = rand(36, 50);
			}
			
			$stron = rand(1, 2);
			if($stron == 1){
				$newstr = $percent;
			}else{
				$newstr = 0;
			}
			$dexon = rand(1, 2);
			if($dexon == 1){
				$newdex = $percent;
			}else{
				$newdex = 0;
			}
			$endon = rand(1, 2);
			if($endon == 1){
				$newend = $percent;
			}else{
				$newend = 0;
			}
			$conon = rand(1, 2);
			if($conon == 1){
				$newcon = $percent;
			}else{
				$newcon = 0;
			}
			$inton = rand(1, 2);
			if($inton == 1){
				$newint = $percent;
			}else{
				$newint = 0;
			}
			if($stron == 2 && $dexon == 2 && $endon == 2 && $conon == 2 && $inton == 2){
				$data .= "Mammon decided to keep the greeds to himself!";
			}else{
				$addtoInventory = mysql_query("INSERT INTO inventory (`username`, `itemname`, `type`, `equipped`, `strength`, `dexterity`, `endurance`, `concentration`, `intelligence`)VALUES ('".$char['username']."', '".$itemname."', '".$itemtype."', 'No', '".$newstr."', '".$newdex."', '".$newend."', '".$newcon."', '".$newint."')")or die(mysql_error());
				$deletesachel = mysql_query("DELETE FROM inventory WHERE id='".$_POST['itemid']."'");
				$data .= "(".$char['username'].", ".$itemname.", ".$itemtype.", No, ".$newstr.", ".$newdex.", ".$newend.", ".$newcon.", ".$newint.")";
			}
		}else{
			$data .= "Unidentified item, tell the admin!";
		}
		
	}else{
	
		die("Null!");
	
	}
	
}else{
	
	$data .= "Null!";

}
print("fillDiv('displayArea','".$data."');");
include('updatestats.php');
?>