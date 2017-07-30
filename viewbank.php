<?php

session_name("icsession");

session_start();

include('db.php');

include('active.php');



$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");

$char = mysql_fetch_assoc($getchar);



$bank = $char['bank'];

$hand = $char['gold'];



$display = "<center>You have ".number_format($bank)." Gold in the bank and ".number_format($hand)." Gold in your hand!<br />The bank will deduct ".$char['bankint']."% of all deposits made. Withdraws are non-deductable.<br /><br />Deposit: <input type=\'text\' value=\'0\' id=\'depositamount\' /><br />Withdraw: <input type=\'text\' value=\'0\' id=\'withdrawamount\' /><br /> <input type=\'button\' value=\'Make Transaction\' onclick=\'runTransaction();\' /></center><br /><br /><br />";

$display .= "<center><b><u>Give Gold:</u></b> <br />To:<input type=\'text\' id=\'toUsername\'> &nbsp; Amount:<input type=\'text\' id=\'giveAmount\'> <br /> <input type=\'submit\' value=\'Give Gold\' onclick=\'Javascript: giveGold();\'></center>";



print("fillDiv('displayArea','".$display."');");

include('updatestats.php');

?>