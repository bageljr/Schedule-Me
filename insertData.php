<?php

    $mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    echo $mysqli->host_info . "\n";

    $startTime =$_POST['startTime'];
    $startDate =$_POST['startDate'];
    $endTime = $_POST['endTime'];
    $endTime =$_POST['endDate'];
    $eventName = $_POST['eventName'];
    $eventLocation = $_POST['eventLocation'];
    $eventDescription = $_POST['eventDescription'];

    $sql = "INSERT INTO events (event_id, start_time, start_date, end_time, end_date, name, location, description) 
        VALUES ('1', '$startTime', '$startDate', '$endTime', '$endDate', '$eventName', '$eventLocation', '$eventDescription')";
        
    if ($mysqli->query($sql) === TRUE) 
    {
        echo "New record created successfully";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
?>