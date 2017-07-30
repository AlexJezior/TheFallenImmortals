<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

if($char['refferal'] != "None" && $char['refferal'] != "" && $char['refferal'] != NULL){
    $whorefferal = mysql_query("SELECT * FROM characters WHERE username='".$char['refferal']."'");
    $refferal = mysql_fetch_assoc($whorefferal);
    
    if($newlvl == "100"){
        $bonusGold = "10000";
        $refferalNEWgold = $refferal['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['refferal']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a refferal bonus, ".$refferal['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "500"){
        $bonusGold = "100000";
        $refferalNEWgold = $refferal['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['refferal']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a refferal bonus, ".$refferal['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "1000"){
        $bonusGold = "1000000";
        $refferalNEWgold = $refferal['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['refferal']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a refferal bonus, ".$refferal['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "5000"){
        $bonusGold = "10000000";
        $refferalNEWgold = $refferal['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['refferal']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a refferal bonus, ".$refferal['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }
}
?>