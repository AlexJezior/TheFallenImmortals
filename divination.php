<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);
$characterSpells = explode(', ', $char['spells']);

$display = "<br /><br /><br />Welcome to Divination! You can learn all sorts of spells to either cast upon yourself or others. Everything comes at a price and wether you have the knowledge or resources will be up to you.";
$display .= "<br /><br />";


///////////////////////////Learning

if(isset($_POST['name'])){
	$name = $_POST['name'];
	
	if($name == "First Aid II")
	{
		if (!in_array('First Aid', $characterSpells))
		{
			$display .= "You need to learn First Aid first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 300 && $char['blood'] < 15000 && $char['gold'] < 10000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'15000', gold=gold-'10000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[0] = "First Aid II";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned First Aid II!!!";
			}
			
		}
	}
	elseif($name == "First Aid III")
	{
		if (!in_array('First Aid II', $characterSpells))
		{
			$display .= "You need to learn First Aid II first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 1000 && $char['blood'] < 45000 && $char['gold'] < 30000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'45000', gold=gold-'30000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[0] = "First Aid III";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned First Aid III!!!";
			}
			
		}
	}
	elseif($name == "First Aid IV")
	{
		if (!in_array('First Aid III', $characterSpells))
		{
			$display .= "You need to learn First Aid III first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 3000 && $char['blood'] < 100000 && $char['gold'] < 75000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'100000', gold=gold-'75000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[0] = "First Aid IV";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned First Aid IV!!!";
			}
			
		}
	}
	elseif($name == "First Aid V")
	{
		if (!in_array('First Aid IV', $characterSpells))
		{
			$display .= "You need to learn First Aid IV first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 10000 && $char['blood'] < 250000 && $char['gold'] < 250000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'250000', gold=gold-'250000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[0] = "First Aid V";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned First Aid V!!!";
				$messagechat = "<strong><font color=\'#9932CC\'>".$char['username']." has mastered First Aid!</font></strong><br />";
				$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
			}
			
		}
	}
	
	/////end FA
	
	elseif($name == "Might")
	{
		if (in_array('Might', $characterSpells))
		{
			$display .= "You already know this spell.<br /><br />";
		}else{
			
			if($char['intelligence'] < 1000 && $char['blood'] < 5000 && $char['gold'] < 1000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'5000', gold=gold-'1000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[1] = "Might";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Might!!!";
			}
			
		}
	}
	elseif($name == "Might II")
	{
		if (!in_array('Might', $characterSpells))
		{
			$display .= "You need to learn Might first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 2500 && $char['blood'] < 15000 && $char['gold'] < 10000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'15000', gold=gold-'10000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[1] = "Might II";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Might II!!!";
			}
			
		}
	}
	elseif($name == "Might III")
	{
		if (!in_array('Might II', $characterSpells))
		{
			$display .= "You need to learn Might II first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 7500 && $char['blood'] < 45000 && $char['gold'] < 30000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'45000', gold=gold-'30000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[1] = "Might III";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Might III!!!";
			}
			
		}
	}
	elseif($name == "Might IV")
	{
		if (!in_array('Might III', $characterSpells))
		{
			$display .= "You need to learn Might III first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 20000 && $char['blood'] < 100000 && $char['gold'] < 75000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'100000', gold=gold-'75000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[1] = "Might IV";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Might IV!!!";
			}
			
		}
	}
	elseif($name == "Might V")
	{
		if (!in_array('Might IV', $characterSpells))
		{
			$display .= "You need to learn Might IV first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 50000 && $char['blood'] < 250000 && $char['gold'] < 250000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'250000', gold=gold-'250000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[1] = "Might V";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Might V!!!";
				$messagechat = "<strong><font color=\'#9932CC\'>".$char['username']." has mastered MIGHT!</font></strong><br />";
				$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
			}
			
		}
	}
	elseif($name == "Speed")
	{
		if (in_array('Speed', $characterSpells))
		{
			$display .= "You already know this spell.<br /><br />";
		}else{
			
			if($char['intelligence'] < 1000 && $char['blood'] < 5000 && $char['gold'] < 1000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'5000', gold=gold-'1000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[2] = "Speed";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Speed!!!";
			}
			
		}
	}
	elseif($name == "Speed II")
	{
		if (!in_array('Speed', $characterSpells))
		{
			$display .= "You need to learn Speed first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 2500 && $char['blood'] < 15000 && $char['gold'] < 10000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'15000', gold=gold-'10000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[2] = "Speed II";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Speed II!!!";
			}
			
		}
	}
	elseif($name == "Speed III")
	{
		if (!in_array('Speed II', $characterSpells))
		{
			$display .= "You need to learn Speed II first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 7500 && $char['blood'] < 45000 && $char['gold'] < 30000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'45000', gold=gold-'30000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[2] = "Speed III";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Speed III!!!";
			}
			
		}
	}
	elseif($name == "Speed IV")
	{
		if (!in_array('Speed III', $characterSpells))
		{
			$display .= "You need to learn Speed III first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 20000 && $char['blood'] < 100000 && $char['gold'] < 75000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'100000', gold=gold-'75000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[2] = "Speed IV";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Speed IV!!!";
			}
			
		}
	}
	elseif($name == "Speed V")
	{
		if (!in_array('Speed IV', $characterSpells))
		{
			$display .= "You need to learn Speed IV first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 50000 && $char['blood'] < 250000 && $char['gold'] < 250000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'250000', gold=gold-'250000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[2] = "Speed V";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Speed V!!!";
				$messagechat = "<strong><font color=\'#9932CC\'>".$char['username']." has mastered SPEED!</font></strong><br />";
				$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
			}
			
		}
	}
	elseif($name == "Constitution")
	{
		if (in_array('Constitution', $characterSpells))
		{
			$display .= "You already know this spell.<br /><br />";
		}else{
			
			if($char['intelligence'] < 1000 && $char['blood'] < 5000 && $char['gold'] < 1000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'5000', gold=gold-'1000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[3] = "Constitution";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Constitution!!!";
			}
			
		}
	}
	elseif($name == "Constitution II")
	{
		if (!in_array('Constitution', $characterSpells))
		{
			$display .= "You need to learn Constitution first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 2500 && $char['blood'] < 15000 && $char['gold'] < 10000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'15000', gold=gold-'10000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[3] = "Constitution II";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Constitution II!!!";
			}
			
		}
	}
	elseif($name == "Constitution III")
	{
		if (!in_array('Constitution II', $characterSpells))
		{
			$display .= "You need to learn Constitution II first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 7500 && $char['blood'] < 45000 && $char['gold'] < 30000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'45000', gold=gold-'30000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[3] = "Constitution III";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Constitution III!!!";
			}
			
		}
	}
	elseif($name == "Constitution IV")
	{
		if (!in_array('Constitution III', $characterSpells))
		{
			$display .= "You need to learn Constitution III first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 20000 && $char['blood'] < 100000 && $char['gold'] < 75000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'100000', gold=gold-'75000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[3] = "Constitution IV";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Constitution IV!!!";
			}
			
		}
	}
	elseif($name == "Constitution V")
	{
		if (!in_array('Constitution IV', $characterSpells))
		{
			$display .= "You need to learn Constitution IV first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 50000 && $char['blood'] < 250000 && $char['gold'] < 250000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'250000', gold=gold-'250000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[3] = "Constitution V";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Constitution V!!!";
				$messagechat = "<strong><font color=\'#9932CC\'>".$char['username']." has mastered CONSTITUTION!</font></strong><br />";
				$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
			}
			
		}
	}
	elseif($name == "Concentration")
	{
		if (in_array('Concentration', $characterSpells))
		{
			$display .= "You already know this spell.<br /><br />";
		}else{
			
			if($char['intelligence'] < 1000 && $char['blood'] < 5000 && $char['gold'] < 1000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'5000', gold=gold-'1000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[4] = "Concentration";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Concentration!!!";
			}
			
		}
	}
	elseif($name == "Concentration II")
	{
		if (!in_array('Concentration', $characterSpells))
		{
			$display .= "You need to learn Concentration first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 2500 && $char['blood'] < 15000 && $char['gold'] < 10000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'15000', gold=gold-'10000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[4] = "Concentration II";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Concentration II!!!";
			}
			
		}
	}
	elseif($name == "Concentration III")
	{
		if (!in_array('Concentration II', $characterSpells))
		{
			$display .= "You need to learn Concentration II first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 7500 && $char['blood'] < 45000 && $char['gold'] < 30000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'45000', gold=gold-'30000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[4] = "Concentration III";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Concentration III!!!";
			}
			
		}
	}
	elseif($name == "Concentration IV")
	{
		if (!in_array('Concentration III', $characterSpells))
		{
			$display .= "You need to learn Concentration III first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 20000 && $char['blood'] < 100000 && $char['gold'] < 75000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'100000', gold=gold-'75000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[4] = "Concentration IV";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Concentration IV!!!";
			}
			
		}
	}
	elseif($name == "Concentration V")
	{
		if (!in_array('Concentration IV', $characterSpells))
		{
			$display .= "You need to learn Concentration IV first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 50000 && $char['blood'] < 250000 && $char['gold'] < 250000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'250000', gold=gold-'250000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[4] = "Concentration V";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Concentration V!!!";
				$messagechat = "<strong><font color=\'#9932CC\'>".$char['username']." has mastered CONCENTRATION!</font></strong><br />";
				$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
			}
			
		}
	}
	elseif($name == "Intelligence")
	{
		if (in_array('Intelligence', $characterSpells))
		{
			$display .= "You already know this spell.<br /><br />";
		}else{
			
			if($char['intelligence'] < 1000 && $char['blood'] < 5000 && $char['gold'] < 1000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'5000', gold=gold-'1000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[5] = "Intelligence";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Intelligence!!!";
			}
			
		}
	}
	elseif($name == "Intelligence II")
	{
		if (!in_array('Intelligence', $characterSpells))
		{
			$display .= "You need to learn Intelligence first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 2500 && $char['blood'] < 15000 && $char['gold'] < 10000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'15000', gold=gold-'10000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[5] = "Intelligence II";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Intelligence II!!!";
			}
			
		}
	}
	elseif($name == "Intelligence III")
	{
		if (!in_array('Intelligence II', $characterSpells))
		{
			$display .= "You need to learn Intelligence II first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 7500 && $char['blood'] < 45000 && $char['gold'] < 30000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'45000', gold=gold-'30000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[5] = "Intelligence III";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Intelligence III!!!";
			}
			
		}
	}
	elseif($name == "Intelligence IV")
	{
		if (!in_array('Intelligence III', $characterSpells))
		{
			$display .= "You need to learn Intelligence III first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 20000 && $char['blood'] < 100000 && $char['gold'] < 75000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'100000', gold=gold-'75000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[5] = "Intelligence IV";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Intelligence IV!!!";
			}
			
		}
	}
	elseif($name == "Intelligence V")
	{
		if (!in_array('Intelligence IV', $characterSpells))
		{
			$display .= "You need to learn Intelligence IV first.<br /><br />";
		}else{
			
			if($char['intelligence'] < 50000 && $char['blood'] < 250000 && $char['gold'] < 250000000){
				$display .= "You do not meet the requirements to learn this spell.<br /><br />";
			}else{
				$removeFee = mysql_query("UPDATE characters SET blood=blood-'250000', gold=gold-'250000000' WHERE id='".$_SESSION['userid']."'");
				$characterSpells[5] = "Intelligence V";
				$newCharacterSpells = "".$characterSpells[0].", ".$characterSpells[1].", ".$characterSpells[2].", ".$characterSpells[3].", ".$characterSpells[4].", ".$characterSpells[5].", ".$characterSpells[6].", ".$characterSpells[7].", ".$characterSpells[8].", ".$characterSpells[9].", ".$characterSpells[10].", ".$characterSpells[11]."";
				$giveSpell = mysql_query("UPDATE characters SET spells='".$newCharacterSpells."' WHERE id='".$_SESSION['userid']."'");
				$display .= "You have learned Intelligence V!!!";
				$messagechat = "<strong><font color=\'#9932CC\'>".$char['username']." has mastered INTELLIGENCE!</font></strong><br />";
				$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
			}
			
		}
	}
	else{
		$display .= "No such spell for teachings.<br /><br />";
	}
}else{





		//////////////////////////DISPLAY
		
		$display .= "<table border=\'1\'>";
		$display .= "<tr><td>Spell Name</td><td>Qualifications</td><td>Buy</td></tr>";
		
		////////////////Start First Aid
		
		if(in_array('First Aid', $characterSpells)) 
		{
			if($char['intelligence'] >= 300 && $char['blood'] >= 15000 && $char['gold'] >= 10000000){
				$learn = "<a href=\'Javascript: learnDivination(\"First Aid II\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>First Aid II</td><td>300 Int, 15,000 Blood, 10,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('First Aid II', $characterSpells)) 
		{
			if($char['intelligence'] >= 1000 && $char['blood'] >= 45000 && $char['gold'] >= 30000000){
			$learn = "<a href=\'Javascript: learnDivination(\"First Aid III\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>First Aid III</td><td>1,000 Int, 45,000 Blood, 30,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('First Aid III', $characterSpells)) 
		{
			if($char['intelligence'] >= 3000 && $char['blood'] >= 100000 && $char['gold'] >= 75000000){
			$learn = "<a href=\'Javascript: learnDivination(\"First Aid IV\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>First Aid IV</td><td>3,000 Int, 100,000 Blood, 75,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('First Aid IV', $characterSpells)) 
		{
			if($char['intelligence'] >= 10000 && $char['blood'] >= 250000 && $char['gold'] >= 250000000){
			$learn = "<a href=\'Javascript: learnDivination(\"First Aid V\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>First Aid V</td><td>10,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('First Aid V', $characterSpells)) 
		{
			$display .= "<tr><td>First Aid V</td><td>10,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>MASTERED</td></tr>";
		}
		
		////////////////End First Aid
		
		if(in_array('Might', $characterSpells)) 
		{
			if($char['intelligence'] >= 2500 && $char['blood'] >= 15000 && $char['gold'] >= 10000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Might II\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Might II</td><td>2,500 Int, 15,000 Blood, 10,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Might II', $characterSpells)) 
		{
			if($char['intelligence'] >= 7500 && $char['blood'] >= 45000 && $char['gold'] >= 30000000){
			$learn = "<a href=\'Javascript: learnDivination(\"Might III\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Might III</td><td>7,500 Int, 45,000 Blood, 30,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Might III', $characterSpells)) 
		{
			if($char['intelligence'] >= 20000 && $char['blood'] >= 100000 && $char['gold'] >= 75000000){
			$learn = "<a href=\'Javascript: learnDivination(\"Might IV\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Might IV</td><td>20,000 Int, 100,000 Blood, 75,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Might IV', $characterSpells)) 
		{
			if($char['intelligence'] >= 50000 && $char['blood'] >= 250000 && $char['gold'] >= 250000000){
			$learn = "<a href=\'Javascript: learnDivination(\"Might V\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Might V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Might V', $characterSpells)) 
		{
			$display .= "<tr><td>Might V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>MASTERED</td></tr>";
		}else{
			if($char['intelligence'] >= 1000 && $char['blood'] >= 5000 && $char['gold'] >= 1000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Might\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Might</td><td>1,000 Int, 5,000 Blood, 1,000,000 Gold.</td><td>".$learn."</td></tr>";
		}
		
		
		
		if(in_array('Speed', $characterSpells)) 
		{
			if($char['intelligence'] >= 2500 && $char['blood'] >= 15000 && $char['gold'] >= 10000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Speed II\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Speed II</td><td>2,500 Int, 15,000 Blood, 10,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Speed II', $characterSpells)) 
		{
			if($char['intelligence'] >= 7500 && $char['blood'] >= 45000 && $char['gold'] >= 30000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Speed III\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Speed III</td><td>7,500 Int, 45,000 Blood, 30,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Speed III', $characterSpells)) 
		{
			if($char['intelligence'] >= 20000 && $char['blood'] >= 100000 && $char['gold'] >= 75000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Speed IV\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Speed IV</td><td>20,000 Int, 100,000 Blood, 75,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Speed IV', $characterSpells)) 
		{
			if($char['intelligence'] >= 50000 && $char['blood'] >= 250000 && $char['gold'] >= 250000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Speed V\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Speed V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Speed V', $characterSpells)) 
		{
			$display .= "<tr><td>Speed V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>MASTERED</td></tr>";
		}else{
			if($char['intelligence'] >= 1000 && $char['blood'] >= 5000 && $char['gold'] >= 1000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Speed\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Speed</td><td>1,000 Int, 5,000 Blood, 1,000,000 Gold.</td><td>".$learn."</td></tr>";
		}
		
		
		
		if (in_array('Constitution', $characterSpells)) 
		{
			if($char['intelligence'] >= 2500 && $char['blood'] >= 15000 && $char['gold'] >= 10000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Constitution II\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Constitution II</td><td>2,500 Int, 15,000 Blood, 10,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Constitution II', $characterSpells)) 
		{
			if($char['intelligence'] >= 7500 && $char['blood'] >= 45000 && $char['gold'] >= 30000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Constitution III\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Constitution III</td><td>7,500 Int, 45,000 Blood, 30,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Constitution III', $characterSpells)) 
		{
			if($char['intelligence'] >= 20000 && $char['blood'] >= 100000 && $char['gold'] >= 75000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Constitution IV\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Constitution IV</td><td>20,000 Int, 100,000 Blood, 75,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Constitution IV', $characterSpells)) 
		{
			if($char['intelligence'] >= 50000 && $char['blood'] >= 250000 && $char['gold'] >= 250000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Constitution V\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Constitution V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Constitution V', $characterSpells)) 
		{
			$display .= "<tr><td>Constitution V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>MASTERED</td></tr>";
		}else{
			if($char['intelligence'] >= 1000 && $char['blood'] >= 5000 && $char['gold'] >= 1000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Constitution\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Constitution</td><td>1,000 Int, 5,000 Blood, 1,000,000 Gold.</td><td>".$learn."</td></tr>";
		}
		
		
		if (in_array('Concentration', $characterSpells)) 
		{
			if($char['intelligence'] >= 2500 && $char['blood'] >= 15000 && $char['gold'] >= 10000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Concentration II\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Concentration II</td><td>2,500 Int, 15,000 Blood, 10,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Concentration II', $characterSpells)) 
		{
			if($char['intelligence'] >= 7500 && $char['blood'] >= 45000 && $char['gold'] >= 30000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Concentration III\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Concentration III</td><td>7,500 Int, 45,000 Blood, 30,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Concentration III', $characterSpells)) 
		{
			if($char['intelligence'] >= 20000 && $char['blood'] >= 100000 && $char['gold'] >= 75000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Concentration IV\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Concentration IV</td><td>20,000 Int, 100,000 Blood, 75,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Concentration IV', $characterSpells)) 
		{
			if($char['intelligence'] >= 50000 && $char['blood'] >= 250000 && $char['gold'] >= 250000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Concentration V\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Concentration V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Concentration V', $characterSpells)) 
		{
			$display .= "<tr><td>Concentration V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>MASTERED</td></tr>";
		}else{
			if($char['intelligence'] >= 1000 && $char['blood'] >= 5000 && $char['gold'] >= 1000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Concentration\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Concentration</td><td>1,000 Int, 5,000 Blood, 1,000,000 Gold.</td><td>".$learn."</td></tr>";
		}
		
		
		
		if (in_array('Intelligence', $characterSpells)) 
		{
			if($char['intelligence'] >= 2500 && $char['blood'] >= 15000 && $char['gold'] >= 10000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Intelligence II\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Intelligence II</td><td>2,500 Int, 15,000 Blood, 10,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Intelligence II', $characterSpells)) 
		{
			if($char['intelligence'] >= 7500 && $char['blood'] >= 45000 && $char['gold'] >= 30000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Intelligence III\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Intelligence III</td><td>7,500 Int, 45,000 Blood, 30,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Intelligence III', $characterSpells)) 
		{
			if($char['intelligence'] >= 20000 && $char['blood'] >= 100000 && $char['gold'] >= 75000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Intelligence IV\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Intelligence IV</td><td>20,000 Int, 100,000 Blood, 75,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Intelligence IV', $characterSpells)) 
		{
			if($char['intelligence'] >= 50000 && $char['blood'] >= 250000 && $char['gold'] >= 250000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Intelligence V\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Intelligence V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>".$learn."</td></tr>";
		}elseif(in_array('Intelligence V', $characterSpells)) 
		{
			$display .= "<tr><td>Intelligence V</td><td>50,000 Int, 250,000 Blood, 250,000,000 Gold.</td><td>MASTERED</td></tr>";
		}else{
			if($char['intelligence'] >= 1000 && $char['blood'] >= 5000 && $char['gold'] >= 1000000){
				$learn = "<a href=\'Javascript: learnDivination(\"Intelligence\");\'>Learn</a>";
			}else{
				$learn = "Missing Requirements";
			}
			$display .= "<tr><td>Intelligence</td><td>1,000 Int, 5,000 Blood, 1,000,000 Gold.</td><td>".$learn."</td></tr>";
		}
		
}		
		$display .= "</table>";

print("fillDiv('displayArea','".$display."');");
include('updatestats.php');

?>