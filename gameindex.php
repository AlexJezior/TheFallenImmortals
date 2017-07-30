<?php 
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
      <script type="text/javascript">
         function showRecaptcha(element) {
           Recaptcha.create("6Ld9zssSAAAAAJwo6kchU03wK4K9aoteWZ0nnlFR", element, {
             theme: "blackglass",
             callback: Recaptcha.focus_response_field});
         }
      </script>

<SCRIPT language="text/JavaScript">


var browserName=navigator.appName; 

if (browserName=="Microsoft Internet Explorer")

{ 

 alert("We noticed that you are using Internet Explorer. We recommend you use Google Chrome or Firefox. Half of the functionality of this website will not work in Internet Explorer. Feel free to try anyways, but if you would like to see the full functionality of the game I would reccommend Chrome or Firefox.");

}


</SCRIPT>
<script src="ajax.js" type="text/javascript"></script>
<script src="dom.js" type="text/javascript"></script>
<script src="functions.js" type="text/javascript"></script>
<script src="homefunctions.js" type="text/javascript"></script>
<script src="gamefunctions.js" type="text/javascript"></script>
<script src="chatroomfunctions.js" type="text/javascript"></script>
<link href="gameindex.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Expires" content="The Fallen Immortals! A text-based MMORPG with a lot of kick. Get started by signing up and defeating the enemies that destroyed your home town. Updates come frequently! Player chat! Random Drops! And its all free to you!" />
<title>The Fallen Immortals!</title>

</head>

<body>
<table align="center" width="1000" border="0">
<tr>
	<td>
        <div id="headMenu"></div>
    </td>
</tr>
<tr>
	<td>
        <a href="Javascript: ViewPlayerStats('<?=$char['username']?>');"><?=$char['username']?></a> the level <?=number_format($char['level'])?> <?=$char['class']?><br />
        <table width="980" height="470" border="1" align="center" style="background-image:url('images/gameDisplay.png'); background-color:#000000; overflow:auto;">
          <tr>
            <td height="66" scope="row">
                <div id="barMenu"><table>
                    <tr><td width="45">Health:</td><td width="155">&nbsp;</td></tr>
                    <tr><td>Mana:</td><td>&nbsp;</td></tr>
                    <tr><td>Exp:</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
            <td height="66" colspan="3" nowrap="nowrap" scope="row">
                <div id="assetsMenu"><table>
                    <tr><td width="50">Gold:</td><td width="247">&nbsp;</td><td width="70">Networth:</td><td width="129">&nbsp;</td><td width="50">Copper:</td><td width="99">&nbsp;</td></tr>
                    <tr><td>Bank:</td><td>&nbsp;</td><td>Cash:</td><td>&nbsp;</td><td>Iron:</td><td>&nbsp;</td></tr>
                    <tr><td>Blood:</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Steel:</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
          </tr>
          <tr>
            <td width="200" height="123" scope="row">
                <div id="statsMenu"><table height="124px">
                    <tr><td width="80">Strength:</td><td width="120">&nbsp;</td></tr>
                    <tr><td>Dexterity:</td><td>&nbsp;</td></tr>
                    <tr><td>Endurance:</td><td>&nbsp;</td></tr>
                    <tr><td>Concentrat.:</td><td>&nbsp;</td></tr>
                    <tr><td>Intelligence:</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
            <td width="502" rowspan="2"><div id="displayArea" style="width:580px;height:305px;overflow: auto;"></div></td>
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
                      <td><a title='See where Bags or Mining spots are when you are around them.'>?</a>)Foresight:</td><td>&nbsp;</td></tr>
                    <tr><td>Kill Streak:</td><td>&nbsp;</td></tr>
                    <tr><td>PVP(K/D):</td><td>&nbsp;</td></tr>
                </table></div>
            </td>
          </tr>
          <tr>
            <th height="60" scope="row"><div id="spellsMenu">&nbsp;</div></th>
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
	</td>
</tr>
</table>

</body>
</html>
