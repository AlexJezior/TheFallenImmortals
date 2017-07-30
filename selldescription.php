<?php 
session_name("icsession");
session_start();
include('db.php');

if($_POST['sellid'] != "Nothing"){
	$data = "";
	$querty = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND equipped='No' AND id='".$_POST['sellid']."'");
	$inventory = mysql_fetch_assoc($querty);
	$data .= "<center><table>";
    $data .= "<tr><td>Type:</td><td>".$inventory['type']."</td></tr>";
	$data .= "<tr><td>Level Req:</td><td>".$inventory['levelreq']."</td></tr>";
	$data .= "<tr><td>Str:</td><td>".$inventory['strength']."</td></tr>";
	$data .= "<tr><td>Dex:</td><td>".$inventory['dexterity']."</td></tr>";
	$data .= "<tr><td>End:</td><td>".$inventory['endurance']."</td></tr>";
	$data .= "<tr><td>Int:</td><td>".$inventory['intelligence']."</td></tr>";
	$data .= "<tr><td>Con:</td><td>".$inventory['concentration']."</td></tr>";
	$data .= "<tr><td>Price:</td><td>".$inventory['value']."</td></tr>";
	$data .= "</table></center>";
	$dataLink = "<a href=\'javascript: sell(\"".$inventory['id']."\");\'>Sell</a>";

}else{
	$data = "Nothing!";
	$dataLink = "";
}

print("fillDiv('sellDesc','".$data."');");
print("fillDiv('sellLink','".$dataLink."');");
include('updatestats.php');
?>