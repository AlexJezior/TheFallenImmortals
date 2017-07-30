<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');

$getguild = mysql_query("SELECT * FROM guilds WHERE name='".$charguild."'");
$guild = mysql_fetch_assoc($getguild);

if($charname == $guild['leader'] || $charname == $guild['coleader'] || $charname == $guild['captain'])
{
    $upgrade = $_POST['upgrade'];
    if($upgrade == "Exp")
    {
        if($guild['bank'] >= $guild['expcost'] && $guild['exp'] < "40")
        {
            $newexp = $guild['exp'] + "1";
            $newcost = floor($guild['expcost'] * "1.25");
            $newbank = $guild['bank'] - $guild['expcost'];
            $setguild = mysql_query("UPDATE guilds SET exp='".$newexp."', expcost='".$newcost."', bank='".$newbank."' WHERE name='".$guild['name']."'");
        }
    }
    elseif($upgrade == "Gold")
    {
        if($guild['bank'] >= $guild['goldcost'] && $guild['gold'] < "40")
        {
            $newgold = $guild['gold'] + "1";
            $newcost = floor($guild['goldcost'] * "1.25");
            $newbank = $guild['bank'] - $guild['goldcost'];
            $setguild = mysql_query("UPDATE guilds SET gold='".$newgold."', goldcost='".$newcost."', bank='".$newbank."' WHERE name='".$guild['name']."'");
        }
    }
    elseif($upgrade == "Item Drop")
    {
        if($guild['bank'] >= $guild['itemdropcost'] && $guild['itemdrop'] < "40")
        {
            $newitemdrop = $guild['itemdrop'] + "1";
            $newcost = floor($guild['itemdropcost'] * "1.25");
            $newbank = $guild['bank'] - $guild['itemdropcost'];
            $setguild = mysql_query("UPDATE guilds SET itemdrop='".$newitemdrop."', itemdropcost='".$newcost."', bank='".$newbank."' WHERE name='".$guild['name']."'");
        }
    }
    elseif($upgrade == "Item Boost")
    {
        if($guild['bank'] >= $guild['itemboostcost'] && $guild['itemboost'] < "40")
        {
            $newitemboost = $guild['itemboost'] + "1";
            $newcost = floor($guild['itemboostcost'] * "1.25");
            $newbank = $guild['bank'] - $guild['itemboostcost'];
            $setguild = mysql_query("UPDATE guilds SET itemboost='".$newitemboost."', itemboostcost='".$newcost."', bank='".$newbank."' WHERE name='".$guild['name']."'");
        }
    }

    print("viewGuild();");
}
?>