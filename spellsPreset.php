<?php
session_name("icsession");
session_start();
include('db.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar)or die("You need to login!");

$blessing = explode(', ', $char['blessing']);
$spell = explode(', ', $char['spells']);

if($_POST['action'] == "use"){
	
	if(in_array("Not Set", explode(", ", $char['presets']))){
		print("alert('No preset saved!');");
	}else{
		$totalcost = '0';
		$preset = explode(', ', $char['presets']);
		if($preset[0] == "None"){
			$one = $blessing[0];
		}else{
			$one = $preset[0];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['0']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
			
		}
		
		if($preset[1] == "None"){
			$two = $blessing[1];
		}else{
			$two = $preset[1];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['1']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
		}
		
		if($preset[2] == "None"){
			$three = $blessing[2];
		}else{
			$three = $preset[2];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['2']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
		}
		
		if($preset[3] == "None"){
			$four = $blessing[3];
		}else{
			$four = $preset[3];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['3']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
		}
		
		if($preset[4] == "None"){
			$five = $blessing[4];
		}else{
			$five = $preset[4];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['4']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
		}
		
		if($preset[5] == "None"){
			$six = $blessing[5];
		}else{
			$six = $preset[5];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['5']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
		}
		
		if($preset[6] == "None"){
			$seven = $blessing[6];
		}else{
			$seven = $preset[6];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['6']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
		}
		
		if($preset[7] == "None"){
			$eight = $blessing[7];
		}else{
			$eight = $preset[7];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['7']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
		}
		
		if($preset[8] == "None"){
			$nine = $blessing[8];
		}else{
			$nine = $preset[8];
			$findCostSQL = mysql_query("SELECT * FROM affinity WHERE name='".$preset['8']."'");
			$foundcost = mysql_fetch_assoc($findCostSQL);
			$spellLevel = $foundcost['level'];
			if($spellLevel == "0"){ $totalcost += '0'; }
			if($spellLevel == "1"){ $totalcost += '1000'; }
			if($spellLevel == "2"){ $totalcost += '2500'; }
			if($spellLevel == "3"){ $totalcost += '7500'; }
			if($spellLevel == "4"){ $totalcost += '20000'; }
			if($spellLevel == "5"){ $totalcost += '50000'; }
		}
		
		$preset = $one.", ".$two.", ".$three.", ".$four.", ".$five.", ".$six.", ".$seven.", ".$eight.", ".$nine;
		if($char['mana'] >= $totalcost){
			$updateblessings = mysql_query("UPDATE characters SET blessing='".$preset."', mana=mana-'".$totalcost."' WHERE username='".$char['username']."'");
			print("alert('Presets have been distributed. Total cost ".$totalcost."');");
		}else{
			print("alert('Not enough mana! ".number_format($totalcost)." mana required!');");
		}
	}
	
	
	
}elseif($_POST['action'] == "save"){
	
	if($blessing[0] == "Buy"){
		$first = "Buy";
	}elseif(in_array($blessing[0], $spell)){
		$first = $blessing[0];
	}else{
		$first = "None";
	}
	
	if($blessing[1] == "Buy"){
		$second = "Buy";
	}elseif(in_array($blessing[1], $spell)){
		$second = $blessing[1];
	}else{
		$second = "None";
	}
	
	if($blessing[2] == "Buy"){
		$third = "Buy";
	}elseif(in_array($blessing[2], $spell)){
		$third = $blessing[2];
	}else{
		$third = "None";
	}
	
	if($blessing[3] == "Buy" && $char['affinitys'] <= "3"){
		$fourth = "Buy";
	}elseif(in_array($blessing[3], $spell)){
		$fourth = $blessing[3];
	}else{
		$fourth = "None";
	}
	
	if($blessing[4] == "Buy" && $char['affinitys'] <= "4"){
		$fifth = "Buy";
	}elseif(in_array($blessing[4], $spell)){
		$fifth = $blessing[4];
	}else{
		$fifth = "None";
	}
	
	if($blessing[5] == "Buy" && $char['affinitys'] <= "5"){
		$sixth = "Buy";
	}elseif(in_array($blessing[5], $spell)){
		$sixth = $blessing[5];
	}else{
		$sixth = "None";
	}
	
	if($blessing[6] == "Buy" && $char['affinitys'] <= "6"){
		$seventh = "Buy";
	}elseif(in_array($blessing[6], $spell)){
		$seventh = $blessing[6];
	}else{
		$seventh = "None";
	}
	
	if($blessing[7] == "Buy" && $char['affinitys'] <= "7"){
		$eighth = "Buy";
	}elseif(in_array($blessing[7], $spell)){
		$eighth = $blessing[7];
	}else{
		$eighth = "None";
	}
	
	if($blessing[8] == "Buy" && $char['affinitys'] <= "8"){
		$ninth = "Buy";
	}elseif(in_array($blessing[8], $spell)){
		$ninth = $blessing[8];
	}else{
		$ninth = "None";
	}
	
	$presetSet = $first . ", ".$second.", ".$third.", ".$fourth.", ".$fifth.", ".$sixth.", ".$seventh.", ".$eighth.", ".$ninth;
	$updateCharacterPresets = mysql_query("UPDATE characters SET presets='".$presetSet."' WHERE username='".$char['username']."'");
	print("alert('Saved new preset successfully');");
	
}else{
	die("alert('Action Not found!');");
}
include('updatestats.php');
?>