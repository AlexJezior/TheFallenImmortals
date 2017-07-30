<?php
session_name("icsession");
session_start();
include('db.php');

$checkItems = mysql_query("SELECT * FROM shop WHERE value>'10000'");
while($newLevelReq = mysql_fetch_assoc($checkItems)){
	$newReq = floor(($newLevelReq['strength'] + $newLevelReq['dexterity'] + $newLevelReq['endurance'] + $newLevelReq['intelligence'] + $newLevelReq['concentration']) * 0.03);
	$updateShopItems = mysql_query("UPDATE shop SET levelreq='".$newReq."' WHERE id='".$newLevelReq['id']."'")or die("alert('Unable to update levelreqs!');");
}

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);
$charname = $char['username'];
$data = "";

if(isset($_POST['sellid']))   //selling
{
    $idinven = $_POST['sellid'];
    $check = mysql_query("SELECT * FROM inventory WHERE id='".$idinven."' AND username='".$charname."'")or die("Not an existing item in your inventory.");
    $selling = mysql_fetch_assoc($check);
    $sellid = $selling['id'];
    $findShopThingy = mysql_query("SELECT * FROM shop WHERE itemname='".$selling['itemname']."'");
    if(mysql_num_rows($findShopThingy) > 0){
    	$sellworth = floor($selling['value'] - ($selling['value'] * (($char['tradeskill'] - 900)/1000)));
    }else{
    	$sellworth = floor($selling['value'] * ($char['tradeskill'] / 1000));
    }
    $sellname = $selling['itemname'];
    $data .= "You sold ".$sellname." for ".number_format($sellworth)." gold, to the shop!<br /><br />";
    $delete = mysql_query("DELETE FROM inventory WHERE id='".$sellid."'");
    $gold = $char['gold'] + $sellworth;
    $addgold = mysql_query("UPDATE characters SET gold='".$gold."' WHERE username='".$charname."'");
}
elseif(isset($_POST['itemid']))   //Buying
{
    $idshop = $_POST['itemid'];
    $check = mysql_query("SELECT * FROM shop WHERE id='".$idshop."'")or die("Failed to buy item.");
    $buying = mysql_fetch_assoc($check);
    if($buying['value'] > $char['gold']){
        $data .= "You cannot buy an item that you cannot afford.<br /><br />";
    }else{
        $buyworth = floor($buying['value'] - ($buying['value'] * (($char['tradeskill'] - 900)/1000)));
        $buyname = $buying['itemname'];
        $data .= "You bought ".$buyname." for ".number_format($buyworth)." gold, from the shop!<br /><br />";
        $makeitem = mysql_query("INSERT INTO inventory (`username`, `itemname`, `levelreq`, `power`, `type`, `strength`, `dexterity`, `endurance`, `intelligence`, `concentration`, `value`) VALUES ('".$char['username']."', '".$buying['itemname']."', '".$buying['levelreq']."', '".$buying['power']."', '".$buying['type']."', '".$buying['strength']."', '".$buying['dexterity']."', '".$buying['endurance']."', '".$buying['intelligence']."', '".$buying['concentration']."', '".$buying['value']."')");
        $gold = $char['gold'] - $buyworth;
        $addgold = mysql_query("UPDATE characters SET gold='".$gold."' WHERE username='".$charname."'");
    }
}

    $data .= "<center>Buy:<br /> <table>";
	$data .= "<tr><td>Combat Style:<select id=\'style\' onchange=\'buyStyle()\'>";
	$data .= "<option>Nothing</option>";
	$data .= "<option>Fighter</option>";
	$data .= "<option>Mage</option>";
    $data .= "</select></td><td><div id=\'itemType\'></div></td>";
	$data .= "</tr></table>";
	$data .="<div id=\'item\'></div><br />";
	$data .= "<div id=\'buyDesc\'></div></center>";
    //Shop menu
    $data .= "<center>Sell: <select id=\'sellid\' onchange=\'sellDesc()\'>";
	$querty = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND equipped='No' ORDER BY value");
	$data .= "<option>Nothing</option>";
    while($inventory = mysql_fetch_array($querty)){
        $data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']."</option>";
    }
    $data .= "</select><div id=\'sellLink\'></div><br />";
	$data .= "<div id=\'sellDesc\'></div></center>";
    


print("fillDiv('displayArea','".$data."');");
include('updatestats.php');
?>