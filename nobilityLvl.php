<?php 
$nobility = explode("(", $char['nobility']);
$nobilityLevel = str_replace(")", "", $nobility[1]);
$nobilityRank = $nobility[0];

if($nobilityLevel >= 50 && $nobilityLevel <= 149 && $nobilityRank != "Second Lieutenant"){
/////////////////////////////////	
	$newNobility = "Second Lieutenant(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
/////////////////////////////////////
}elseif($nobilityLevel >= 150 && $nobilityLevel <= 299 && $nobilityRank != "Lieutenant"){
////////////////////////////////////
	$newNobility = "Lieutenant(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
/////////////////////////////////////
}elseif($nobilityLevel >= 300 && $nobilityLevel <= 599 && $nobilityRank != "Captain"){
///////////////////////////////////////
	$newNobility = "Captain(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}elseif($nobilityLevel >= 600 && $nobilityLevel <= 849 && $nobilityRank != "Major"){
///////////////////////////////////////
	$newNobility = "Major(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}elseif($nobilityLevel >= 850 && $nobilityLevel <= 1149 && $nobilityRank != "Lieutenant Colonel"){
///////////////////////////////////////
	$newNobility = "Lieutenant Colonel(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}elseif($nobilityLevel >= 1150 && $nobilityLevel <= 1499 && $nobilityRank != "Colonel"){
///////////////////////////////////////
	$newNobility = "Colonel(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}elseif($nobilityLevel >= 1500 && $nobilityLevel <= 1899 && $nobilityRank != "Brigadier"){
///////////////////////////////////////
	$newNobility = "Brigadier(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}elseif($nobilityLevel >= 1900 && $nobilityLevel <= 2349 && $nobilityRank != "Major General"){
///////////////////////////////////////
	$newNobility = "Major General(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}elseif($nobilityLevel >= 2350 && $nobilityLevel <= 2849 && $nobilityRank != "Lieutenant General"){
///////////////////////////////////////
	$newNobility = "Lieutenant General(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}elseif($nobilityLevel >= 2850 && $nobilityLevel <= 3499 && $nobilityRank != "General"){
///////////////////////////////////////
	$newNobility = "General(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}elseif($nobilityLevel >= 3500 && $nobilityRank != "Field Marshal"){
///////////////////////////////////////
	$newNobility = "Field Marshal(".$nobilityLevel.")";
	$updateNobility = mysql_query("UPDATE characters SET nobility='".$newNobility."' WHERE username='".$char['username']."'");
	$messagechat = "<font color=\'#CCFF00\'>".$char['username']." has achieved a new Nobility Title of <strong>".$newNobility."</strong></font><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
///////////////////////////////////////
}
?>