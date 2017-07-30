<?php
session_name("icsession");
session_start();
include('db.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar)or die();
$data .= "";


if($_POST['change'] == "yes" && $char['gold'] >= "100000000" && $char['level'] >= "5000"){
	$CharLevel = $char['level'];
	$CharClass = $char['class'];
	$CharExpacq = $char['expacq'];
	$CharExpreq = $char['expreq'];
	$CharBlood = $char['blood'];
	
	$findSecondClassInTheCookieJar = mysql_query("SELECT * FROM secondclass WHERE username='".$char['username']."'");
	$sClass = mysql_fetch_assoc($findSecondClassInTheCookieJar);
	$newClass = $sClass['class'];
	if($sClass['level'] == "1"){
		$messagechat = "<strong><font color=\'#660077\'><b>".$char['username']."</b> has switched their class to <b>".$sClass['class']."</b> for the first time. Good luck!.</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
	}
	$updateCharacter = mysql_query("UPDATE characters SET gold=gold-'100000000' WHERE id='".$char['id']."'");
	$changeClass = mysql_query("UPDATE characters SET level='".$sClass['level']."', class='".$sClass['class']."', expacq='".$sClass['expacq']."', expreq='".$sClass['expreq']."', blood='".$sClass['blood']."' WHERE id='".$char['id']."'");
	$storeClass = mysql_query("UPDATE secondclass SET level='".$CharLevel."', class='".$CharClass."', expacq='".$CharExpacq."', expreq='".$CharExpreq."', blood='".$CharBlood."' WHERE username='".$char['username']."'");
	$data .= "You have changed your class to ".$newClass."!";
	
}else{
	die("alert('Lack of requirements.')");
}

print("fillDiv('displayArea','".$data."');");
include('updatestats.php');
?>