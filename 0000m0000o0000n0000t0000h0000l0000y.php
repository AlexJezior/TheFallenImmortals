<?php
session_name("icsession");
session_start();
include('db.php');

$ticketQuery = mysql_query("SELECT * FROM donationpot");
$ticketRow = mysql_num_rows($ticketQuery);

$choosenOne = rand(1,$ticketRow);

$getWinner = mysql_query("SELECT * FROM donationpot WHERE id='".$choosenOne."'");
$winner = mysql_fetch_array($getWinner);

$gettemple = mysql_query("SELECT * FROM temple");
$temple = mysql_fetch_assoc($gettemple);

$updateUser = mysql_query("UPDATE characters SET gold=gold+'".$temple['pot']."' WHERE username='".$winner['username']."'");

$messagechat = "<strong><font color=\'orange\'>".$winner['username']." sucsessfully robbed the temple for ".number_format($temple['pot'])." gold!</font></strong><br />";
$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `message`, `to`) VALUES ('".$date."', '3', '".$messagechat."', 'Chatroom')");

$updateTemple = mysql_query("UPDATE temple SET pot='0', lastwinner='".$winner['username']."'");

$deleteTickets = mysql_query("TRUNCATE TABLE  `donationpot`");
?>