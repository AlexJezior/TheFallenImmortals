<?php
include('db.php');

$getUserForChange = mysql_query("SELECT * FROM activatenewpassword WHERE username='".$_GET['username']."' AND verificationcode='".$_GET['activationcode']."'");
$getCodeNumRows = mysql_num_rows($getUserForChange);
if($getCodeNumRows > "0"){
	
	$verify = mysql_fetch_assoc($getUserForChange);
	$checkIfInUse = mysql_query("SELECT * FROM characters WHERE username='".$verify['username']."'");
		print "You have changed your password!";
		$updateEmail = mysql_query("UPDATE characters SET password='".$verify['newpassword']."' WHERE username='".$verify['username']."'");
		$deleteVerifyCode = mysql_query("DELETE FROM activatenewpassword WHERE id='".$verify['id']."'");
	
}else{
	print "Follow the activation link from your Email address!";
}
?>