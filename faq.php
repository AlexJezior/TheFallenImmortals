<?php

$data = "<strong><a href=\"javascript: closeSecondPage();\">Close</a> | <a href=\"javascript: viewFAQ();\">Back</a></strong><br /><br />";

$data .= "<center><b>MOST Frequently Asked Questions</b></center><br />";



$data .= "<table width=\'100%\'>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(2);\'>How do I gain levels?</a></td><td><a href=\'javascript: answerFAQ(1);\'>What do the stats do?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(10);\'>How do I use the stat points I get when I level?</a></td><td><a href=\'Javascript: answerFAQ(3);\'>Can I level up my class?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(4);\'>Why does it have the option to switch my class?</a></td><td><a href=\'Javascript: answerFAQ(6);\'>How do I get the items I can equip?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(7);\'>What is the Trade Skill used for?</a></td><td><a href=\'Javascript: answerFAQ(9);\'>What are Affinity slots?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(8);\'>How do I get spells?</a></td><td><a href=\'Javascript: answerFAQ(11);\'>What does the Temple do?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(5);\'>How do I get Random Drops?</a></td><td><a href=\'Javascript: answerFAQ(21);\'>Can I move around at all?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(13);\'>What does Voodoo do?</a></td><td><a href=\'Javascript: answerFAQ(14);\'>What are guilds?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(15);\'>Why should a person vote?</a></td><td><a href=\'Javascript: answerFAQ(16);\'>I see a trade link, what is it for?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(19);\'>What are Scavenges?</a></td><td><a href=\'Javascript: answerFAQ(12);\'>How does the Bank work?</a></td>";

$data .= "</tr>";

$data .= "<tr>";

$data .= "<td><a href=\'Javascript: answerFAQ(17);\'>What is cash and what can it be used for?</a></td><td><a href=\'Javascript: answerFAQ(18);\'>What are demons? What do they drop?</a></td>";

$data .= "</tr>";

$data .= "</table>";

$data .= "<br /><b>Answer:</b><div id=\'answer\'></div>";

print("fillDiv('secondPage','".$data."');");

?>