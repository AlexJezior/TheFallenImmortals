<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//I've set this up to make the connection to your db, shouldn't need changing unless i got something wrong
$dbhost = "localhost";
$database = "homestead";
$dbuser = "homestead";
$dbpass = "secret";

$login = mysql_connect($dbhost, $dbuser, $dbpass) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database) or die("Where?");
include('varset.php');

//Global Variables
$date = time();

//Auto Administration
//Banned
$getbanned = mysql_query("SELECT * FROM banned WHERE ip='".$charip."'");
if(mysql_num_rows($getbanned) == "1")
{
    print("alert('You are banned.');");
    print("window.location = 'http://fallenimmortals.old/';");
}

//Unmute
$getmuted = mysql_query("SELECT * FROM muted");
while($muted = mysql_fetch_array($getmuted))
{
    if($muted['mutetime'] <= time())
    {
        $unmute = mysql_query("DELETE FROM muted WHERE id='".$muted['id']."'");

        $unmutemessage = "<b><font color=\'#DD00DD\'>Player ".$muted['username']." has been unmuted!</font></b><br />";
        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
        VALUES ('".$date."', '3', '".$muted['mutedby']."', '".$unmutemessage."', 'Chatroom')") or die(mysql_error());
    }
}
?>