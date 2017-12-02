<?php

		$group = $_GET['group'];
		
 		$mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
 		if ($mysqli->connect_errno) 
 		{
 				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
 		}
 		
 		$sql = "select username from usergroups where '$group' = groupname";
 
 		if ($result = $mysqli->query($sql)) 
 		{

		    $row_cnt = $result->num_rows;

		    echo($row_cnt);

		    $result->close();
		}
		
		echo($user);
?>        