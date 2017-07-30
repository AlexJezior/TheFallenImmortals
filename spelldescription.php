<?php 
session_name("icsession");
session_start();
include('db.php');

if($_POST['spellid'] != "Nothing"){
	$data = "";
	$findSpell = mysql_query("SELECT * FROM affinity WHERE name='".$_POST['spellid']."'");
	$spell = mysql_fetch_assoc($findSpell);
	if($spell['level'] == 1){
		$data .= "Cost: 1,000 mana<br />";
	}elseif($spell['level'] == 2){
		$data .= "Cost: 2,500 mana<br />";
	}elseif($spell['level'] == 3){
		$data .= "Cost: 7,500 mana<br />";
	}elseif($spell['level'] == 4){
		$data .= "Cost: 20,000 mana<br />";
	}elseif($spell['level'] == 5){
		$data .= "Cost: 50,000 mana<br />";
	}elseif($_POST['spellid'] == "First Aid"){
		$data .= "Cost: 50 mana<br />";
	}elseif($_POST['spellid'] == "First Aid II"){
		$data .= "Cost: 300 mana<br />";
	}elseif($_POST['spellid'] == "First Aid III"){
		$data .= "Cost: 1,000 mana<br />";
	}elseif($_POST['spellid'] == "First Aid IV"){
		$data .= "Cost: 3,000 mana<br />";
	}elseif($_POST['spellid'] == "First Aid V"){
		$data .= "Cost: 10,000 mana<br />";
	}else{
		$data .= "";
	}
	$data .= $spell['description'];
	$castBox = "<a href=\'javascript: castSpell(\"".$_POST['spellid']."\");\'>Cast</a>";

}else{
	$data = "";
}

print("fillDiv('castBox','".$castBox."');");
print("fillDiv('spellDesc','".$data."');");
?>