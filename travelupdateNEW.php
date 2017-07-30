<?php
$oPlayerSocket = stream_socket_server("tcp://127.0.0.1:8000", $errno, $errstr);
if (!$oPlayerSocket) {
  echo "$errstr ($errno)<br />\n";
} else {
  while ($conn = stream_socket_accept($oPlayerSocket)) {
    fwrite($conn, 'The local time is ' . date('n/j/Y g:i a') . "\n");
    fclose($conn);
  }
  fclose($oPlayerSocket);
}
?>