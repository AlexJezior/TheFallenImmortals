<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
include('active.php');
include('attackbonuses.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);
$date = time();

$findDuel = mysql_query("SELECT * FROM duelground WHERE `tousername`='".$char['username']."' OR `fromusername`='".$char['username']."'");
if(mysql_num_rows($findDuel) == 0){
	print("alert('You are not in a duel!');");
}else{
	$duel = mysql_fetch_assoc($findDuel);
	if($duel['status'] == "Requesting" || $duel['turn'] != $char['username']){
		print("alert('It is not your turn to duel or the duel hasnt even started!');");
	}else{
		if($charlife <= "0"){
			print("alert('You were slaughtered.');");
			$updateDuel = mysql_query("DELETE FROM duelground WHERE `id`='".$duel['id']."'");
		}else{
			if($char['username'] == $duel['tousername']){
				$findOponent = mysql_query("SELECT * FROM characters WHERE username='".$duel['fromusername']."'");
				$oponent = mysql_fetch_assoc($findOponent);
			}else{
				$findOponent = mysql_query("SELECT * FROM characters WHERE username='".$duel['tousername']."'");
				$oponent = mysql_fetch_assoc($findOponent);
			}
			require('oponentvarset.php');
			require('oponentattackbonuses.php');
			if($oponentlife <= "0"){
				print("alert('".$oponentname." was slaughtered.');");
				$updateDuel = mysql_query("DELETE FROM duelground WHERE `id`='".$duel['id']."'");
			}else{
				
				if($char['class'] == "Mage" || $char['class'] == "Mage II" || $char['class'] == "Mage III" || $char['class'] == "Mage IV" || $char['class'] == "Mage V" || $char['class'] == "Sorcerer" || $char['class'] == "Sorcerer II" || $char['class'] == "Sorcerer III" || $char['class'] == "Sorcerer IV" || $char['class'] == "Sorcerer V" || $char['class'] == "Elemental"){
					$initvalue = floor("75" * ($charcon / $oponentdex));
				}else{
					$initvalue = floor("75" * ($chardex / $oponentdex));
				}
				$initnumber = mt_rand("1", "100");
				
				if($initnumber > $initvalue){ //You missed
					$messagechat = "<strong><font color=\'#FF3300\'>You <span style=\'color: red;\'><i><strong>miss</strong></i></span> ".$oponentname.".</font></strong><br />";
					$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$char['username']."')");
					
					$messagechat = "<strong><font color=\'#FF3300\'>".$char['username']." <span style=\'color: green;\'><i><strong>missed</strong></i></span> you! <a href=\'javascript: attackFight();\'>Attack</a>!</font></strong><br />";
					$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$oponentname."')");
					
					$updateDuel = mysql_query("UPDATE duelground SET turn='".$oponentname."', time='".$date."' WHERE id='".$duel['id']."'");
					
				}else{ // You hit
				
					if($char['class'] == "Mage" || $char['class'] == "Mage II" || $char['class'] == "Mage III" || $char['class'] == "Mage IV" || $char['class'] == "Mage V" || $char['class'] == "Sorcerer" || $char['class'] == "Sorcerer II" || $char['class'] == "Sorcerer III" || $char['class'] == "Sorcerer IV" || $char['class'] == "Sorcerer V" || $char['class'] == "Elemental"){
                		$damagemin = floor($charint * "0.1");
                    	$damagemax = floor($charint * "0.5");
                	}else{
                    	$damagemin = floor($charstr * "0.1");
                    	$damagemax = floor($charstr * "0.5");
                	}
                	$damageval = mt_rand($damagemin, $damagemax); // amount of damage
                	$oponentlife = $oponentlife - $damageval;
                	
                	$messagechat = "<strong><font color=\'#FF3300\'>You <span style=\'color: green;\'><i><strong>hit</strong></i></span> ".$oponentname." for <span style=\'color: green;\'><i><strong>".number_format($damageval)."</strong></i></span> damage!!!</font></strong><br />";
					$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$char['username']."')");
                	
                	$messagechat = "<strong><font color=\'#FF3300\'>".$charname." <span style=\'color: red;\'><i><strong>hit</strong></i></span> you for <span style=\'color: red;\'><i><strong>".number_format($damageval)."</strong></i></span> damage!!!</font></strong><br />";
					$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$oponentname."')");
					
                	if($oponentlife <= "0"){ //oponent is dead
                		$messagechat = "<strong><font color=\'#FF3300\'>You <span style=\'color: green;\'><i><strong>slaughtered</strong></i></span> ".$oponentname."!!! Congratulations!</font></strong><br />";
						$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$char['username']."')");
						
						$yourRatio = explode('/', $char['duelratio']);
						$yourRatio[0] = $yourRatio[0] + 1;
						$newRatio = $yourRatio[0]."/".$yourRatio[1];
						$updateRatio = mysql_query("UPDATE characters SET duelratio='".$newRatio."' WHERE username='".$char['username']."'");
						
						$messagechat = "<strong><font color=\'#FF3300\'>".$charname." <span style=\'color: red;\'><i><strong>slaughtered</strong></i></span> you. Sorry for your loss...</font></strong><br />";
						$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$oponentname."')");
						
						$oponentRatio = explode('/', $oponent['duelratio']);
						$oponentRatio[1] = $oponentRatio[1] + 1;
						$newRatio = $oponentRatio[0]."/".$oponentRatio[1];
						$updateRatio = mysql_query("UPDATE characters SET duelratio='".$newRatio."' WHERE username='".$oponent['username']."'");
						
						$endDuel = mysql_query("DELETE FROM duelground WHERE id='".$duel['id']."'");
                	}else{ //The duel goes on...
                		$messagechat = "<strong><font color=\'#FF3300\'>".$oponentname."is initiating the next round...</font></strong><br />";
						$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$char['username']."')");
						
						$messagechat = "<strong><font color=\'#FF3300\'>You still stand... <a href=\'javascript: attackFight();\'>Attack</a>!</font></strong><br />";
						$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$oponentname."')");
						
						$changeDuelSides = mysql_query("UPDATE duelground SET turn='".$oponentname."', time='".$date."' WHERE id='".$duel['id']."'");
                	}
                	
                	$updateOponent = mysql_query("UPDATE characters SET life='".$oponentlife."' WHERE username='".$oponentname."'");
				}
				
			}
		}
	}
}
include('updatestats.php');
?>