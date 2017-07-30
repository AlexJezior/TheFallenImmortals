<?php
	$to = "Alex.Jezior@gmail.com";
	$subject = "The Fallen Immortals!";
	$from = "DONOTREPLY@TheFallenImmortals.com";
	$headers = 'From: '.$from."\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$message ="
<html><head><title>TFI Email Update!</title>
<style type=\"text/css\">
.remember {
	font-size: 18px;
	font-style: italic;
	color: #F00;
}
</style>
</head><body>
	<table width=\"95%\" border=\"3\" align=\"center\">
	  <tr>
	    <th scope=\"row\"><div align=\"left\"><span class=\"remember\">It looks as though you have not activated your account yet. Click here (Or copy: ) to finish activation. If you have forgotten your password follow the forgotten password link on the home page</span></div>
	      <h2 align=\"left\"><strong><u>Latest updates:</u></strong></h2>
	      <div align=\"left\">
	        <p><u>Forge</u>: has been added for all those Ore that you collect Mining (Update described below). Combine four items of one type to attempt to create a much better, and more signature, item. A Forged item (F), may not be used to create another Forged item. The combinations are endless! The better the Ore you use, the better the item!</p>
	        <p><u>Mining</u>:   You must search the map for one of the two mining locations(More to be added later on). Once you have received all the Ore from one of the locations it will move to a new location. 15-20 Ores will drop from one location. At mining level 25 you can mine Iron, and at level 65 you can mine Steel. Ores may be used in Forge to create better items.</p>
	        <p><u>Top List Update</u>: You can now see who has the best Guild of all underneath the Tops List. Many people before were arguing over who had the best. Now you can see and determine for yourself.</p>
	        <p><u>reCAPTCHA security</u>: One of the highest levels of security, stopping any macro program dead in it's tracks. You will have nine seconds to fill out the small form and recieve a reward once you have completed it! We have a auto button, now stop using macro programs.</p>
	        <p><u>Forgotten Password</u>: This is a much needed function to make a website work. I have seen many websites missing this option, and I can see how it can draw people away. Well, here is one more website helping you find your password when it is most needed.... when your bored of course!</p>
<p>&nbsp;</p>
	      </div>
	      <h2 align=\"left\"><strong><u>Bug Fixes:</u></strong></h2>
	<ul>
	  <li>
	    <div align=\"left\">We couldn't find any ;)</div>
	  </li>
	  </ul>
	<p align=\"left\"><br />
	  <br />-AJezior<br />
	  <a href=\"www.thefallenimmortals.com\">www.TheFallenImmortals.com</a><br /><br /><br />Unsubscribe from these email updates: <a href=\"www.thefallenimmortals.com/unsubscribe.php?email=Alex.Jezior@gmail.com\">www.thefallenimmortals.com/unsubscribe.php?email=Alex.Jezior@gmail.com</a></p>	</p>
	</th>
      </tr>
</table>
</body></html>";
	if (mail($to,$subject,$message,$headers)) {
		echo("<p>Message successfully sent!</p>");
	} else {
		echo("<p>Message delivery failed...</p>");
	}
?>