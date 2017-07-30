<?php 
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar)or die("You need to login!");
//$ResetGame = mysql_query("UPDATE characters SET level='1', class='Fighter', classlevel='1', gold='0', bank='0', equipped='None, None, None, None, None', scavenges='0', vodoomax='10', blessing='None, None, None, None, None, None, None, None, None', spells='First Aid, None, None, None, None, None, None, None, None, None, None, None', presets='Not Set, Not Set, Not Set, Not Set, Not Set, Not Set, Not Set, Not Set, Not Set', charge='None', nobility='Officer Cadet(1)', guild='None', totaldonations='0', expacq='0', expreq='6', strength='50', dexterity='50', endurance='50', intelligence='50', concentration='50', duelratio='0/0', mininglevel='1', lastmine='0', copperore='10', ironore='10', steelore='10', tradeskill='900', life='50',mana='50', blood='50', stats='0', location='Castle', posx='1', posy='1', relativeLoc='250, 250', teleporter='No', teleportlast='0', foresight='0', cash=networth, bankint='5', goldsteal='15', lastfight='0', enemyid='1', killstreak='0', security='0', captcha='Inactive', captcha_time_limit='0', lastactive='0', automax='10'")or Die("alert('Ack!');");
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery.js"></script>
<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<script src="ajax.js" type="text/javascript"></script>
<script src="dom.js" type="text/javascript"></script>
<script src="functions.js" type="text/javascript"></script>
<script src="homefunctions.js" type="text/javascript"></script>
<script src="gamefunctions.js" type="text/javascript"></script>
<script src="chatroomfunctions.js" type="text/javascript"></script>
      <script type="text/javascript">
         function showRecaptcha(element) {
           Recaptcha.create("6Ld9zssSAAAAAJwo6kchU03wK4K9aoteWZ0nnlFR", element, {
             theme: "blackglass",
             callback: Recaptcha.focus_response_field});
         }
		 
function changeDisplay() {
		var page = document.getElementById('displaySelection').value;
		if(page == "fight"){
			openFight();
		}
		if(page == "statpoints"){
			viewStatPoints();
		}
		if(page == "training"){
			viewTrainingFacility();
		}
		if(page == "divination"){
			viewDivination();
		}
		if(page == "inventory"){
			viewInventory();
		}
		if(page == "bank"){
			viewBank();
		}
		if(page == "guild"){
			viewGuild();
		}
		if(page == "scavenger"){
			viewScavenger();
		}
		if(page == "pvp"){
			viewDuelGround();
		}
		if(page == "voodoo"){
			viewVodoo();
		}
		if(page == "temple"){
			viewTemple();
		}
		if(page == "forge"){
			viewForge();
		}
		if(page == "shop"){
			viewShop();
		}
		if(page == "trade"){
			viewTrade();
		}
}
		 
      </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Fallen Immortals! Official 2D MMORPG</title>
<style type="text/css">
body {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	color: #CFB100;
	background-attachment: scroll;
	background-color: #000;

}
a {
    color: #00AA00;
    text-decoration: none;
}
#containerDiv {
	position:relative;
	background-image: url(images/gameDesignBKG.png);
	background-repeat: no-repeat;
	height: 631px;
	width: 1024px;

}
#topLink {
	background-image: url(images/topLink.png);
	background-repeat: no-repeat;
	height: 23px;
	width: 46px;
	background-attachment: scroll;
	left: 730px;
	top: 22px;
	position: absolute;
}
#cashLink {
	background-attachment: scroll;
	background-image: url(images/cashLink.png);
	background-repeat: no-repeat;
	position: absolute;
	height: 25px;
	width: 70px;
	left: 785px;
	top: 22px;
}
#voteInsideLink {
	background-attachment: scroll;
	background-image: url(images/voteInsideLink.png);
	background-repeat: no-repeat;
	height: 23px;
	width: 62px;
	left: 857px;
	top: 22px;
	position: absolute;
}
#forumLink {
	background-attachment: scroll;
	background-image: url(images/forumLink.png);
	background-repeat: no-repeat;
	position: absolute;
	height: 23px;
	width: 85px;
	left: 928px;
	top: 22px;
}
#faqLink {
	font-style: normal;
	background-attachment: scroll;
	background-image: url(images/faqLink.png);
	background-repeat: no-repeat;
	position: absolute;
	height: 25px;
	width: 60px;
	left: 730px;
	top: 56px;
}
#settingsLink {
	background-attachment: scroll;
	background-image: url(images/settingsLink.png);
	background-repeat: no-repeat;
	position: absolute;
	height: 23px;
	width: 105px;
	left: 805px;
	top: 56px;
}
#logoutLink {
	background-attachment: scroll;
	background-image: url(images/logoutLink.png);
	background-repeat: no-repeat;
	position: absolute;
	height: 23px;
	width: 90px;
	left: 925px;
	top: 56px;
}
#contentSection {
	height: 550px;
	width: 1050px;
}
#chatContainer {
	position:relative;
	top: 110px;
	width: 845px;
	height: 535px;
}
#chatBox {
	width: 845px;
	height: 35px;
}
#chatRoom {
	width: 845px;
	height: 500px;
}
#rewardPopup {
	overflow: visible;
	visibility: visible;
	position: absolute;
}
#secondPage {
	background-color: #333;
	position: absolute;
	left: 220px;
	top: 0px;
	border: 1px solid #666;
}

#2dCanvas {
	width: 1050px;
	height: 550px;
	overflow: hidden;
}
</style>
</head>

<body>
<div id="containerDiv">
<div id="linkSpot"><a id="topLink" href="Javascript: viewTop();"></a><a id="cashLink" href="Javascript: viewPurchase();"></a><a id="voteInsideLink" href="Javascript: viewVote();"></a><a id="forumLink" href=""></a><a id="faqLink" href="Javascript: viewFAQ();"></a><a id="settingsLink" href="javascript: viewAccount();"></a><a id="logoutLink" href="Javascript: viewLogout();"></a></div>

<div id="contentSection">
        <div id="2dCanvas">
		
		</div>
	
	<div id="chatContainer">
        <table>
        <tr height="500px">
                <td valign="top" colspan="2">
                    <div id="chatBox"></div>
                    <div id="chatRoom"><center>Copyright &copy; 2010-2014, Alexander J Jezior (AJezior).<br /> We encourage you to take a look at <a href="/privacypolicy.php" target="_BLANK">Privacy Policy</a> and <a href='Javascript: viewPP();'>Terms And Conditions</a> before browsing this site.</center></div>
                </td><td valign="top">
                    <div id="onlineList"></div>
                </td>
          </tr>
        </table>
	</div>
</div>
</div>
<script type="text/javascript">
<?php
		include('travel.php');

        if($char['username'] == "Ajezior" || $char['username'] == "Wtfheather"){

        	$info = " | <a href=\'chatroomadmin.php\' target=\'_BLANK\'>Show messages</a>";

        }else{

        	$info = "";

        }
		if($char['username'] == "Ajezior"){
			$howlong = 1500;
		}else{
			$howlong = 180;
		}
		print("fillDiv('chatBox','<form name=\'ajaxchat\' action=\'javascript: sendMessage();\'><input type=\'text\' size=\'80\' maxlength=\'".$howlong."\' id=\'chatmessage\' name=\'messagechat\' /><input type=\'button\' id=\'sendmessage\' value=\'Send\' onclick=\'sendMessage();\' /><a href=\'chatfunctions.html\' target=\'_BLANK\'>Chat Functions</a>".$info."</form>');");

        print("fillDiv('chatRoom','<em>Initializing Chatroom...</em>');");
        print("fillDiv('onlineList','<em>Initializing Online List...</em>');");
		print("readChatroom();");
        include('active.php');
        include('updatestats.php');
		include('run.php');
		
		
if($char['logins'] == 1){
	$fillImg = "<img src=\'/images/firstLogin.png\'>";
	print("fillDiv('rewardPopup','".$fillImg."');");

}

?>
</script>
</body>
</html>
