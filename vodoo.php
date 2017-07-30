<?php
session_name("icsession");
session_start();
include('db.php');

$whom = ucwords(strtolower($_POST['whom']));
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");
$char = mysql_fetch_assoc($getchar);

if($char['vodooattempt'] == $char['vodoomax']){
	$data .= "<b>You have used all your attempts in vodoo!</b><br /><br />";
	print("fillDiv('displayArea','".$data."<center>Aye, I see anotha survivor. Well are you feeling a bit down on your luck mahn? Have any of da other survivors given you any trouble? What can I do for ya?<br />Whom(Username): <input type=\'text\' id=\'whom\' /><br /><select id=\'what\'><option value=\'StealGold\'>Steal Gold</option><option value=\'StealBlood\'>Steal Blood</option></select><br /><input type=\'button\' value=\'Make Happen\' onclick=\'runVodoo();\' /><br />I will not guarantee all of these to work man.<br /><b>Stealing gold</b> works about 15% of the time at the cost of (10*UserLevel). You can get anywhere from 1-25% of their holdings.<br /><b>Stealing blood</b> works about 10% of the time at the cost of (15*UserLevel). You can get anywhere from 1-100 ounces of blood with a sucsessful steal.</center>');");
}
elseif($_POST['what'] == "StealGold" && $_POST['whom'] != NULL)
{
    $getsteal = mysql_query("SELECT * FROM characters WHERE username='".$whom."'");
    if(mysql_num_rows($getsteal) == "1")   //check if the character exist
    {
        $stealchar = mysql_fetch_assoc($getsteal);
        if($char['username'] != $stealchar['username'])
        {
            if($stealchar['gold'] >= "0")
            {
                $cost = $stealchar['level'] * "10";
                if($char['gold'] >= $cost)
                {
                    $newgold = $char['gold'] - $cost;
                    $takegold = mysql_query("UPDATE characters SET gold='".$newgold."' WHERE id='".$_SESSION['userid']."'");
                    $chance = mt_rand("1","100");
                    $newattempt = $char['vodooattempt'] + "1";
                    $addAttempt = mysql_query("UPDATE characters SET vodooattempt='".$newattempt."' WHERE id='".$char['id']."'");
                    if($chance <= "15")
                    {
                        $taking = floor($stealchar['gold'] * (mt_rand("1","25") / "100"));
                        $goldtaken = $stealchar['gold'] - $taking;
                        $remove = mysql_query("UPDATE characters SET gold='".$goldtaken."' WHERE username='".$whom."'");
                        $raisegold = $char['gold'] + $taking;
                        $give = mysql_query("UPDATE characters SET gold='".$raisegold."' WHERE id='".$_SESSION['userid']."'");
                        $data = "You gained ".number_format($taking)." gold from ".$whom."\'s pocket.<br /><br />";
                        $messagechat = "<strong><font color=\'#DD597D\'><b>".$whom."</b> had ".number_format($taking)." gold taken by a powerful source!</font></strong><br />";
                        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
                    }
                    else
                    {
                        $data = "Yoo did not succeed.<br /><br />";
                    }
                }
                else
                {
                    $data = "Yoo do not have enough gold.<br /><br />";
                }
            }else{
                $data = "Yoo cannot steal from someone withoww asset.<br /><br />";
            }
        }
        else
        {
            $data = "Yoo cannae steal from yooself.<br /><br />";
        }
    }
    else
    {
        $data = "No survivor with dat name.<br /><br />";
    }
    
    print("fillDiv('displayArea','".$data."<center>Aye, I see anotha survivor. Well are you feeling a bit down on your luck mahn? Have any of da other survivors given you any trouble? What can I do for ya?<br />Whom(Username): <input type=\'text\' id=\'whom\' /><br /><select id=\'what\'><option value=\'StealGold\'>Steal Gold</option><option value=\'StealBlood\'>Steal Blood</option></select><br /><input type=\'button\' value=\'Make Happen\' onclick=\'runVodoo();\' /><br />I will not guarantee all of these to work man.<br /><b>Stealing gold</b> works about 15% of the time at the cost of (10*UserLevel). You can get anywhere from 1-25% of their holdings.<br /><b>Stealing blood</b> works about 10% of the time at the cost of (15*UserLevel). You can get anywhere from 1-100 ounces of blood with a sucsessful steal.</center>');");
    
}
elseif($_POST['what'] == "StealBlood" && $_POST['whom'] != NULL)
{
    $getsteal = mysql_query("SELECT * FROM characters WHERE username='".$whom."'");
    if(mysql_num_rows($getsteal) == "1")   //check if the character exist
    {
        $stealchar = mysql_fetch_assoc($getsteal);
        if($char['username'] != $stealchar['username'])
        {
            if($stealchar['blood'] >= "0")
            {
                $cost = $stealchar['level'] * "15";
                if($char['gold'] >= $cost)
                {
                    $newgold = $char['gold'] - $cost;
                    $takegold = mysql_query("UPDATE characters SET gold='".$newgold."' WHERE id='".$_SESSION['userid']."'");
                    $chance = mt_rand("1","100");
                    $newattempt = $char['vodooattempt'] + "1";
                    $addAttempt = mysql_query("UPDATE characters SET vodooattempt='".$newattempt."' WHERE id='".$char['id']."'");
                    if($chance <= "10")
                    {
                        $taking = mt_rand("1","100");
                        $bloodtaken = $stealchar['blood'] - $taking;
                        if($bloodtaken < "0"){
                        	$taking = $stealchar['blood'];
                        	$bloodtaken = $stealchar['blood'];
                        }
                        $remove = mysql_query("UPDATE characters SET blood='".$bloodtaken."' WHERE username='".$whom."'");
                        $raiseblood = $char['blood'] + $taking;
                        $give = mysql_query("UPDATE characters SET blood='".$raiseblood."' WHERE id='".$_SESSION['userid']."'");
                        $data = "You gained ".number_format($taking)."oz. of blood from ".$whom."\'s pouch.<br /><br />";
                        $messagechat = "<strong><font color=\'#DD597D\'><b>".$whom."</b> had ".number_format($taking)." ounces of blood snatched by a powerful source!</font></strong><br />";
                        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
                    }
                    else
                    {
                        $data = "Yoo did not succeed.<br /><br />";
                    }
                }
                else
                {
                    $data = "Yoo do not have enough gold.<br /><br />";
                }
            }else{
                $data = "Yoo cannot steal from someone withoww asset.<br /><br />";
            }
        }
        else
        {
            $data = "Yoo cannae steal from yooself.<br /><br />";
        }
    }
    else
    {
        $data = "No survivor with dat name.<br /><br />";
    }
    
    print("fillDiv('displayArea','".$data."<center>Aye, I see anotha survivor. Well are you feeling a bit down on your luck mahn? Have any of da other survivors given you any trouble? What can I do for ya?<br />Whom(Username): <input type=\'text\' id=\'whom\' /><br /><select id=\'what\'><option value=\'StealGold\'>Steal Gold</option><option value=\'StealBlood\'>Steal Blood</option></select><br /><input type=\'button\' value=\'Make Happen\' onclick=\'runVodoo();\' /><br />I will not guarantee all of these to work man.<br /><b>Stealing gold</b> works about 15% of the time at the cost of (10*UserLevel). You can get anywhere from 1-25% of their holdings.<br /><b>Stealing blood</b> works about 10% of the time at the cost of (15*UserLevel). You can get anywhere from 1-100 ounces of blood with a sucsessful steal.</center>');");
    
}
else
{
    print("fillDiv('displayArea','".$data."<center>Aye, I see anotha survivor. Well are you feeling a bit down on your luck mahn? Have any of da other survivors given you any trouble? What can I do for ya?<br />Whom(Username): <input type=\'text\' id=\'whom\' /><br /><select id=\'what\'><option value=\'StealGold\'>Steal Gold</option><option value=\'StealBlood\'>Steal Blood</option></select><br /><input type=\'button\' value=\'Make Happen\' onclick=\'runVodoo();\' /><br />I will not guarantee all of these to work man.<br /><b>Stealing gold</b> works about 15% of the time at the cost of (10*UserLevel). You can get anywhere from 1-25% of their holdings.<br /><b>Stealing blood</b> works about 10% of the time at the cost of (15*UserLevel). You can get anywhere from 1-100 ounces of blood with a sucsessful steal.</center>');");
}
include('updatestats.php');
?>