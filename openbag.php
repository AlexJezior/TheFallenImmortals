<?php
session_name("icsession");
session_start();
include('db.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

if($_POST['bagid'] != NULL){
	$findbagid = mysql_query("SELECT * FROM bagdrop WHERE id='".$_POST['bagid']."'")or die("alert('The bag is gone!');");
	$bag = mysql_fetch_assoc($findbagid);
	
	
	$bagRel = explode(', ', $bag['relativeLoc']);
	$charRel = explode(', ', $char['relativeLoc']);
	$bagXtop = $bagRel[0]+32;
	$bagXbottom = $bagRel[0]-32;
	$bagYtop = $bagRel[1]+32;
	$bagYbottom = $bagRel[1]-32;
	
	if(($bagXtop >= $charRel[0] && $bagXbottom <= $charRel[0]) && ($bagYtop >= $charRel[1] && $bagYbottom <= $charRel[1])){
		
	}else{
		die("alert('You must move closer to the bag.');");
	}
	
	if($bag['name'] == NULL){
		print("alert('You didn\'t catch the bag.');");
	}elseif($bag['posx'] != $char['posx'] || $bag['posy'] != $char['posy']){
		print("alert('You are not in the right location to collect this bag.');");
	}else{
		$rand = rand(1,100);
		if($rand == "1"){
			print("alert('You open the bag for 1 cash!');");
			$give = mysql_query("UPDATE characters SET cash=cash+'1' WHERE id='".$char['id']."'");
			$messagechat = "<strong><font color=\'#D2691E\'>".$char['username']." found 1 Cash from the bag at ".$bag['posx'].", ".$bag['posy']."!</font></strong><br />";
                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
		}elseif($rand > "1" && $rand <= "33"){
			$goldrand = rand(1,100000);
			print("alert('You open the bag for ".number_format($goldrand)." gold!');");
			$give = mysql_query("UPDATE characters SET gold=gold+'".$goldrand."' WHERE id='".$char['id']."'");
			$messagechat = "<strong><font color=\'#D2691E\'>".$char['username']." found ".number_format($goldrand)." gold from the bag at ".$bag['posx'].", ".$bag['posy']."!</font></strong><br />";
                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
		}elseif($rand > "33" && $rand <= "66"){
			$statpointrand = rand(1,25);
			print("alert('You open the bag for ".$statpointrand." Statpoints!');");
			$give = mysql_query("UPDATE characters SET stats=stats+'".$statpointrand."' WHERE id='".$char['id']."'");
			$messagechat = "<strong><font color=\'#D2691E\'>".$char['username']." found ".number_format($statpointrand)." Statpoints from the bag at ".$bag['posx'].", ".$bag['posy']."!</font></strong><br />";
                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
		}elseif($rand > "66" && $rand <= "100"){
			$bloodrand = rand(1,100);
			print("alert('You open the bag for ".$bloodrand." blood!');");
			$give = mysql_query("UPDATE characters SET blood=blood+'".$bloodrand."' WHERE id='".$char['id']."'");
			$messagechat = "<strong><font color=\'#D2691E\'>".$char['username']." found ".number_format($bloodrand)." blood from the bag at ".$bag['posx'].", ".$bag['posy']."!</font></strong><br />";
                $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`) VALUES ('".$date."', '3', '".$char['username']."', '".$messagechat."', 'Chatroom')");
		}
		$deleteBag = mysql_query("DELETE FROM bagdrop WHERE id='".$_POST['bagid']."'");
	}
}else{
	print("alert('Error.');");
}
		$findBagDrops = mysql_query("SELECT * FROM bagdrop WHERE posx='".$char['posx']."' and posy='".$char['posy']."'");
		$bagLoc = "";
		while($bag = mysql_fetch_assoc($findBagDrops)){
			$bagRel = explode(', ', $bag['relativeLoc']);
			$bagLoc .= "<div style=\'position:absolute;left:".$bagRel[0]."px;bottom:".$bagRel[1]."px;width:32px;height:32px;background-image:url(/images/map/locations/bag.png);\' onclick=\'grabBag(".$bag['id'].")\'></div>";
		}
		print("fillDiv('bagLocations','".$bagLoc."');");
include('updatestats.php');
?>