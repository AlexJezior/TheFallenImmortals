<?php 
session_name("icsession");
session_start();
include('db.php');

if($_POST['buystyle'] == "Fighter"){
	$data = "<center>Item Type:<select id=\'type\' onchange=\'buyType()\'>";
	$data .= "<option>Nothing</option>";
	$data .= "<option value=\'FighterWeapon\'>Weapon</option>";
	$data .= "<option value=\'FighterArmor\'>Armor</option>";
	$data .= "<option value=\'FighterGloves\'>Gloves</option>";
	$data .= "<option value=\'FighterLegging\'>Legging</option>";
	$data .= "<option value=\'FighterBoots\'>Boots</option>";
    $data .= "</select></center>";

}elseif($_POST['buystyle'] == "Mage"){
	$data = "<center>Item Type:<select id=\'type\' onchange=\'buyType()\'>";
	$data .= "<option>Nothing</option>";
	$data .= "<option value=\'MageWeapon\'>Weapon</option>";
	$data .= "<option value=\'MageArmor\'>Armor</option>";
	$data .= "<option value=\'MageGloves\'>Gloves</option>";
	$data .= "<option value=\'MageLegging\'>Legging</option>";
	$data .= "<option value=\'MageBoots\'>Boots</option>";
    $data .= "</select></center>";

}else{
	$data = "";
}

print("fillDiv('itemType','".$data."');");
print("fillDiv('item','');");
print("fillDiv('buyDesc','');");
include('updatestats.php');
?>