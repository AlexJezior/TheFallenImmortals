<?php

session_name("icsession");

session_start();

include('db.php');

include('varset.php');

include('functions.php');



$getapplication = mysql_query("SELECT * FROM applications WHERE username='".$charname."'");



$data = "<center>";

if($char['guild'] != "None")

{

    $getguild = mysql_query("SELECT * FROM guilds WHERE name='".$char['guild']."'");

    $guild = mysql_fetch_assoc($getguild);



    $getmembers = mysql_query("SELECT * FROM characters WHERE guild='".$char['guild']."'");

    $members = mysql_num_rows($getmembers);



    while($member = mysql_fetch_array($getmembers))

    {

        if($guild['recruiting'] == "Yes"){

            if($members >= "10"){

                $setRecruiting = mysql_query("UPDATE guilds SET recruiting='No' WHERE name='".$char['guild']."'");

            }

        }

        $guildbonus = floor($member['level'] / "100");

        $totalbonus += $guildbonus;

        $memberdata .= "<tr><td><a href=\'javascript:toptell(\"".$member['username']."\");\'>".$member['username']."</a> (<a title=\'Total Donations: ".number_format($member['totaldonations'])."\'>?</a>)</td><td>".$member['level']."</td><td>".$guildbonus."</td>";

        if($charname == $guild['leader'])

        {

            if($member['username'] == $guild['leader'])

            {

                $memberdata .= "<td>N/A</td><td>N/A</td>";

            }

            elseif($member['username'] == $guild['coleader'])

            {

                $memberdata .= "<td>N/A</td><td><a href=\'javascript: applicantKick(\"".$member['username']."\");\'>Kick</td>";

            }

            elseif($member['username'] == $guild['captain'])

            {

                $memberdata .= "<td><a href=\'javascript: applicantPromote(\"".$member['username']."\");\'>Co-Leader</a></td><td><a href=\'javascript: applicantKick(\"".$member['username']."\");\'>Kick</a></td>";

            }

            else

            {

                $memberdata .= "<td><a href=\'javascript: applicantPromote(\"".$member['username']."\");\'>Captain</a></td><td><a href=\'javascript: applicantKick(\"".$member['username']."\");\'>Kick</a></td>";

            }

        }

        if($charname == $guild['coleader'])

        {

            if($member['username'] == $guild['leader'])

            {

                $memberdata .= "<td>N/A</td><td>N/A</td>";

            }

            elseif($member['username'] == $guild['coleader'])

            {

                $memberdata .= "<td>N/A</td><td>N/A</td>";

            }

            elseif($member['username'] == $guild['captain'])

            {

                $memberdata .= "<td>N/A</td><td><a href=\'javascript: applicantKick(\"".$member['username']."\");\'>Kick</a></td>";

            }

            else

            {

                $memberdata .= "<td><a href=\'javascript: applicantPromote(\"".$member['username']."\");\'>Captain</a></td><td><a href=\'javascript: applicantKick(\"".$member['username']."\");\'>Kick</a></td>";

            }

        }

        $memberdata .= "</tr>";

    }



    $getapplicants = mysql_query("SELECT * FROM applications WHERE guild='".$guild['name']."'");

    while($applicant = mysql_fetch_array($getapplicants))

    {

        $applicantdata .= "<tr><td><a href=\'javascript:toptell(\"".$applicant['username']."\");\'>".$applicant['username']."</a></td><td><a href=\'javascript: applicantAccept(\"".$applicant['username']."\");\'>Approve</a></td></tr>";

    }



    $data .= "<strong>".$char['guild']."</strong> Portal.<br />";

    $data .= "<table border=\'1\' width=\'95%\'>";

    $data .= "<tr><td valign=\'top\' width=\'50%\'>";

    if($members > 9){

        $full = "FULL";

    }else{

        $full = "OPEN";

    }

    $data .= "Members: ".number_format($members)." (".$full.")";

    $data .= "<br />Recruiting: ".$guild['recruiting'];

    if($charname == $guild['leader'] || $charname == $guild['coleader'] && $members < 10)    $data .= " (<a href=\'javascript: modifyRecruit();\'>Modify</a>)";

    $data .= "<br />Approval: ".$guild['accept'];

    if($charname == $guild['leader'] || $charname == $guild['coleader'] && $members < 10)    $data .= " (<a href=\'javascript: modifyAccept();\'>Modify</a>)";

    $data .= "<br />Bonus: ".number_format($totalbonus);

    $data .= "<br />Bank: ".number_format($guild['bank']);

    $data .= "<br />Exp: ".$guild['exp']."% (".number_format($guild['expcost']).")";

    if($charname == $guild['leader'] || $charname == $guild['coleader'] || $charname == $guild['captain']){
		if($guild['exp'] == "40"){
			$disable = " disabled=\"disabled\"";
		}else{
			$disable = "";
		}
	    $data.= " <input type=\'button\' onclick=\'javascript: upgradeGuild(\"Exp\");\' value=\'Upgrade\'".$disable." />";
	}

    $data .= "<br />Gold: ".$guild['gold']."% (".number_format($guild['goldcost']).")";

    if($charname == $guild['leader'] || $charname == $guild['coleader'] || $charname == $guild['captain']){
		if($guild['gold'] == "40"){
			$disable = " disabled=\"disabled\"";
		}else{
			$disable = "";
		}
	    $data.= " <input type=\'button\' onclick=\'javascript: upgradeGuild(\"Gold\");\' value=\'Upgrade\'".$disable." />";	
	}

    $data .= "<br />Item Drops: ".$guild['itemdrop']."% (".number_format($guild['itemdropcost']).")";

    if($charname == $guild['leader'] || $charname == $guild['coleader'] || $charname == $guild['captain']){
		if($guild['itemdrop'] == "40"){
			$disable = " disabled=\"disabled\"";
		}else{
			$disable = "";
		}
	    $data.= " <input type=\'button\' onclick=\'javascript: upgradeGuild(\"Item Drop\");\' value=\'Upgrade\'".$disable." />";
	}

    $data .= "<br />Item Boost: ".$guild['itemboost']."% (".number_format($guild['itemboostcost']).")";

    if($charname == $guild['leader'] || $charname == $guild['coleader'] || $charname == $guild['captain']){
		if($guild['itemboost'] == "40"){
			$disable = " disabled=\"disabled\"";
		}else{
			$disable = "";
		}
	    $data.= " <input type=\'button\' onclick=\'javascript: upgradeGuild(\"Item Boost\");\' value=\'Upgrade\'".$disable." />";
	}

    $data .= "<br />Donate: <input type=\'text\' id=\'donateamount\' /> <input type=\'button\' onclick=\'donateGold();\' value=\'Send\' />";
	////GUILDTAX
	
    if($charname == $guild['leader'] || $charname == $guild['coleader'] || $charname == $guild['captain']) $data .= "<br />Tax(".$guild['tax']."%): <input type=\'text\' id=\'taxamount\' /> <input type=\'button\' onclick=\'updateTax();\' value=\'Update\' />";

    $data .= "</td><td valign=\'top\'>";

    $data .= "Leader: <a href=\'javascript:toptell(\"".$guild['leader']."\");\'>".$guild['leader']."</a>";

    $data .= "<br />Co-Leader: <a href=\'javascript:toptell(\"".$guild['coleader']."\");\'>".$guild['coleader']."</a>";

    if($guild['coleader'] != "" && $charname == $guild['leader'])    $data .= " (<a href=\'javascript: applicantDemote(\"".$guild['coleader']."\");\'>Demote</a>)";

    $data .= "<br />Captain: <a href=\'javascript:toptell(\"".$guild['captain']."\");\'>".$guild['captain']."</a>";

    if($guild['captain'] != "" && $charname == $guild['leader'] || $charname == $guild['coleader'])    $data .= " (<a href=\'javascript: applicantDemote(\"".$guild['captain']."\");\'>Demote</a>)";

    $data .= "<table border=\'1\' width=\'100%\'>";

    $data .= "<tr><td>Name</td><td>Level</td><td>Bonus</td>";

    if($charname == $guild['leader'])    $data .= "<td>Promote</td><td>(Kick)</td></tr>";

    $data .= $memberdata;

    $data .= "</table>";

    if($charname == $guild['leader'] || $charname == $guild['coleader'] || $charname == $guild['captain'])

    {

        $data .= "<br /><table border=\'1\' width=\'100%\'>";

        $data .= "<tr><td>Name</td><td>Accept</td></tr>";

        $data .= $applicantdata;

        $data .= "</table>";

    }

    $data .= "<br /><a href=\'javascript: leaveGuild();\'>Leave Guild</a><br />";

    $data .= "</td></tr>";

    $data .= "<tr><td colspan=\'2\' align=\'center\'><strong>News";

    if($charname == $guild['leader'] || $charname == $guild['coleader']) $data .= " (<a href=\'javascript: modifyNews();\'>Edit</a>)";

    $data .= "</strong></td></tr>";

    $data .= "<tr><td colspan=\'2\'><div id=\'guildsettings\'>".smartcode(addslashes($guild['news']))."</div></td></tr>";

    $data .= "<tr><td colspan=\'2\' align=\'center\'><strong>Recent Activity</strong></td></tr>";

    $data .= "<tr><td colspan=\'2\'>";

    $getLog = mysql_query("SELECT * FROM log WHERE name='".$guild['name']."' ORDER BY id DESC LIMIT 10");

    while($logNews=mysql_fetch_array($getLog)){

        $data .= "".$logNews['message']."<br />";

    }

    $data .= "</td></tr>";

    $data .= "</table>";

}

elseif(mysql_num_rows($getapplication) == "1")

{

    $application = mysql_fetch_assoc($getapplication);

    $data .= "You currently have an Application Process for ".$application['guild'].".<br />";

    $data .= "Retract this Application and retrieve 900K Gold back.<br /><a href=\'javascript: retractGuild();\'><b>Retract</b></a></center>";

}

else

{

    $getguilds = mysql_query("SELECT * FROM guilds WHERE recruiting='Yes'");



    $data .= "<strong>Create Guild</strong><br />";

    $data .= "For just 10,000,000 Gold, you can now have your own Guild!<br />";

    $data .= "Guild Name: <input id=\'guildname\' type=\'text\' maxlength=\'40\' /><br />";

    $data .= "Guild Tag: <input id=\'guildtag\' type=\'text\' maxlength=\'5\' /><br />";

    $data .= "<input type=\'button\' onclick=\'createGuild();\' value=\'Create\' />";

    $data .= "<br /><br />";

    $data .= "<strong>Join Guild</strong><br />";

    $data .= "<select id=\'joinguildname\' onchange=\'loadGuild();\'>";

    $data .= "<option value=\'Select Guild\'>Select Guild</option>";

    while($guild = mysql_fetch_array($getguilds))

    {

        $data .= "<option value=\'".$guild['id']."\'>".$guild['name']."</option>";

    }

    $data .= "</select> <input type=\'button\' onclick=\'applyGuild();\' value=\'Apply\' />";

    $data .= "<br /><br />";

    $data .= "<div id=\'guildinfo\'><u><em>Guild information is loaded here.</em></u></div>";

}

$data .= "</center>";



print("fillDiv('displayArea','".$data."');");

include('updatestats.php');

?>