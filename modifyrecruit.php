<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');

$getguild = mysql_query("SELECT * FROM guilds WHERE name='".$charguild."'");
$guild = mysql_fetch_assoc($getguild);
if($charname == $guild['leader'] || $charname == $guild['coleader'])
{
	if($_POST['modify'] == "recruit")
	{
		if($guild['recruiting'] == "Yes")
		{
			$set = "No";
		}
		else
		{
			$set = "Yes";
		}
		$setguild = mysql_query("UPDATE guilds SET recruiting='".$set."' WHERE name='".$char['guild']."'");
	}
	elseif($_POST['modify'] == "accept")
	{		if($guild['accept'] == "Approve")
		{
			$set = "Auto";
		}
		else
		{
			$set = "Approve";
		}
		$setguild = mysql_query("UPDATE guilds SET accept='".$set."' WHERE name='".$charguild."'");
	}
	elseif($_POST['modify'] == "applicant")
	{
		if($charname == $guild['leader'] || $charname == $guild['coleader'] || $charname == $guild['captain'])
		{
			$username = $_POST['username'];
			$getuser = mysql_query("SELECT * FROM characters WHERE username='".$username."' AND guild='None'");
			if(mysql_num_rows($getuser) == "1")
			{
				$getapplication = mysql_query("SELECT * FROM applications WHERE username='".$username."'");
				if(mysql_num_rows($getapplication) == "1")
				{
					$updateapplicant = mysql_query("UPDATE characters SET guild='".$guild['name']."' WHERE username='".$username."'");
					$deleteapplication = mysql_query("DELETE FROM applications WHERE username='".$username."'");
				}
			}
		}
	}
	elseif($_POST['modify'] == "kick")
	{
		if($charname == $guild['leader'] || $charname == $guild['coleader'])
		{
			$username = $_POST['username'];
			$getuser = mysql_query("SELECT * FROM characters WHERE username='".$username."' AND guild='".$guild['name']."'");
			if(mysql_num_rows($getuser) == "1")
			{
				if($username != $guild['leader'])
				{
					$getmember = mysql_query("SELECT * FROM characters WHERE username='".$username."'");
					if(mysql_num_rows($getmember) == "1")
					{
						$updateapplicant = mysql_query("UPDATE characters SET guild='None' WHERE username='".$username."'");
						if($username == $guild['coleader'])
						{
							$updateguild = mysql_query("UPDATE guilds SET coleader='' WHERE name='".$charguild."'");
						}
						if($username == $guild['captain'])
						{
							$updateguild = mysql_query("UPDATE guilds SET captain='' WHERE name='".$charguild."'");
						}
					}
				}
			}
		}
	}
	elseif($_POST['modify'] == "promote")
	{
		$username = $_POST['username'];
		$getuser = mysql_query("SELECT * FROM characters WHERE username='".$username."' AND guild='".$guild['name']."'");
		if(mysql_num_rows($getuser) == "1")
		{
			if($charname == $guild['leader'])
			{
				if($username != $guild['leader'])
				{
					if($username == $guild['captain'])	//Make Co-Leader
					{
						$updateguild = mysql_query("UPDATE guilds SET coleader='".$username."', captain='' WHERE name='".$charguild."'");
					}
					else	//Make Captain
					{
						$updateguild = mysql_query("UPDATE guilds SET captain='".$username."' WHERE name='".$charguild."'");
					}
				}
			}
			elseif($charname == $guild['coleader'])
			{
				if($username != $guild['leader'] && $username != $guild['coleader'])
				{
					$updateguild = mysql_query("UPDATE guilds SET captain='".$username."' WHERE name='".$charguild."'");
				}
			}
		}
	}
	elseif($_POST['modify'] == "demote")
	{
		$username = $_POST['username'];
		$getuser = mysql_query("SELECT * FROM characters WHERE username='".$username."' AND guild='".$guild['name']."'");
		if(mysql_num_rows($getuser) == "1")
		{
			if($charname == $guild['leader'])
			{
				if($username != $guild['leader'])
				{
					if($username == $guild['coleader'])	//Make Captain
					{
						$updateguild = mysql_query("UPDATE guilds SET coleader='', captain='".$username."' WHERE name='".$charguild."'");
					}
					else	//Make Member
					{
						$updateguild = mysql_query("UPDATE guilds SET captain='' WHERE name='".$charguild."'");
					}
				}
			}
			elseif($charname == $guild['coleader'])
			{
				if($username != $guild['leader'] && $username != $guild['coleader'])
				{
					$updateguild = mysql_query("UPDATE guilds SET captain='' WHERE name='".$charguild."'");
				}
			}
		}
	}
	print("viewGuild();");
}
?>