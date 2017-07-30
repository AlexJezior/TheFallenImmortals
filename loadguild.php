<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
include('functions.php');

if(isset($_POST['guildname']) && $_POST['guildname'] != "Select Guild")
{
	$guildname = $_POST['guildname'];
	$getguild = mysql_query("SELECT * FROM guilds WHERE id='".$guildname."'");
	$guild = mysql_fetch_assoc($getguild);

	$getmembers = mysql_query("SELECT * FROM characters WHERE guild='".$guild['name']."'");
	$members = mysql_num_rows($getmembers);

	while($member = mysql_fetch_array($getmembers))
	{
		$totalbonus += floor($member['level'] / "100");
	}

	$data = "Members: ".number_format($members)."";
	$data .= "<br />Leader: <a href=\'javascript:toptell(\"".$guild['leader']."\");\'>".$guild['leader']."</a>";
	$data .= "<br />Co-Leader: <a href=\'javascript:toptell(\"".$guild['coleader']."\");\'>".$guild['coleader']."</a>";
	$data .= "<br />Captain: <a href=\'javascript:toptell(\"".$guild['captain']."\");\'>".$guild['captain']."</a>";
	$data .= "<br />Process: ".$guild['accept'];
	$data .= "<br />Bonus: ".number_format($totalbonus);
	$data .= "<br />Exp: ".$guild['exp']."%";
	$data .= "<br />Gold: ".$guild['gold']."%";
	$data .= "<br />Item Drops: ".$guild['itemdrop']."%";
	$data .= "<br />Item Boost: ".$guild['itemboost']."%";

	print("fillDiv('guildinfo','".$data."');");
}
else
{
	print("fillDiv('guildinfo','<u><em>Guild information is loaded here.</em></u>');");
}
?>