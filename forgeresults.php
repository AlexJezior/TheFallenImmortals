<?php 
session_name("icsession");
session_start();
include('db.php');

if($_POST['ore'] != NULL || $_POST['ore'] != "" || $_POST['ore'] != " "){
	$data = "<hr>";
	
	$strength = "0";
	$dexterity = "0";
	$endurance = "0";
	$concentration = "0";
	$intelligence = "0";
	$findForgeItems = mysql_query("SELECT * FROM forge WHERE username='".$char['username']."'");
	if(mysql_num_rows($findForgeItems) == "4"){
		while($inventory = mysql_fetch_array($findForgeItems)){
			$strength += $inventory['strength'];
			$dexterity += $inventory['dexterity'];
			$endurance += $inventory['endurance'];
			$concentration += $inventory['concentration'];
			$intelligence += $inventory['intelligence'];
		}
			if($_POST['ore'] == "copper"){
				$dividend = 3;
			}elseif($_POST['ore'] == "iron"){
				$dividend = 2.5;
			}elseif($_POST['ore'] == "steel"){
				$dividend = 2;
			}else{
				print"alert('Your done.');";
				die();
			}
			$strength /= $dividend;
			$dexterity /= $dividend;
			$endurance /= $dividend;
			$concentration /= $dividend;
			$intelligence /= $dividend;
		$data .= "Str: ".floor($strength)." Dex: ".floor($dexterity)." End: ".floor($endurance)." Con: ".floor($concentration)." Int: ".floor($intelligence)."<br />";
			
			if($_POST['ore'] == "copper" && $char['copperore'] < 50){
				$data .= "You lack the 50 Copper Ore to craft this.";
			}elseif($_POST['ore'] == "iron" && $char['copperore'] < 100 && $char['ironore'] < 50){
				$data .= "You lack the 100 Copper Ore and 50 Iron Ore to craft this.";
			}elseif($_POST['ore'] == "steel" && $char['copperore'] < 150 && $char['ironore'] < 100 && $char['steelore'] < 50){
				$data .= "You lack the 150 Copper Ore, 100 Iron Ore, and 50 Steel Ore to craft this.";
			}else{
				$data .= "<a href=\'javascript: craftForge(\"".$_POST['ore']."\");\'><b>Craft!</b></a>";
			}
	}else{
		$data .="Not enough items in the forge.";
	}
	
}else{
	$data = "No ore selected.";
}

print("fillDiv('forgeResults','".$data."');");
include('updatestats.php');
?>