<?php

	$mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
    if ($mysqli->connect_errno) 
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $sql = "select group from groups where ";

	echo "<ul>";

	while ($result = $mysqli->query($sql)) 
	{
	    echo "<li>'".$temp['id']."'>".$temp['name']."</option>";
	}
	echo "</select>";
?>