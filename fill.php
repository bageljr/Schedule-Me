<?php

		$cell = $_GET['cellnum'];
		$cellnum = $cell % 48;
		$username = $_GET['user'];
 
 		$mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
 		if ($mysqli->connect_errno) 
 		{
 				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
 		}

 		$target = floor($cell / 48);
 		
 		$sql = "select name from events where start_time <= '$cellnum' and end_time >= ('$cellnum' + 1) 
 		and '$target' = start_date and '$username' = user_name";
 		$result = $mysqli->query($sql);
 
 	    while($row = $result->fetch_assoc()) 
 	    {
 	        echo $row['name'];
 	    }
 ?>