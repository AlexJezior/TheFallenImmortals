<?php

session_name("icsession");

session_start();

include('db.php');



$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");

$char = mysql_fetch_assoc($getchar);



$gettemple = mysql_query("SELECT * FROM temple");

$temple = mysql_fetch_assoc($gettemple);



if($_POST['amount'] >= 0 && ctype_digit($_POST['amount']))

{

    $amount = $_POST['amount'];

    

    if($char['gold'] < $amount)

    {

    

        $data = "I\'m sorry, it seems as though you are just as broke as we are. Come back when you have obtained more gold.<br />";

    }

    else

    {

        

        $byegold = $char['gold'] - $amount;

        $update = mysql_query("UPDATE characters SET gold='".$byegold."', temple='1' WHERE id='".$_SESSION['userid']."'");

        $add = $temple['pot'] + $amount;

        $moregold = mysql_query("UPDATE temple SET pot='".$add."'");

        $addUserToLotto = mysql_query("INSERT INTO donationpot (`username`) VALUES ('".$char['username']."')")or die("alert('Can't add to dpot, Tell an Admin!');");

        $data = "Your contribution of ".number_format($amount)." has been added to our donations, thank you!<br />";

        $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." donated ".number_format($amount)." gold to the reform efforts of the Temple!</font></strong><br />";

        $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

        

        

        if($amount >= 250000 || $char['level'] < "250"){

        
			if($char['level'] < "250"){
				$random01 = rand(1,1);

            	$random02 = rand(1,1);

            	$random03 = rand(1,1);
			}else{
				$random01 = rand(1,3);
	
				$random02 = rand(1,3);
	
				$random03 = rand(1,3);
			}

            $random04 = rand(1,3);

            $random05 = rand(1,3);

            $random06 = rand(1,3);

            $random07 = rand(1,3);

            $random08 = rand(1,3);

            $random09 = rand(1,3);

            $blessing = explode(', ', $char['blessing']);

            

            $numberBlessings = mysql_num_rows(mysql_query("SELECT * FROM `affinity` WHERE name<>'None' AND name<>'Buy'"));             

            if($random01 == 1 && $char['affinitys'] >= '1'){

            

                $firstSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$firstSlot."'"));

                $blessing[0] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[0] = "None";

                }

                

            }

            if($random02 == 1 && $char['affinitys'] >= '2'){

            

                $secondSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$secondSlot."'"));

                $blessing[1] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[1] = "None";

                }

                

            }

            if($random03 == 1 && $char['affinitys'] >= '3'){

            

                $thirdSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$thirdSlot."'"));

                $blessing[2] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[2] = "None";

                }

            }

            if($random04 == 1 && $char['affinitys'] >= '4'){

            

                $fourthSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$fourthSlot."'"));

                $blessing[3] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[3] = "None";

                }

                

            }

            if($random05 == 1 && $char['affinitys'] >= '5'){

            

                $fifthSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$fifthSlot."'"));

                $blessing[4] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[4] = "None";

                }

                

            }

            if($random06 == 1 && $char['affinitys'] >= '6'){

            

                $fifthSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$fifthSlot."'"));

                $blessing[5] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[5] = "None";

                }

                

            }

            if($random07 == 1 && $char['affinitys'] >= '7'){

            

                $fifthSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$fifthSlot."'"));

                $blessing[6] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[6] = "None";

                }

                

            }

            if($random08 == 1 && $char['affinitys'] >= '8'){

            

                $fifthSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$fifthSlot."'"));

                $blessing[7] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[7] = "None";

                }

                

            }

            if($random09 == 1 && $char['affinitys'] >= '9'){

            

                $fifthSlot = rand(1, $numberBlessings);

                $name = mysql_fetch_assoc(mysql_query("SELECT * FROM affinity WHERE id='".$fifthSlot."'"));

                $blessing[8] = $name['name'];

                if($name['name'] != "None" && $name['name'] != "Buy"){

                    $data .= "<font color=\'Yellow\'>You have been blessed with: ".$name['name'].", ".$name['description']."</font><br />";

                    $messagechat = "<strong><font color=\'#CCFF00\'>".$char['username']." gained ".$name['name']." blessing for their donation.</font></strong><br />";

                    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");

                }

                else

                {

                	$blessing[8] = "None";

                }

                

            }

            

            $updateBlessings = "".$blessing[0].", ".$blessing[1].", ".$blessing[2].", ".$blessing[3].", ".$blessing[4].", ".$blessing[5].", ".$blessing[6].", ".$blessing[7].", ".$blessing[8]."";

            $blessingsINmysql = mysql_query("UPDATE characters SET blessing='".$updateBlessings."' WHERE id='".$_SESSION['userid']."'");

        

        }
		if($amount >= 5000000){
			$nobility = explode("(", $char['nobility']);
			$nobilityLevel = str_replace(")", "", $nobility[1]);
			$nobilityRank = $nobility[0];
			$nobilityLevel = $nobilityLevel + 1;
			$newNp = $nobilityRank."(".$nobilityLevel.")";
            $data .= "<br /><font color=\'#808000\'><b>You have been blessed!(+1NP)</b></font>";
            $increaseTradeSkill = mysql_query("UPDATE characters SET nobility='".$newNp."' WHERE id='".$_SESSION['userid']."'");
			$messagechat = "<font color=\'#CCFF00\'>By the power of the gods ".$char['username']." has been <strong>Blessed</strong>!(+1NP)</font><br />";
            $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
		}

    }

    

    print("fillDiv('displayArea','<center>".$data."</center>');");

}

else

{



    if($char['temple'] >= '1')

    {



        print("fillDiv('displayArea','<center>Your donations today have been very generous!<br /><br />Total Donations: ".number_format($temple['pot'])."</center>');");

    }

    else

    {

		if($char['level']>="250")
		{
			$newb = "<input type=\'text\' id=\'amount\' /><input type=\'button\' value=\'Contribute\' onclick=\'Javascript: makeDonation();\' />";
		}else{
			$newb = "<input type=\'hidden\' id=\'amount\' value=\'0\' /><input type=\'button\' value=\'FREE DONATION\' onclick=\'Javascript: makeDonation();\' />";
		}
		
		$findDonations = mysql_query("SELECT * FROM donationpot WHERE username='".$char['username']."'");
		$timesDonated = mysql_num_rows($findDonations);

        print("fillDiv('displayArea','<center><strong>Donation Temple</strong><br /><br />Your prayers are much needed since this evil has fallen upon us.<br /> As you may have already noticed, the Temple is falling apart and we are trying to rebuild. The only problem though is the lack of donations to hire soneone to do some repairs around here.<br />Would you be so kind?<br />Total Donations: ".number_format($temple['pot'])."<br />Times donated this month: ".$timesDonated."<br />".$newb."<br />NOTE: <br />-Under level 250 donate for blessings for free<br />-250,000 gold for chance to get Blessings<br />-5,000,000 gold to recieve 1 Nobility Point<br />-Every time you donate, get a ticket towards winning the donation pot at the end of the month.</center>');");

    }

    

}

include('updatestats.php');

?>