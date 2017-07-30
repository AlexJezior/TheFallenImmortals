<?php
include('indexdb.php');
session_name("icsession");
session_start();
function murder($data){ 
	$salt = "'/0U'LL |\|3\/3R Ph19UR3 0U7 \/\/|-|@ 7|-|3 54L7 15. pLU5 \/\/|-|3R35 7|-|3 p3PP3R?"; 
	$salt = md5($salt); 
	$data = md5($salt.$data); 
	$data = base64_encode($data); 
	$data = sha1($data); 
	return $data; 
}
$date = time();
$username = $_POST['userAlias'];
$passwordold = md5($_POST['userPass']);
$password = murder($_POST['userPass']);


$getcharold = mysql_query("SELECT * FROM characters WHERE username='".$username."' AND password='".$passwordold."' ");
$getchar = mysql_query("SELECT * FROM characters WHERE username='".$username."' AND password='".$password."' OR temppass='".$password."'");

if(mysql_num_rows($getcharold) === 1)
{
	$char = mysql_fetch_assoc($getcharold);
	$updatePass = "Since your last visit password security just got better!<br /><br /> Please login again!";
	$addNewPassword = mysql_query("UPDATE characters SET password='".$password."' WHERE username='".$char['username']."'");
	print("fillDiv('displayArea','".$updatePass."');");	
}
elseif(mysql_num_rows($getchar) === 1)
{
	$char = mysql_fetch_assoc($getchar);
	$time = time() - "700";
    $findonline = mysql_query("SELECT * FROM characters WHERE lastactive>'".$time."' AND username='".$char['username']."'");
	$active = mysql_fetch_assoc($findonline);
	
	if($active != NULL){
		print("alert('You are already logged in. Try coming back in ten minutes. If this problem persist contact the administrator at Alex.jezior(at)gmail.com');");
		die();
	}
    if($_SESSION['userid'] != Null){
        $getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
        $char = mysql_fetch_assoc($getchar);
    }
    $getbanned = mysql_query("SELECT * FROM banned WHERE ip='".$char['ip']."'");
    if(mysql_num_rows($getbanned) == "1")
    {
        print("alert('You are banned.');");
        print("window.location = 'http://www.thefallenimmortals.com/';");
    }
    else
    {
        if($char['activated'] == "Yes" || $char['level'] < "100")
        {
            session_name("icsession");
            session_start();
            $_SESSION['userid'] = $char['id'];
            include('varset.php');
        
			if($char['temppass'] != "None" && $char['temppass'] == $password){
				$resetup = mysql_query("UPDATE characters SET password='".$password."', temppass='None' WHERE id='".$char['id']."'");
				print("alert('Please change your password in the Edit Account link at the top of the page! Your current password is the temporary password.');");
			}
            
            
            if($char['logins'] == "0"){
            	$messagechat = "<strong><font color=\'#FFAA00\'>".$char['username']." has entered The Fallen Immortals for the first time! Welcome; You can <a href=\'Javascript: viewVote();\'>vote</a> in the link above as labeled to get some gold to get your character started! Check out the <a href=\'Javascript: viewFAQ();\'>FAQ</a> if you get stuck!</font></strong><br />";
    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
            }
            $addLogin = mysql_query("UPDATE characters SET logins=logins+'1' WHERE id='".$char['id']."'");
            
            if($char['dailylogin'] == "0" && $char['level'] != "1"){
				$messagechat = "<strong>Thank you for logging in today!<b><u><br/><br/>CHAT AND GAME RULES:</u></b></br>-No foul language in the chat.</br>-No cheat of any kind.(Example: Macros, game bugs exploits)</br>-ALL bugs found must be reported to the Forum page.</br>-Staff members always make the right decision. This means DO NOT argue with them.</br>-Please don\'t talk about other games here. If you would like to advertise here please contact the username Ajezior.<br /><br />Thanks for reading over these guidelines and I wish you a great day.</strong><br />";
            	$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
            	$randomlogin = rand(1,4);
            	if($randomlogin == "1"){
            		$smallbig = rand(1,20);
            		if($smallbig < 20){
            			$muchLevel = rand(1,30);
            		}else{
            			$muchLevel = rand(1,1000);
            		}
            		$update = mysql_query("UPDATE characters SET level=level+'".$muchLevel."' WHERE username='".$char['username']."'");
            		$inform = "<b>You gain ".number_format($muchLevel)." Levels for logging in today!</b><br />";
            	}elseif($randomlogin == "2"){
            		$smallbig = rand(1,20);
            		if($smallbig < 20){
            			$muchgold = rand(1,20000);
            		}else{
            			$muchgold = rand(1,5000000);
            		}
            		$update = mysql_query("UPDATE characters SET gold=gold+'".$muchgold."' WHERE username='".$char['username']."'");
            		$inform = "<b>You gain ".number_format($muchgold)." Gold for logging in today!</b><br />";
            	}elseif($randomlogin == "3"){
            		$smallbig = rand(1,20);
            		if($smallbig < 20){
            			$muchstats = rand(1,20);
            		}else{
            			$muchstats = rand(1,200);
            		}
            		$update = mysql_query("UPDATE characters SET stats=stats+'".$muchstats."' WHERE username='".$char['username']."'");
            		$inform = "<b>You gain ".number_format($muchstats)." Stat Points for logging in today!</b><br />";
            	}elseif($randomlogin == "4"){
            		$smallbig = rand(1,20);
            		if($smallbig < 20){
            			$muchblood = rand(1,500);
            		}else{
            			$muchblood = rand(1,5000);
            		}
            		$update = mysql_query("UPDATE characters SET blood=blood+'".$muchblood."' WHERE username='".$char['username']."'");
            		$inform = "<b>You gain ".number_format($muchblood)." Blood for logging in today!</b><br />";
            	}
            	$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$inform."', '".$char['username']."')");
            	$addDailyLogin = mysql_query("UPDATE characters SET dailylogin='1' WHERE username='".$char['username']."'");
            	
            }

            print("window.location = 'http://fallen.jez-your.com/game.php';");
        }
        else
        {
            print("fillDiv('displayArea','After level 100 your character must be activated. Follow the link in your email.');");
        }
    }
}
else
{
    print("fillDiv('displayArea','Incorrect Login Information.');");
}
?>