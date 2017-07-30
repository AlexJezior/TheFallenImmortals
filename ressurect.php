<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);
$charend = $char['endurance'];
$date = time();

$getinv = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND endurance>'0' AND equipped='Yes'");
while($inv = mysql_fetch_array($getinv))
{
    $charend += $inv['endurance'];
}
$blessingStats = explode(', ', $char['blessing']);
if (in_array('Constitution', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation; 
}
if (in_array('Constitution II', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution II'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution II') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation; 
}
if (in_array('Constitution III', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution III'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution III') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation;
}
if (in_array('Constitution IV', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution IV'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution IV') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation;
}
if (in_array('Constitution V', $blessingStats)) 
{ 
    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution V'"); 
    $level = mysql_fetch_assoc($result); 
    $foo = 0; 
    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
    { 
        if($blessingStats[$i] == 'Constitution V') 
        { 
            $foo += $level['level']; 
        } 
    } 
    $equation = $foo / 10; 
    $totalend += $charend * $equation; 
}
$charend = floor($charend + $totalend);
if($char['level'] >= "50"){
    $addOn = " at the cost of ".number_format($charend)." gold";
    $takeGold = mysql_query("UPDATE characters SET gold=gold-'".$charend."' WHERE username='".$char['username']."'");
}else{
    $addOn = "";
}
$ressurect = mysql_query("UPDATE characters SET life='".$charend."', lastactive='".$date."' WHERE id='".$_SESSION['userid']."'");

print("fillDiv('displayArea','<center>You have been ressurected".$addOn."!<br /><a href=\'javascript: runAway();\'>Fight More</a></center>');");

include('updatestats.php');

print("fillDiv('statsArea','".$data."');");
print("document.ajaxchat.messagechat.focus();");
?>