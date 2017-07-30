<?php
//////////////////////////
//PHP Functions List	//
//////////////////////////
//Deus					//
//////////////////////////

/*function smartquoteset($smartstring) {
	replace = array("\\" => "\\\\", "'" => "\\'", '"' => '\"');
	$smartstring = str_replace(array_keys($replace), array_values($replace), $smartstring);

	return $smartstring;
}

function smartquoteread($smartstring) {
	replace = array("'" => "\'", "\\\\" => "\\");
	$smartstring = str_replace(array_keys($replace), array_values($replace), $smartstring);

	return $smartstring;
}*/

function carriage($smartstring) {
	$replace = array("\r\n" => "[br]", "\r" => "[br]", "\n" => "[br]");
	$smartstring = str_replace(array_keys($replace), array_values($replace), $smartstring);

	return $smartstring;
}

function smartcode($smartstring) {
	$replace = array("<" => "&lt;", ">" => "&gt;", "\r\n" => "<br />", "\r" => "<br />", "\n" => "<br />", "[br]" => "<br />", "[center]" => "<center>", "[/center]" => "</center>", "[b]" => "<strong>", "[/b]" => "</strong>", "[i]" => "<em>", "[/i]" => "</em>", "[u]" => "<u>", "[/u]" => "</u>", "[colour]" => "<font color=\'#", "[/colour]" => "</font>", "]" => "\'>");
	$smartstring = str_replace(array_keys($replace), array_values($replace), $smartstring);

	return $smartstring;
}
?>