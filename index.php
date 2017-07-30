<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="A text-based MMORPG with a lot of kick. Get started by signing up and defeating the enemies that destroyed your home town. Updates come frequently! Player chat! Random Drops! And its all free to you!" />
<meta name="KEYWORDS" content="MMORPG; RPG; game; multiplayer; online; fun; free; games; role; playing; Neflaria; Shimlar; Race War Kingdoms; Dragon; Kingdoms; War; Immoral; Attack; Immoral Attack; Immortal; Domain; Heroes; Old; School; Lost; Runes; Fallen; Immortals; Fallen Immortals; Eternal; Wars; Eternal Wars;" >
<meta name="DESCRIPTION" content="A free text-based MMORPG with a lot of kick. Get started by signing up and defeating the enemies that destroyed your home town. Updates come frequently! Player chat! Random Drops! And its all free to you!">

<title>The Fallen Immortals! Online Text-Based MMORPG</title>
<script src="ajax.js" type="text/javascript"></script>
<script src="dom.js" type="text/javascript"></script>
<script src="functions.js" type="text/javascript"></script>
<script src="homefunctions.js" type="text/javascript"></script>
<script src="gamefunctions.js" type="text/javascript"></script>
<script src="chatroomfunctions.js" type="text/javascript"></script>
<style type="text/css">
body {
	background-attachment: scroll;
	background-color: #000;
	background-position: right;
	text-align: center;
}
a {
	color: #999;
}
#container {
	position: relative;
	left:-40px;
	margin: 0 auto;
	width: 1080px;
}
#top {
	background-image: url(images/Untitled-1_01.gif);
	height: 209px;
	width: 1024px;
	background-repeat: no-repeat;
	background-color: #000;
	visibility: visible;
	position: absolute;
	left: 40px;
	top: 0px;
}
#leftSide {
	background-image: url(images/Untitled-1_02.gif);
	height: 422px;
	width: 67px;
	position: absolute;
	top: 209px;
	background-color: #000;
	background-repeat: no-repeat;
	left: 40px;
}
#content {
	background-color: #000;
	background-image: url(images/Untitled-1_03.png);
	background-repeat: no-repeat;
	position: absolute;
	height: 367px;
	width: 879px;
	left: 107px;
	top: 209px;
}
#rightSide {
	background-color: #000;
	background-image: url(images/Untitled-1_04.gif);
	background-repeat: no-repeat;
	position: absolute;
	height: 422px;
	width: 78px;
	left: 986px;
	top: 209px;
}
#bottom {
	background-color: #000;
	background-image: url(images/Untitled-1_05.gif);
	background-repeat: no-repeat;
	position: absolute;
	height: 55px;
	width: 879px;
	left: 107px;
	top: 576px;
	font-family: "Times New Roman", Times, serif;
	font-size: 14px;
	font-style: normal;
	color: #666;
	text-align: center;
}
#homeLink {
	background-image: url(images/homeLink.png);
	background-repeat: no-repeat;
	height: 25px;
	width: 78px;
	position: absolute;
	left: 35px;
	top: -10px;
}
#aboutLink {
	background-image: url(images/aboutLink.png);
	background-repeat: no-repeat;
	height: 25px;
	width: 90px;
	position: absolute;
	left: 130px;
	top: -10px;
}
#updatesLink {
	background-image: url(images/updatesLink.png);
	background-repeat: no-repeat;
	height: 25px;
	width: 110px;
	position: absolute;
	left: 235px;
	top: -10px;
}
#voteLink {
	background-image: url(images/voteLink.png);
	background-repeat: no-repeat;
	height: 25px;
	width: 75px;
	position: absolute;
	left: 360px;
	top: -10px;
}
#contactLink {
	background-image: url(images/contactLink.png);
	background-repeat: no-repeat;
	height: 25px;
	width: 120px;
	position: absolute;
	left: 450px;
	top: -10px;
}
#displayArea {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	color: #CFB164;
	left: 30px;
	position: absolute;
	top: 30px;
	overflow: auto;
	right: 20px;
	bottom: 20px;
	text-align: left;
	font-weight: bold;
	clip: rect(auto,auto,auto,auto);
}
#loginForm {
	border-right-style: none;
	padding-bottom: 30px;
}
#registerForm {
	position: absolute;
	left: 400px;
	top: 0px;
	border-left-style: dotted;
	padding-left: 10px;
}
#activity {
	position: absolute;
	left: 855px;
	top: 35px;
	text-align: left;
	background-image: url(images/activityBox.png);
	background-repeat: no-repeat;
	height: 75px;
	width: 150px;
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	color: #CFB164;
	padding-top: 13px;
	padding-left: 10px;
}
</style>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35665413-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="container">
<div id="top"></div>


<div id="leftSide"></div>
<div id="activity">
	<?php
		$dbhost = "localhost";
		$database = "fallendb";
		$dbuser = "root";
		$dbpass = "";

		$login = mysql_connect($dbhost, $dbuser, $dbpass) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database) or die("Where?");
		$time = time() - "600";
		$findonline = mysql_query("SELECT * FROM characters WHERE lastactive>'".$time."'");
    	$numonline = mysql_num_rows($findonline);
		$time = time() - "604800";
		$findweek = mysql_query("SELECT * FROM characters WHERE lastactive>'".$time."'");
    	$numweek = mysql_num_rows($findweek);
		$findregistered = mysql_query("SELECT * FROM characters");
    	$numregistered = mysql_num_rows($findregistered);
	?>
	Online: <?=$numonline?><br />
    Week: <?=$numweek?><br />
    Registered: <?=$numregistered?>
</div>
<div id="content">
	<a id="homeLink" href="index.php"></a><a id="aboutLink" href="#about"></a><a id="updatesLink" href="Javascript: updates();"></a><a id="voteLink" href="Javascript: votepage();"></a><a id="contactLink" href="Javascript: contact();"></a>

	<div id="displayArea">
		<div id="loginForm">
            <h3>Login</h3><br />
            <form name="loginForm" id="loginForm" onsubmit="this.disabled=true;this.value='Submitting...';goLogin();">
                Username: <input type="text" id="username" /><br />
                Password: <input type="password" id="password" /><br />
                <input type="button" id="login" name="login" value="Login" onclick="this.disabled=true;this.value='Submitting...';goLogin();" />
            </form><br />
            <a href="Javascript: forgotPassword();">Forgot Password</a>
        </div>
        <div id="registerForm">
        	<h3>Register</h3><br />
            <form name="registrationForm" id="registrationForm" onsubmit="this.disabled=true;this.value='Submitting...';goRegister();">
            Username: <input type="text" id="usernamereg" maxlength="20" /><br />
            Password: <input type="password" id="passwordreg" /><br />
            Password Confirm: <input type="password" id="passwordvreg" /><br />
            Email: <input type="text" id="emailreg" /><br />
            Gender: <select id="genderreg">
            	<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select><br />
            Class: <select id="classreg">
				<option value="Fighter">Fighter</option>
				<option value="Mage">Mage</option>
			</select><br />
			<?php
				$comrade = isset($_GET['comrade']);
				if(is_null($comrade) || $comrade === null){
					print("Refferal: <input type=\"text\" id=\"comrade\" value=\"\" readonly /><br />");
				}else{
					print("Refferal: <input type=\"text\" id=\"comrade\" value=\"".$comrade."\" readonly /><br />");
				}
			?>
            
            <input type="button" id="register" value="Register" onclick="this.disabled=true;this.value='Submitting...';goRegister();" />
        </div>
		
		<!--------------------------------->

		<div id="about">
			<h3><u>About the game</u></h3>
			<i>&nbsp;&nbsp;This is a game about one being(yourself) going up against evil, in order to restore peace in the world. TFI has been in development since December 2010, and has evolved in a great manner. Constant updates to keep you entertained, and bug fixes when they happen. We are hosted on a Dedicated server and will always be up and running as long as the player base stays up, that\'s our guarentee.<br />
			<br />
			&nbsp;&nbsp;The main objective of the game is to select an oponent in which you can kill and do so; while reaping the rewards of experience points, gold, stat points, blood, bag drops, and more. Applying Scavenger to fighting will allow you to get even more rewards, even Cash drops(Real life currency to Game currency). Use stat points upon leveling up to make your character stronger in ways like no other. Join a guild to get more from exp and gold drops.<br />
			<br />
			&nbsp;&nbsp;Many features have been build in to keep you playing; Voodoo system, Mining and Forge system, PvP system, and Class swap and upgrade system. Try it out today! Register and follow the link in your email to begin playing. What's the worst that could happen?</i>
		</div>
		
		<!--------------------------------->

		<div id="story">
			<h3><u>Story Line...</u></h3>
			<i>&nbsp;&nbsp;&nbsp;A sudden loud crash awakes you from a sleep, that feels as though it was forever. Gaining consciousness, you feel as though something is not right. You sit up and notice that the wall of your home is crumbling down, and a fire in the midst of your home. "What happened?", you say puzzled beyond belief. On your feet, you see no living movement beyond the fire. "How long was I asleep? Where is everyone?", you say, questioning everything going on around you. Last you remember was a great thunderstorm. One that you ponder, real or just a dream. You try to remember more, only achieving a headache, failing to remember anything other than a bright white light just before you woke up. "I must have been struck by a lightning bolt. I can't remember my name... my family?", you say to yourself.<br />
			<br />
			&nbsp;&nbsp;&nbsp;You begin trailing across what used to be your yard. "I can't believe... I... so much energy... Why am I not dead?" Entering into what used to be your home you see a body on the ground facing away from you. A pool of blood running the same way the body is facing, you rush to see if they are okay. Quickly dropping to your knees and pulling the face in your direction... "No!......", you say as a memory settles in. Now looking into the eyes of your wife, tears quickly begin to run down your face. "Why is this happening!", you say quivering and burrowing your face into her chest.<br />
			<br />
			&nbsp;&nbsp;&nbsp;Grasping the lifeless body you carry her up the stairs. At the top of the stairs in the room directly in front of you, you dare not to look in there for more than a second, quickly turning to the right and walking down the hall to the last door on the right. You open the door seeing the room still in tact as you continue over to the side of the bed. Laying her down a last kiss is given as you say, "I will find out who did this to you. I swear.... I swear..." Turning back you walk out the door and begin pacing down the hall again. Once again you peer to the room on the right, above the stairs, only to know if this is real. The lifeless bodies of children lay upon the floor.<br />
			<br />
			&nbsp;&nbsp;&nbsp;As you make your way to the bottom of the stairs you collapse, falling down the last ten stairs hearing, "Good evening, wouldn't you say?" Your head smashes into the last step causing you to go unconscious.<br />
			<br />
			&nbsp;&nbsp;&nbsp;You wake up to a pail of cold water drenching you while your eyes slowly open. Two disgusting beasts hold you down, cursing at you with some of the most foulest of words. "Why are you doing this!", you shout. Suddenly you hear foot steps coming from the darkness in front of you. "The living beings of this earth have been like a treat. Something I can't seem to get my mind off of... Your souls are too easy to control. Your so weak and pathetic.", says the man. "Who are you?", you demand. "I?... I am just another demon. They call me Abaddon." You ask, "Did you do this?". "Well yes child, I did. You see I have been planning this for so long. Your world is so corrupt making it so easy to enter your world. Once we got here we saw that everything was uncontrolled. But that's why I am here. I am a higher power.", explains Abaddon. "I won't let you do this. I am going to stop you... You killed my family! Let me up now so I can rearrange your face.", you say in a very distinctive tone. Abaddon chuckles and says, "You have much to learn. I see you are stronger than the others which is why you are still alive now. I should keep you as a pet. Although you haven't seen very much beyond your home. So I am going to let you look over the world with your own eyes. You will see that I have changed everything for the better. It is a fight that the whole world is involved in, I believe you will like it..." Abaddon then signals his beasts to cut your throat. "Such an adorable little pest.", Abaddon says as he walks out the door.<br />
			<br />
			&nbsp;&nbsp;&nbsp;Again for the last time you wake up. "Did I just dream?", you say. Feeling your throat you find a scar. "I don't understand. I should be dead... Am I... immortal? It can't be... This isn't real!!! Either way I am still alive. I need to find Abaddon and send him back to the deepest depths of hell. I must start training immediately.", you say. You begin gathering your things in a backpack, only taking necessary items. Your adventure begins... Good luck!</i>
		</div>
    </div>    
</div>
<div id="rightSide"></div>


<div id="bottom">Copyright &copy; 2010, Alexander J Jezior (Ajezior).<br />We encourage you to take a look at Privacy Policy and Terms And Conditions before browsing this site.<br /><br />
</div>
</div>
</body>
</html>
