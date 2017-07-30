<?php 
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
include('active.php');

	$findForgeItems = mysql_query("SELECT * FROM forge WHERE username='".$char['username']."'");
	$data = "<center><b>Forge</b><br />";
	if(mysql_num_rows($findForgeItems) == "4"){
		$data .= "<strong>Ore:</strong> <select id=\'ore\' onchange=\'getResults()\'>";
		$data .= "<option>Nothing</option>";
		$data .= "<option value=\'copper\'>Copper</option>";
		$data .= "<option value=\'iron\'>Iron</option>";
		$data .= "<option value=\'steel\'>Steel</option>";
		$data .= "</select>";
	}else{
		$data .= "<strong>Item:</strong> <select id=\'item\' onchange=\'openItem()\'>";
		$data .= "<option>Nothing</option>";
		if(mysql_num_rows($findForgeItems) > "0"){
			$forgeType = mysql_fetch_assoc($findForgeItems);
			$findItems = mysql_query("SELECT * FROM inventory WHERE username='".$char['username']."' AND equipped='No' AND type='".$forgeType['type']."'");
		}else{
			$findItems = mysql_query("SELECT * FROM inventory WHERE username='".$char['username']."' AND equipped='No'");
		}
		while($inventory = mysql_fetch_array($findItems)){
			$itempower = number_format($inventory['strength'] + $inventory['dexterity'] + $inventory['endurance'] + $inventory['concentration'] + $inventory['intelligence']);
			if(substr($inventory['itemname'], 0, 3) == "(F)"){
			}else{
				$data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']." - POWER: ".$itempower."</option>";
			}
		}
		$data .= "</select>";
	}
	$data .= "<table border=\'1px\'>";
	$data .= "<tr>";
	$data .= "<td width=\'130px\' height=\'150px\'><div id=\'itemDescription\'></div></td>";
	$data .= "<td width=\'400px\'><div id=\'inForge\'>";
	$findForgeItems = mysql_query("SELECT * FROM forge WHERE username='".$char['username']."'");
	if(mysql_num_rows($findForgeItems) == "0"){
		$data .= "No items in the forge.";
	}else{
		$data .= "<table>";
		$data .= "<tr><td><u>Name</u></td><td><u>Str:</u></td><td><u>Dex:</u></td><td><u>End:</u></td><td><u>Con:</u></td><td><u>Int:</u></td><td>&nbsp;</td></tr>";
		while($inventory = mysql_fetch_array($findForgeItems)){
		$data .= "<tr><td>". $inventory['itemname'] ."</td><td>". $inventory['strength'] ."</td><td>". $inventory['dexterity'] ."</td><td>". $inventory['endurance'] ."</td><td>". $inventory['concentration'] ."</td><td>". $inventory['intelligence'] ."</td><td>(<a href=\'javascript: removeItem(\"".$inventory['id']."\");\' title=\'Remove from Forge\'>X</a>)</td></tr>";
		}
		$data .= "</table>";
		
	}
	$data .= "<div id=\'forgeResults\'></div>";
	$data .= "</div></td>";
	$data .= "</tr>";
	$data .= "</table>";

print("fillDiv('displayArea','".$data."');");
?>