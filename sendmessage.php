<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
include('active.php');

$date = time();
$message = str_replace("\\","\\\\", $_POST['chatMessage']);
$message = str_replace('"', '\"', $message);
if(substr($message, 0, 3) == "/g " && $char['userlevel'] != "1")
{
	$message = str_replace("<", "&lt;", $message);
	$message = str_replace(">", "&gt;", $message);
}
$message = str_replace("[plus]", "+", $message);
$message = str_replace("[amp]", "&", $message);
$message = str_replace("'", "\\'", $message);
$message = str_replace("+","\+",$message);
$message = str_replace("&","\&",$message);

if($char['username'] != NULL || $char['username'] != "")
{
    if(strlen($message) > "180" && $char['userlevel'] != "1")
    {
        print("alert('This string is too long');");
    }
    elseif($message == NULL || $message == "")
    {
        print("alert('You cannot send empty messages.');");
    }
    else
    {
        if(substr($message, 0, 3) == "/a " && $char['userlevel'] == "1")    //Announcement
        {
            $message = str_replace("/a ","",$message);
            $message = str_replace("/l1 ","<a href=\'http://",$message);
            $message = str_replace("/la ","riseimmortals.com/",$message);
            $message = str_replace("/l2 ","\' target=\'blank\'>",$message);
            $message = str_replace(" /l3","</a>",$message);
            $stamp = date("m/d/y");
            $announcementPost = "".$stamp." - ".$message."<br />";
            $sendIndex = mysql_query("INSERT INTO announcements (`announcement`) VALUES ('".$announcementPost."')");
            $message = "<strong><font color=\'#FFAA00\'>Announcement: ".$message."</font></strong><br />";
            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$charname."', '".$message."', 'Chatroom')");
        }
		elseif(substr($message, 0, 3) == "/g " && $char['userlevel'] == "1")    //Announcement
        {
            $message = str_replace("/g ","",$message);
            $message = str_replace("/l1 ","<a href=\'http://",$message);
            $message = str_replace("/la ","riseimmortals.com/",$message);
            $message = str_replace("/l2 ","\' target=\'blank\'>",$message);
            $message = str_replace(" /l3","</a>",$message);
            $stamp = date("m/d/y");
            $announcementPost = "".$stamp." - ".$message."<br />";
            $message = "<strong><font color=\'#FFAA00\'>".$message."</font></strong><br />";
            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$charname."', '".$message."', 'Chatroom')");
        }
        elseif(substr($message, 0, 8) == "/remove " && $char['userlevel'] == "1")    //Removing characters from the game
        {
            $removeuser = substr($message, 8);

            $message = "<b><font color=\'#F70000\'>Player ".$removeuser." has been brutally murdered and will not be returning!</font></b><br />";

            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
            VALUES ('".$date."', '3', '".$char['username']."', '".$message."', 'Chatroom')") or die(mysql_error());

            $query = mysql_query("DELETE FROM characters WHERE username='".$removeuser."' ");
        }
        elseif(substr($message, 0, 3) == "/id")
        {
            $player = substr($message, 4);
            $readidplayer = mysql_query("SELECT * FROM characters WHERE username='".$player."' ") or die(mysql_error());
            $idplayer = mysql_fetch_assoc($readidplayer);

            $iduser = "<font color=\'#FF0000\'><strong>".$player."</strong> is a level ".number_format($idplayer['level'])." ".$idplayer['gender']." ".$idplayer['class']."";
			if($idplayer['guild'] != "None")
			{
				$iduser .= " and belongs to the Guild <strong>".$idplayer['guild']."</strong>";
			}
			$iduser .= ".";

            if($char['userlevel'] < "3" && $idplayer['username'] != "Vulcan")
            {
                $iduser = $iduser." [<a href=\'javascript:checkIP(\"".$idplayer['ip']."\");\'><font color=\'#DD0000\' style=\'text-decoration:none\'>".$idplayer['ip']."</font></a>]";
            }

            $iduser = $iduser."</font><br />";

            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`)
            VALUES ('".$date."', '4', '".$char['username']."', '".$char['username']."', '".$iduser."')") or die(mysql_error());
        }
        elseif(substr($message, 0, 3) == "/ip" && $char['userlevel'] < "3")
        {
            $checkip = substr($message, 4);
            $data = "";
            $num = "1";
            $getips = mysql_query("SELECT * FROM characters WHERE ip='".$checkip."'");
            while($ips = mysql_fetch_array($getips))
            {
                if($num < mysql_num_rows($getips))
                {
                    $data .= $ips['username'].", ";
                }
                else
                {
                    $data .= $ips['username'].".";
                }
                $num ++;
            }
            $message = "<b><font color=\'#DD0000\'>".mysql_num_rows($getips)." Results for (".$checkip."): ".$data."</font></b><br />";
            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
            VALUES ('".$date."', '4', 'PM', '".$message."', '".$char['username']."')") or die(mysql_error());
        }
        elseif(substr($message, 0, 5) == "/warn" && $char['userlevel'] < "3")
        {
            $warnuser = substr($message, 6);

            $message = "<b><font color=\'#DD0022\'>Player ".$warnuser." has been issued a warning!</font></b><br />";

            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
            VALUES ('".$date."', '3', '".$char['username']."', '".$message."', 'Chatroom')") or die(mysql_error());

            $query = mysql_query("SELECT * FROM warnings WHERE username='".$warnuser."' ");
            $userwarning = mysql_fetch_assoc($query);

            $newwarning = $userwarning['warning'] + "1";
            $query = mysql_query("UPDATE warnings SET warnings='".$newwarning."' WHERE username='".$warnuser."' ");
        }
        elseif(substr($message, 0, 4) == "/mod" && $char['userlevel'] < "3")
        {
            $message = "<a href=\'javascript:modchat(\"".$char['username']."\");\'><b><font color=\'#008888\'>".$char['username'].": ".substr($message, 5)." [Mod Chat]</font></b></a><br />";

            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
            VALUES ('".$date."', '4', '".$char['username']."', '".$message."', 'Mod')") or die(mysql_error());
        }
        elseif(substr($message, 0, 9) == "/givegold" && $char['userlevel'] == "1")
        {
            $goldstr = explode(":",$message);
            if($goldstr['0'] != "" && $goldstr['1'] != "" && $goldstr['2'] != "")
            {
                $goldmessage = "<b><font color=\'#DD00DD\'>".$goldstr['1']." stumbled across ".number_format($goldstr['2'])." gold and begins kissing the dirt!</font></b><br />";

                $goldamount = $goldstr['2'];
                $usergive = $goldstr['1'];
                
                $qwerygold = mysql_query("UPDATE characters SET gold=gold+'".$goldamount."' WHERE username='".$usergive."'");

                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
                VALUES ('".$date."', '3', '".$char['username']."', '".$goldmessage."', 'Chatroom')") or die(mysql_error());
            }
            else
            {
                print("alert('The format is /givegold:username:amount');");
            }
        }
        elseif(substr($message, 0, 9) == "/givecash" && $char['userlevel'] == "1")
        {
            $cashstr = explode(":",$message);
            if($cashstr['0'] != "" && $cashstr['1'] != "" && $cashstr['2'] != "")
            {
                $cashmessage = "<strong><font color=\'#9933FF\'><b>".$cashstr['1']."</b> just made a purchase from the Purchase page, for the amount of ".$cashstr['2']." game cash!<br />Congratulations on all your success!</font></strong><br />";

                $cashamount = $cashstr['2'];
                $newcash = $cashamount;
                $usergive = $cashstr['1'];
                
                $qwerycash = mysql_query("UPDATE characters SET cash=cash+'".$newcash."', networth=networth+'".$newcash."' WHERE username='".$usergive."'");

                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
                VALUES ('".$date."', '3', '".$char['username']."', '".$cashmessage."', 'Chatroom')") or die(mysql_error());
            }
            else
            {
                print("alert('The format is /givecash:username:amount');");
            }
        }
        elseif(substr($message, 0, 5) == "/mute" && $char['userlevel'] < "3")
        {
            $mutestr = explode(":",$message);
            if($mutestr['0'] != "" && $mutestr['1'] != "" && $mutestr['2'] != "")
            {
                $mutemessage = "<b><font color=\'#DD00DD\'>Player ".$mutestr['1']." has been silenced!</font></b><br />";

                $mutetime = time() + (floor($mutestr['2'] * "60"));
                $date = date('ymdHi');
                print("alert('".time()." / ".$mutetime."');");
                $query = mysql_query("INSERT INTO muted (`username`, `mutedby`, `mutetime`)
                VALUES ('".$mutestr['1']."', '".$char['username']."', '".$mutetime."')") or die(mysql_error());

                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
                VALUES ('".$date."', '3', '".$char['username']."', '".$mutemessage."', 'Chatroom')") or die(mysql_error());
            }
            else
            {
                print("alert('The format is /mute:username:length');");
            }
        }
        elseif(substr($message, 0, 7) == "/unmute" && $char['userlevel'] < "3")
        {
            $unmuteuser = substr($message, 8);
            $unmutemessage = "<b><font color=\'#DD00DD\'>Player ".substr($message, 8)." has been unmuted!</font></b><br />";

            $query = mysql_query("DELETE FROM muted WHERE username='".$unmuteuser."' ") or die(mysql_error());

            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
            VALUES ('".$date."', '3', '".$char['username']."', '".$unmutemessage."', 'Chatroom')") or die(mysql_error());
        }
        elseif(substr($message, 0, 8) == "/suspend" && $char['userlevel'] <= "2")
        {
            $mutestr = explode(":",$message);
            if($mutestr['0'] != "" && $mutestr['1'] != "" && $mutestr['2'] != "" && $mutestr['3'] != "")
            {
                $suspendmessage = "<b><font color=\'#DD00DD\'>Player ".$mutestr['1']." has been suspended for ".number_format($mutestr['2'])." hours! Reason: ".$mutestr['3']."</font></b><br />";

                $date = date('ymdHi');
				$suspendtill = time() + (floor(($mutestr['2'] * "60") * "60"));
                $setstatus = mysql_query("UPDATE characters SET status='Suspended', lastactive='0', endsuspend='".$suspendtill."', reason='".$mutestr['3']."' WHERE username='".$mutestr['1']."'");

                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
                VALUES ('".$date."', '3', '".$char['username']."', '".$suspendmessage."', 'Chatroom')") or die(mysql_error());
            }
            else
            {
                print("alert('The format is /suspend:username:hours:reason');");
            }
        }
        elseif(substr($message, 0, 4) == "/ban" && $char['userlevel'] < "2")
        {
            $banuser = substr($message, 5);
            $banmessage = "<b><font color=\'#DDDD00\'>Player ".$banuser." has been banned!</font></b><br />";

            $getbanned = mysql_query("SELECT * FROM characters WHERE username='".$banuser."'");
            $banned = mysql_fetch_assoc($getbanned);
            $banip = $banned['ip'];

            $query = mysql_query("INSERT INTO banned (`ip`)
            VALUES ('".$banip."')") or die(mysql_error());

            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
            VALUES ('".$date."', '3', '".$char['username']."', '".$banmessage."', 'Chatroom')") or die(mysql_error());
        }
        elseif(substr($message, 0, 2) == "/e")
        {
            $query = mysql_query("SELECT username FROM muted WHERE username='".$char['username']."' ") or die(mysql_error());
            if(mysql_num_rows($query)==1)
            {
                print("alert('You are currently muted!');");
            }
            else
            {
                $message = str_replace("/e ","",$message);
                $message1 = "<i><a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#DDBB00\'>".$char['username']."</font></a><font color=\'#DDBB00\'> ".$message."</font></i>";

                if($char['userlevel'] == "1")
                {
                    $message1 = "<b>".$message1."</b>";
                }
                $message1 = $message1."<br />";

                $userpostlevel = $char['userlevel'];
                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
                VALUES ('".$date."', '3', '".$char['username']."', '".$message1."', 'Chatroom')") or die(mysql_error());
            }
        }
        elseif(substr($message, 0, 7) == "/guild ")
        {
            $query = mysql_query("SELECT username FROM muted WHERE username='".$char['username']."' ") or die(mysql_error());
            if(mysql_num_rows($query)==1)
            {
                print("alert('You are currently muted!');");
            }
            else
            {
                $timestamp = date("H:i:s");
                $message = str_replace("/guild ", "", $message);

                if($message != "")
                {
                    $message = "<font color=\'#DD00DD\'><strong>Guild:</strong></font> (<a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#DD00DD\' style=\'text-decoration:none\'>".$charname."</font></a>)<font color=\'#DD00DD\'>: ".$message." [".$date."]</font><br />";

                    $getmembers = mysql_query("SELECT * FROM characters WHERE guild='".$charguild."'");
                    while($member = mysql_fetch_array($getmembers))
                    {
                        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$timestamp."', '4', 'PM', '".$member['username']."', '".$message."')");
                    }
                }
            }
        }
        elseif(substr($message, 0, 3) == "/m ")
        {
            $query = mysql_query("SELECT username FROM muted WHERE username='".$char['username']."' ") or die(mysql_error());
            if(mysql_num_rows($query)==1)
            {
                print("alert('You are currently muted!');");
            }
            else
            {
                $datestamp = date("H:i:s");
                $message1 = strstr($message, ':');
                $message2 = substr($message1, 1);

                $pos = strpos($message, ":");
                $pos = $pos - "3";
                $touser = substr($message, 3, $pos);

                if($message2 != "" && $message2 != " " && $message2 != NULL)
                {
                	$whatTimeIsIt = time();
                	$findTo = mysql_query("SELECT * FROM characters WHERE username='".$touser."'");
                	$toTime = mysql_fetch_assoc($findTo);
                	$charLastActive = $toTime['lastactive'] + 700;
                	if($whatTimeIsIt > $charLastActive){
                		$message3 = "<font color=\'#FF7700\'>From </font><a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#FF7700\' style=\'text-decoration:none\'>".$charname."</font></a><font color=\'#FF7700\'>: ".$message2." [".$date."]</font><br />";
                		$message3half = "<font color=\'#FF7700\'>From </font><a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#FF7700\' style=\'text-decoration:none\'>".$charname."</font></a><font color=\'#FF7700\'>: ".$message2." [".$date."]</font><br />";
	                    $message4 = "<font color=\'#FF7700\'>To </font><a href=\'javascript:toptell(\"".$touser."\");\'><font color=\'#FF7700\' style=\'text-decoration:none\'>".$touser."</font></a><font color=\'#FF7700\'>: ".$message2." [".$date."]</font><br />";
	
	                    $query = mysql_query("INSERT INTO chatroommessage (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$touser."', '".$message3."')");
	                    
	                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$touser."', '".$message3half."')");
	
	                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$char['username']."', '".$message4."')");
                	}else{
	                    $message3 = "<font color=\'#FF7700\'>From </font><a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#FF7700\' style=\'text-decoration:none\'>".$charname."</font></a><font color=\'#FF7700\'>: ".$message2." [".$date."]</font><br />";
	                    $message4 = "<font color=\'#FF7700\'>To </font><a href=\'javascript:toptell(\"".$touser."\");\'><font color=\'#FF7700\' style=\'text-decoration:none\'>".$touser."</font></a><font color=\'#FF7700\'>: ".$message2." [".$date."]</font><br />";
	
	                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$touser."', '".$message3."')");
	
	                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$char['username']."', '".$message4."')");
                	}
                }
            }
        }
        elseif(substr($message, 0, 13) == "/castaffinity")
        {
            $caststr = explode(":",$message);
            $spell = explode(', ', $char['spells']);
            if($caststr[1] != NULL && $caststr[2] != NULL){
            	$findCharacter = mysql_query("SELECT * FROM characters WHERE username='".$caststr[1]."'");
            	if(mysql_num_rows($findCharacter) > 0){
            		if($caststr[2] == "Might" || $caststr[2] == "Might II" || $caststr[2] == "Might III" || $caststr[2] == "Might IV" || $caststr[2] == "Might V" || $caststr[2] == "Speed" || $caststr[2] == "Speed II" || $caststr[2] == "Speed III" || $caststr[2] == "Speed IV" || $caststr[2] == "Speed V" || $caststr[2] == "Constitution" || $caststr[2] == "Constitution II" || $caststr[2] == "Constitution III" || $caststr[2] == "Constitution IV" || $caststr[2] == "Constitution V" || $caststr[2] == "Intelligence" || $caststr[2] == "Intelligence II" || $caststr[2] == "Intelligence III" || $caststr[2] == "Intelligence IV" || $caststr[2] == "Intelligence V" || $caststr[2] == "Concentration" || $caststr[2] == "Concentration II" || $caststr[2] == "Concentration III" || $caststr[2] == "Concentration IV" || $caststr[2] == "Concentration V"){
            			if(in_array($caststr[2], $spell)){
            				if($caststr[2] == "Might"){
            					$manaCost = "1000";
            				}elseif($caststr[2] == "Might II"){
            					$manaCost = "2500";
            				}elseif($caststr[2] == "Might III"){
            					$manaCost = "7500";
            				}elseif($caststr[2] == "Might IV"){
            					$manaCost = "20000";
            				}elseif($caststr[2] == "Might V"){
            					$manaCost = "50000";
            				}elseif($caststr[2] == "Speed"){
            					$manaCost = "1000";
            				}elseif($caststr[2] == "Speed II"){
            					$manaCost = "2500";
            				}elseif($caststr[2] == "Speed III"){
            					$manaCost = "7500";
            				}elseif($caststr[2] == "Speed IV"){
            					$manaCost = "20000";
            				}elseif($caststr[2] == "Speed V"){
            					$manaCost = "50000";
            				}elseif($caststr[2] == "Constitution"){
            					$manaCost = "1000";
            				}elseif($caststr[2] == "Constitution II"){
            					$manaCost = "2500";
            				}elseif($caststr[2] == "Constitution III"){
            					$manaCost = "7500";
            				}elseif($caststr[2] == "Constitution IV"){
            					$manaCost = "20000";
            				}elseif($caststr[2] == "Constitution V"){
            					$manaCost = "50000";
            				}elseif($caststr[2] == "Intelligence"){
            					$manaCost = "1000";
            				}elseif($caststr[2] == "Intelligence II"){
            					$manaCost = "2500";
            				}elseif($caststr[2] == "Intelligence III"){
            					$manaCost = "7500";
            				}elseif($caststr[2] == "Intelligence IV"){
            					$manaCost = "20000";
            				}elseif($caststr[2] == "Intelligence V"){
            					$manaCost = "50000";
            				}elseif($caststr[2] == "Concentration"){
            					$manaCost = "1000";
            				}elseif($caststr[2] == "Concentration II"){
            					$manaCost = "2500";
            				}elseif($caststr[2] == "Concentration III"){
            					$manaCost = "7500";
            				}elseif($caststr[2] == "Concentration IV"){
            					$manaCost = "20000";
            				}elseif($caststr[2] == "Concentration V"){
            					$manaCost = "50000";
            				}else{
            					print("alert('Error casting Affinity. Cannot generate mana cost.');");
            					die();
            				}
            				
            				if($char['mana'] >= $manaCost){
            					$castto = mysql_fetch_assoc($findCharacter);
            					$openblessing = explode(", ", $castto['blessing']);
            					if($openblessing[0] == "None"){
            						$newBlessingString = $caststr[2].", ".$openblessing[1].", ".$openblessing[2].", ".$openblessing[3].", ".$openblessing[4].", ".$openblessing[5].", ".$openblessing[6].", ".$openblessing[7].", ".$openblessing[8]."";
            					}elseif($openblessing[1] == "None"){
            						$newBlessingString = $openblessing[0].", ".$caststr[2].", ".$openblessing[2].", ".$openblessing[3].", ".$openblessing[4].", ".$openblessing[5].", ".$openblessing[6].", ".$openblessing[7].", ".$openblessing[8]."";
            					}elseif($openblessing[2] == "None"){
            						$newBlessingString = $openblessing[0].", ".$openblessing[1].", ".$caststr[2].", ".$openblessing[3].", ".$openblessing[4].", ".$openblessing[5].", ".$openblessing[6].", ".$openblessing[7].", ".$openblessing[8]."";
            					}elseif($openblessing[3] == "None"){
            						$newBlessingString = $openblessing[0].", ".$openblessing[1].", ".$openblessing[2].", ".$caststr[2].", ".$openblessing[4].", ".$openblessing[5].", ".$openblessing[6].", ".$openblessing[7].", ".$openblessing[8]."";
            					}elseif($openblessing[4] == "None"){
            						$newBlessingString = $openblessing[0].", ".$openblessing[1].", ".$openblessing[2].", ".$openblessing[3].", ".$caststr[2].", ".$openblessing[5].", ".$openblessing[6].", ".$openblessing[7].", ".$openblessing[8]."";
            					}elseif($openblessing[5] == "None"){
            						$newBlessingString = $openblessing[0].", ".$openblessing[1].", ".$openblessing[2].", ".$openblessing[3].", ".$openblessing[4].", ".$caststr[2].", ".$openblessing[6].", ".$openblessing[7].", ".$openblessing[8]."";
            					}elseif($openblessing[6] == "None"){
            						$newBlessingString = $openblessing[0].", ".$openblessing[1].", ".$openblessing[2].", ".$openblessing[3].", ".$openblessing[4].", ".$openblessing[5].", ".$caststr[2].", ".$openblessing[7].", ".$openblessing[8]."";
            					}elseif($openblessing[7] == "None"){
            						$newBlessingString = $openblessing[0].", ".$openblessing[1].", ".$openblessing[2].", ".$openblessing[3].", ".$openblessing[4].", ".$openblessing[5].", ".$openblessing[6].", ".$caststr[2].", ".$openblessing[8]."";
            					}elseif($openblessing[8] == "None"){
            						$newBlessingString = $openblessing[0].", ".$openblessing[1].", ".$openblessing[2].", ".$openblessing[3].", ".$openblessing[4].", ".$openblessing[5].", ".$openblessing[6].", ".$openblessing[7].", ".$caststr[2]."";
            					}else{
            						print("alert('Error casting Affinity. Characters Affinity slots are already full.');");
            						die();
            					}
            					$giveUserAffinity = mysql_query("UPDATE characters SET blessing='".$newBlessingString."' WHERE username='".$caststr[1]."'");
            					$subtractMana = mysql_query("UPDATE characters SET mana=mana-'".$manaCost."' WHERE id='".$char['id']."'");
            					print("alert('You cast ".$caststr[2]." upon ".$caststr[1]."');");
            					$datestamp = date("H:i:s");
            					$message = "<a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#FF7700\' style=\'text-decoration:none\'>".$charname."</font></a><font color=\'#FF7700\'> has cast ".$caststr[2]." upon you!</font><br />";
								$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$castto['username']."', '".$message."')");
								include('updatestats.php');
            				}else{
            					print("alert('Error casting Affinity. You do not have enough mana.');");
            				}
            			}else{
            				print("alert('Error casting Affinity. You do not have this spell.');");
            			}
            		}else{
            			print("alert('Error casting Affinity. Invalid spell name.');");
            		}
            	}else{
            		print("alert('Error casting Affinity. Failed to find user.');");
            	}
            }else{
            	print("alert('Error casting Affinity. Format is /castaffinity:(username):(Exact Spell Name. Example: Might V, not might v)');");
            }
        }
        elseif($char['username'] != NULL)
        {
            $query = mysql_query("SELECT * FROM muted WHERE username='".$char['username']."'") or die(mysql_error());
            if(mysql_num_rows($query) > "0")
            {
                print("alert('You are currently muted!');");
            }
            else
            {
				
            	if($char['userlevel'] != "1"){
					$message = strip_tags($message);
					$message = str_replace("<input", "", $message);
					$message = str_replace("<table", "", $message);
					$message = str_replace("<div", "", $message);
				}
            	$preGetGuild = mysql_query("SELECT * FROM guilds WHERE name='".$char['guild']."'");
            	$getGuild = mysql_fetch_assoc($preGetGuild);
            	$getGuildTag = $getGuild['tag'];
            	if($char['guild'] == "" || $char['guild'] == "None")
            	{
            		$getGuildTag = "User";
            	}
                if($char['userlevel'] == "1"){
                $userStatus = "".$getGuildTag."-Admin";
                }elseif($char['userlevel'] == "2"){
                $userStatus = "".$getGuildTag."-<font color=\'red\'>Moderator</font>";
                    if($char['chatcolour'] == "00DDDD"){
                     $modupdate = mysql_query("UPDATE characters SET chatcolour='BBBBBB' WHERE username='".$char['username']."'");
                    }
                }elseif($char['userlevel'] == "3"){
                $userStatus = "".$getGuildTag."";
                }
                $addDate = "(".date("H:i").")";
               
                $message1 = "".$addDate."<a href=\'javascript:toptell(\"".$char['username']."\");\'><font color=\'#".$char['chatcolour']."\'>".$char['username']."(".$userStatus."):</font></a> <font color=\'white\'>".$message."</font>";

                if($char['userlevel'] == "1")
                {
                    $message1 = "<b>".$message1."</b>";
                }
                $message1 = $message1."<br />";

                $userpostlevel = $char['userlevel'];
                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)
                VALUES ('".$date."', '3', '".$char['username']."', '".$message1."', 'Chatroom')") or die(mysql_error());
            }
            $query = mysql_query("UPDATE characters SET lastactive='".$date."' WHERE username='".$char['username']."' ") or die(mysql_error());
        }
    }
}
else
{
    print("alert('You do not appear to be logged in.');");
    print("window.location = 'http://riseimmortals.com/';");
}
if(strlen($message) <= "180")
{
    print("readChatroom2();");
}
?>