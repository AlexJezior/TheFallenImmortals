<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

if($char['killstreak'] == "100"){
        $bonusBlood = "200";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "500"){
        $bonusBlood = "400";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "1000"){
        $bonusBlood = "600";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "1750"){
        $bonusBlood = "800";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "2500"){
        $bonusBlood = "1000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "4000"){
        $bonusBlood = "1200";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "6000"){
        $bonusBlood = "1400";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "10000"){
        $bonusBlood = "1800";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "15000"){
        $bonusBlood = "2200";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "22000"){
        $bonusBlood = "2600";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}
elseif($char['killstreak'] == "30000"){
        $bonusBlood = "3000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "40000"){
        $bonusBlood = "3400";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "52000"){
        $bonusBlood = "3800";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "66000"){
        $bonusBlood = "4200";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "82000"){
        $bonusBlood = "4400";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "100000"){
        $bonusBlood = "5200";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "120000"){
        $bonusBlood = "6000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "142000"){
        $bonusBlood = "6800";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "166000"){
        $bonusBlood = "7600";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "192000"){
        $bonusBlood = "8400";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "220000"){
        $bonusBlood = "10000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "250000"){
        $bonusBlood = "11000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "282000"){
        $bonusBlood = "12000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "316000"){
        $bonusBlood = "14000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "352000"){
        $bonusBlood = "16000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "390000"){
        $bonusBlood = "18000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "430000"){
        $bonusBlood = "22000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "472000"){
        $bonusBlood = "26000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "516000"){
        $bonusBlood = "30000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "562000"){
        $bonusBlood = "35000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "610000"){
        $bonusBlood = "42000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "660000"){
        $bonusBlood = "49000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "712000"){
        $bonusBlood = "60000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "766000"){
        $bonusBlood = "70000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "822000"){
        $bonusBlood = "85000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "880000"){
        $bonusBlood = "100000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "940000"){
        $bonusBlood = "120000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}elseif($char['killstreak'] == "1002000"){
	print("alert('Let the admin know that you hit the final killstreak!');");
        $bonusBlood = "140000";
        $refferalNEWblood = $char['blood'] + $bonusBlood;
        $updateRefferal = mysql_query("UPDATE characters SET blood='".$refferalNEWblood."' WHERE username='".$char['username']."'");
        $messagechat = "<strong><font color=\'#662200\'>".$char['username']." has slaughtered ".number_format($char['killstreak'])." enemies in total. As a reward, ".$char['username']." gets ".number_format($bonusBlood)." blood!</font></strong><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
}
?>