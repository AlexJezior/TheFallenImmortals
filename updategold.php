<?php

session_name("icsession");

session_start();

include('db.php');



$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());

$char = mysql_fetch_assoc($getchar);



$charname = $char['username'];

$gold = $char['gold'];

$bank = $char['bank'];



if($gold < "0"){

	$gold = "0";

}



if($gold >= $_POST['depositAmount'] && $_POST['depositAmount'] >= "0" && ctype_digit($_POST['depositAmount']) && $bank >= $_POST['withdrawAmount'] && $_POST['withdrawAmount'] >= "0" && ctype_digit($_POST['withdrawAmount']))

{

    $depositFee = floor($_POST['depositAmount'] * ($char['bankint']/100));

    $depositAmount = $_POST['depositAmount'] - $depositFee;

    $bank = $bank - $_POST['withdrawAmount'] + $depositAmount;

    $gold = $char['gold'] - $_POST['depositAmount'] + $_POST['withdrawAmount'];

    

    $update = mysql_query("UPDATE characters SET bank='".$bank."', gold='".$gold."' WHERE id='".$_SESSION['userid']."' ") or die(mysql_error());



    $data = "<center>You deposited ".number_format($depositAmount)." gold, ".number_format($depositFee)." gold went to the banker. And you withdrew ".number_format($_POST['withdrawAmount'])." gold into your hand.<br />You have ".number_format($bank)." Gold in the bank and ".number_format($gold)." Gold in your hand!<br />The bank will deduct 5% of all deposits made. Withdraws are non-deductable.<br /><br />Deposit: <input type=\'text\' value=\'0\' id=\'depositamount\' /><br />Withdraw: <input type=\'text\' value=\'0\' id=\'withdrawamount\' /><br /> <input type=\'button\' value=\'Make Transaction\' onclick=\'runTransaction();\' /></center>";

}

else

{

    $data = "<center>That is not possible<br />You have ".number_format($bank)." Gold in the bank and ".number_format($gold)." Gold in your hand!<br />The bank will deduct 5% of all deposits made. Withdraws are non-deductable.<br /><br />Deposit: <input type=\'text\' value=\'0\' id=\'depositamount\' /><br />Withdraw: <input type=\'text\' value=\'0\' id=\'withdrawamount\' /><br /> <input type=\'button\' value=\'Make Transaction\' onclick=\'runTransaction();\' /></center>";

}



include('updatestats.php');

print("fillDiv('displayArea','".$data."');");

?>