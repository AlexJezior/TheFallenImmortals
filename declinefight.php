<?php
session_name("icsession");
session_start();
include('db.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);

$findDuel = mysql_query("SELECT * FROM duelground WHERE `tousername`='".$char['username']."'");
if(mysql_num_rows($findDuel) == 0){
	print("alert('No duel to decline.');");
}else{
	$date = time();
	$duel = mysql_fetch_assoc($findDuel);
	$messagechat = "<strong><font color=\'#FF3300\'>Duel declined.</font></strong><br />";
	$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$duel['tousername']."')");
	$messagechat = "<strong><font color=\'#FF3300\'>".$char['username']." has declined the duel.</font></strong><br />";
	$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '4', 'PM', '".$messagechat."', '".$duel['fromusername']."')");
	$removeTheDuel = mysql_query("DELETE FROM duelground WHERE `id`='".$duel['id']."'");
}
include('updatestats.php');
?>