<?php

include('indexdb.php');



function murder($data){ 

	$salt = "'/0U'LL |\|3\/3R Ph19UR3 0U7 \/\/|-|@ 7|-|3 54L7 15. pLU5 \/\/|-|3R35 7|-|3 p3PP3R?"; 

	$salt = md5($salt); 

	$data = md5($salt.$data); 

	$data = base64_encode($data); 

	$data = sha1($data); 

	return $data; 

}



$username = ucwords(strtolower($_POST['userAlias']));

$emailPassword = $_POST['userPass'];

$password = murder($_POST['userPass']);

$email = $_POST['userEmail'];

$gender = $_POST['userGender'];

$class = $_POST['userClass'];

$comrade = $_POST['userComrade'];



$create = "Yes";



if($username != NULL && $username != "")

{

	if (preg_match("/^[a-z0-9_]+$/i", $username) )

	{

	    $getuser = mysql_query("SELECT * FROM characters WHERE username='".$username."'");

	    if(mysql_num_rows($getuser) != "1" || $username != "Mammons")    //Username does not exist

	    {

	        $message = "Username: <font color=\'#00DD00\'>OK</font><br />";

	    }

	    else

	    {

	        $message = "Username: <font color=\'#DD0000\'>Already Taken</font><br />";

	        $create = "No";

	    }

	}else{

		$message = "Username: <font color=\'#DD0000\'>Illegal Characters</font><br />";

	    $create = "No";

	}

}

else

{

    $message = "Username: <font color=\'#DD0000\'>Required</font><br />";

    $create = "No";

}



if($_POST['userPass'] != NULL)

{

    if($_POST['userVPass'] == $_POST['userPass'])

    {

        $message .= "Password: <font color=\'#00DD00\'>OK</font><br />";

    }

    else

    {

        $message .= "Password: <font color=\'#DD0000\'>No Match</font><br />";

        $create = "No";

    }

}

else

{

    $message .= "Password: <font color=\'#DD0000\'>Required</font><br />";

    $create = "No";

}



if($_POST['userEmail'] != NULL)

{

    $getemail = mysql_query("SELECT * FROM characters WHERE email='".$_POST['userEmail']."'");

    if(eregi("^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$", $email))

    {

        if(mysql_num_rows($getemail) >= "1"){

            $message .= "Email: <font color=\'#DD0000\'>In Use</font><br />";

            $create = "No";

        }else{

            $message .= "Email: <font color=\'#00DD00\'>OK</font><br />";

        }

    }

    else

    {

        $message .= "Email: <font color=\'#DD0000\'>Not Valid</font><br />";

        $create = "No";

    }

}

else

{

    $message .= "Email: <font color=\'#DD0000\'>Required</font><br />";

    $create = "No";

}



if($comrade != NULL)

{

    $getcomrade = mysql_query("SELECT * FROM characters WHERE username='".$comrade."'");

    if(mysql_num_rows($getcomrade) == "1")    //Username does not exist

    {

        $message .= "Comrade: <font color=\'#00DD00\'>Verified</font><br /><br />";

    }

    else

    {

        $message .= "Comrade: <font color=\'#DD0000\'>Not found. Try requesting the refferal link again from the person who gave it to you, otherwise make sure the url is similar to www.riseimmortals.com.</font><br /><br />";

        $create = "No";

    }

}





if($create == "Yes")

{

    $charset = "abcdefghijklmnopqrstuvwxyz1234567890";

    $i = "1";

    while($i < "15")

    {

        $key .= $charset[(mt_rand(0,(strlen($charset)-1)))];

        $i ++;

    }



    $to = $email;

    $subject = "The Fallen Immortals Activation Key";

    $address = "Hello ".$username."!\n Thank you for registering at http://www.thefallenimmortals.com Visit the following address to activate your account: http://www.thefallenimmortals.com/activate.php?key=".$key." Hope to see you there soon, The Fallen Of Immortals Support Team.\n\nYour password is: ".$emailPassword."";

    $headers = "From: ajezior@TheFallenImmortals.com";

    

    mail($to,$subject,$address,$headers);



    if($class == "Mage")

    {

        $str = "20";

        $dex = "20";

        $end = "50";

        $int = "60";

        $con = "35";

    }

    elseif($class == "Fighter")

    {

        $str = "60";

        $dex = "35";

        $end = "50";

        $int = "20";

        $con = "20";

    }

    if($class == "Fighter"){

    	$secondClass = "Mage";

    }elseif($class == "Mage"){

    	$secondClass = "Fighter";

    }else{

    	print("alert('Unable to create second class. Contact the admin right away. Alex.Jezior@gmail.com');");

    	die();

    }

    $makeSecondClass = mysql_query("INSERT INTO secondclass (`username`, `class`, `level`, `expacq`, `expreq`, `blood`) VALUES ('".$username."', '".$secondClass."', '1', '0', '15', '0')");

    $createuser = mysql_query("INSERT INTO characters (`username`, `password`, `email`, `gender`, `class`, `life`, `mana`, `strength`, `dexterity`, `endurance`, `intelligence`, `concentration`, `ip`, `refferal`) VALUES ('".$username."', '".$password."', '".$email."', '".$gender."', '".$class."', '".$end."', '".$int."', '".$str."', '".$dex."', '".$end."', '".$int."', '".$con."', '".$_SERVER['REMOTE_ADDR']."', '".$comrade."')");

    $createkey = mysql_query("INSERT INTO activation (`username`, `key`) VALUES ('".$username."', '".$key."')");

    $createwarn = mysql_query("INSERT INTO warnings (`username`) VALUES ('".$username."')");

    

    $messageChat = "<b><font color=\'#008888\'>".$username." has registered an account. (Welcome the new player once they have entered the game.)[Mod Chat]</font></b><br />";

    $query = mysql_query("INSERT INTO chatroom (`date`, `userlevel`, `message`, `to`) VALUES ('".$date."', '2', '".$messageChat."', 'Mod')") or die(mysql_error());



    $message .= "Thank you ".$username.", your registration was successful.<br /><br /><strong>You may login!</strong><br />Please note that your IP address has been recorded for security purposes.<br /><br /><font color=\'#00DD00\'>Check your email address for your activation key, you can play on this character before it is activated until level 100. Activation key may be found in your <strong>spam mail</strong>.</font>";



    //print("cleanReg();");

}

else

{

    $message .= "<strong><font color=\'#DD0000\'>Registration has failed!</font></strong>";

}



print("fillDiv('displayArea','".$message."');");

?>