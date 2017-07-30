<?php 
session_name("icsession");
session_start();
include('db.php');

if($_POST['itemid'] != "Nothing"){
	$data = "";
	$querty = mysql_query("SELECT * FROM inventory WHERE id='".$_POST['itemid']."' AND username='".$char['username']."'");
	$inventory = mysql_fetch_assoc($querty);
	if($inventory['type'] == "Item"){
		
		$data .= "<center> <a href=\'javascript: useItem(\"".$inventory['id']."\");\'><b>Use</b></a><table>";
		
	}
	elseif($inventory['equipped'] == "No" && $inventory['type'] != "Item"){
		
		$current = mysql_query("SELECT * FROM inventory WHERE type='".$inventory['type']."' AND equipped='Yes' AND username='".$char['username']."'");
		$equipped = mysql_fetch_assoc($current);
		$information = "Name: ".$equipped['itemname']." &#013; |Type: ".$equipped['type']." &#013; |Lvl Req: ".$equipped['levelreq']." &#013; |Str: ".$equipped['strength']." &#013; |Dex: ".$equipped['dexterity']." &#013; |End: ".$equipped['endurance']." &#013; |Int: ".$equipped['intelligence']." &#013; |Con: ".$equipped['concentration']." &#013; |Price: ".$equipped['value']."";
		$data .= "<center>[<a title=\'".$information."\'>?</a>] <a href=\'javascript: equip(\"".$inventory['id']."\");\'><b>Equip</b></a><table>";
		
	}elseif($inventory['equipped'] == "Yes" && $inventory['type'] != "Item"){
		
		$data .= "<center><a href=\'javascript: unequip(\"".$inventory['id']."\");\'><b>Unequip</b></a><table>";
	
	}
	
	if($inventory['type'] != "Item"){
		$data .= "<tr><td>Type:</td><td>".$inventory['type']."</td></tr>";
		$data .= "<tr><td>Level Req:</td><td>".$inventory['levelreq']."</td></tr>";
		$data .= "<tr><td>Str:</td><td>".$inventory['strength']."</td></tr>";
		$data .= "<tr><td>Dex:</td><td>".$inventory['dexterity']."</td></tr>";
		$data .= "<tr><td>End:</td><td>".$inventory['endurance']."</td></tr>";
		$data .= "<tr><td>Int:</td><td>".$inventory['intelligence']."</td></tr>";
		$data .= "<tr><td>Con:</td><td>".$inventory['concentration']."</td></tr>";
		$data .= "<tr><td>Price:</td><td>".$inventory['value']."</td></tr>";
	}
	$data .= "</table></center>";

}else{
	$data = "Nothing!";
}

print("fillDiv('itemDesc','".$data."');");
include('updatestats.php');
?>