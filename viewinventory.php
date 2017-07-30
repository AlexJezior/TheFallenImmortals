<?php 
session_name("icsession");
session_start();
include('db.php');
	
	$data = "<center><b>Inventory</b><br />";
	$data .= "<select id=\'item\' onchange=\'itemDesc()\'>";
	$data .= "<option value=\'Nothing\'><<<<<-EQUIPPED->>>>></option>";
	$getinventory = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND  equipped='Yes' ORDER BY type");
	while($inventory = mysql_fetch_array($getinventory)){
		$data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']."</option>";
	}
	$data .= "<option value=\'Nothing\'><<<<<-UNEQUIPPED->>>>></option>";
	$getinventory = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND  equipped='No' AND type='Weapon' ORDER BY type");
	if(mysql_num_rows($getinventory) >= 1){
		$data .= "<option value=\'Nothing\'>------Weapon------</option>";
		while($inventory = mysql_fetch_array($getinventory)){
			$power = $inventory['strength'] + $inventory['dexterity'] + $inventory['endurance'] + $inventory['concentration'] + $inventory['intelligence'];
			$data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']." - Power: ".number_format($power)."</option>";
		}
	}
	$getinventory = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND  equipped='No' AND type='Armour' ORDER BY type");
	if(mysql_num_rows($getinventory) >= 1){
		$data .= "<option value=\'Nothing\'>------Armour------</option>";
		while($inventory = mysql_fetch_array($getinventory)){
			$power = $inventory['strength'] + $inventory['dexterity'] + $inventory['endurance'] + $inventory['concentration'] + $inventory['intelligence'];
			$data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']." - Power: ".number_format($power)."</option>";
		}
	}
	$getinventory = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND  equipped='No' AND type='Gloves' ORDER BY type");
	if(mysql_num_rows($getinventory) >= 1){
		$data .= "<option value=\'Nothing\'>------Gloves------</option>";
		while($inventory = mysql_fetch_array($getinventory)){
			$power = $inventory['strength'] + $inventory['dexterity'] + $inventory['endurance'] + $inventory['concentration'] + $inventory['intelligence'];
			$data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']." - Power: ".number_format($power)."</option>";
		}
	}
	$getinventory = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND  equipped='No' AND type='Leggings' ORDER BY type");
	if(mysql_num_rows($getinventory) >= 1){
		$data .= "<option value=\'Nothing\'>------Leggings------</option>";
		while($inventory = mysql_fetch_array($getinventory)){
			$power = $inventory['strength'] + $inventory['dexterity'] + $inventory['endurance'] + $inventory['concentration'] + $inventory['intelligence'];
			$data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']." - Power: ".number_format($power)."</option>";
		}
	}
	$getinventory = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND  equipped='No' AND type='Boots' ORDER BY type");
	if(mysql_num_rows($getinventory) >= 1){
		$data .= "<option value=\'Nothing\'>------Boots------</option>";
		while($inventory = mysql_fetch_array($getinventory)){
			$power = $inventory['strength'] + $inventory['dexterity'] + $inventory['endurance'] + $inventory['concentration'] + $inventory['intelligence'];
			$data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']." - Power: ".number_format($power)."</option>";
		}
	}
	$getinventory = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND  equipped='No' AND type='Item' ORDER BY type");
	if(mysql_num_rows($getinventory) >= 1){
		$data .= "<option value=\'Nothing\'><<<<<-ITEMS->>>>></option>";
		while($inventory = mysql_fetch_array($getinventory)){
			$data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']."</option>";
		}
	}
    $data .= "</select>";
	$data .= "<div id=\'itemDesc\'></div></center>";

print("fillDiv('displayArea','".$data."');");
include('updatestats.php');
?>