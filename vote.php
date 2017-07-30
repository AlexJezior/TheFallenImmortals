<?php

    session_name("icsession");

	session_start();

	include('db.php');

	$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());

	$char = mysql_fetch_assoc($getchar)or die(mysql_error());

	$display = "<strong><a href=\"javascript: closeSecondPage();\">Close</a> | <a href=\"javascript: viewVote();\">Back</a></strong><br /><br />";	

	$display .= "<strong style=\"margin: 5px;\">Welcome to the voting page.</strong><br /> This helps the website accumulate players, and even the people you have meet already! <br /><br /><strong>Note:</strong><br />-Vote on all sites and recieve a reward daily!(Once every 24 hours)<br />-Vote 14 days in a row(with each vote 24-36 hours apart from each other) and be rewarded one cash!<br /><br /><br />";

	

	

	

	

	if($char['votecompleted'] <= time()){

		if($_POST['reward'] != NULL && $char['vote'] == "Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes"){

			if($_POST['reward'] == "gold"){

				

				$messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." has voted on the Vote Page and recieved 5,000 Gold as a reward!</font></strong><br />";

                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')")or die(mysql_error());

				$display .= "<font size=\'14px\'><center>You recieve 5,000 gold for voting!</center></font>";

				$newgold = $char['gold'] + "5000";

				$updateGold = mysql_query("UPDATE characters SET gold='".$newgold."' WHERE id='".$_SESSION['userid']."'")or die(mysql_error());

				

			}elseif($_POST['reward'] == "statpoints"){

				

				$messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." has voted on the Vote Page and recieved 10 Statpoints as a reward!</font></strong><br />";

                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')")or die(mysql_error());

				$display .= "<font size=\'14px\'><center>You recieve 10 Statpoints for voting!</center></font>";

				$newstatpoints = $char['stats'] + "10";

				$updateStatpoints = mysql_query("UPDATE characters SET stats='".$newstatpoints."' WHERE id='".$_SESSION['userid']."'")or die(mysql_error());

				

			}elseif($_POST['reward'] == "blood"){

				

				$messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." has voted on the Vote Page and recieved 100 oz. of Blood as a reward!</font></strong><br />";

                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')")or die(mysql_error());

				$display .= "<font size=\'14px\'><center>You recieve 100 oz. of blood for voting!</center></font>";

				$newblood = $char['blood'] + "100";

				$updateBlood = mysql_query("UPDATE characters SET blood='".$newblood."' WHERE id='".$_SESSION['userid']."'")or die(mysql_error());

				

			}else{

				

				$display .= "No such reward!";

				die();

				

			}
			
			$consecutivevotemax = $char['votecompleted'] + 43200;
			if($consecutivevotemax >= time() || $char['consecutivevotes'] == 0){
				$newconsecutive = $char['consecutivevotes'] + 1;
				if($newconsecutive == 14){
					$givecc = mysql_query("UPDATE characters SET cash=cash+'1' WHERE id='".$_SESSION['userid']."'")or die(mysql_error());
					$newconsecutive = 0;
					$messagechat = "<strong><font color=\'#CCFF00\'>!!!As a reward for voting 14 consecutive days, ".$char['username']." recieved 1 Cash!!!</font></strong><br />";
                	$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')")or die(mysql_error());
				}
			}else{
				$newconsecutive = 1;
			}
			$updateVotes = mysql_query("UPDATE characters SET consecutivevotes='".$newconsecutive."' WHERE id='".$_SESSION['userid']."'")or die(mysql_error());

			

			$newtime = time() + 86400;

			$updateTime = mysql_query("UPDATE characters SET votecompleted='".$newtime."' WHERE id='".$_SESSION['userid']."'")or die(mysql_error());

		}else{

		    $charVote = explode(', ', $char['vote']);

		    if($_POST['link'] == "1"){

		    	$charVote[0] = "Yes";

		    }elseif($_POST['link'] == "2"){

		    	$charVote[1] = "Yes";

		    }elseif($_POST['link'] == "3"){

		    	$charVote[2] = "Yes";

		    }elseif($_POST['link'] == "4"){

		    	$charVote[3] = "Yes";

		    }elseif($_POST['link'] == "5"){

		    	$charVote[4] = "Yes";

		    }elseif($_POST['link'] == "6"){

		    	$charVote[5] = "Yes";

		    }elseif($_POST['link'] == "7"){

		    	$charVote[6] = "Yes";

		    }elseif($_POST['link'] == "8"){

		    	$charVote[7] = "Yes";

		    }elseif($_POST['link'] == "9"){

		    	$charVote[8] = "Yes";

		    }elseif($_POST['link'] == "10"){

		    	$charVote[9] = "Yes";

		    }elseif($_POST['link'] == "11"){

		    	$charVote[10] = "Yes";

		    }elseif($_POST['link'] == "12"){

		    	$charVote[11] = "Yes";

		    }elseif($_POST['link'] == "13"){

		    	$charVote[12] = "Yes";

		    }elseif($_POST['link'] == "14"){

		    	$charVote[13] = "Yes";

		    }elseif($_POST['link'] == "15"){

		    	$charVote[14] = "Yes";

		    }

		    $newVote = "".$charVote[0].", ".$charVote[1].", ".$charVote[2].", ".$charVote[3].", ".$charVote[4].", ".$charVote[5].", ".$charVote[6].", ".$charVote[7].", ".$charVote[8].", ".$charVote[9].", ".$charVote[10].", ".$charVote[11].", ".$charVote[12].", ".$charVote[13].", ".$charVote[14]."";

		    $updateVote = mysql_query("UPDATE characters SET vote='".$newVote."' WHERE id='".$_SESSION['userid']."'");

		    

		    if($charVote[0] == "No"){

		    	$display .= "<a target=\"_blank\" onclick=\"vote(1);\" href=\'http://apexwebgaming.com/\' title=\'MMORPGs\'><img alt=\'MMORPGs\' title=\'MMORPGs\' src=\'http://apexwebgaming.com/images/vote_button_1.gif\' /></a>";

		    }

		    if($charVote[1] == "No"){

		    	$display .= "<a target=\"_blank\" onclick=\"vote(2);\" href=\"http://www.topgamesites.net/mmorpg\" title=\"Free MMORPG / MPOG Games\"> <img src=\"http://www.topgamesites.net/images/22.jpg\" border=\"0\" alt=\"Free MMORPG / MPOG Games\" /></a>";

		    }

		    if($charVote[2] == "No"){

		    	$display .= "<a target=\"_blank\" onclick=\"vote(3);\" href=\"http://www.gtop100.com/in.php?site=63331\" title=\"Top 100 MMORPG / MPOG sites\"><img src=\"http://www.gtop100.com/images/votebutton.jpg\" border=\"0\" alt=\"Top 100 MMORPG / MPOG sites\"></a>";

		    }

		    if($charVote[3] == "No"){

		    	$display .= "<a target=\"_blank\" onclick=\"vote(4);\" href=\"http://www.gamesites100.net/in.php?site=22443\" title=\"MMORPG / MPOG Top 100\"><img src=\"http://www.Gamesites100.net/images/votebutton.jpg\" border=\"0\" alt=\"MMORPG / MPOG Top 100\"/></a>";

		    }

		    if($charVote[4] == "No"){

		    	$display .= "<a href=\"http://www.pbbgames.com/site/vote/id/260\" onclick=\"vote(5);\" target=\"_blank\"><img src=\"http://www.pbbgames.com/images/landpage.jpg\" border=\"0\" alt=\"MPOGD\" /></a><br />";

		    }
			
			if($charVote[5] == "No"){

		    	$display .= "<a onclick=\"vote(6);\" href=\"http://topofgames.com/index.php?do=votes&amp;id=55619\" target=\"_blank\"><img border=\"0\" src=\"http://pics.livejournal.com/samaritanyn/pic/0006xbhs.gif\" alt=\"topofgames.com\"></a>";

		    }
			
			if($charVote[6] == "No"){

		    	$display .= "<a onclick=\"vote(7);\" target=\"_blank\" href=\"http://lotustop100.com/servers/in.php?site=2380\"><img border=\"0\" src=\"http://lotustop100.com/images/lotus88x51.jpg\" alt=\"Lotus Top 100\" /></a>";

		    }
			
			if($charVote[7] == "No"){

		    	$display .= "<a onclick=\"vote(8);\" target=\"_BLANK\" href=\'http://www.rivaltoplist.com/system/index.php?page=inVote&id=NTdDTjQ4M1gyYWxRTw==\'><img src=\'http://www.rivaltoplist.com/images/vote.gif\' border=\'0\'/></a>";

		    }
			
			if($charVote[8] == "No"){

		    	$display .= "<a onclick=\"vote(9);\" href=\'http://gigatoplist.com/index.php?p=Vote&uid=791\' target=\'_blank\' ><img src=\'http://gigatoplist.com/images/vote/gtl1.png\' alt=\'list of games\' border=\'0\'></a>";

		    }
			
			if($charVote[9] == "No"){

		    	$display .= "<a onclick=\"vote(10);\" target=\"_BLANK\" href=\"http://www.mmotopsite.com/\"><img src=\"http://www.mmotopsite.com/button.php?u=RiseImmortals\" alt=\"MMO Topsites\" border=\"0\" /></a><br />";

		    }
			
			if($charVote[10] == "No"){

		    	$display .= "<a onclick=\"vote(11);\" href=\"http://www.directoryofgames.com/main.php?view=topgames&action=vote&v_tgame=1788\" target=\"_blank\"><img src=\"http://www.directoryofgames.com/images/banners/180x32directoryofgames.gif\" width=\"180\" height=\"32\"></a>";

		    }
			
			if($charVote[11] == "No"){

		    	$display .= "<a onclick=\"vote(12);\" href=\"http://www.topfreegameservers.com/mmorpg/mmorpg_mpog/the_fallen_immortals.htm\" target=\"_BLANK\" title=\"Mmorpg & Mpog The Fallen Immortals!\" > <img src=\"http://www.topfreegameservers.com/images/vote.jpg\" border=\"0\" alt=\"Mmorpg & Mpog The Fallen Immortals!\"></a>";

		    }
			
			if($charVote[12] == "No"){

		    	$display .= "<a onclick=\"vote(13);\" href=\"http://www.topgamespro.com/vote/the-fallen-immortals_4650.html\" title=\"Free Private Server and Websites - Dungeon & Dragons Online - TopGamesPro - www.topgamespro.com\" target=\"_blank\"><img src=\"http://www.topgamespro.com/files/images/vote3.gif\" border=\"0\" alt=\"Free Private Server and Websites - Dungeon & Dragons Online - TopGamesPro - www.topgamespro.com\" /></a>";

		    }
			
			if($charVote[13] == "No"){

		    	$display .= "<a target=\"_BLANK\" onclick=\"vote(14);\" href=\"http://www.mpog100.com/\"><img src=\"http://www.mpog100.com/images/mpogbg.gif\" alt=\"top free multiplayer online rpg games\" border=\"0\" /></a>";

		    }
			
			if($charVote[14] == "No"){

		    	$display .= "<a onclick=\"vote(15);\" target=\"_BLANK\" href=\"http://top-game-sites.com/cat_/Ajezior\"><img src=\"http://top-game-sites.com/images/button.png\" alt=\"Top Game Sites\" border=\"0\" /></a>";

		    }
			

		    

		    if($charVote[0] == "Yes" && $charVote[1] == "Yes" && $charVote[2] == "Yes" && $charVote[3] == "Yes" && $charVote[4] == "Yes" && $charVote[5] == "Yes" && $charVote[6] == "Yes" && $charVote[7] == "Yes" && $charVote[8] == "Yes" && $charVote[9] == "Yes" && $charVote[10] == "Yes" && $charVote[11] == "Yes" && $charVote[12] == "Yes" && $charVote[13] == "Yes" && $charVote[14] == "Yes"){

		    	$display .= "Collect for voting: <input type=\'button\' value=\'5,000 Gold\' onclick=\'voteReward(\"gold\");\'>&nbsp;<input type=\'button\' value=\'100 Blood\' onclick=\'voteReward(\"blood\");\'>&nbsp;<input type=\'button\' value=\'10 Statpoints\' onclick=\'voteReward(\"statpoints\");\'>";

		    }

		}

	 

	}else{

		$comeBack = $char['votecompleted'] - time() + 115200;

		$comeBack = date("H:i:s",$comeBack);

		$display .= "You have already voted today. Come back in <strong>".$comeBack."</strong>.<br />Consecutive Votes for cash: ".$char['consecutivevotes']."";



	}

	if($char['vote'] == "Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes, Yes" && $char['votecompleted'] <= time() && $char['votecompleted'] != "0"){

		$newvotes = "No, No, No, No, No, No, No, No, No, No, No, No, No, No, No";

		$updatevotes = mysql_query("UPDATE characters SET vote='".$newvotes."' WHERE id='".$_SESSION['userid']."'")or die("PROBREM!");

		include('vote.php');

		die();

	}

    

    

    print("fillDiv('secondPage','".$display."');");

    include('updatestats.php');

?>