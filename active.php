<?php
$active = time();
$setactive = mysql_query("UPDATE characters SET lastactive='".$active."' WHERE id='".$_SESSION['userid']."'");

?>