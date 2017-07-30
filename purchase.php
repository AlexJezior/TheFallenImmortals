<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

if($char['username'] == NULL){
	die("You need to login to view this content.");
}

$data = "<strong><a href=\"javascript: closeSecondPage();\">Close</a> | <a href=\"javascript: viewPurchase();\">Back</a></strong><br /><br />";


			$itemenh = $char['itemenh'] / 100;
$data .= "<table>";
$data .= "<tr><td>Cash:</td><td> $".$char['cash']."</td></tr>";
$data .= "<tr><td>Blessing Slots:</td><td> ".$char['affinitys']."</td></tr>";
$data .= "<tr><td>Stat Multiplier:</td><td> X".$charstatmulti."</td></tr>";
$data .= "<tr><td>Deposit Fee:</td><td> ".$char['bankint']."%</td></tr>";
$data .= "<tr><td>Auto Attacks:</td><td> ".$char['automax']."</td></tr>";
$data .= "</table><br /><br />";

$data .= "<table width=\"750px\">";
$data .= "<tr><td><strong>Assest Bonuses</strong></td><td><strong>Perminate Bonuses</strong></td><td><strong>Temporary Bonuses</strong></td></tr>";
$data .= "<tr><td><a href=\"javascript: runCashOperation(\'FiveMill\');\">+5Million Gold - 1Cash</a></td><td><a href=\"javascript: runCashOperation(\'HalfStatMulti\');\">+0.5 Stat Point Multiplyer - 8Cash</a></td><td><a href=\"javascript: runCashOperation(\'OneDemon\');\">1 Random Overlord Demon - 2 Cash(Your Location)</a></td></tr>";
$data .= "<tr><td><a href=\"javascript: runCashOperation(\'ThirtyMill\');\">+30Million Gold - 5Cash</a></td><td><a href=\"javascript: runCashOperation(\'WholeStatMulti\');\">+1 Stat Point Multiplyer -15Cash</a></td><td><a href=\"javascript: runCashOperation(\'FifteenBags\');\">15 Bag Drop - 2 Cash</a></td></tr>";
$data .= "<tr><td><a href=\"javascript: runCashOperation(\'EightKBlood\');\">+8k Blood - 1Cash</a></td><td><a href=\"javascript: runCashOperation(\'FiveStatMulti\');\">+5 Stat Point Multiplyer - 70Cash</a></td><td><a href=\"javascript: runCashOperation(\'FifteenMinutes\');\">15 Minues Bonus Time - 1 Cash</a></td></tr>";
$data .= "<tr><td><a href=\"javascript: runCashOperation(\'FiftyKBlood\');\">+50k Blood - 5Cash</a></td><td><a href=\"javascript: runCashOperation(\'OneTradeSkill\');\">+1% Trade Skill -5Cash</a></td><td><a href=\"javascript: runCashOperation(\'HourBonus\');\">60 Minues Bonus Time - 2 Cash</a></td></tr>";
$data .= "<tr><td><a href=\"javascript: runCashOperation(\'FiveHundredStat\');\">+500 Stat Points - 1Cash</a></td><td><a href=\"javascript: runCashOperation(\'TwoTwentythTradeSkill\');\">+2.2% Trade Skill -10Cash</a></td><td></td></tr>";
$data .= "<tr><td><a href=\"javascript: runCashOperation(\'TwentysevenFiftyStat\');\">+2750 Stat Points - 5Cash</a></td><td><a href=\"javascript: runCashOperation(\'OneForesight\');\">+1 Foresight -10Cash</a></td><td></td></tr>";
$data .= "<tr><td><a href=\"javascript: runCashOperation(\'BankFee\');\">-1% Banking Fees - 5Cash</a></td><td><a href=\"javascript: runCashOperation(\'AddAffinity\');\">+1 Blessing Slot - 20Cash</a></td><td></td></tr>";
$data .= "<tr><td></td><td><a href=\"javascript: runCashOperation(\'OneAuto\');\">+1 Auto Attack - 1Cash</a></td><td></td></tr>";
$data .= "<tr><td></td><td><a href=\"javascript: runCashOperation(\'FiveAuto\');\">+5 Auto Attack - 5Cash</a></td><td></td></tr>";
$data .= "<tr><td></td><td><a href=\"javascript: runCashOperation(\'TenAuto\');\">+10 Auto Attack - 10Cash</a></td><td></td></tr>";
$data .= "<tr><td></td><td><a href=\"javascript: runCashOperation(\'ChangeUsername\');\">Change Username Pass - 15Cash</a></td><td></td></tr>";
$data .= "<tr><td></td><td><a href=\"javascript: runCashOperation(\'Teleporter\');\">Teleporter - 25Cash</a></td><td></td></tr>";



$data .= "</tr>";
$data .= "</table><br /><br >";

$data .= "<b>IMPORTANT! READ BEFORE BUYING! All purchases are made through paypal(Easy to sign up). By making a purchase you agree to the following, that this game is subject to update at any time, you will NOT be refunded on any purchases made, if you do come across the unlikely event of having a problem with purchases please contact Vulcan in the game and I will be more than happy to help you.<br /><br /><h1>Your Paypal account must have the same email as your user!</h1></b>";

$data .= "<strong><span style=\'color: gold;\'><<<<20% BONUS ON ALL CASH PURCHASES!>>>></span></strong><br />";


$data .= "<table>";
$data .= "<tr><td>Item - Price</td><td>Buy?</td><td>Description</td></tr>";


// FIVE CASH

$data .= "<tr><td>5 Cash - $5.25</td><td>";
$data .= "<form target=\"_BLANK\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"><input type=\"hidden\" name=\"cmd\" value=\"_xclick\">";
$data .= "<input type=\"hidden\" name=\"business\" value=\"Alex.Jezior@gmail.com\"><input type=\"hidden\" name=\"item_name\" value=\"Five Cash\">";
$data .= "<input type=\"hidden\" name=\"currency_code\" value=\"USD\"><input type=\"hidden\" name=\"amount\" value=\"5.25\">";
$data .= "<input type=\"image\" src=\"http://www.paypal.com/en_US/i/btn/x-click-but01.gif\" name=\"submit\" alt=\"Make payments with PayPal - its fast, free and secure!\"></form>";
$data .= "</td><td>You get five extra Networth and five extra Cash.</td></tr>";


// TEN CASH

$data .= "<tr><td>11 Cash - $10.50</td><td>";
$data .= "<form target=\"_BLANK\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"><input type=\"hidden\" name=\"cmd\" value=\"_xclick\">";
$data .= "<input type=\"hidden\" name=\"business\" value=\"Alex.Jezior@gmail.com\"><input type=\"hidden\" name=\"item_name\" value=\"Ten Cash\">";
$data .= "<input type=\"hidden\" name=\"currency_code\" value=\"USD\"><input type=\"hidden\" name=\"amount\" value=\"10.50\">";
$data .= "<input type=\"image\" src=\"http://www.paypal.com/en_US/i/btn/x-click-but01.gif\" name=\"submit\" alt=\"Make payments with PayPal - its fast, free and secure!\"></form>";
$data .= "</td><td>You get ten extra Networth and ten extra Cash.</td></tr>";


//TWENTY CASH

$data .= "<tr><td>23 Cash - $21.00</td><td>";
$data .= "<form target=\"_BLANK\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"><input type=\"hidden\" name=\"cmd\" value=\"_xclick\">";
$data .= "<input type=\"hidden\" name=\"business\" value=\"Alex.Jezior@gmail.com\"><input type=\"hidden\" name=\"item_name\" value=\"Twenty Cash\">";
$data .= "<input type=\"hidden\" name=\"currency_code\" value=\"USD\"><input type=\"hidden\" name=\"amount\" value=\"21.00\">";
$data .= "<input type=\"image\" src=\"http://www.paypal.com/en_US/i/btn/x-click-but01.gif\" name=\"submit\" alt=\"Make payments with PayPal - its fast, free and secure!\"></form>";
$data .= "</td><td>You get twenty extra Networth and twenty extra Cash.</td></tr>";


//FIFTY CASH

$data .= "<tr><td>58 Cash - $52.50</td><td>";
$data .= "<form target=\"_BLANK\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"><input type=\"hidden\" name=\"cmd\" value=\"_xclick\">";
$data .= "<input type=\"hidden\" name=\"business\" value=\"Alex.Jezior@gmail.com\"><input type=\"hidden\" name=\"item_name\" value=\"Fifty Cash\">";
$data .= "<input type=\"hidden\" name=\"currency_code\" value=\"USD\"><input type=\"hidden\" name=\"amount\" value=\"52.50\">";
$data .= "<input type=\"image\" src=\"http://www.paypal.com/en_US/i/btn/x-click-but01.gif\" name=\"submit\" alt=\"Make payments with PayPal - its fast, free and secure!\"></form>";
$data .= "</td><td>You get fifty extra Networth and fifty extra Cash.</td></tr>";


//ONEHUNDRED CASH
$data .= "<tr><td>120 Cash - $105.00</td><td>";
$data .= "<form target=\"_BLANK\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"><input type=\"hidden\" name=\"cmd\" value=\"_xclick\">";
$data .= "<input type=\"hidden\" name=\"business\" value=\"Alex.Jezior@gmail.com\"><input type=\"hidden\" name=\"item_name\" value=\"One Hundred Cash\">";
$data .= "<input type=\"hidden\" name=\"currency_code\" value=\"USD\"><input type=\"hidden\" name=\"amount\" value=\"105.00\">";
$data .= "<input type=\"image\" src=\"http://www.paypal.com/en_US/i/btn/x-click-but01.gif\" name=\"submit\" alt=\"Make payments with PayPal - its fast, free and secure!\"></form>";
$data .= "</td><td>You get one-hundred extra Networth and one-hundred extra Cash.</td></tr>";

$data .= "</table>";
print("fillDiv('secondPage','".$data."');");

?>