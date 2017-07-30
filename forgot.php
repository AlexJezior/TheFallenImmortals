<?php
include('indexdb.php');
$data = "";
$information = "";


if(isset($_POST['email'])){
$email = $_POST['email'];
	$findEmailAssoc = mysql_query("SELECT * FROM characters WHERE email='".$email."'");
	if(mysql_num_rows($findEmailAssoc) == 1){
		function murder($data){ 
			$salt = "'/0U'LL |\|3\/3R Ph19UR3 0U7 \/\/|-|@ 7|-|3 54L7 15. pLU5 \/\/|-|3R35 7|-|3 p3PP3R?"; 
			$salt = md5($salt); 
			$data = md5($salt.$data); 
			$data = base64_encode($data); 
			$data = sha1($data); 
			return $data; 
		}
		$randomInt = rand(1,5000);
		$tempPassword = "password".$randomInt;
		$hashedTemp = murder($tempPassword);
		$createTempPass = mysql_query("UPDATE characters SET temppass='".$hashedTemp."' WHERE email='".$email."'")or die();
		$char = mysql_fetch_assoc($findEmailAssoc);
		$to      = $char['email'];
		$subject = 'Password Recovery at The Fallen Immortals!';
		$message = 'Hello <strong>'.$char['username'].'</strong><br />Your temporary password is: '.$tempPassword.'<br />Once you login, change your password immeadiatly. Edit Account, in the top links inside the game, will help you change your password.<br /><br />If you did not request this password change then forget you ever saw this email.<br /><br />www.TheFallenImmortals.com';
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		$headers .= 'To: '.$char['username'].' <'.$char['email'].'>' . "\r\n";
		$headers .= 'From: Alex Jezior <Alex.Jezior@gmail.com>' . "\r\n";
		$headers .= 'Cc: Alex.Jezior@gmail.com' . "\r\n";
		$headers .= 'Bcc: Alex.Jezior@gmail.com' . "\r\n";
		mail($to, $subject, $message, $headers);
		
		$information .= "A message containing your temporary password has been sent to your email. If it is not in your Inbox, it is probably in your Spam.<br />";
	}else{
		$information .= "Failed to find account associated with that email.<br />";
	}
}else{

	$information .= "Email to account registered: <input type=\'text\' id=\'lostEmail\'><input type=\'button\' value=\'Request\' onclick=\'Javascript: findPassword();\' />";
}

	$data .= "<table border=\'0\'>";
	$data .= "<tr height=\'40px\'><td colspan=\"3\">&nbsp;</td></tr>";
	$data .= "<tr><td width=\"10px\">&nbsp;</td><td>";
	$data .= $information;
	$data .= "</td><td width=\"10px\">&nbsp;</td></tr>";
	$data .= "</table>";


print("fillDiv('displayArea', '".$data."');");
?>