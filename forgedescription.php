<?php 
session_name("icsession");
session_start();
include('db.php');

if($_POST['itemid'] != NULL || $_POST['itemid'] != "" || $_POST['itemid'] != " "){
	$data = "";
	$querty = mysql_query("SELECT * FROM inventory WHERE id='".$_POST['itemid']."' AND username='".$char['username']."'");
	if(mysql_num_rows($querty) != 1){
		print("alert('This is not your item!');");
		die();
	}
	
	$inventory = mysql_fetch_assoc($querty);
	if($inventory['equipped'] == "Yes"){
		print("alert('Equipped items do not go into forge!');");
		die();
	}
	if(substr($inventory['itemname'], 0, 3) == "[F]"){
		print("alert('You cannot add items that have already been forged.');");
		die();
	}
	
	$data .= "<span style=\'font-size:10px;\'><center><a href=\'javascript: addItem(\"".$inventory['id']."\");\'><b>Add to Forge</b></a><table>";
    $data .= "<tr><td>Type:</td><td>".$inventory['type']."</td></tr>";
	$data .= "<tr><td>Level Req:</td><td>".$inventory['levelreq']."</td></tr>";
	$data .= "<tr><td>Str:</td><td>".$inventory['strength']."</td></tr>";
	$data .= "<tr><td>Dex:</td><td>".$inventory['dexterity']."</td></tr>";
	$data .= "<tr><td>End:</td><td>".$inventory['endurance']."</td></tr>";
	$data .= "<tr><td>Int:</td><td>".$inventory['intelligence']."</td></tr>";
	$data .= "<tr><td>Con:</td><td>".$inventory['concentration']."</td></tr>";
	$data .= "<tr><td>Price:</td><td>".$inventory['value']."</td></tr>";
	$data .= "</table></center></span>";

}else{
	$data = "No item selected.";
}

print("fillDiv('itemDescription','".$data."');");
include('updatestats.php');
?>