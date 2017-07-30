<html>
<head>
</head>
<body>
<?php
$PlayerName = "Ajezior is at ";
$PlayerRelLoc = "552, 619";
/*
 * PHP Sockets - How to do a stream socket client HTTP request
 */

//get the host IP
$addr = gethostbyname("localhost");
//create the socket connection
$client = stream_socket_client("tcp://$addr:1337", $errno, $errorMessage);

if ($client === false) {
    throw new UnexpectedValueException("Failed to connect: $errorMessage");
}
//write to the socket
fwrite($client, $PlayerName.":".$PlayerRelLoc);
//read the socket contents
$reading = fread($client, 1024);
$reading = strrev($reading);
print $reading;
//close the socket
//fclose($client);
?>
</body>
</html>