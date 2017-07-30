<?php 
session_name("icsession");
session_start();
include('db.php');
$data = "<strong><a href=\"javascript: closeSecondPage();\">Close</a> | <a href=\"javascript: viewTop();\">Back</a></strong><br /><br />";
$data .= "<center><strong>Top guilds!</strong><br />";
$data .= "<table border=\"1\">";
$findGuilds = mysql_query("SELECT * FROM guilds ORDER BY exp+gold+itemboost+itemdrop DESC");
while($guilds = mysql_fetch_array($findGuilds))
{
	$information = "Leader: ".$guilds['leader']." &#013; |Co-Leader: ".$guilds['coleader']." &#013; |Captain: ".$guilds['captain']." &#013; |EXP: ".$guilds['exp']." &#013; |Gold: ".$guilds['gold']." &#013; |Item Drop: ".$guilds['itemdrop']." &#013; |Item Boost: ".$guilds['itemboost']."";
    $data .= "<tr><td>(<a title=\"".$information."\">?</a>)".$guilds['name']."</td></tr>";
}
$data .= "</table></center>";


print("fillDiv('secondPage','".$data."');");
include('active.php');
?>