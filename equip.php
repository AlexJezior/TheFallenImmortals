<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

$itemid = $_POST['itemid'];
if(!ctype_digit($itemid)){
	print("alert('Hack attempt has been logged.');");
	$toast = mysql_query("INSERT INTO hackreportlog (`information`) VALUES ('".$char['username']." has attempted to alter equipment ID while equipping. The ID in inventory that was targeted was: ".$itemid."')");
	die();
}
$getitem = mysql_query("SELECT * FROM inventory WHERE id='".$itemid."' AND username='".$char['username']."'");
if(mysql_num_rows($getitem) == "1")    //Item exists
{
    $item = mysql_fetch_assoc($getitem);
    if($charname == $item['username'])    //Item belongs to manipulating player
    {
        if($charlevel >= $item['levelreq'])    //High enough level to equip
        {
            $itemName = explode(',', $char['equipped']);
            if($item['type'] == "Weapon")      //For Accommodations display.
            {
                $itemName[0] = $item['itemname'];
            }
            elseif($item['type'] == "Armour")      //For Accommodations display.
            {
                $itemName[1] = $item['itemname'];
            }
            elseif($item['type'] == "Gloves")      //For Accommodations display.
            {
                $itemName[2] = $item['itemname'];
            }
            elseif($item['type'] == "Leggings")      //For Accommodations display.
            {
                $itemName[3] = $item['itemname'];
            }
            elseif($item['type'] == "Boots")      //For Accommodations display.
            {
                $itemName[4] = $item['itemname'];
            }
            $accommodations = "".$itemName[0].",".$itemName[1].",".$itemName[2].",".$itemName[3].",".$itemName[4].",";
            $accommodationUpdate = mysql_query("UPDATE characters SET equipped='".$accommodations."' WHERE id='".$_SESSION['userid']."'") or die(mysql_error("Error updating User accommodation. Please tell the admin."));
            $unequip = mysql_query("UPDATE inventory SET equipped='No' WHERE type='".$item['type']."' AND username='".$charname."'");
            $equip = mysql_query("UPDATE inventory SET equipped='Yes' WHERE id='".$itemid."'");
            print("viewInventory();");
            include('updatestats.php');
        }else{
        	print("alert('You are not a high enough level to equip this item!');");
        }
    }
}else{
	print("alert('Hack attempt has been logged.');");
	$toast = mysql_query("INSERT INTO hackreportlog (`information`) VALUES ('".$char['username']." has attempted to alter equipment ID while equipping. The ID in inventory that was targeted was: ".$itemid."')");
	die();
}
?>