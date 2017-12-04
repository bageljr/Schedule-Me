<?php

    $mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
    if ($mysqli->connect_errno) 
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    echo $mysqli->host_info . "\n";
      
    $username = $_POST['username'];
    $groupname = $_POST['groupName'];
    
    $sql = "select username from usergroups where '$username' = username and '$groupname' = groupname";

    if ($result = $mysqli->query($sql)) 
    {

            $row_cnt = $result->num_rows;
            echo($row_cnt);
            $result->close();
    }

    if ($row_cnt == 0)
    {
        $sql2 = "INSERT INTO usergroups (username, groupname) 
        VALUES ('$username', '$groupname')";

        if ($mysqli->query($sql2) === TRUE) 
        {
            echo "New record created successfully";
        } 
    }
?>