<?php

    $mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
    if ($mysqli->connect_errno) 
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    echo $mysqli->host_info . "\n";

    $startTime =$_POST['startTime'];
    $startTimeNum = intval($startTime);
    $startDate =$_POST['startDate'];
    $endTime = $_POST['endTime'];
    $endTimeNum = intval($endTime);
    $endDate =$_POST['endDate'];
    $eventName = $_POST['eventName'];
    $eventLocation = $_POST['eventLocation'];
    $eventDescription = $_POST['eventDescription'];
    $groupname = $_POST['groupName'];

    $sql = "select * from usergroups where '$groupname' = groupname";
    $result = $mysqli->query($sql);

    while($row = $result->fetch_assoc())
    {
        $name = $row['username'];
        
        $sql2 = "INSERT INTO events (start_time, start_date, end_time, end_date, name, user_name, location, description) 
        VALUES ('$startTimeNum', '$startDate', '$endTimeNum', '$endDate', '$eventName', '$name', '$eventLocation', '$eventDescription') ";

        if ($mysqli->query($sql2) === TRUE) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
?>