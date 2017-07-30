<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'")or die("Not logged in!");
$char = mysql_fetch_assoc($getchar);

$amount = $_POST['amount'];
if(isset($_POST['amount']) && $amount > "0" && $chargold > "0")
{
    $getguild = mysql_query("SELECT * FROM guilds WHERE name='".$char['guild']."'");
    $guild = mysql_fetch_assoc($getguild);
    if($amount >= $chargold  && $amount > "0" && $chargold > "0")
    {
        /*
        This will set the designated donation to the amount of gold the player has on hand if
        they have entered more than they posess
        */
        $amount = $chargold;
    }
    $newgold = floor($chargold - $amount);
    $newbank = floor($guild['bank'] + $amount);
    $newtd = $char['totaldonations'] + $amount;
    if($newbank > "1000000000000000000")
    {
        /*
        This code will run if the player is trying to put the cap of 1Quint into the Guild Bank
        This code will find the excess gold and automatically reimburse the player the difference
        */
        $reimburse = $newbank - "1000000000000000000";
        $newgold += $reimburse;
        $newbank = "1000000000000000000";
    }
    $message = "donated ".number_format($amount)." gold to the guild! ".$char['username']." has contributed ".number_format($newtd)." gold to the guild in total.";
    $message = "<font color=\'#DD00DD\'><strong>Guild:</strong></font> (<a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#DD00DD\' style=\'text-decoration:none\'>".$charname."</font></a>)<font color=\'#DD00DD\'> ".$message."</font><br />";
    $getmembers = mysql_query("SELECT * FROM characters WHERE guild='".$charguild."'");
    while($member = mysql_fetch_array($getmembers))
    {
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$timestamp."', '4', 'PM', '".$member['username']."', '".$message."')");
    }
    $logMessage = "".$char['username']." donated ".number_format($amount)." gold to the guild!";
    $letGuildKnow = mysql_query("INSERT INTO log (`name`, `message`) VALUES ('".$charguild."', '".$logMessage."')");
    $removegold = mysql_query("UPDATE characters SET gold='".$newgold."', totaldonations='".$newtd."' WHERE id='".$_SESSION['userid']."'");
    $donategold = mysql_query("UPDATE guilds SET bank='".$newbank."' WHERE name='".$char['guild']."'");
    include('updatestats.php');
    print("viewGuild();");
}else{
	print('alert(\'You cannot donate you negative money!\');');
}
?>