<?php
    include('db.php');
    session_name("icsession");
    session_start();
    $time = time() - "1000";
    $findonline = mysql_query("UPDATE characters SET lastactive='".$time."' WHERE id='".$_SESSION['userid']."'");
    $display = "Logging you out...";
    print("fillDiv('displayArea','".$display."');");
    session_unset(); 
    print("window.location = 'http://thefallenimmortals.com/';");
?>