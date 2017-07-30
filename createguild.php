<?php

//////////////////////////////////////////////////

//Please allow me to build this entire system.	//

//I want to have fun with it.					//

//////////////////////////////////////////////////

//Deus											//

//////////////////////////////////////////////////

session_name("icsession");

session_start();

include('db.php');

include('varset.php');



if($chargold >= "10000000" && isset($_POST['guildname']) && isset($_POST['guildtag']))	//10m

{

	$guildname = $_POST['guildname'];

	$guildtag = $_POST['guildtag'];



	$getguild = mysql_query("SELECT * FROM guilds WHERE name='".$guildname."'");

	if(mysql_num_rows($getguild) != "1")

	{

		if($guildname != "" || $guildname != "None" || $guildname != "Select Guild" || $guildname != "Admin" || $guildname != "Administration" || $guildname != "Mod" || $guildname != "Moderator" || strlen($guildname) <= "40")

		{

			if($guildtag != "" || strlen($guildtag) <= "5")

			{

				$newgold = $char['gold'] - "10000000";

				$news = "You have successfully created your Guild [b]".$guildname."[/b]. This is your Guild Portal where every aspect of your Guild can be modified to suit your needs.";



				$setchar = mysql_query("UPDATE characters SET guild='".$guildname."', gold='".$newgold."' WHERE id='".$_SESSION['userid']."'");

				$setguild = mysql_query("INSERT INTO guilds (`name`, `tag`, `leader`, `news`) VALUES ('".$guildname."', '".$guildtag."', '".$char['username']."', '".$news."')");

				$messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." has registered a new Guild by the name ".$guildname.".</font></strong><br />";

	        	$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");



				print("viewGuild();");

			}

			else

			{

				$data = "<font color=\'#FF0000\'>You need to specify a Guild Tag.</font>";

			}

		}

		else

		{

			$data = "<font color=\'#FF0000\'>You have chosen an illegal or disallowed Guild Name, please choose another.</font>";

		}

	}

	else

	{

		$data = "<font color=\'#FF0000\'>A Guild already exists by this name, please choose another.</font>";

	}

}

else

{

	$data = "<font color=\'#FF0000\'>You do not have the 10,000,000 Gold required to create a Guild. Or invalid guild name and/or tag.</font>";

}



print("fillDiv('guildinfo','".$data."');");

?>