<?php
$itemtype = mt_rand("1","5");    //1 - 5
if($itemtype == "1")    //Weapon
{
    $itemtype = "Weapon";
    $weaptype = mt_rand("1","5");
    if($weaptype == "1")
    {
        $itemname = "Mace";    //Str
        $itempower = "5";
        $bonus = "Str";
    }
    elseif($weaptype == "2")
    {
        $itemname = "LongSword";    //Dex
        $itempower = "5";
        $bonus = "Dex";
    }
    elseif($weaptype == "3")
    {
        $itemname = "Spear";    //End
        $itempower = "5";
        $bonus = "End";
    }
    elseif($weaptype == "4")
    {
        $itemname = "QuarterStaff";    //Int
        $itempower = "5";
        $bonus = "Int";
    }
    elseif($weaptype == "5")
    {
        $itemname = "Runes";    //Con
        $itempower = "5";
        $bonus = "Con";
    }
}
elseif($itemtype == "2")    //Armour
{
    $itemtype = "Armour";
    $armtype = mt_rand("1","5");
    if($armtype == "1")
    {
        $itemname = "LightPlateMail";    //Str
        $itempower = "5";
        $bonus = "Str";
    }
    elseif($armtype == "2")
    {
        $itemname = "LeatherArmour";    //Dex
        $itempower = "5";
        $bonus = "Dex";
    }
    elseif($armtype == "3")
    {
        $itemname = "FullPlateMail";    //End
        $itempower = "5";
        $bonus = "End";
    }
    elseif($armtype == "4")
    {
        $itemname = "MagePlateMail";    //Int
        $itempower = "5";
        $bonus = "Int";
    }
    elseif($armtype == "5")
    {
        $itemname = "WolfPeltCoat";    //Con
        $itempower = "5";
        $bonus = "Con";
    }
}
elseif($itemtype == "3")    //Gloves
{
    $itemtype = "Gloves";
    $armtype = mt_rand("1","5");
    if($armtype == "1")
    {
        $itemname = "LightPlateGloves";    //Str
        $itempower = "5";
        $bonus = "Str";
    }
    elseif($armtype == "2")
    {
        $itemname = "LeatherGloves";    //Dex
        $itempower = "5";
        $bonus = "Dex";
    }
    elseif($armtype == "3")
    {
        $itemname = "FullPlateGloves";    //End
        $itempower = "5";
        $bonus = "End";
    }
    elseif($armtype == "4")
    {
        $itemname = "MagePlateGloves";    //Int
        $itempower = "5";
        $bonus = "Int";
    }
    elseif($armtype == "5")
    {
        $itemname = "WolfPeltGloves";    //Con
        $itempower = "5";
        $bonus = "Con";
    }
}
elseif($itemtype == "4")    //Leggings
{
    $itemtype = "Leggings";
    $armtype = mt_rand("1","5");
    if($armtype == "1")
    {
        $itemname = "LightPlateLeggings";    //Str
        $itempower = "5";
        $bonus = "Str";
    }
    elseif($armtype == "2")
    {
        $itemname = "LeatherLeggings";    //Dex
        $itempower = "5";
        $bonus = "Dex";
    }
    elseif($armtype == "3")
    {
        $itemname = "FullPlateLeggings";    //End
        $itempower = "5";
        $bonus = "End";
    }
    elseif($armtype == "4")
    {
        $itemname = "MagePlateLeggings";    //Int
        $itempower = "5";
        $bonus = "Int";
    }
    elseif($armtype == "5")
    {
        $itemname = "WolfPeltLeggings";    //Con
        $itempower = "5";
        $bonus = "Con";
    }
}
elseif($itemtype == "5")    //Boots
{
    $itemtype = "Boots";
    $armtype = mt_rand("1","5");
    if($armtype == "1")
    {
        $itemname = "LightPlateBoots";    //Str
        $itempower = "5";
        $bonus = "Str";
    }
    elseif($armtype == "2")
    {
        $itemname = "LeatherBoots";    //Dex
        $itempower = "5";
        $bonus = "Dex";
    }
    elseif($armtype == "3")
    {
        $itemname = "FullPlateBoots";    //End
        $itempower = "5";
        $bonus = "End";
    }
    elseif($armtype == "4")
    {
        $itemname = "MagePlateBoots";    //Int
        $itempower = "5";
        $bonus = "Int";
    }
    elseif($armtype == "5")
    {
        $itemname = "WolfPeltBoots";    //Con
        $itempower = "5";
        $bonus = "Con";
    }
}

//Make Stats
$bonmin = floor($charlvl * "0.75");
if($bonmin < "1")    $bonmin = "1";
$bonmax = $charlvl;

$setstr = mt_rand("1","3");
$setdex = mt_rand("1","3");
$setend = mt_rand("1","3");
$setint = mt_rand("1","3");
$setcon = mt_rand("1","3");

$strbon = "1";
$dexbon = "1";
$endbon = "1";
$intbon = "1";
$conbon = "1";

//Set Bonuses
if($setstr == "1" || $bonus == "Str")
{
    $strbon = mt_rand($bonmin,$bonmax);
    if($charguild != "None")
    {
        $strbon = floor($strbon * ("1" + ($guild['itemboost'] / "100")));
    }

    if($bonus == "Str")
    {
        $strbon = $strbon * "2";
    }
}
if($setdex == "1" || $bonus == "Dex")
{
    $dexbon = mt_rand($bonmin,$bonmax);
    if($charguild != "None")
    {
        $dexbon = floor($dexbon * ("1" + ($guild['itemboost'] / "100")));
    }

    if($bonus == "Dex")
    {
        $dexbon = $dexbon * "2";
    }
}
if($setend == "1" || $bonus == "End")
{
    $endbon = mt_rand($bonmin,$bonmax);
    if($charguild != "None")
    {
        $endbon = floor($endbon * ("1" + ($guild['itemboost'] / "100")));
    }

    if($bonus == "End")
    {
        $endbon = $endbon * "2";
    }
}
if($setint == "1" || $bonus == "Int")
{
    $intbon = mt_rand($bonmin,$bonmax);
    if($charguild != "None")
    {
        $intbon = floor($intbon * ("1" + ($guild['itemboost'] / "100")));
    }

    if($bonus == "Int")
    {
        $intbon = $intbon * "2";
    }
}
if($setcon == "1" || $bonus == "Con")
{
    $conbon = mt_rand($bonmin,$bonmax);
    if($charguild != "None")
    {
        $conbon = floor($conbon * ("1" +($guild['itemboost'] / "100")));
    }

    if($bonus == "Con")
    {
        $conbon = $conbon * "2";
    }
}

if($itemname == ""){
}else{
	$value = ("10" * ($strbon + $dexbon + $endbon + $intbon + $conbon));
	$itemname = $char['username']." ".$itemname."";
	$findInventory = mysql_query("SELECT * FROM inventory WHERE username='".$char['username']."'");
	$inventoryFull = mysql_num_rows($findInventory);
	if($inventoryFull >= $char['backpacksize']){
		$data2 .= "You find a ".$itemname." on the enemies corpse!<br />But your backpack is already holding it\'s max limit of ".$char['backpacksize']." items. So the item was lost.<br />";
		$activeTime = time();
		$query = mysql_query("INSERT INTO `chatroom` (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$activeTime."', '4', 'PM', '".$char['username']."', '".mysql_real_escape_string($data2)."')");
	}else{
		$makeitem = mysql_query("INSERT INTO inventory (`username`, `itemname`, `levelreq`, `power`, `type`, `strength`, `dexterity`, `endurance`, `intelligence`, `concentration`, `value`) VALUES ('".$charname."', '".$itemname."', '".$bonmin."', '".$itempower."', '".$itemtype."', '".$strbon."', '".$dexbon."', '".$endbon."', '".$intbon."', '".$conbon."', '".$value."')");
		
		$itemSet = mysql_insert_id();
		
		$data2 .= "You find a ".$itemname." on the enemies corpse!<br />Str: ".$strbon." Dex: ".$dexbon." End: ".$endbon." Int: ".$intbon." Con: ".$conbon." Val: ".$value."(<a href=\'javascript: sell(\"".$itemSet."\");\'>Sell</a>)<br />";
		$activeTime = time();
		$query = mysql_query("INSERT INTO `chatroom` (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$activeTime."', '4', 'PM', '".$char['username']."', '".mysql_real_escape_string($data2)."')");
	}
}	
?>

