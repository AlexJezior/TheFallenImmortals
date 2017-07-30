<?php
include('db.php');

$email = $_GET['email'];
$checkEmail = mysql_query("SELECT * FROM characters WHERE email='".$email."'");
$emailThere = mysql_num_rows($checkEmail);

if($emailThere > 0 && $email != "Alex.Jezior@gmail.com"){
	$whom = mysql_fetch_assoc($checkEmail);
	$unsubscribe = mysql_query("UPDATE characters SET subscribed='No' WHERE email='".$whom['email']."'");
	print("".$whom['email']." has been removed from the email list!");
}else{
	print("No such email!");
}

?>