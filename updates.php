<?php
include('indexdb.php');

                $actionStart = mysql_query("SELECT * FROM announcements ORDER BY id DESC");
				$data = "";
                while($announcement = mysql_fetch_array($actionStart)){

                $data .= "".$announcement['announcement']."<br /><br />";

				}


print("fillDiv('displayArea','".$data."');");
?>