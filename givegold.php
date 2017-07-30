<?php
session_name("icsession");
session_start();
include('db.php');
include('active.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);
$display = "";

if(isset($_POST['toUsername']) && isset($_POST['giveAmount']))
{
	
	$to = $_POST['toUsername'];
	$amount = $_POST['giveAmount'];
	if(!ctype_digit($amount)){
		$display .= "<center><font color=\'red\'>Invalid amount.</font></center>";
		die();
	}else{
		if($char['gold'] < $amount)
		{
			$display .= "<center><font color=\'red\'>Not enough gold.</font></center>";
			die();
		}else{
			$findCharacter = mysql_query("SELECT * FROM characters WHERE username='".$to."'");
			$countNumRows = mysql_num_rows($findCharacter);
			if($countNumRows == 0)
			{
				$display .= "<center><font color=\'red\'>No such character.</font></center>";
			}else{
				$to = mysql_fetch_assoc($findCharacter);
				$updateTo = mysql_query("UPDATE characters SET gold=gold-'".$amount."' WHERE username='".$char['username']."'")or die("alert('Unable to remove gold. Tell admin.');");
				$updateTo = mysql_query("UPDATE characters SET gold=gold+'".$amount."' WHERE username='".$to['username']."'")or die("alert('Unable to add gold. Tell admin.');");
				$display .= "<center><font color=\'green\'>You have given ".$to['username']." ".number_format($amount)." gold from your hand!</font></center>";
				$datestamp = date("H:i:s");
				$message = "<a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#FF7700\' style=\'text-decoration:none\'>".$char['username']."</font></a><font color=\'#FF7700\'> has given you ".number_format($amount)." gold from their hand.</font><br />";
				$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$to['username']."', '".$message."')")or die("alert('Unable to insert chat log. Tell the admin!');");
			}
		}
	}

}

print("fillDiv('displayArea','".$display."');");
include('updatestats.php');
?>