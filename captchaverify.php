<?php
session_name("icsession");
session_start();
include('db.php');
include('varset.php');
$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

  require_once('recaptchalib.php');
  $privatekey = "6Ld9zssSAAAAACUwfuV6pDnpOt60SIP57hu1xD-i";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
  $time = time();
  if($char['captcha_time_limit'] != "0" && $char['captcha_time_limit'] < $time){
	  
	print("alert('You have taken too long. You are Suspended for 12 hours!');");
	$reasonSuspend = "Failed reCaptcha";
	$timeSuspended = 43200 + time();
	$updateTheDumbass = mysql_query("UPDATE characters SET lastactive='0', status='Suspended', endsuspend='".$timeSuspended."', reason='".$reasonSuspend."', captcha='Inactive', captcha_time_limit='0' WHERE username='".$char['username']."'");
	
	$suspendmessage = "<b><font color=\'#DD00DD\'>Player ".$char['username']." has been suspended for 12 hours! Reason: Failed reCAPTCHA security test.</font></b><br />";
	$date = date('ymdHi');
	$query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `username`, `message`, `to`)VALUES ('".$date."', '3', '".$char['username']."', '".$suspendmessage."', 'Chatroom')") or die(mysql_error());
	
	die();
				
  } elseif (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
		 $timeLeft = $char['captcha_time_limit'] - time();
		 print("alert('Failed try again. ".$timeLeft." seconds left!');");
		 print("showRecaptcha('recaptcha_div');");
  } elseif($resp->is_valid) {
	  	 $random = rand(1,5);
		 $gold = $random * $char['level'];
    	 print("fillDiv('displayArea', 'You get ".number_format($gold)." gold for passing the test!');");
		 mysql_query("UPDATE characters SET gold=gold+'".$gold."', captcha='Inactive', captcha_time_limit='0' WHERE username='".$char['username']."'");
  }
  ?>