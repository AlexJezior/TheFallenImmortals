<?php
include('db.php');
$time = time();
$setactive = mysql_query("UPDATE characters SET lastactive='".$time."' WHERE id='".$_SESSION['userid']."'");

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

$charname = $char['username'];
$charulvl = $char['userlevel'];
$charclass = $char['class'];


$getequip = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND equipped='Yes'");
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

$charloc = $char['location'];
$charx = $char['posx'];
$chary = $char['posy'];


$blessingStats = explode(', ', $char['blessing']);
if (in_array('Might', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Might'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Might') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalstr += $charstr * $equation; 
}
if (in_array('Might II', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Might II'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Might II') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalstr += $charstr * $equation; 
}
if (in_array('Might III', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Might III'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Might III') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10;
    $totalstr += $charstr * $equation; 
}
if (in_array('Might IV', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Might IV'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Might IV') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalstr += $charstr * $equation; 
}
if (in_array('Might V', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Might V'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Might V') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalstr += $charstr * $equation; 
}
$stradd = '<font color="#0099FF">+ ' . $totalstr . '</font>';
if (in_array('Speed', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Speed'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Speed') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totaldex += $chardex * $equation; 
}
if (in_array('Speed II', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Speed II'")or die("alert('Mysql Error!');"); 
    $level = mysql_fetch_assoc($result)or die("alert('Mysql Error!');"); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Speed II') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totaldex += $chardex * $equation; 
}
if (in_array('Speed III', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Speed III'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Speed III') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totaldex += $chardex * $equation; 
}
if (in_array('Speed IV', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Speed IV'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Speed IV') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totaldex += $chardex * $equation; 
}
if (in_array('Speed V', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Speed V'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Speed V') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totaldex += $chardex * $equation; 
}
$dexadd = '<font color="#0099FF">+ ' . $totaldex . '</font>';
if (in_array('Constitution', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation; 
}
if (in_array('Constitution II', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution II'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution II') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation; 
}
if (in_array('Constitution III', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution III'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution III') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation;
}
if (in_array('Constitution IV', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution IV'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution IV') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation;
}
if (in_array('Constitution V', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution V'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution V') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation; 
}
$endadd = '<font color="#0099FF">+ ' . $totalend . '</font>';
if (in_array('Concentration', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Concentration'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Concentration') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalcon += $charcon * $equation; 
}
if (in_array('Concentration II', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Concentration II'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Concentration II') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalcon += $charcon * $equation; 
}
if (in_array('Concentration III', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Concentration III'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Concentration III') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalcon += $charcon * $equation;
}
if (in_array('Concentration IV', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Concentration IV'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Concentration IV') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalcon += $charcon * $equation;
}
if (in_array('Concentration V', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Concentration V'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Concentration V') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalcon += $charcon * $equation;
}
$conadd = '<font color="#0099FF">+ ' . $totalcon . '</font>';
if (in_array('Intelligence', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Intelligence'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Intelligence') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalint += $charint * $equation; 
}
if (in_array('Intelligence II', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Intelligence II'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Intelligence II') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalint += $charint * $equation;
}
if (in_array('Intelligence III', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Intelligence III'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Intelligence III') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalint += $charint * $equation;
}
if (in_array('Intelligence IV', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Intelligence IV'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Intelligence IV') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalint += $charint * $equation;
}
if (in_array('Intelligence V', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Intelligence V'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Intelligence V') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalint += $charint * $equation;
}
$intadd = '<font color="#0099FF">+ ' . $totalint . '</font>';


$charend = floor($charend + $totalend);

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

$bar = "<table>";
$bar .= "<tr><td width=\"45\">Health:</td><td width=\"155\"><table border=\'1\' cellpadding=\'0\' width=\'155px\'><tr><td style=\'background-color: #DD0000;\'><img src=\'/images/greenblock.jpg\' width=\'".$health."%\' height=\'10px\' title=\'".$charlife." / ".$charend." (".$health."%)\' /></td></tr></table></td></tr>";
$bar .= "<tr><td>Mana:</td><td><table border=\'1\' cellpadding=\'0\' width=\'155px\'><tr><td style=\'background-color: #DD0000;\'><img src=\'/images/blueblock.jpg\' width=\'".$mana."%\' height=\'10px\' title=\'".$charmana." / ".$charint." (".$mana."%)\' /></td></tr></table></td></tr>";
$bar .= "<tr><td>Exp:</td><td><table border=\'1\' cellpadding=\'0\' width=\'155px\'><tr><td style=\'background-color: #DD0000;\'><img src=\'/images/yellowblock.jpg\' width=\'".$exp."%\' height=\'10px\' title=\'".$char['expacq']." / ".$char['expreq']." (".$exp."%)\' /></td></tr></table></td></tr>";
$bar .= "</table>";
print("<script type=\"text/javascript\">fillDiv('barMenu','".$bar."');</script>");

$assets = "<table>";
$assets .= "<tr><td width=\"50\">Gold:</td><td width=\"247\">".number_format($char['gold'])."</td><td width=\"70\">Networth:</td><td width=\"129\">".number_format($char['networth'])."</td><td width=\"50\">Copper:</td><td width=\"99\">".number_format($char['copperore'])."</td></tr>";
$assets .= "<tr><td>Bank:</td><td>".number_format($char['bank'])."</td><td>Cash:</td><td>".number_format($char['cash'])."</td><td>Iron:</td><td>".number_format($char['ironore'])."</td></tr>";
$assets .= "<tr><td>Blood:</td><td> ".number_format($char['blood'])." oz.</td><td>&nbsp;</td><td>&nbsp;</td><td>Steel:</td><td>".number_format($char['steelore'])."</td></tr>";
$assets .= "</table>";
print("<script type=\"text/javascript\">fillDiv('assetsMenu','".$assets."');</script>");

$stats = "<table>";
$stats .= "<tr><td width=\"80\">Strength:</td><td width=\"120\">".number_format($charstr)." ".$stradd."</td></tr>";
$stats .= "<tr><td>Dexterity:</td><td>".number_format($chardex)." ".$dexadd."</td></tr>";
$stats .= "<tr><td>Endurance:</td><td>".number_format($charend)." ".$endadd."</td></tr>";
$stats .= "<tr><td>Concentrat.:</td><td>".number_format($charcon)." ".$conadd."</td></tr>";
$stats .= "<tr><td>Intelligence:</td><td>".number_format($charint)." ".$intadd."</td></tr>";
$stats .= "</table>";
print("<script type=\"text/javascript\">fillDiv('statsMenu','".$stats."');</script>");

$scavenge = "-Location: ".$char['posx'].",".$char['posy']."<br />";
$scavenge .= number_format($char['scavenges'])." Scavenges Completed<br />";
$findLogs2 = mysql_query("SELECT * FROM scavenger WHERE username='".$char['username']."'");
$findLogs1 = mysql_num_rows($findLogs2);
if($findLogs1 > 0){
	$scavenge .= "-<p style=\'color: yellow;\'>";
	while($scavenger = mysql_fetch_assoc($findLogs2)){
		$remaining1 = explode("/", $scavenger['collect']);
		$remaining = $remaining1[1] - $remaining1[0];
		if($remaining == "0"){
			$quantity = "<a href=\'Javascript: completeScavenge(".$scavenger['id'].");\'>Complete</a>";
		}else{
			$quantity = "Remaining: ".$remaining." <a href=\'Javascript: cancelScavenge(".$scavenger['id'].");\'>Cancel</a>";
		}
		$scavenge .= "-".$scavenger['itemname']." need to be collected at ".$scavenger['location']." from ".$scavenger['monster'].". ".$quantity."<br />";
	}
	$scavenge .= "</p>";
}else{
	$scavenge .= "-New scavenges available!<br />";
}
$xtop = $char['posx'] + $char['foresight'];
$xbottom = $char['posx'] - $char['foresight'];
$ytop = $char['posy'] + $char['foresight'];
$ybottom = $char['posy'] - $char['foresight'];
$grabBag = mysql_query("SELECT * FROM `bagdrop` WHERE (`posx` BETWEEN ".$xbottom." AND ".$xtop.") AND (`posy` BETWEEN ".$ybottom." AND ".$ytop.")");
$bag = mysql_fetch_assoc($grabBag);
$there = mysql_num_rows($grabBag);
if($there > "0"){
	$scavenge .= "-There is a bag at ".$bag['posx'].", ".$bag['posy']."<br />";
}
$findOre = mysql_query("SELECT * FROM ore WHERE (`xpos` BETWEEN ".$xbottom." AND ".$xtop.") AND (`ypos` BETWEEN ".$ybottom." AND ".$ytop.")");
$there = mysql_num_rows($findOre);
if($there > "0"){
	$ore = mysql_fetch_assoc($findOre);
	$scavenge .= "-An Ore was spotted at ".$ore['xpos'].",".$ore['ypos']."";
}
print("<script type=\"text/javascript\">fillDiv('scavengeMenu','".$scavenge."');</script>");

$equipped = explode(',', $char['equipped']);
$accommodation = "<table width=\"200\" height=\"161\">";
$accommodation .= "<tr><td width=\"60\">Weapon</td><td width=\"140\"><font size=\'1px\'>".$equipped[0]."</font></td></tr>";
$accommodation .= "<tr><td>Armour</td><td><font size=\'1px\'>".$equipped[1]."</font></td></tr>";
$accommodation .= "<tr><td>Gloves:</td><td><font size=\'1px\'>".$equipped[2]."</font></td></tr>";
$accommodation .= "<tr><td>Leggings:</td><td><font size=\'1px\'>".$equipped[3]."</font></td></tr>";
$accommodation .= "<tr><td>Boots:</td><td><font size=\'1px\'>".$equipped[4]."</font></td></tr>";
$accommodation .= "</table>";
print("<script type=\"text/javascript\">fillDiv('accommodationMenu','".$accommodation."');</script>");

$misc = "<table>";
$misc .= "<tr><td width=\"80\">Mining:</td><td width=\"120\">".number_format($char['mininglevel'])."</td></tr>";
$misc .= "<tr><td>Item Comp.:</td><td>".$char['itemcompatibility']."</td></tr>";
$tradeSkill = $char['tradeskill'] / 10;
$misc .= "<tr><td>Trade Skill:</td><td>".$tradeSkill."%</td></tr>";
$misc .= "<tr><td><a title='See where Bags or Mining spots are when you are around them.'>?</a>)Foresight:</td><td>".$char['foresight']."</td></tr>";
$misc .= "<tr><td>Kill Streak:</td><td>".number_format($char['killstreak'])."</td></tr>";
$misc .= "<tr><td>PVP(K/D):</td><td>".$char['duelratio']."</td></tr>";
$misc .= "</table>";
print("<script type=\"text/javascript\">fillDiv('miscMenu','".$misc."');</script>");

$spells = "<center><select id=\'spell\' onchange=\'spellDesc()\'>";
$spells .= "<option value=\'Nothing\'>----Spells----</option>";
$spell = explode(', ', $char['spells']); 
$spells .= "<option value=\'".$spell[0]."\'>".$spell[0]."</option>";
$spells .= "<option value=\'".$spell[1]."\'>".$spell[1]."</option>";
$spells .= "<option value=\'".$spell[2]."\'>".$spell[2]."</option>";
$spells .= "<option value=\'".$spell[3]."\'>".$spell[3]."</option>";
$spells .= "<option value=\'".$spell[4]."\'>".$spell[4]."</option>";
$spells .= "<option value=\'".$spell[5]."\'>".$spell[5]."</option>";
$spells .= "<option value=\'".$spell[6]."\'>".$spell[6]."</option>";
$spells .= "<option value=\'".$spell[7]."\'>".$spell[7]."</option>";
$spells .= "<option value=\'".$spell[8]."\'>".$spell[8]."</option>";
$spells .= "<option value=\'".$spell[9]."\'>".$spell[9]."</option>";
$spells .= "<option value=\'".$spell[10]."\'>".$spell[10]."</option>";
$spells .= "<option value=\'".$spell[11]."\'>".$spell[11]."</option>";
$spells .= "</select>";
$spells .= "<div id=\'castBox\'></div>";
$spells .= "<div id=\'spellDesc\'></div></center>";
print("<script type=\"text/javascript\">fillDiv('spellsMenu','".$spells."');</script>");


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
$affinity = "<table border=\"1\">";
if($char['charge'] == "None"){
$affinity .= "<tr height=\"60px\">";
$affinity .= "<td width=\"60px\" height=\"40\" title=\'".$blessing1['description']."\'><img src=\'".$blessing1['image']."\'></td><td width=\"60px\" title=\'".$blessing2['description']."\'><img src=\'".$blessing2['image']."\'></td><td width=\"60px\" title=\'".$blessing3['description']."\'><img src=\'".$blessing3['image']."\'></td><td width=\"60px\" title=\'".$blessing4['description']."\'><img src=\'".$blessing4['image']."\'></td><td width=\"60px\" title=\'".$blessing5['description']."\'><img src=\'".$blessing5['image']."\'></td><td width=\"60px\" title=\'".$blessing6['description']."\'><img src=\'".$blessing6['image']."\'></td><td width=\"60px\" title=\'".$blessing7['description']."\'><img src=\'".$blessing7['image']."\'></td><td width=\"60px\" title=\'".$blessing8['description']."\'><img src=\'".$blessing8['image']."\'></td><td width=\"60px\" title=\'".$blessing9['description']."\'><img src=\'".$blessing9['image']."\'></td>";
$affinity .= "</tr>";
}else{
    $affinity .= "<tr height=\"60px\">";
    if($blessing[0] != "Buy"){
        $link1 = "<a href=\'Javascript: castAffinity(\"1, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing1['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing1['description']."\'>".$link1."</td>";
    if($blessing[1] != "Buy"){
        $link2 = "<a href=\'Javascript: castAffinity(\"2, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing2['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing2['description']."\'>".$link2."</td>";
    if($blessing[2] != "Buy"){
        $link3 = "<a href=\'Javascript: castAffinity(\"3, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing3['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing3['description']."\'>".$link3."</td>";
    if($blessing[3] != "Buy"){
        $link4 = "<a href=\'Javascript: castAffinity(\"4, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing4['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing4['description']."\'>".$link4."</td>";
    if($blessing[4] != "Buy"){
        $link5 = "<a href=\'Javascript: castAffinity(\"5, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing5['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing5['description']."\'>".$link5."</td>";
    if($blessing[5] != "Buy"){
        $link6 = "<a href=\'Javascript: castAffinity(\"6, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing6['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing6['description']."\'>".$link6."</td>";
    if($blessing[6] != "Buy"){
        $link7 = "<a href=\'Javascript: castAffinity(\"7, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing7['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing7['description']."\'>".$link7."</td>";
    if($blessing[7] != "Buy"){
        $link8 = "<a href=\'Javascript: castAffinity(\"8, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing8['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing8['description']."\'>".$link8."</td>";
    if($blessing[8] != "Buy"){
        $link9 = "<a href=\'Javascript: castAffinity(\"9, ".$char['charge']."\");\' border=\'1\'><img src=\'".$blessing9['image']."\'></a>";
    }
    $affinity .= "<td width=\'60px\' title=\'".$blessing9['description']."\'>".$link9."</td>";
    $affinity .= "</tr>";
}
$affinity .= "</table>";
print("<script type=\"text/javascript\">fillDiv('blessingsMenu','".$affinity."');</script>");

if($char['captcha'] == "Active"){
	$data = "<strong>You have 90 seconds to complete CAPTCHA security, from the time it was given, before your account gets suspended.</strong><br /><div id=\"recaptcha_div\"></div><br />";
	$data .= "<input type=\"button\" value=\"Check answer\" onClick=\"verifyCaptcha();\">";
	print("<script type=\"text/javascript\">fillDiv('displayArea','".$data."');</script>");
	print("<script type=\"text/javascript\">showRecaptcha('recaptcha_div');</script>");
	die();
}
?>