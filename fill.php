<?php

		$mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
		if ($mysqli->connect_errno) 
		{
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		
		/*$sql = "select name from events where start_time <= $cellnum and end_time >= $cellnum";*/
		$sql = "select * from events";
		$result = $mysqli->query($sql);
		$arr = array();

	    while($row = $result->fetch_assoc()) 
	    {
	    	$arr[0] = $row["start_time"];
	    	$arr[1] = $row["start_date"];
	    	$arr[2] = $row["end_time"];
	    	$arr[3] = $row["end_date"];
	    	$arr[4] = $row["name"];
	        
	        echo json_encode($arr);
	    }
?>        