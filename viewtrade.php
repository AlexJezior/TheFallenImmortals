<?php

session_name("icsession");

session_start();

include('db.php');



$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'");

$char = mysql_fetch_assoc($getchar);



$data = "";



if(isset($_POST['page']) && $_POST['page'] == "sellCash")

{

    $data .= "<center>Sell Cash<br /><br /></center>";

    if($char['cash'] > "0")

    {

        $data .= "Price:<input type=\'text\' id=\'price\' /><input type=\'button\' value=\'Sell 1 Cash\' onclick=\'putCash();\' /><br />";

    }else{

        $data .= "No cash for trade!<br />";

    }

}

elseif(isset($_POST['page']) && $_POST['page'] == "sellInTrade")

{

    $data .= "<center>Sell in Market<br /></center>";

    $findInventory = mysql_query("SELECT * FROM inventory WHERE username='".$char['username']."' AND equipped='No'");

    if(mysql_num_rows($findInventory) > 0)

    {

        $data .= "<select id=\'item\'>";

        while($inventory = mysql_fetch_array($findInventory)){

            $data .= "<option value=\'".$inventory['id']."\'>".$inventory['itemname']." - Value: ".number_format($inventory['value'])."</option>";

        }

        $data .= "</select>";

        $data .= "Price:<input type=\'text\' id=\'price\' /><input type=\'button\' value=\'Sell\' onclick=\'putOnMarket();\' /><br />";

    }else{

        $data .= "You have no items to trade.<br />";

    }

}

elseif(isset($_POST['price']) && isset($_POST['item']) && is_numeric($_POST['price']) && $_POST['item'] != NULL)

{

    if($_POST['price'] > "0"){

        $sellingID = $_POST['item'];

        $sellPrice = $_POST['price'];

        if(!ctype_digit($sellingID) || !ctype_digit($sellPrice)){

        	print("alert('Numerical values only when selling an item. Thanks!');");

        	die();

        }

        $findItemInInventory = mysql_query("SELECT * FROM inventory WHERE id='".$sellingID."' AND username='".$char['username']."'")or die("alert('Cannot locate item.');");

        if(mysql_num_rows($findItemInInventory) < "0"){

        	print("alert('Cannot locate the item in your inventory. This has been logged.');");

        	die();

        }

        $item = mysql_fetch_assoc($findItemInInventory);

        $addToMarket = mysql_query("INSERT INTO trade (`fromplayer`, `itemname`, `levelreq`, `type`, `strength`, `dexterity`, `endurance`, `intelligence`, `concentration`, `value`, `price`) VALUES ('".$char['username']."', '".$item['itemname']."', '".$item['levelreq']."', '".$item['type']."', '".$item['strength']."', '".$item['dexterity']."', '".$item['endurance']."', '".$item['intelligence']."', '".$item['concentration']."', '".$item['value']."', '".$sellPrice."')")or die("alret('Failed to add item.')");

        $data .= "You put ".$item['itemname']." on to market for ".$sellPrice." gold!<br />";

        $datestamp = date("H:i:s");

        $message = "<font color=\'#F5F5DC\'><b>(".$datestamp.")".$char['username']." put ".$item['itemname']." on market for ".number_format($sellPrice)." gold.</b></font><br />";

        $messageSeller = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', 'Chatroom', '".$message."')");

        $removeFromInventory = mysql_query("DELETE FROM inventory WHERE id='".$item['id']."'");

    }else{

        $data .= "Price must be at least 1 gold.<br />";

    }

}

elseif(isset($_POST['price']) && $_POST['type'] == "Cash")

{

	if($char['cash'] > "0"){

		

		$takeCash = mysql_query("UPDATE characters SET cash=cash-'1' WHERE username='".$char['username']."'");

		$addToMarket = mysql_query("INSERT INTO trade (`fromplayer`, `itemname`, `price`) VALUES ('".$char['username']."', 'Cash', '".$_POST['price']."')")or die("alret('Failed to add item.')");

		$data .= "You put Cash on to market for ".number_format($_POST['price'])." gold!<br />";

        $datestamp = date("H:i:s");

        $message = "<font color=\'#F5F5DC\'><b>(".$datestamp.")".$char['username']." put Cash on market for ".number_format($_POST['price'])." gold.</b></font><br />";

        $messageSeller = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', 'Chatroom', '".$message."')");

		

	}else{

		

		$data .= "No cash to trade!<br /><br />";

	}

	

}

elseif(isset($_POST['buyingid']))

{

    $buyingID = $_POST['buyingid'];

    if(!ctype_digit($buyingID)){

        print("alert('Numerical values only when buying an item. Thanks!');");

        die();

    }

    $findItemInTrade = mysql_query("SELECT * FROM trade WHERE id='".$buyingID."'")or die("alert('Cannot locate item.');");

    if(mysql_num_rows($findItemInTrade) < "0"){

        print("alert('Cannot locate the item in Trade. Maybe it was already sold. This has been logged.');");

        die();

    }

    $item = mysql_fetch_assoc($findItemInTrade);

    if($char['gold'] >= $item['price']){

    	

    	if($item['itemname'] == "Cash"){

    		

    		$data .= "".$item['itemname']." was bought for ".number_format($item['price'])." gold.<br />";

    		$updateCash = mysql_query("UPDATE characters SET cash=cash+'1' WHERE username='".$char['username']."'");

    		$getGold = mysql_query("UPDATE characters SET gold=gold-'".$item['price']."' WHERE id='".$char['id']."'");

	        $giveSellerGold = mysql_query("UPDATE characters SET gold=gold+'".$item['price']."' WHERE username='".$item['fromplayer']."'");

	        $datestamp = date("H:i:s");

	        $message = "<font color=\'#F5F5DC\'><b>(".$datestamp.")".$char['username']." bought your ".$item['itemname']." for ".number_format($item['price'])." gold.</b></font><br />";

	        $messageSeller = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$item['fromplayer']."', '".$message."')");

    		$removeFromTrade = mysql_query("DELETE FROM trade WHERE id='".$buyingID."'");

    		

    	}else{

    	

	        $data .= "".$item['itemname']." was bought for ".number_format($item['price'])." gold.<br />";

	        $addToUser = mysql_query("INSERT INTO inventory (`username`, `itemname`, `levelreq`, `type`, `power`, `strength`, `dexterity`, `endurance`, `intelligence`, `concentration`, `value`) VALUES ('".$char['username']."', '".$item['itemname']."', '".$item['levelreq']."', '".$item['type']."', '".$item['power']."', '".$item['strength']."', '".$item['dexterity']."', '".$item['endurance']."', '".$item['intelligence']."', '".$item['concentration']."', '".$item['value']."')");

	        $getGold = mysql_query("UPDATE characters SET gold=gold-'".$item['price']."' WHERE id='".$char['id']."'");

	        $giveSellerGold = mysql_query("UPDATE characters SET gold=gold+'".$item['price']."' WHERE username='".$item['fromplayer']."'");

	        $datestamp = date("H:i:s");

	        $message = "<font color=\'#F5F5DC\'><b>(".$datestamp.")".$char['username']." bought your ".$item['itemname']." for ".number_format($item['price'])." gold.</b></font><br />";

	        $messageSeller = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `to`, `message`) VALUES ('".$datestamp."', '4', 'PM', '".$item['fromplayer']."', '".$message."')");

	        $removeFromTrade = mysql_query("DELETE FROM trade WHERE id='".$buyingID."'");

    	

    	}

        

    }else{

        print "alert('Not enough gold.');";

    }

}

elseif(isset($_POST['removeid']))

{

    $removeID = $_POST['removeid'];

    if(!ctype_digit($removeID)){

        print("alert('Numerical values only when removing an item. Thanks!');");

        die();

    }

    $findItemInTrade = mysql_query("SELECT * FROM trade WHERE id='".$removeID."' AND fromplayer='".$char['username']."'")or die("alert('Cannot locate item.');");

    if(mysql_num_rows($findItemInTrade) < "0"){

        print("alert('Cannot locate the item in Trade. It may have already been sold. This has been logged.');");

        die();

    }

    $item = mysql_fetch_assoc($findItemInTrade);

    $data .= "".$item['itemname']." was removed from the market!<br />";

    if($item['itemname'] == "Cash"){

    	$givecashback = mysql_query("UPDATE characters SET cash=cash+'1' WHERE username='".$char['username']."'");

    }else{

	    $addToUser = mysql_query("INSERT INTO inventory (`username`, `itemname`, `levelreq`, `type`, `power`, `strength`, `dexterity`, `endurance`, `intelligence`, `concentration`, `value`) VALUES ('".$char['username']."', '".$item['itemname']."', '".$item['levelreq']."', '".$item['type']."', '".$item['power']."', '".$item['strength']."', '".$item['dexterity']."', '".$item['endurance']."', '".$item['intelligence']."', '".$item['concentration']."', '".$item['value']."')");

    }

    $removeFromTrade = mysql_query("DELETE FROM trade WHERE id='".$removeID."'");

}



$data .= "<a href=\'javascript: trade(\"sellCash\");\'>Sell Cash</a> | ";

$data .= "<a href=\'javascript: trade(\"sellInTrade\");\'>Sell to Market</a> | ";

$data .= "<a href=\'javascript: trade(\"\");\'>Trades to You</a> | ";

$data .= "<a href=\'javascript: trade(\"\");\'>Your items in trade</a>";

	$data .= "<center><b>Item Trade</b><br />";
	$data .= "<select id=\'item\' onchange=\'tradeDesc()\'>";
	$data .= "<option value=\'Nothing\'>None</option>";
	$allMarket = mysql_query("SELECT * FROM trade WHERE towho='None' ORDER BY value");
	while($forSale = mysql_fetch_array($allMarket)){
		if($forSale['fromplayer'] == $char['username']){
			$ownage = "***Your Item***";
		}else{
			$ownage = "";
		}
		$power = $forSale['strength'] + $forSale['dexterity'] + $forSale['endurance'] + $forSale['concentration'] + $forSale['intelligence'];
		$data .= "<option value=\'".$forSale['id']."\'>".$ownage."".$forSale['itemname']." | Power: ".number_format($power)." | Price: ".$forSale['price']."</option>";
	}
    $data .= "</select>";
	$data .= "<div id=\'itemDesc\'></div></center>";





print("fillDiv('displayArea','".$data."');");

include('updatestats.php');

?>