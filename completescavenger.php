<?php

session_name("icsession");

session_start();

include('db.php');

$whom = ucwords(strtolower($_POST['whom']));

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'")or die("Not logged in!");

$char = mysql_fetch_assoc($getchar);

$data = "";



if(isset($_POST['adventureid'])){

	$findAdventureInQuestion = mysql_query("SELECT * FROM scavenger WHERE id='".$_POST['adventureid']."' AND username='".$char['username']."'")or die("alert(\'Problem finding adventure!\');");

	$adventure = mysql_fetch_assoc($findAdventureInQuestion);

	$complete = explode("/", $adventure['complete']);

	if($complete[0] == $complete[1]){

		if($char['username'] == $adventure['username']){

			$reward = rand(1,4);

			if($reward >= "1"){

				$goldRand = rand(200,5000);

				$gold = $adventure['level'] * $goldRand;

				$data .= "-You gain ".number_format($gold)." Gold!<br />";

				mysql_query("UPDATE characters SET gold=gold+'".$gold."' WHERE username='".$adventure['username']."'");

			}

			if($reward <= "2"){

				$sp = $adventure['level'];

				$data .= "-You gain ".number_format($sp)." Stat Points!<br />";

				mysql_query("UPDATE characters SET stats=stats+'".$sp."' WHERE username='".$adventure['username']."'");

			}

			if($reward <= "3"){

				$blood = $adventure['level'] * 10;

				$data .= "-You gain ".number_format($blood)." Blood!<br />";

				mysql_query("UPDATE characters SET blood=blood+'".$blood."' WHERE username='".$adventure['username']."'");

			}

			if($reward <= "4"){

				$cashRand = rand(1,30);

				if($cashRand == "1"){

					$data .= "-You gain Cash!<br />";

					mysql_query("UPDATE characters SET cash=cash+'1' WHERE username='".$adventure['username']."'");

				}

			}

			mysql_query("DELETE FROM scavenger WHERE id='".$adventure['id']."'");

			mysql_query("UPDATE characters SET scavenges=scavenges+'1' WHERE username='".$char['username']."'");

		}else{

			$data .= "This is not your adventure.<br />";

		}

	}else{

		$data .= "You must complete the adventure first!<br />";

	}

}else{

	$data .= "Unable to find this fake adventure your have created.";

}



print("fillDiv('displayArea','".$data."');");

include('updatestats.php');

?>