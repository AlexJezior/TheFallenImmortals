<?php
if(isset($_POST['message'])){
	if($_POST['email'] != "" && $_POST['message'] != ""){
		mail("Alex.Jezior@gmail.com", "TFI Inquiry", $_POST['message'], "From:" . $_POST['email']);
  		$data = "Thank you! You should hear back from us soon. Keep an eye on your email!";
	}else{
		$data = "Please fill out all fields. <a href=\"Javascript: contact();\">Try again</a>";
	}
}else{

$data = "<h3>Contact Us</h3><br /><br />I recieve emails via android mobile. You should expect a fast response. If I do not respond fast I am probably at work or asleep. <br />Thanks, Alex!<br /><br /><form>Email: <input id=\'email\' type=\'text\' /><br />Message(include username):<br /><textarea id=\'message\' rows=\'15\' cols=\'40\'></textarea><br /><input type=\'button\' value=\'Send\' onclick=\'contactUs();\' /></form>";

}

print("fillDiv('displayArea','".$data."');");
?>