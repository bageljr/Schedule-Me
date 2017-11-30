<?php

		$cell = $_GET['cellnum'];
 		$cellnum = $cell % 48;
 		$target = floor($cell / 48);

 		$mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
 		if ($mysqli->connect_errno) 
 		{
 				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
 		}
 		
 		$sql = "select name from events where start_time <= '$cellnum' and end_time >= ('$cellnum' + 1) 
 		and '$target' = start_date";

 		//$sql = "select count(name) from events where start_time == 75");
 
 		if ($result = $mysqli->query($sql)) 
 		{

		    /* determine number of rows result set */
		    $row_cnt = $result->num_rows;

		    echo($row_cnt);

		    /* close result set */
		    $result->close();
		}
 ?>