<?php
$getmods = mysql_query("SELECT * FROM inventory WHERE username='".$oponent['username']."' AND equipped='Yes'");
while($mods = mysql_fetch_array($getmods))
{
	if($mods['strength'] > "0")
	{
		$oponentstr = floor($oponentstr + $mods['strength']);
	}
	if($mods['dexterity'] > "0")
	{
		$oponentdex = floor($oponentdex + $mods['dexterity']);
	}
	if($mods['endurance'] > "0")
	{
		$oponentend = floor($oponentend + $mods['endurance']);
	}
	if($mods['intelligence'] > "0")
	{
		$oponentint = floor($oponentint + $mods['intelligence']);
	}
	if($mods['concentration'] > "0")
	{
		$oponentcon = floor($oponentcon + $mods['concentration']);
	}
}

$blessing = explode(', ', $oponent['blessing']);
if($oponent['affinitys'] >= '1')
{
	if($blessing[0] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$equation = $level['level']/10;
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[0] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[0] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[0]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}

if($oponent['affinitys'] >= '2'){
	if($blessing[1] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[1] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[1] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[1]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}

if($oponent['affinitys'] >= '3')
{
	if($blessing[2] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[2] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[2] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[2]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}

if($oponent['affinitys'] >= '4'){
	if($blessing[3] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[3] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[3] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[3]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}

if($oponent['affinitys'] >= '5'){
	if($blessing[4] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[4] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[4] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[4]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}

if($oponent['affinitys'] >= '6'){
	if($blessing[5] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[5] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[5] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[5]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}

if($oponent['affinitys'] >= '7'){
	if($blessing[6] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[6] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[6] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[6]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}

if($oponent['affinitys'] >= '8'){
	if($blessing[7] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[7] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[7] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[7]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}

if($oponent['affinitys'] >= '9'){
	if($blessing[8] == "Might"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Speed"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Constitution"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[9] == "Concentration"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Intelligence"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Might II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Speed II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Constitution II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Concentration II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Intelligence II"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Might III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Speed III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Constitution III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Concentration III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Intelligence III"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Might IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Speed IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Constitution IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Concentration IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Intelligence IV"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Might V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentstr *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Speed V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentdex *= ("1" + ($level['level'] / "10"));
	}

	if($blessing[8] == "Constitution V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentend *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Concentration V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentcon *= ("1" + ($level['level'] / "10"));
	}
	
	if($blessing[8] == "Intelligence V"){
		$level = mysql_fetch_array(mysql_query("SELECT * FROM affinity WHERE name='".$blessing[8]."'"));
		$oponentint *= ("1" + ($level['level'] / "10"));
	}
}
?>