<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);


$data = "";

if(isset($_POST['train']) && $_POST['train'] == $char['class'] && $char['class'] == "Fighter")
{
    if($char['gold'] >= "500000" && $char['blood'] >= "5000" && $char['level'] >= "500"){
        $newclass = "Fighter II";
        $newgold = $char['gold'] - 500000;
        $newblood = $char['blood'] - 5000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
    	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Fighter II")
{
    if($char['gold'] >= "2000000" && $char['blood'] >= "10000" && $char['level'] >= "1000"){
        $newclass = "Fighter III";
        $newgold = $char['gold'] - 2000000;
        $newblood = $char['blood'] - 10000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Fighter III")
{
    if($char['gold'] >= "10000000" && $char['blood'] >= "20000" && $char['level'] >= "2000"){
        $newclass = "Fighter IV";
        $newgold = $char['gold'] - 10000000;
        $newblood = $char['blood'] - 20000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Fighter IV")
{
    if($char['gold'] >= "100000000" && $char['blood'] >= "50000" && $char['level'] >= "5000"){
        $newclass = "Fighter V";
        $newgold = $char['gold'] - 100000000;
        $newblood = $char['blood'] - 50000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Fighter V")
{
    if($char['gold'] >= "500000000" && $char['blood'] >= "300000" && $char['level'] >= "10000"){
        $newclass = "Assassin";
        $newgold = $char['gold'] - 500000000;
        $newblood = $char['blood'] - 300000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Assassin")
{
    if($char['gold'] >= "1000000000" && $char['blood'] >= "800000" && $char['level'] >= "20000"){
        $newclass = "Assassin II";
        $newgold = $char['gold'] - 1000000000;
        $newblood = $char['blood'] - 800000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Assassin II")
{
    if($char['gold'] >= "2000000000" && $char['blood'] >= "2000000" && $char['level'] >= "35000"){
        $newclass = "Assassin III";
        $newgold = $char['gold'] - 2000000000;
        $newblood = $char['blood'] - 2000000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Assassin III")
{
    if($char['gold'] >= "3000000000" && $char['blood'] >= "4000000" && $char['level'] >= "86000"){
        $newclass = "Assassin IV";
        $newgold = $char['gold'] - 3000000000;
        $newblood = $char['blood'] - 4000000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $char['class'] == "Mage")
{
    if($char['gold'] >= "500000" && $char['blood'] >= "5000" && $char['level'] >= "500"){
        $newclass = "Mage II";
        $newgold = $char['gold'] - 500000;
        $newblood = $char['blood'] - 5000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
    	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Mage II")
{
    if($char['gold'] >= "2000000" && $char['blood'] >= "10000" && $char['level'] >= "1000"){
        $newclass = "Mage III";
        $newgold = $char['gold'] - 2000000;
        $newblood = $char['blood'] - 10000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Mage III")
{
    if($char['gold'] >= "10000000" && $char['blood'] >= "20000" && $char['level'] >= "2000"){
        $newclass = "Mage IV";
        $newgold = $char['gold'] - 10000000;
        $newblood = $char['blood'] - 20000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Mage IV")
{
    if($char['gold'] >= "100000000" && $char['blood'] >= "50000" && $char['level'] >= "5000"){
        $newclass = "Mage V";
        $newgold = $char['gold'] - 100000000;
        $newblood = $char['blood'] - 50000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Mage V")
{
    if($char['gold'] >= "500000000" && $char['blood'] >= "300000" && $char['level'] >= "10000"){
        $newclass = "Sorcerer";
        $newgold = $char['gold'] - 500000000;
        $newblood = $char['blood'] - 300000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
elseif(isset($_POST['train']) && $_POST['train'] == $char['class'] && $_POST['train'] == "Sorcerer")
{
    if($char['gold'] >= "1000000000" && $char['blood'] >= "650000" && $char['level'] >= "25000"){
        $newclass = "Sorcerer II";
        $newgold = $char['gold'] - 1000000000;
        $newblood = $char['blood'] - 650000;
        $updatecharacter = mysql_query("UPDATE characters SET gold='".$newgold."', class='".$newclass."', blood='".$newblood."' WHERE id='".$_SESSION['userid']."'");
        $messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has upgraded their class to <b>".$newclass."</b>. Allowing them to equip better means of Weapons or Protection Gear and increased their Stats gained per level.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
        $data .= "You were very cooperative during your training period. You have successfully upgraded to ".$newclass."!<br />";
	$updateclass = mysql_query("UPDATE characters SET classlevel=classlevel+'1' WHERE id='".$char['id']."'");
    }else{
        $data .= "You do not have the assets to pay for training.";
    }
}
else
{
    $data .= "<center><b><u>Welcome to the Training Facility</u></b><br />Here we will train your class so that your Stat Increases will be greater every level, and you will have a wider range of Weapons and Protection Gear to choose from. Making your class greater will cost you some assets though. And we don\'t mean just gold.<br /><br /></center>";
    if($char['class'] == "Fighter"){
        $data .= "<center>I see that you are in need of much training. You are still learning very much. For me to train you I am going to have to ask that you come back with the level of 500, 5,000 ounces of blood and 500,000 gold.<br /></center>";
        if($char['gold'] >= "500000" && $char['blood'] >= "5000" && $char['level'] >= "500"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $charclass = $char['class'];
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Fighter II"){
        $data .= "<center>Training to this class wasn\'t very difficult for you I see. Let move on to something a little more toughening. Before we start go and aquire the level of 1,000, 10,000 ounces of blood, and 2,000,000 gold. Come back once you have gathered these.<br /></center>";
        if($char['gold'] >= "2000000" && $char['blood'] >= "10000" && $char['level'] >= "1000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Fighter III"){
        $data .= "<center>You are learning very swiftly. Of course I still have much training for you my young canidate. To afford this next part of training you will need level of 2,000, 20,000 ounces of blood, and 10,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "10000000" && $char['blood'] >= "20000" && $char['level'] >= "2000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Fighter IV"){
        $data .= "<center>You are almost done with the Fighter class and soon we will move on to something more extraordinary. To afford this next part of training you will need level of 5,000, 50,000 ounces of blood, and 100,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "100000000" && $char['blood'] >= "50000" && $char['level'] >= "5000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Fighter V"){
        $data .= "<center>This is the last of the training for the fighter class before you move onto being an Assassin. You will need to be much quicker this time around. To afford this next part of training you will need level of 10,000; 300,000 ounces of blood, and 500,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "500000000" && $char['blood'] >= "300000" && $char['level'] >= "10000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Assassin"){
        $data .= "<center>Welcome to your first day of real training as an Assassin. There is so much more to learn and you are getting stronger by the day. To afford this next part of training you will need level of 20,000; 800,000 ounces of blood, and 1,000,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "1000000000" && $char['blood'] >= "800000" && $char['level'] >= "20000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Assassin II"){
        $data .= "<center>Welcome to your first day of real training as an Assassin. There is so much more to learn and you are getting stronger by the day. To afford this next part of training you will need level of 35,000; 2,000,000 ounces of blood, and 2,000,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "2000000000" && $char['blood'] >= "2000000" && $char['level'] >= "35000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Assassin III"){
        $data .= "<center>Welcome to your first day of real training as an Assassin. There is so much more to learn and you are getting stronger by the day. To afford this next part of training you will need level of 60,000; 4,000,000 ounces of blood, and 3,000,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "3000000000" && $char['blood'] >= "4000000" && $char['level'] >= "60000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Assassin IV"){
        $data .= "<center>Welcome to your first day of real training as an Assassin. There is so much more to learn and you are getting stronger by the day. To afford this next part of training you will need level of 120,000; 6,000,000 ounces of blood, and 4,000,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "3000000000" && $char['blood'] >= "4000000" && $char['level'] >= "120000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Mage"){
        $data .= "<center>Welcome to your first day of training as a Mage. You have much to learn, and I will teach you all the essentials to be the best. To afford this next part of training you will need level of 500; 5,000 ounces of blood, and 500,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "500000" && $char['blood'] >= "5000" && $char['level'] >= "500"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Mage II"){
        $data .= "<center>Training to this class wasn\'t very difficult for you I see. Let move on to something a little more toughening. Before we start go and aquire the level of 1,000, 10,000 ounces of blood, and 2,000,000 gold. Come back once you have gathered these.<br /></center>";
        if($char['gold'] >= "2000000" && $char['blood'] >= "10000" && $char['level'] >= "1000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Mage III"){
        $data .= "<center>You are learning very swiftly. Of course I still have much training for you my young canidate. To afford this next part of training you will need level of 2,000, 20,000 ounces of blood, and 10,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "10000000" && $char['blood'] >= "20000" && $char['level'] >= "2000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Mage IV"){
        $data .= "<center>You are almost done with the Fighter class and soon we will move on to something more extraordinary. To afford this next part of training you will need level of 5,000, 50,000 ounces of blood, and 100,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "100000000" && $char['blood'] >= "50000" && $char['level'] >= "5000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Mage V"){
        $data .= "<center>This is the last of the training for the Mage class before you move onto being an Sorcerer. You will need to be much quicker this time around. To afford this next part of training you will need level of 10,000; 300,000 ounces of blood, and 500,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "500000000" && $char['blood'] >= "300000" && $char['level'] >= "10000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }elseif($char['class'] == "Sorcerer"){
        $data .= "<center>Welcome to the Sorcerer class. Much more experience is needed to advance to the next class of Sorcerer II. To afford this next part of training you will need level of 25,000; 650,000 ounces of blood, and 1,000,000,000 gold. I will be awaiting your return.<br /></center>";
        if($char['gold'] >= "1000000000" && $char['blood'] >= "650000" && $char['level'] >= "25000"){
            $data .= "<center>It seems as though you may meet all the requirements. Would you like to proceed?<br /></center>";
            $data .= "<center><a href=\'javascript: runTrainingCourse(\"".$charclass."\");\'>Proceed with Training</a></center>";
        }
    }else{
            $data .= "You have completed all training required at this time.<br />";
    }
    
    $data .= "<br /><br />Your current class is <em>".$char['class']."</em>. <br />";
    $findOtherClass = mysql_query("SELECT * FROM secondclass WHERE username='".$char['username']."'");
    $otherClass = mysql_fetch_assoc($findOtherClass);;
    if($char['level'] >= "5000" && $char['gold'] >= "100000000"){
    	
    	$data .= "<a href=\'javascript: changeClass();\'>Change your class</a><br />";
    }else{
    	$data .= "You need to be level 5,000 or greater and 100,000,000 gold to change your class.";
    }
    $data .= "<br /><u>Second Class</u>:<br />";
    $data .= "<br /><table border=\'0\'>";
    $data .= "<tr><td>Class Type: </td><td>".$otherClass['class']."</td></tr>";
    $data .= "<tr><td>Level: </td><td>".$otherClass['level']."</td></tr>";
    $data .= "<tr><td>Experience:: </td><td>".$otherClass['expacq']."/".$otherClass['expreq']."</td></tr>";
    $data .= "<tr><td>Blood: </td><td>".$otherClass['blood']."</td></tr>";
    $data .= "</table>";
}
print("fillDiv('displayArea','".$data."');");
include('updatestats.php');
?>