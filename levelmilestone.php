<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

    
    if($newlvl == "50"){
        $bonusGold = "5000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "100"){
        $bonusGold = "10000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "250"){
        $bonusGold = "50000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "500"){
        $bonusGold = "100000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "1000"){
        $bonusGold = "500000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "1500"){
        $bonusGold = "1000000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "2500"){
        $bonusGold = "5000000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "5000"){
        $bonusGold = "10000000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "10000"){
        $bonusGold = "25000000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "20000"){
        $bonusGold = "50000000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "35000"){
        $bonusGold = "100000000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "60000"){
        $bonusGold = "165000000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }elseif($newlvl == "100000"){
        $bonusGold = "275000000";
        $refferalNEWgold = $char['gold'] + $bonusGold;
        $updateRefferal = mysql_query("UPDATE characters SET gold='".$refferalNEWgold."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." reached level ".number_format($newlvl).". As a milestone bonus, ".$char['username']." gets ".number_format($bonusGold)." gold!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
    }
    
    			if($newlvl == 10000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 20000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 30000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 40000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 50000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 60000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 70000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 80000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 90000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 100000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 110000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 120000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 130000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 140000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 150000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 160000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 170000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 180000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 190000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }elseif($newlvl == 200000){
                	$messagechat = "<strong><font color=\'#662200\'>The difficulty of achieving levels has increased on your behalf!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', '".$char['username']."')");
                }
?>