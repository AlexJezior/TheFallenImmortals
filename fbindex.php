<?php 
session_start(); 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<SCRIPT language="JavaScript">
<!--
var browserName=navigator.appName; 
if (browserName=="Microsoft Internet Explorer")
{ 
 alert("We noticed that you are using Internet Explorer. We recommend you use Google Chrome or Firefox. Half of the functionality of this website will not work in Internet Explorer. Feel free to try anyways, but if you would like to see the full functionality of the game I would reccommend Chrome or Firefox.");
}
//-->
</SCRIPT>
<meta http-equiv="Expires" content="The Fallen Immortals! A text-based MMORPG with a lot of kick. Get started by signing up and defeating the enemies that destroyed your home town. Updates come frequently! Player chat! Random Drops! And its all free to you!" />
<title>The Fallen Immortals</title>
<script src="ajax.js" type="text/javascript"></script>
<script src="dom.js" type="text/javascript"></script>
<script src="functions.js" type="text/javascript"></script>
<script src="homefunctions.js" type="text/javascript"></script>
<script src="gamefunctions.js" type="text/javascript"></script>
<script src="chatroomfunctions.js" type="text/javascript"></script>
<link href="fbstyle.css" rel="stylesheet" type="text/css" />

</head>

<body>
<table border="0" cellspacing="0" cellpadding="2" align="center" width="100%" style="background-color:#032b11">
    <tr><td valign="top" colspan="3">
        <div id="headMenu"> <p align="right"><iframe src="https://www.facebook.com/plugins/like.php?href=apps.facebook.com/thefallenimmortals" scrolling="no" frameborder="0" style="border:none; width:450px; height:80px"></iframe></p></div>
    </td></tr>
    <tr><td valign="top" width="25%">
        <div id="statMenu">
                    <form name="loginForm" id="loginForm">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr><td colspan="2"><strong>Login:</strong></td></tr>
                        <tr><td>Username:</td><td><input type="text" id="username" /></td></tr>
                        <tr><td>Password:</td><td><input type="password" id="password" /></td></tr>
                        <tr><td colspan="2"><input type="button" id="login" value="Login" onclick="goLogin();" /></td></tr>
                    </table>
                    </form>
                    <form name="registrationForm" id="registrationForm">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr><td colspan="2"><strong>Registration:</strong></td></tr>
                        <tr><td>Username:</td><td><input type="text" id="usernamereg" maxlength="20" /></td></tr>
                        <tr><td>Email:</td><td><input type="text" id="emailreg" /></td></tr>
                        <tr><td>Gender:</td><td><select id="genderreg">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                </select></td></tr>
                        <tr><td>Class:</td><td><select id="classreg">
        
                                                <option value="Fighter">Fighter</option>
                                                </select></td></tr>
                        <tr><td>Password:</td><td><input type="password" id="passwordreg" /></td></tr>
                        <tr><td>Password:</td><td><input type="password" id="passwordvreg" /></td></tr>
                        <?php
                        $comrade = $_GET['comrade'];
                        print "<tr><td>Comrade:</td><td><input type=\"text\" id=\"comrade\" value=\"".$comrade."\" maxlength=\"20\" readonly /></td></tr>
        ";
                        ?>
                        <tr><td colspan="2"><input type="button" id="register" value="Register" onclick="goRegister();" /></td></tr>
                    </table>
                    </form>
                </div>
                <div id="dykArea"></div>
    </td><td valign="top" width="75%">
    	<div id="lognavigationArea"></div>
        <div id="accommodationArea"></div>
        <div id="displayArea">
            <p id="story">
                Welcome to The Fallen Immortals....<br /><br />  A sudden loud crash awakes you from a sleep, that feels as though it was forever. Gaining consciousness, you feel as though something is not right. You sit up and notice that the wall of your home is crumbling down, and a fire in the midst of your home. "What happened?", you say puzzled beyond belief. On your feet, you see no living movement beyond the fire. "How long was I asleep? Where is everyone?", you say, questioning everything going on around you. Last you remember was a great thunderstorm. One that you ponder, real or just a dream. You try to remember more, only achieving a headache, failing to remember anything other than a bright white light just before you woke up. "I must have been struck by a lightning bolt. I can't remember my name... my family?", you say to yourself.<br /><br />

   You begin trailing across what used to be your yard. "I can't believe... I... so much energy... Why am I not dead?" Entering into what used to be your home you see a body on the ground facing away from you. A pool of blood running the same way the body is facing, you rush to see if they are okay. Quickly dropping to your knees and pulling the face in your direction... "No!......", you say as a memory settles in. Now looking into the eyes of your wife, tears quickly begin to run down your face. "Why is this happening!", you say quivering and burrowing your face into her chest.<br /><br />

   Grasping the lifeless body you carry her up the stairs. At the top of the stairs in the room directly in front of you, you dare not to look in there for more than a second, quickly turning to the right and walking down the hall to the last door on the right. You open the door seeing the room still in tact as you continue over to the side of the bed. Laying her down a last kiss is given as you say, "I will find out who did this to you. I swear.... I swear..." Turning back you walk out the door and begin pacing down the hall again. Once again you peer to the room on the right, above the stairs, only to know if this is real. The lifeless bodies of children lay upon the floor.<br /><br />

   As you make your way to the bottom of the stairs you collapse, falling down the last ten stairs hearing, "Good evening, wouldn't you say?" Your head smashes into the last step causing you to go unconscious.<br /><br />

   You wake up to a pail of cold water drenching you while your eyes slowly open. Two disgusting beasts hold you down, cursing at you with some of the most foulest of words. "Why are you doing this!", you shout. Suddenly you hear foot steps coming from the darkness in front of you. "The living beings of this earth have been like a treat. Something I can't seem to get my mind off of... Your souls are too easy to control. Your so weak and pathetic.", says the man. "Who are you?", you demand. "I?... I am just another demon. They call me Abaddon." You ask, "Did you do this?". "Well yes child, I did. You see I have been planning this for so long. Your world is so corrupt making it so easy to enter your world. Once we got here we saw that everything was uncontrolled. But that's why I am here. I am a higher power.", explains Abaddon. "I won't let you do this. I am going to stop you... You killed my family! Let me up now so I can rearrange your face.", you say in a very distinctive tone. Abaddon chuckles and says, "You have much to learn. I see you are stronger than the others which is why you are still alive now. I should keep you as a pet. Although you haven't seen very much beyond your home. So I am going to let you look over the world with your own eyes. You will see that I have changed everything for the better. It is a fight that the whole world is involved in, I believe you will like it..." Abaddon then signals his beasts to cut your throat. "Such an adorable little pest.", Abaddon says as he walks out the door.<br /><br />

   Again for the last time you wake up. "Did I just dream?", you say. Feeling your throat you find a scar. "I don't understand. I should be dead... Am I... immortal? It can't be... This isn't real!!! Either way I am still alive. I need to find Abaddon and send him back to the deepest depths of hell. I must start training immediately.", you say. You begin gathering your things in a backpack, only taking necessary items. Your adventure begins... Good luck!</p>
            <p>&nbsp;</p>
        </div>
    </td>
    <td valign="top">
    	
        <div id="gridMenu">
        </div>
        <div id="affinityArea"></div>&nbsp;
        </td>
    </tr>
    <tr>
        <td valign="bottom" colspan="2">
            <div id="chatBox"></div>
            <div id="chatRoom"><center>Copyright &copy; 2010, Alexander J Jezior (Vulcan).<br /> We encourage you to take a look at <a href="/privacypolicy.php" target="_BLANK">Privacy Policy</a> and <a href=\'Javascript: viewPP();\'>Terms And Conditions</a> before browsing this site.</center></div>
        </td><td valign="top">
            <div id="onlineList"></div>
            
            
        </td>
    </tr>
</table>
</body>
</html>