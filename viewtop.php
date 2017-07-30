<?php
session_name("icsession");
session_start();
include('db.php');
	$data = "<strong><a href=\"javascript: closeSecondPage();\">Close</a> | <a href=\"javascript: viewTop();\">Back</a></strong><br /><br />";
if($_POST['name'] != Null){
    $name = $_POST['name'];
    
    $getchar = mysql_query("SELECT * FROM characters WHERE username='".$name."'") or die(mysql_error());
    $char = mysql_fetch_assoc($getchar);
    
    $getequip = mysql_query("SELECT * FROM inventory WHERE username='".$name."' AND equipped='Yes'");
    if(mysql_num_rows($getequip) > "0")
    {
        while($equip = mysql_fetch_array($getequip))
        {
            $eqstrbon += $equip['strength'];
            $eqdexbon += $equip['dexterity'];
            $eqendbon += $equip['endurance'];
            $eqintbon += $equip['intelligence'];
            $eqconbon += $equip['concentration'];
        }
    }
    $charstr = $char['strength'] + $eqstrbon;
    $chardex = $char['dexterity'] + $eqdexbon;
    $charend = $char['endurance'] + $eqendbon;
    $charint = $char['intelligence'] + $eqintbon;
    $charcon = $char['concentration'] + $eqconbon;
    $charlife = $char['life'];
    $charmana = $char['mana'];

    $charlevel = $char['level'];
    $charexp = $char['expacq'];
    $chartnl = $char['expreq'];
    $chargold = $char['gold'];
    if($chargold >= "1000000000000")
    {
        $chargold = "1000000000000";
        $setgold = mysql_query("UPDATE characters SET gold='".$chargold."' WHERE username='".$name."'");
    }
    $charbank = $char['bank'];
    if($charbank >= "1000000000000")
    {
        $charbank = "1000000000000";
        $setbank = mysql_query("UPDATE characters SET bank='".$charbank."' WHERE username='".$name."'");
    }

    $charloc = $char['location'];
    $charx = $char['posx'];
    $chary = $char['posy'];

    if($char['life'] > "0")
    {
        $health = floor("100" * ($charlife / $charend));
    }
    else
    {
        $health = "0";
    }
    if($char['mana'] > "0")
    {
        $mana = floor("100" * ($charmana / $charint));
    }
    else
    {
        $mana = "0";
    }
    if($char['expacq'] > "0")
    {
        $exp = floor("100" * ($char['expacq'] / $char['expreq']));
    }
    else
    {
        $exp = "0";
    }
    $data .= "<table align=\'left\' border=\'0\' width=\'100%\'>";
    $data .= "<tr><td>";
    $data .= "<center><strong>".$char['username']." (".$char['class'].")<br />".number_format($char['level'])."</strong></center>";
    $data .= "<center><table border=\'1px\' width=\'75%\'>";
    $data .= "<tr>";
    $data .= "<td>";
    $data .= "Health: <table border=\'1\' cellpadding=\'0\' width=\'100px\'><tr><td style=\'background-color: #DD0000;\'><img src=\'images/greenblock.jpg\' width=\'".$health."%\' height=\'10px\' title=\'".$charlife." / ".$charend." (".$health."%)\' /></td></tr></table>Mana: <table border=\'1\' cellpadding=\'0\' width=\'100px\'><tr><td style=\'background-color: #DD0000;\'><img src=\'images/blueblock.jpg\' width=\'".$mana."%\' height=\'10px\' title=\'".$charmana." / ".$charint." (".$mana."%)\' /></td></tr></table>EXP: <table border=\'1\' cellpadding=\'0\' width=\'100px\'><tr><td style=\'background-color: #DD0000;\'><img src=\'images/yellowblock.jpg\' width=\'".$exp."%\' height=\'10px\' title=\'".$char['expacq']." / ".$char['expreq']." (".$exp."%)\' /></td></tr></table>Blood: ".number_format($char['blood'])."";
    $data .= "</td>";
    $data .= "<td>";
    $tradeskill = $char['tradeskill']/10;
    $data .= "Str: ".number_format($charstr)."<br />Dex: ".number_format($chardex)."<br />End: ".number_format($charend)."<br />Int: ".number_format($charint)."<br />Con: ".number_format($charcon)."<br />Item Comp: ".$char['itemcompatibility']."<br />Trade Skill: ".$tradeskill."%";
    $data .= "</td>";
    $data .= "<td>";
    $data .= "Location: ".$char['posx'].", ".$char['posy']."<br />Gold: ".number_format($char['gold'])."<br />Bank: ".number_format($char['bank'])."<br />Cash: ".number_format($char['cash'])."<br />Networth: ".number_format($char['networth'])."<br />Kill streak: ".number_format($char['killstreak'])."<br />Win/Loss: ".$char['duelratio']."";
    $data .= "</td>";
    $data .= "</tr>";
    $data .= "</table></center>";
    $equipped = explode(',', $char['equipped']); 
    $data .= "<strong><center>Accommodations</center></strong>";
    $data .= "<table align=\'right\' border=\'1\'>";
    $data .= "<tr><td>Weapon</td><td>Armour</td><td>Gloves</td><td>Leggings</td><td>Boots</td></tr>";
    $data .= "<tr><td>".$equipped[0]."</td><td>".$equipped[1]."</td><td>".$equipped[2]."</td><td>".$equipped[3]."</td><td>".$equipped[4]."</td></tr>";
    $data .= "</table>";
    $data .= "<table width=\'100%\'>";
    $data .= "<tr>";
    $data .= "<td>";
    $findSecondClass = mysql_query("SELECT * FROM secondclass WHERE username='".$char['username']."'");
    $sclass = mysql_fetch_assoc($findSecondClass);
    $data .= "<br><table border=\'1\'>";
	$data .= "<tr><td colspan=\'3\'><center><u>Second Class</u></center></td></tr>";
	$data .= "<tr><td>Class: ".$sclass['class']."</td><td>Level: ".number_format($sclass['level'])."</td><td>Blood: ".$sclass['blood']."</td></tr>";
	$data .= "</table>";
	$spell = explode(', ', $char['spells']);
	$data .= "<br><table border=\'1\'>";
	$data .= "<tr><td colspan=\'3\'><u>Spells:</u></td></tr>";
	$data .= "<tr><td>".$spell[0]."</td><td>".$spell[1]."</td><td>".$spell[2]."</td></tr>";
	$data .= "<tr><td>".$spell[3]."</td><td>".$spell[4]."</td><td>".$spell[5]."</td></tr>";
	$data .= "<tr><td>".$spell[6]."</td><td>".$spell[7]."</td><td>".$spell[8]."</td></tr>";
	$data .= "<tr><td>".$spell[9]."</td><td>".$spell[10]."</td><td>".$spell[11]."</td></tr>";
	$data .= "</table>";
    $data .= "</td>";
    $data .= "<td>";
    $blessing = explode(', ', $char['blessing']); 
	$blessing1 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
	$blessing2 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
	$blessing3 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
	$blessing4 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
	$blessing5 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
	$blessing6 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
	$blessing7 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
	$blessing8 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
	$blessing9 = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
	$data .= "<u>Affinity Bonuses:</u>";
	$data .= "<table border=\'0\'>";
    $data .= "<tr><td title=\'".$blessing1['description']."\'><img src=\'".$blessing1['image']."\'><br />".$blessing[0]."</td><td title=\'".$blessing2['description']."\'><img src=\'".$blessing2['image']."\'><br />".$blessing[1]."</td><td title=\'".$blessing3['description']."\'><img src=\'".$blessing3['image']."\'><br />".$blessing[2]."</td></tr><tr><td title=\'".$blessing4['description']."\'><img src=\'".$blessing4['image']."\'><br />".$blessing[3]."</td><td title=\'".$blessing5['description']."\'><img src=\'".$blessing5['image']."\'><br />".$blessing[4]."</td><td title=\'".$blessing6['description']."\'><img src=\'".$blessing6['image']."\'><br />".$blessing[5]."</td></tr><tr><td title=\'".$blessing7['description']."\'><img src=\'".$blessing7['image']."\'><br />".$blessing[6]."</td><td title=\'".$blessing8['description']."\'><img src=\'".$blessing8['image']."\'><br />".$blessing[7]."</td><td title=\'".$blessing9['description']."\'><img src=\'".$blessing9['image']."\'><br />".$blessing[8]."</td></tr><tr>";
    $data .= "</table>";
    $data .= "</td>";
    $data .= "<td>";
    $data .= "<table>";
    $data .= "<tr><td>Cash:</td><td> $".$char['cash']."</td></tr>";
    $data .= "<tr><td>Drop Enhance:</td><td> ".number_format($char['dropenh'])."</td></tr>";
    $data .= "<tr><td>Affinities:</td><td> X".$char['affinitys']."</td></tr>";
    $statmult = $char['statmult']/100;
    $data .= "<tr><td>Stat Multiplier:</td><td> X".$statmult."</td></tr>";
    $data .= "<tr><td>Deposit Fee:</td><td> 5%</td></tr>";
    $data .= "<tr><td>Steal Gold:</td><td> ".$char['goldsteal']."%</td></tr>";
    $data .= "<tr><td>Auto Attacks:</td><td> ".$char['automax']."</td></tr>";
    $data .= "</table>";
    $data .= "</td>";
    $data .= "</tr>";
    $data .= "</table>";
    $data .= "</td></tr>";
    $data .= "</table>";
    
   $blessing = explode(',', $char['blessing']); 
    
    
}
else
{





$data .= "<b><a href=\'javascript: topGuilds(\"\");\'>Top Guilds</a></b><br />";
$data .= "Order by: <a href=\'javascript: orderBy(\"blood\");\'>Blood</a>, <a href=\'javascript: orderBy(\"gold\");\'>Gold</a>, <a href=\'javascript: orderBy(\"bank\");\'>Bank</a>, <a href=\'javascript: orderBy(\"cash\");\'>Cash</a>, <a href=\'javascript: orderBy(\"networth\");\'>Networth</a>, <a href=\'javascript: orderBy(\"stats\");\'>Statpoints</a>, <a href=\'javascript: orderBy(\"strength\");\'>Strength</a>, <a href=\'javascript: orderBy(\"dexterity\");\'>Dexterity</a>, <a href=\'javascript: orderBy(\"endurance\");\'>Endurance</a>, <a href=\'javascript: orderBy(\"concentration\");\'>Concentration</a>, <a href=\'javascript: orderBy(\"intelligence\");\'>Intelligence</a>, <a href=\'javascript: orderBy(\"tradeskill\");\'>Trade Skill</a>, <a href=\'javascript: orderBy(\"killstreak\");\'>Kill Streak</a>";
$data .= "<center><strong>Tops List</strong><br /><br />";
$data .= "<input type=\"text\" id=\"name\"><input type=\"button\" value=\"Search\" onclick=\"javascript: SearchPlayerStats();\">";
$data .= "<table border=\"1\">";
$data .= "<tr><td>Rank</td><td>Player Name</td><td>Level</td></tr>";
if($_POST['showAll'] == "Yes"){
	$extention = " ORDER BY Level DESC";
}elseif(isset($_POST['orderBy'])){
	$extention = " ORDER BY ".$_POST['orderBy']." DESC LIMIT 20";
}else{
	$extention = " ORDER BY Level DESC LIMIT 20";
}
$getchar = mysql_query("SELECT * FROM characters WHERE status='Normal' AND level>'10'".$extention."");
while($char = mysql_fetch_array($getchar))
{
	$getcharRank = mysql_query("SELECT * FROM characters WHERE level>'".$char['level']."'");
	$charRank = mysql_num_rows($getcharRank);
	$charRank = $charRank + 1;
    $name = $char['username'];
    $level = $char['level'];

    $data .= "<tr><td>".$charRank."</td><td><a href=\'javascript: ViewPlayerStats(\"".$name."\");\'>".$name."</a></td><td>".number_format($level)."</td></tr>";
}

$data .= "</table>";
$data .= "<a href=\'javascript: showAll(\"Yes\");\'>Show all players</a>(May take some time to load.)";
$data .= "</center>";
}

print("fillDiv('secondPage','".$data."');");
include('active.php');

?>