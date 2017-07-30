<?php 
session_name("icsession");
session_start();
include('db.php');

if($_POST['tradeid'] != "Nothing"){
	$data = "";
	$allMarket = mysql_query("SELECT * FROM trade WHERE id='".$_POST['tradeid']."'");
	$item = mysql_fetch_assoc($allMarket);
	if($item['fromplayer'] == $char['username']){
        $data .= "<center><a href=\'javascript: removeFromTrade(\"".$item['id']."\");\'><b>Remove</b></a><table>";
    }else{
        $data .= "<center><a href=\'javascript: buyFromTrade(\"".$item['id']."\");\'><b>Buy</b></a><table>";
    }
	$data .= "<tr><td>From:</td><td>".$item['fromplayer']."</td></tr>";
    $data .= "<tr><td>Type:</td><td>".$item['type']."</td></tr>";
	$data .= "<tr><td>Level Req:</td><td>".$item['levelreq']."</td></tr>";
	$data .= "<tr><td>Str:</td><td>".$item['strength']."</td></tr>";
	$data .= "<tr><td>Dex:</td><td>".$item['dexterity']."</td></tr>";
	$data .= "<tr><td>End:</td><td>".$item['endurance']."</td></tr>";
	$data .= "<tr><td>Int:</td><td>".$item['intelligence']."</td></tr>";
	$data .= "<tr><td>Con:</td><td>".$item['concentration']."</td></tr>";
	$data .= "<tr><td>Value:</td><td>".$item['value']."</td></tr>";
	$data .= "</table></center>";

}else{
	$data = "Nothing!";
}

print("fillDiv('itemDesc','".$data."');");
include('updatestats.php');
?>