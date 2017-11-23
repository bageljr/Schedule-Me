<?php
		
		$cellnum = $_GET['cellnum'];

		$mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
		if ($mysqli->connect_errno) 
		{
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		
		/*$sql = "select name from events where start_time <= $cellnum and end_time >= $cellnum";*/
		$sql = "select name from events";
		$result = $mysqli->query($sql);

	    while($row = $result->fetch_assoc()) 
	    {
	        echo $row['name'];
	    }
?>        