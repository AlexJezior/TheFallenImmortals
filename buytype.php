<?php 
session_name("icsession");
session_start();
include('db.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);

if($_POST['buytype'] == "FighterWeapon"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
	$query = mysql_query("SELECT * FROM shop WHERE type='Weapon' AND strength>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "MageWeapon"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Weapon' AND intelligence>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "FighterArmor"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Armour' AND strength>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "MageArmor"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Armour' AND intelligence>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "FighterGloves"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Gloves' AND strength>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "MageGloves"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Gloves' AND intelligence>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "FighterLegging"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Leggings' AND strength>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "MageLegging"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Leggings' AND intelligence>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "FighterBoots"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Boots' AND strength>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}elseif($_POST['buytype'] == "MageBoots"){
	$data = "<center>Item:<select id=\'buyid\' onchange=\'buyDesc()\'>";
	$data .= "<option>Nothing</option>";
    $query = mysql_query("SELECT * FROM shop WHERE type='Boots' AND intelligence>'0' ORDER BY value");
    while($weapons = mysql_fetch_array($query)){
		if($weapons['levelreq'] > $char['level']){
			$data .= "<option style=\'color:#FF0000;\' value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}else{
			$data .= "<option value=\'".$weapons['id']."\'>".$weapons['itemname']." - ".number_format($weapons['value'])."</option>";
		}
    }
    $data .= "</select></center>";

}else{
	$data = "Nothing!";
}

print("fillDiv('item','".$data."');");
include('updatestats.php');
?>