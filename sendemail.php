<?php

include('db.php');

$findCharacters = mysql_query("SELECT * FROM characters WHERE subscribed='Yes'");

while($whom = mysql_fetch_assoc($findCharacters)){

	$to = $whom['email'];
	$subject = "TFI Holiday Bonus time!";
	$from = "ajezior@thefallenimmortals.com";
	$headers = 'From: '.$from."\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	if($whom['activated'] != "Yes"){
		$findActivationCode = mysql_query("SELECT * FROM activation WHERE username='".$whom['username']."'");
		$open = mysql_fetch_assoc($findActivationCode);
		$hmph = "<span class=\"remember\">It looks as though you have not activated your account yet. <a href=\"http://www.thefallenimmortals.com\activate.php?key=".$open['key']."\">Click here</a> (Or copy: http://www.thefallenimmortals.com\activate.php?key=".$open['key'].") to finish activation. If you have forgotten your password follow the forgotten password link on the home page after you have activated.</span>";
	}else{
		$hmph = "";
	}
	$message ="
<html><head><title>TFI Email Update!</title>
<style type='text/css'>
.remember {
	font-size: 18px;
	font-style: italic;
	color: #F00;
}
</style>
</head><body>
	<table width=\"95%\" border=\"3\" align=\"center\">
	  <tr>
	    <th scope=\"row\">".$hmph."<div align=\"left\"><a href=\"http://www.thefallenimmortals.com\"><img src='http://fallenimmortals.old/images/Untitled-1_01.gif'></a>
	      </div>
	      <h2 align=\"left\"><strong><u>!!!HOLIDAY BONUS!!!</u></strong></h2>
	      <div align=\"left\">
		  		  
	        <p>Until January 1st, 2013, all purchases made off of the Cash page will be matched 100%. So when you buy $20 worth of cash I will match it and send you another $20 upgrade once I login. Also come check out the new map system using 2D!!!</p>
	        <p>And I will be hosting Bonus time(Double exp and gold) as much as possible for the next couple of days! Come check it out!<br />
	  <br />-AJezior<br />
	  <a href=\"www.thefallenimmortals.com\">www.TheFallenImmortals.com</a><br /><br /><br />Unsubscribe from these email updates: <a href=\"www.thefallenimmortals.com/unsubscribe.php?email=".$whom['email']."\">www.thefallenimmortals.com/unsubscribe.php?email=".$whom['email']."</a></p>
	      </div>	
	      </p>
	</th>
      </tr>
</table>
</body></html>
";
	
	$mailedby = "-f server1.thefallenimmortals.com";

	if (mail($to,$subject,$message,$headers,$mailedby)) {

		echo("<p>Message successfully sent!</p>");

	} else {

		echo("<p>Message delivery failed...</p>");

	}

}

 

?>