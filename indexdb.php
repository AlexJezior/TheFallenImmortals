<?php

//I've set this up to make the connection to your db, shouldn't need changing unless i got something wrong
$dbhost = "localhost";
$database = "fallendb";
$dbuser = "root";
$dbpass = "";

$login = mysql_connect($dbhost, $dbuser, $dbpass) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database) or die("Where?");



//Global Variables
$date = time();
?>