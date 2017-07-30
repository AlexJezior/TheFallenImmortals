<?php 
	$stats = "";
	$stats .= "Presets: <a href=\'javascript: preset(\"use\");\' title=\'".$char['presets']."\'>Use</a> | <a href=\'javascript: preset(\"save\");\'>Save</a>";
	$stats .= "<center><select id=\'spell\' onchange=\'spellDesc()\'>";
	$stats .= "<option value=\'Nothing\'>----Spells----</option>";
	$spell = explode(', ', $char['spells']); 
	$stats .= "<option value=\'".$spell[0]."\'>".$spell[0]."</option>";
	$stats .= "<option value=\'".$spell[1]."\'>".$spell[1]."</option>";
	$stats .= "<option value=\'".$spell[2]."\'>".$spell[2]."</option>";
	$stats .= "<option value=\'".$spell[3]."\'>".$spell[3]."</option>";
	$stats .= "<option value=\'".$spell[4]."\'>".$spell[4]."</option>";
	$stats .= "<option value=\'".$spell[5]."\'>".$spell[5]."</option>";
	$stats .= "<option value=\'".$spell[6]."\'>".$spell[6]."</option>";
	$stats .= "<option value=\'".$spell[7]."\'>".$spell[7]."</option>";
	$stats .= "<option value=\'".$spell[8]."\'>".$spell[8]."</option>";
	$stats .= "<option value=\'".$spell[9]."\'>".$spell[9]."</option>";
	$stats .= "<option value=\'".$spell[10]."\'>".$spell[10]."</option>";
	$stats .= "<option value=\'".$spell[11]."\'>".$spell[11]."</option>";
    $stats .= "</select>";
	$stats .= "<div id=\'castBox\'></div>";
	$stats .= "<div id=\'spellDesc\'></div></center>";
?>