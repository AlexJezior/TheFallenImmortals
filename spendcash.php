<?php

session_name("icsession");

session_start();

include('db.php');



$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());

$char = mysql_fetch_assoc($getchar);



$charname = $char['username'];

$cash = $char['cash'];



if($_POST['cashoption'] == "FiveMill" && $char['cash'] >= "1")

{

    if($cash >= "1"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 1 cash for 5 Million gold!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "1";

        $gold = $char['gold'] + "5000000";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', gold='".$gold."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your wealth by 5,000,000 gold.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "ThirtyMill" && $char['cash'] >= "5")

{

    if($cash >= "5"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 5 cash for 30 Million gold!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "5";

        $gold = $char['gold'] + "30000000";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', gold='".$gold."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your wealth by 30,000,000 gold.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "FiveHundredStat" && $char['cash'] >= "1")

{

    if($cash >= "1"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 1 cash for 500 Stat Points!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "1";

        $stats = $char['stats'] + "500";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', stats='".$stats."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Stat Points by 500.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "TwentysevenFiftyStat" && $char['cash'] >= "5")

{

    if($cash >= "5"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 5 cash for 2,750 Stat Points!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "5";

        $stats = $char['stats'] + "2750";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', stats='".$stats."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Stat Points by 2,750.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "EightKBlood" && $char['cash'] >= "1")

{

    if($cash >= "1"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 1 cash for 8,000 oz. of Blood!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "1";

        $blood = $char['blood'] + "8000";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', blood='".$blood."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Blood by 8,000 oz.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "FiftyKBlood" && $char['cash'] >= "5")

{

    if($cash >= "5"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 5 cash for 50,000 oz. of Blood!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "5";

        $blood = $char['blood'] + "50000";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', blood='".$blood."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Blood by 50,000 oz.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "HalfStatMulti" && $char['cash'] >= "8")

{

    if($cash >= "8" && ($char['statmult'] + "50") <= "1000"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 8 cash for an extra X0.5 Stat Points per level!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "8";

        $statmult = $char['statmult'] + "50";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', statmult='".$statmult."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Stat Multiplier by 0.5.<br />";

    }else{

        print("alert('Not enough cash. Or you are maxed out in this area!');");

    }

}

elseif($_POST['cashoption'] == "WholeStatMulti" && $char['cash'] >= "15")

{

    if($cash >= "15" && ($char['statmult'] + "100") <= "1000"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 15 cash for an extra X1 Stat Points per level!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "15";

        $statmult = $char['statmult'] + "100";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', statmult='".$statmult."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Stat Multiplier by 1.<br />";

    }else{

        print("alert('Not enough cash. Or you are maxed out in this area!');");

    }

}

elseif($_POST['cashoption'] == "FiveStatMulti" && $char['cash'] >= "70")

{

    if($cash >= "70" && ($char['statmult'] + "500") <= "1000"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 70 cash for an extra X5 Stat Points per level!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "70";

        $statmult = $char['statmult'] + "500";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', statmult='".$statmult."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Stat Multiplier by 5.<br />";

    }else{

        print("alert('Not enough cash. Or you are maxed out in this area!');");

    }

}

elseif($_POST['cashoption'] == "OneForesight" && $char['cash'] >= "10")

{
	if($char['foresight'] == 10)
	{
		print("alert('Your Foresight skill is maxed and you cannot raise it anymore.');");
	}else{
		$foresight = $char['foresight'] + 1;
		$cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 10 Cash to raise their Foresight level to ".$foresight."!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "10";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', foresight='".$foresight."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Foresight level to ".$foresight.".<br />";
	}

}

elseif($_POST['cashoption'] == "AddAffinity" && $char['cash'] >= "20")

{

    if($cash >= "20" && $char['affinitys'] < "9"){

    	$newAffinity = $char['affinitys'] + "1";

    	$blessing = explode(', ', $char['blessing']);

    	if($newAffinity == "4"){

    		$newBlessing = $blessing[0].", ".$blessing[1].", ".$blessing[2].", None, ".$blessing[4].", ".$blessing[5].", ".$blessing[6].", ".$blessing[7].", ".$blessing[8]."";

    	}elseif($newAffinity == "5"){

    		$newBlessing = $blessing[0].", ".$blessing[1].", ".$blessing[2].", ".$blessing[3].", None, ".$blessing[5].", ".$blessing[6].", ".$blessing[7].", ".$blessing[8]."";

    	}elseif($newAffinity == "6"){

    		$newBlessing = $blessing[0].", ".$blessing[1].", ".$blessing[2].", ".$blessing[3].", ".$blessing[4].", None, ".$blessing[6].", ".$blessing[7].", ".$blessing[8]."";

    	}elseif($newAffinity == "7"){

    		$newBlessing = $blessing[0].", ".$blessing[1].", ".$blessing[2].", ".$blessing[3].", ".$blessing[4].", ".$blessing[5].", None, ".$blessing[7].", ".$blessing[8]."";

    	}elseif($newAffinity == "8"){

    		$newBlessing = $blessing[0].", ".$blessing[1].", ".$blessing[2].", ".$blessing[3].", ".$blessing[4].", ".$blessing[5].", ".$blessing[6].", None, ".$blessing[8]."";

    	}elseif($newAffinity == "9"){

    		$newBlessing = $blessing[0].", ".$blessing[1].", ".$blessing[2].", ".$blessing[3].", ".$blessing[4].", ".$blessing[5].", ".$blessing[6].", ".$blessing[7].", None";

    	}

    	$updateBlessings = mysql_query("UPDATE characters SET blessing='".$newBlessing."' WHERE username='".$char['username']."'")or die("alert('Could not update your blessings! Tell an admin!');");

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 20 cash for an additional Affinity!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)VALUES('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "20";

        $addAffinity = $char['affinitys'] + "1";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', affinitys='".$addAffinity."' WHERE username='".$charname."'");

        $grid = "You sucsessfully bought an additional Affinity!<br />";

    }else{

        print("alert('Not enough cash. Or Affinitys are maxed.');");

    }

}

elseif($_POST['cashoption'] == "OneAuto" && $char['cash'] >= "1")

{

    if($cash >= "1"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 1 cash for 1 extra Auto Attacks!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "1";

        $automax = $char['automax'] + "1";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', automax='".$automax."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Auto Attack by 1.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "FiveAuto" && $char['cash'] >= "5")

{

    if($cash >= "5"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 5 cash for 5 extra Auto Attacks!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "5";

        $automax = $char['automax'] + "5";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', automax='".$automax."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Auto Attack by 5.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "TenAuto" && $char['cash'] >= "10")

{

    if($cash >= "10"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 10 cash for 10 extra Auto Attacks!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "10";

        $automax = $char['automax'] + "10";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', automax='".$automax."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Auto Attack by 10.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "OneTradeSkill" && $char['cash'] >= "5")

{

	$newTradeSkill = $char['tradeskill'] + "10";

    if($cash >= "5" && $newTradeSkill < "1000"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 5 cash for 1% more towards Trade Skill!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "5";

        $tradeSkill = $char['tradeskill'] + "10";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', tradeskill='".$tradeSkill."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Trade Skill by 1%.<br />";

    }else{

        print("alert('Not enough cash or you are maxed out.');");

    }

}

elseif($_POST['cashoption'] == "TwoTwentythTradeSkill" && $char['cash'] >= "10")

{

	$newTradeSkill = $char['tradeskill'] + "22";

    if($cash >= "10" && $newTradeSkill < "1000"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 10 cash for 2.2% more towards Trade Skill!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "10";

        $tradeSkill = $char['tradeskill'] + "22";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', tradeskill='".$tradeSkill."' WHERE username='".$charname."'");

        $grid = "You sucsessfully increase your Trade Skill by 2.2%.<br />";

    }else{

        print("alert('Not enough cash or you are maxed out.');");

    }

}

elseif($_POST['cashoption'] == "ChangeUsername" && $char['cash'] >= "15")

{

    if($cash >= "15" && $char['changeusername'] == "0"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 15 Cash for a Change Username Pass!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "15";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', changeusername='1' WHERE username='".$charname."'");

        $grid = "You have purchased a Change Username pass. Click Fight to begin changing your username!<br />";

    }else{

        print("alert('Not enough cash or you are already in the process of changing your username.');");

    }

}

elseif($_POST['cashoption'] == "OneDemon" && $char['cash'] >= "2")

{

    if($cash >= "2"){
				$randBoss = rand(5,8);
            	if($randBoss == "5"){
            		$BossName = "Barbatos Overlord";
            		$BossPower = '2';
            	}
            	if($randBoss == "6"){
            		$BossName = "Incubus Overlord";
            		$BossPower = '2';
            	}
            	if($randBoss == "7"){
            		$BossName = "Eurynome Overlord";
            		$BossPower = '2';
            	}
            	if($randBoss == "8"){
            		$BossName = "Gula Overlord";
            		$BossPower = '2';
            	}
            	$BossHealth = $BossPower * '50000000';
				$randBossX = $char['posx'];
				$randBossY = $char['posy'];
				$fillImg = "<img src=\'/images/demonSpawn.png\'>";
				print("fillDiv('rewardPopup','".$fillImg."');");
                $spawnDemon = mysql_query("INSERT INTO demons (`name`, `health`, `power`, `xpos`, `ypos`) VALUES ('".$BossName."', '".$BossHealth."', '".$BossPower."', '".$randBossX."', '".$randBossY."')");
        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 2 Cash to spawn <b>".$BossName."</b> from the depths of HELL! Location: (".$randBossX.", ".$randBossY.")</b>!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "2";

        $update = mysql_query("UPDATE characters SET cash='".$cash."' WHERE username='".$charname."'");

        $grid = "You have spawned an Overlord Demon for 2 Cash!<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "FifteenBags" && $char['cash'] >= "2")

{

    if($cash >= "2"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 2 cash for 15 Bag Drops!</font></b><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";
		$randx = rand(1,100);
        $randy = rand(1,100);
        $addBag = mysql_query("INSERT INTO bagdrop(`name`, `posx`, `posy`) VALUES ('Bag', '".$randx."', '".$randy."')");
        $cashmessage .= "<strong><font color=\'#D2691E\'>A bag has fallen from the sky! It looks like it landed at ".$randx.", ".$randy."! GO GET IT!</font></strong><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "2";

        $update = mysql_query("UPDATE characters SET cash='".$cash."' WHERE username='".$charname."'");

        $grid = "You spent 2 Cash on 15 Bags.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "FifteenMinutes" && $char['cash'] >= "1")

{

    if($cash >= "1"){
		
        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 1 cash for <strong>15 Minutes</strong> of Bonus Time!</font></b><br />";
		
		$getBonusTime = mysql_query("SELECT * FROM bonus WHERE id='1'");
		$bonusTime = mysql_fetch_assoc($getBonusTime);
		$date = time();
		$addTime = 15 * 60;
		if($bonusTime['experationTime'] >= $date && $bonusTime['experationTime'] != 0){
				$newExpTime = $bonusTime['experationTime'] + $addTime;
				$comeBack = $newExpTime - time();
				$comeBack = floor($comeBack / 60);
				$cashmessage .= "<strong><font color=\"#00FF00\">Bonus time added to current Bonus Time. Minutes Left: ".$comeBack."</font></strong><br />";
		}elseif($bonusTime['experationTime'] == 0){
				$newExpTime = $date + $addTime;
		}
		
		$killBonusTime = mysql_query("UPDATE bonus SET gold='Yes', experience='Yes', experationTime='".$newExpTime."' WHERE id='1'");
		

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "1";

        $update = mysql_query("UPDATE characters SET cash='".$cash."' WHERE username='".$charname."'");

        $grid = "You spent 1 Cash on 15 Minutes of Bonus Time.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "HourBonus" && $char['cash'] >= "2")

{

    if($cash >= "1"){
		
        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 2 cash for <strong>60 Minutes</strong> of Bonus Time!</font></b><br />";
		
		$getBonusTime = mysql_query("SELECT * FROM bonus WHERE id='1'");
		$bonusTime = mysql_fetch_assoc($getBonusTime);
		$date = time();
		$addTime = 60 * 60;
		if($bonusTime['experationTime'] >= $date && $bonusTime['experationTime'] != 0){
				$newExpTime = $bonusTime['experationTime'] + $addTime;
				$comeBack = $newExpTime - time();
				$comeBack = floor($comeBack / 60);
				$cashmessage .= "<strong><font color=\"#00FF00\">Bonus time added to current Bonus Time. Minutes Left: ".$comeBack."</font></strong><br />";
		}elseif($bonusTime['experationTime'] == 0){
				$newExpTime = $date + $addTime;
		}
		
		$killBonusTime = mysql_query("UPDATE bonus SET gold='Yes', experience='Yes', experationTime='".$newExpTime."' WHERE id='1'");
		

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "2";

        $update = mysql_query("UPDATE characters SET cash='".$cash."' WHERE username='".$charname."'");

        $grid = "You spent 2 Cash on 60 Minutes of Bonus Time.<br />";

    }else{

        print("alert('Not enough cash.');");

    }

}

elseif($_POST['cashoption'] == "Teleporter" && $char['cash'] >= "25")

{

    if($cash >= "25" && $char['teleporter'] != "Yes"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 25 cash for a Teleporter!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "25";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', teleporter='Yes' WHERE username='".$charname."'");

        $grid = "Teleporter permission granted! Refresh to see it!<br />";

    }else{

        print("alert('Not enough cash. Or Teleporter already purchased!');");

    }

}

elseif($_POST['cashoption'] == "BankFee" && $char['cash'] >= "5")

{

    if($cash >= "5" && $char['bankint'] > "0"){

        $cashmessage = "<b><font color=\'#FFFF00\'>".$charname." spent 5 cash to lower Banking fees by 1%!</font></b><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)

                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());

        $cash = $cash - "5";

        $update = mysql_query("UPDATE characters SET cash='".$cash."', bankint=bankint-'1' WHERE username='".$charname."'");

        $grid = "Banking will cost you much less now.<br />";

    }else{

        print("alert('Not enough cash. Or your banking fees are at 0% already!);");

    }

}

else

{

    print("alert('Invalid option.');");

}

   

$grid .= "<strong><a href=\"javascript: closeSecondPage();\">Close</a> | <a href=\"javascript: viewPurchase();\">Back</a></strong><br /><br />";


print("fillDiv('secondPage','".$grid."');");

include('updatestats.php');



?>