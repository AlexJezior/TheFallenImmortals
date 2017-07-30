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
<title>The Fallen Immortals! Official Text-Based MMORPG</title>
<style type="text/css">
body {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	color: #CFB164;
	background-attachment: scroll;
	background-color: #000;
	margin: 0 auto;

}
a {
    color: #00AAFF;
    text-decoration: none;
}
#containerDiv {
	position:relative;
	background-image: url(images/gameDesignBKG.png);
	background-repeat: no-repeat;
	height: 631px;
	width: 1024px;
	margin: 0 auto;
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
	position: absolute;
	height: 470px;
	width: 980px;
	left: 20px;
	top: 115px;
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
#topCivilization {
	background-image: url(images/topCivilization.png);
	position: relative;
	height: 30px;
	width: 980px;
}
#civilizationContent {
	padding-top: 6px;
	padding-right: 5px;
	padding-left: 5px;
}
#travelMap {
	width: 475px;
	height: 600px;
}
</style>
</head>

<body>
<div id="containerDiv">
<div id="linkSpot"><a id="topLink" href="Javascript: viewTop();"></a><a id="cashLink" href="Javascript: viewPurchase();"></a><a id="voteInsideLink" href="Javascript: viewVote();"></a><a id="forumLink" href=""></a><a id="faqLink" href="Javascript: viewFAQ();"></a><a id="settingsLink" href="javascript: viewAccount();"></a><a id="logoutLink" href="Javascript: viewLogout();"></a></div>


<div id="contentSection">
		<?php
			if($char['username'] == "Ajezior"){
		?>

<div id="topCivilization"><div id="civilizationContent"><a href="Javascript: ViewPlayerStats('<?=$char['username']?>');"><?=$char['username']?></a> the level <?=number_format($char['level'])?> <?=$char['class']?>&nbsp;&nbsp;&nbsp;Population: 120/150&nbsp;&nbsp;Baracks: 5&nbsp;&nbsp;Divination: 5&nbsp;&nbsp;Temple: 5&nbsp;&nbsp;Treasury: 5&nbsp;&nbsp;Training: 5</div></div>
        
        <?php
			}else{
        ?>
        <a href="Javascript: ViewPlayerStats('<?=$char['username']?>');"><?=$char['username']?></a> the level <?=number_format($char['level'])?> <?=$char['class']?>
        <?php
			}
		?>
        
        <table style="background-image:url('images/gameDisplay.png'); background-repeat:no-repeat;">
          <tr>
            <td height="66" scope="row" width="250">
                <div id="barMenu"><table>
                    <tr><td width="55">&nbsp;</td><td width="155">&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
            <td height="66" colspan="3" nowrap="nowrap" scope="row">
                <div id="assetsMenu"><table>
                    <tr><td width="50">&nbsp;</td><td width="225">&nbsp;</td><td width="70">&nbsp;</td><td width="150">&nbsp;</td><td width="50">&nbsp;</td><td width="30">&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
          </tr>
          <tr>
            <td width="215" height="123" scope="row">
                <div id="statsMenu"><table height="124px">
                    <tr><td width="80">Strength:</td><td width="120">&nbsp;</td></tr>
                    <tr><td>Dexterity:</td><td>&nbsp;</td></tr>
                    <tr><td>Endurance:</td><td>&nbsp;</td></tr>
                    <tr><td>Concentrat.:</td><td>&nbsp;</td></tr>
                    <tr><td>Intelligence:</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
            <td width="574" rowspan="2">
              <div id="displayChange" style="width:580px;height:30px;">
                <table>
                <tr><td width="72px">&nbsp;</td><td>
				<select id="displaySelection" onChange="changeDisplay();">
				<option value="fight">Fight</option>
				<option value="statpoints">Stat Points</option>
				<option value="training">Training</option>
				<option value="divination">Divination</option>
				<option value="inventory">Inventory</option>
				<option value="bank">Bank</option>
				<option value="guild">Guild</option>
				<option value="scavenger">Scavenger</option>
				<option value="pvp">PvP</option>
				<option value="voodoo">Voodoo</option>
				<option value="temple">Temple</option>
				<option value="forge">Forge</option>
				<option value="shop">Shop</option>
				<option value="trade">Trade</option>
				</select>
                
                </td></tr>
                </table><center><div id="rewardPopup" onclick="clearRewards();"></div></center><div id="secondPage"></div>
                </div>
                <div id="displayArea" style="width:580px;height:275px;overflow: Scroll;"></div>
            </td>
            <td width="176" colspan="-3"><div id="scavengeMenu" style="width:162px;height:124px;overflow: auto;">Location: <br /> Scavenges Complete<br /><br />-New scavenges available!</div></td>
          </tr>
          <tr>
            <td height="139" scope="row">
                <div id="accommodationMenu"><table width="200" height="161">
                    <tr><td width="60">Weapon</td><td width="140">&nbsp;</td></tr>
                    <tr><td>Armour</td><td>&nbsp;</td></tr>
                    <tr><td>Gloves:</td><td>&nbsp;</td></tr>
                    <tr><td>Leggings:</td><td>&nbsp;</td></tr>
                    <tr><td>Boots:</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
            <td colspan="-3">
                <div id="miscMenu"><table>
                    <tr><td width="80">Mining:</td><td width="120">&nbsp;</td></tr>
                    <tr><td>Item Comp.:</td><td>&nbsp;</td></tr>
                    <tr><td>Trade Skill:</td><td>&nbsp;</td></tr>
                    <tr>
                      <td>Foresight:</td><td>&nbsp;</td></tr>
                    <tr><td>Kill Streak:</td><td>&nbsp;</td></tr>
                    <tr><td>PVP(K/D):</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
          </tr>
          <tr>
            <th height="60" scope="row"><div id="spellsMenu" style="width:210px;height:75px;overflow: auto;">&nbsp;</div></th>
            <td colspan="3">
                <table
                <tr>
                	<td>
                        <div id="blessingsMenu"><table border="1" width="756px">
                        <tr height="55px">
                        <td width="55px">None</td><td width="55px">None</td><td width="55px">None</td><td width="55px">None</td><td width="55px">Buy</td><td width="55px">Buy</td><td width="55px">Buy</td><td width="55px">Buy</td><td width="55px">Buy</td>
                        </tr>
                        </table></div>
                     </td>
                     <td>
                     	<div id="navigationMenu"></div>
                     </td>
                 </tr>
                 </table>
            </td>
          </tr>
        </table><br/>
        <table>
        <tr height="500px">
                <td valign="top" colspan="2">
                    <div id="chatBox"></div>
                    <div id="chatRoom"><center>Copyright &copy; 2010-2012, Alexander J Jezior (AJezior).<br /> We encourage you to take a look at <a href="/privacypolicy.php" target="_BLANK">Privacy Policy</a> and <a href='Javascript: viewPP();'>Terms And Conditions</a> before browsing this site.</center></div>
                </td><td valign="top">
                    <div id="onlineList"></div>
                </td>
          </tr>
        </table>
</div>
<script type="text/javascript">
<?php

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
