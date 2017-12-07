<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ScheduleMe - Group Schedule</title>
    <!-- Bootstrap Core CSS -->
    <link href="./static/lib/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="./static/css/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./static/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <!-- <link href="./static/css/morris.css" rel="stylesheet"> -->
    <!-- Custom Fonts -->
    <link href="./static/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./static/css/custom.css">
    <link rel="stylesheet" href="./static/css/circle.css">
    <!-- added these two for dialogue box-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Data for testing purpose -->
    <script src='./static/js/data.js' type='text/javascript'></script>
    <script src='./static/js/customer-list.js' type='text/javascript'></script>
    <script src='./static/js/customer-data.js' type='text/javascript'></script>
    <script src='./static/js/accounts-data.js' type='text/javascript'></script>
    <script src='./static/js/activities-data.js' type='text/javascript'></script>
    

    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    body {
    }
    
    <style> svg {
        font: 10px sans-serif;
    }
    
    path {
        fill: steelblue;
    }
    
    .ui-draggable, .ui-droppable {
        background-position: top;
    }

    .axis path,
    .axis line {
        fill: none;
        stroke: #000;
        shape-rendering: crispEdges;
    }
    
    .brush .extent {
        stroke: #fff;
        fill-opacity: .125;
        shape-rendering: crispEdges;
    }
    
    .d3-tip {
        line-height: 1;
        /*    font-weight: bold;
*/
        padding: 12px;
        background: rgba(0, 0, 0, 0.8);
        color: #fff;
        border-radius: 2px;
    }
    /* Creates a small triangle extender for the tooltip */
    
    .d3-tip:after {
        box-sizing: border-box;
        display: inline;
        font-size: 6px;
        width: 100%;
        line-height: 1;
        color: rgba(0, 0, 0, 0.8);
        content: "\25BC";
        position: absolute;
        text-align: center;
    }
    /* Style northward tooltips differently */
    
    .d3-tip.n:after {
        margin: -1px 0 0 0;
        top: 100%;
        left: 0;
    }
    
    #update {
        font-family: Georgia, "Times New Roman", Times, serif;
        width: 100%;
        margin: 0 auto;
        border-top: 1px dotted #CCC;
    }
    
    #update ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    
    #update ul li {
        width: 100%;
        padding: 0 0px;
        background: #EEE;
        padding-bottom: 10px;
        height: 40px;
        overflow: hidden;
        border-bottom: 1px dotted #CCC;
        -webkit-animation: myanim 1s;
        -moz-appearance-animation: myanim 1s;
        -o-animation: myanim 1s;
        animation: myanim 1s;
        -webkit-transition: height 0.3s ease-out;
        -moz-appearance-transition: height 0.3s ease-out;
        -o-transition: height 0.3s ease-out;
        transition: height 0.3s ease-out;
    }
    
    #update li:hover {
        background: #FFFCE5;
        min-height: 40px;
        height: 40px;
        overflow: visible;
    }
    
    #update h2 {
        margin: 0;
        padding: 0;
        font-size: 12px;
        padding-bottom: 5px;
        padding-top: 5px;
        font-family: Arial, Helvetica, sans-serif;
        color: #BF5841;
        border-bottom: 1px dotted #CCC;
        margin-bottom: 10px;
    }
    
    #update img {
        float: left;
        width: 40px;
        margin-right: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
    }
    
    @-webkit-keyframes myanim {
        0% {
            opacity: 0.3;
        }
        100% {
            opacity: 1.0;
        }
    }
    
    @-o-keyframes myanim {
        0% {
            opacity: 0.3;
        }
        100% {
            opacity: 1.0;
        }
    }
    
    @-moz-keyframes myanim {
        0% {
            opacity: 0.3;
        }
        100% {
            opacity: 1.0;
        }
    }
    
    @keyframes myanim {
        0% {
            opacity: 0.3;
        }
        100% {
            opacity: 1.0;
        }
    }
    </style>
</head>

<body class="application pushmenu-push">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <a class="navbar-brand dashboard-title" href="index.html" style="color:rgb(67,120,180);">ScheduleMe</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="MySchedule.html"><i class="fa fa-user fa-fw"></i>My Calendar</a>
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>My Groups<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a>Group 1</a></li>
                                <li><a>Group 2</a></li>
                                <li><a>Group 3</a></li>
                            </ul>-->
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-users fa-fw"></i> My Groups<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <?php
                                $userName = $_POST['username'];
                                $mysqli = new mysqli("127.0.0.1", "njelinsk", "njelinsk96", "Schedules", 3306);
                                if ($mysqli->connect_errno) 
                                {
                                    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                                }
                                $sql = "select groupname from usergroups where '$userName' = username";
                                $result = $mysqli->query($sql);
                                //$result = $mysqli->query($sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);

                                while($row = $result->fetch_assoc())
                                {
                                  echo '<li><a href=group.php?username='.$userName.'&groupName='.$row['groupname'].'>'.$row['groupname'].'</a></li>';
                                  //echo "Here";
                                }
                            ?>
                          </ul>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-signing fa-fw"></i>My Friends</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="sidebar-search">
                            <div id="searcharea">
                                <p>Search:</p>
                                <input type="search" name="search" id="search" placeholder="Search for something..." />
                            </div>
                        </li>
                        <li>
                            <div id="update"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- MAIN SECTION OF PAGE -->
        <div id="page-wrapper" style="height: 1425px; width: 1000px">
            <br>
            Welcome, <?php echo $_GET['username'] ?>!
            <div class="row">
                <p id="currenttime" align="right" padding-left="0cm" display="inline-block"></p>
            </div>
            <!-- /.row -->
                <div class="col-lg-8">
                    <div class="panel panel-default" id="svg" style="width: 833px">
                        <div class="panel-heading">
                            <i class="fa fa-calendar fa-fw"></i>"<?php echo $_GET['groupName']?>" Group Calendar
                            <div class="pull-right">
                                <!--<button onclick = "displayForm()" type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        New Event
                                        <span class="caret"></span>
                                </button>-->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Create Group
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <form id="gForm">
                                                Group Name:<br>
                                                <input type="text" name="groupName"> <br>
                                                <input type="hidden" name="username" value="<?php echo $_POST['username'] ?>">
                                                <input type="button" value="Submit" onclick="submitGroup()">
                                            </form>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-default btn-xs" onclick="prevWeek()"> < </button>
                                <button type="button" class="btn btn-default btn-xs" onclick="resetDate()" disabled id="Today"> Today </button>
                                <button type="button" class="btn btn-default btn-xs" onclick="nextWeek()"> > </button>
                            
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Create New Event
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <form id="Form">
                                                Start Time:<br>
                                                <!-- <input type="time" name="startTime"> -->
                                                <select name="startTime" id="startTime">
                                                    <option value="1">12:00AM</option>
                                                    <option value="2">12:30AM</option>
                                                    <option value="3">1:00AM</option>
                                                    <option value="4">1:30AM</option>
                                                    <option value="5">2:00AM</option>
                                                    <option value="6">2:30AM</option>
                                                    <option value="7">3:00AM</option>
                                                    <option value="8">3:30AM</option>
                                                    <option value="9">4:00AM</option>
                                                    <option value="10">4:30AM</option>
                                                    <option value="11">5:00AM</option>
                                                    <option value="12">5:30AM</option>
                                                    <option value="13">6:00AM</option>
                                                    <option value="14">6:30AM</option>
                                                    <option value="15">7:00AM</option>
                                                    <option value="16">7:30AM</option>
                                                    <option value="17">8:00AM</option>
                                                    <option value="18">8:30AM</option>
                                                    <option value="19">9:00AM</option>
                                                    <option value="20">9:30AM</option>
                                                    <option value="21">10:00AM</option>
                                                    <option value="22">10:30AM</option>
                                                    <option value="23">11:00AM</option>
                                                    <option value="24">11:30AM</option>
                                                    <option value="25">12:00PM</option>
                                                    <option value="26">12:30PM</option>
                                                    <option value="27">1:00PM</option>
                                                    <option value="28">1:30PM</option>
                                                    <option value="29">2:00PM</option>
                                                    <option value="30">2:30PM</option>
                                                    <option value="31">3:00PM</option>
                                                    <option value="32">3:30PM</option>
                                                    <option value="33">4:00PM</option>
                                                    <option value="34">4:30PM</option>
                                                    <option value="35">5:00PM</option>
                                                    <option value="36">5:30PM</option>
                                                    <option value="37">6:00PM</option>
                                                    <option value="38">6:30PM</option>
                                                    <option value="39">7:00PM</option>
                                                    <option value="40">7:30PM</option>
                                                    <option value="41">8:00PM</option>
                                                    <option value="42">8:30PM</option>
                                                    <option value="43">9:00PM</option>
                                                    <option value="44">9:30PM</option>
                                                    <option value="45">10:00PM</option>
                                                    <option value="46">10:30PM</option>
                                                    <option value="47">11:00PM</option>
                                                    <option value="48">11:30PM</option>
                                                <input type="date" name="startDate" id="startDate">
                                                <br>
                                                End Time:<br>
                                                <select name="endTime" id="endTime">
                                                    <option value="1">12:00AM</option>
                                                    <option value="2">12:30AM</option>
                                                    <option value="3">1:00AM</option>
                                                    <option value="4">1:30AM</option>
                                                    <option value="5">2:00AM</option>
                                                    <option value="6">2:30AM</option>
                                                    <option value="7">3:00AM</option>
                                                    <option value="8">3:30AM</option>
                                                    <option value="9">4:00AM</option>
                                                    <option value="10">4:30AM</option>
                                                    <option value="11">5:00AM</option>
                                                    <option value="12">5:30AM</option>
                                                    <option value="13">6:00AM</option>
                                                    <option value="14">6:30AM</option>
                                                    <option value="15">7:00AM</option>
                                                    <option value="16">7:30AM</option>
                                                    <option value="17">8:00AM</option>
                                                    <option value="18">8:30AM</option>
                                                    <option value="19">9:00AM</option>
                                                    <option value="20">9:30AM</option>
                                                    <option value="21">10:00AM</option>
                                                    <option value="22">10:30AM</option>
                                                    <option value="23">11:00AM</option>
                                                    <option value="24">11:30AM</option>
                                                    <option value="25">12:00PM</option>
                                                    <option value="26">12:30PM</option>
                                                    <option value="27">1:00PM</option>
                                                    <option value="28">1:30PM</option>
                                                    <option value="29">2:00PM</option>
                                                    <option value="30">2:30PM</option>
                                                    <option value="31">3:00PM</option>
                                                    <option value="32">3:30PM</option>
                                                    <option value="33">4:00PM</option>
                                                    <option value="34">4:30PM</option>
                                                    <option value="35">5:00PM</option>
                                                    <option value="36">5:30PM</option>
                                                    <option value="37">6:00PM</option>
                                                    <option value="38">6:30PM</option>
                                                    <option value="39">7:00PM</option>
                                                    <option value="40">7:30PM</option>
                                                    <option value="41">8:00PM</option>
                                                    <option value="42">8:30PM</option>
                                                    <option value="43">9:00PM</option>
                                                    <option value="44">9:30PM</option>
                                                    <option value="45">10:00PM</option>
                                                    <option value="46">10:30PM</option>
                                                    <option value="47">11:00PM</option>
                                                    <option value="48">11:30PM</option>
                                                <input type="date" name="endDate" id="endDate">
                                                <br>
                                                Event Name: <br>
                                                <input type="text" name="eventName">
                                                <br>
                                                Description:<br>
                                                <input type="text" name="eventDescription">
                                                <br>
                                                Location:<br>
                                                <input type="text" name="eventLocation">
                                                <br><br>
                                                <input type="hidden" name="groupName" value="<?php echo $_GET['groupName'] ?>">
                                                <input type="button" value="Submit" onclick="Schedule()">
                                            </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <!-- MY CALENDAR BODY BEGINS -->
                        <div class="panel-body" style="height: 800px; overflow-y: auto;">
                            <!--<ul id="customer-timeline">
                                </ul>-->
                            <html>
                                <head>
                                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

                                    <style>
                                        body { font-family:'lucida grande', tahoma, verdana, arial, sans-serif; font-size:11px; }
                                        h1 { font-size: 15px; }
                                        a { color: #548dc4; text-decoration: none; }
                                        a:hover { text-decoration: underline; }
                                        table.testgrid { border-collapse: collapse; border: 1px solid #CCB; width: 800px; }
                                        table.testgrid td, table.testgrid th { padding: 5px; border: 1px solid #E0E0E0; }
                                        th { background: #E5E5E5; text-align: center; border-bottom: 2px solid black;}
                                        input.invalid { background: red; color: #FDFDFD; }
                                        
                                        td{ 
                                            height: 26px;
                                            width: 100px;
                                            max-width: 100px;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;
                                            text-align: center;
                                        }

                                        td.selected {
                                            background-color: red;
                                        }

                                        td.selected0 {
                                            background-color: #2DCC40;
                                        }
                                        
                                        
                                        td.selected9 {
                                            background-color: #F96835;
                                        }
                                        
                                        td.selected8 {
                                            background-color: #F48E34;
                                        }
                                        
                                        td.selected7 {
                                            background-color: #EFB233;
                                        }
                                        
                                        td.selected6 {
                                            background-color: #EAD432;
                                        }
                                        
                                        td.selected5 {
                                            background-color: #D6E532;
                                        }
                                        
                                        td.selected4 {
                                            background-color: #ADE031;
                                        }
                                        
                                        td.selected3 {
                                            background-color: #86DB30;
                                        }
                                        
                                        td.selected2 {
                                            background-color: #61D62F;
                                        }
                                        
                                        td.selected1 {
                                            background-color: #3DD12E;
                                        }

                                        td.selected10 {
                                            background-color: #FF4036;
                                        }

                                        
                                        td.tempSelected {
                                            background-color: red; 
                                            opacity: .5;
                                        }
                                        
                                        #eventForm {
                                            display: none;
                                            font-color: red;
                                            z-index: 10;
                                            position: absolute;
                                            background-color: white;
                                        }
                                        
                                        #popupForm {
                                            display: none;
                                            position:fixed;
                                            top: 50%;
                                            left: 75%;
                                            width:30em;
                                            height:18em;
                                            margin-top: -9em; /*set to a negative number 1/2 of your height*/
                                            margin-left: -15em; /*set to a negative number 1/2 of your width*/
                                            border: 1px solid #ccc;
                                            background-color: #f3f3f3;
                                        }
                                        
                                        #infoDisplay {
                                            display: none;
                                            position: fixed;
                                            top: 50%;
                                            left: 75%;
                                            width:30em;
                                            height:18em;
                                            margin-top: -9em; /*set to a negative number 1/2 of your height*/
                                            margin-left: -15em; /*set to a negative number 1/2 of your width*/
                                            border: 1px solid #ccc;
                                            background-color: #f3f3f3;
                                        }
                                        
                                        #groupForm {
                                            display: none;
                                        }

                                    </style>
                                    
                                    
                                    
                                    <script>
                                    //Updates the calendar with the value of currentDate
                                    function loadDate() {
                                        weekDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                                        var toDay = window.currentDate;
                                        toDay = new Date(toDay - 18000000);
                                        var currentWeekDay = toDay.getDay();
                                        var tempDay = toDay;
                                        document.getElementById("w" + currentWeekDay).innerHTML = weekDays[toDay.getDay()] + "<br>" + (toDay.getMonth()+1) + "/" + toDay.getDate();
                                        
                                        //not sure why both past and future dates can't be found using the same method, but it doesn't so two different methods are used
                                        for (i=currentWeekDay; i>0; i--) {
                                            tempDay = new Date(tempDay - 86400000);
                                            var tempWeekDay = tempDay.getDay();
                                            document.getElementById("w" + tempWeekDay).innerHTML = weekDays[tempDay.getDay()] + "<br>" + (tempDay.getMonth()+1) + "/" + tempDay.getDate();
                                        }
                                        var tempDay = toDay;
                                        for (i=currentWeekDay; i<6; i++) {
                                            tempDay.setDate(tempDay.getDate()+1);
                                            var tempWeekDay = tempDay.getDay();
                                            document.getElementById("w" + tempWeekDay).innerHTML = weekDays[tempDay.getDay()] + "<br>" + (tempDay.getMonth()+1) + "/" + tempDay.getDate();
                                        }
                                    }
                                    </script>

                                    <script type="text/javascript">
                                        $('ul.dropdown-menu').on('click', function(event){
                                            // The event won't be propagated up to the document NODE and 
                                            // therefore delegated events won't be fired
                                            event.stopPropagation();
                                        });
                                    </script>
                                    
                                    <script>
                                    //On page load, gets the dates of the current weekdays and adds them to the table
                                    window.onload = function() {
                                        var val = "<?php echo $_POST['username'] ?>";
                                        loadDate();
                                        var results = count();
                                    }
                                    </script>
                                    
                                    <script>

                                        function populate(j) // fills in with database info
                                        {
                                            var val = "<?php echo $_POST['username'] ?>";
                                            $.ajax({                                      
                                                    url:'http://localhost/~nolanjelinski/fill.php',     
                                                    type: 'GET',
                                                    data: {cellnum: j, user: val},                                           
                                                    success: function(data)          
                                                    {
                                                        var event = data;
                                                        document.getElementById(j).innerHTML = event; 
                                                        //document.getElementById(j).classList.add('selected');
                                                    }
                                                });
                                        }

                                        function fillIn() // needs to call separate function outside of loop
                                        {                       
                                            for (i = 1; i <= 336; i++)
                                            {
                                                populate(i);
                                            }
                                        }
                                    </script>

                                    <script>
                                    //displays the create event form
                                    function displayForm() {
                                        setDefaultForm();
                                        var form = document.getElementById("eventForm");
                                        form.style.display = "block";
                                    }
                                    </script>
                                    
                                    <script>
                                    //hides the create event form
                                    function hideForm() {
                                        var form = document.getElementById("eventForm");
                                        form.style.display = "none";
                                    }
                                    </script>
                                    
                                    <script>
                                        function Schedule()
                                        {
                                            var val = "<?php echo $_POST['username'] ?>";
                                            //var form = document.getElementById("eventForm");
                                            //form.style.display = "none";
                                            
                                            var toDay = new Date();
                                            toDay = new Date(toDay + 14400000);
                                            var currentWeekDay = toDay.getDay();
                                            //Potential problem with remaining time in the day
                                            var sunDay = new Date(toDay - (86400000 * currentWeekDay));//.setDate(toDay.getDate()-currentWeekDay));
                                            var satDay = new Date(toDay.setDate(toDay.getDate()+(6-currentWeekDay))); //+ (86400000 * (6-currentWeekDay)));
                                            var data = $('#Form').serializeArray();
                                            var startTime = data[0].value;
                                            var startDate = data[1].value;
                                            var inputStartDate = new Date(startDate);
                                            var inputStartDay = inputStartDate.getDay();
                                            console.log(inputStartDay);
                                            startDate = new Date(startDate);
                                            //The date generated is behind by one day because of time zone conversions, to compensate 1 is added to to move it up 
                                            startDay = (startDate.getDay()+1)%7;
                                            data[1].value = startDay;
                                            var endTime = data[2].value;
                                            var endDate = data[3].value;
                                            var inputEndDate = new Date(endDate);
                                            var inputEndDay = inputEndDate.getDay();
                                            endDate = new Date(endDate);
                                            endDay = (endDate.getDay()+1)%7;
                                            data[3].value = endDay;
                                            var eventName = data[4].value;
                                            var startCell = parseInt(startTime) + (48 * startDay);
                                            var endCell = parseInt(endTime) + (48 * endDay);
                                            if (startDate < sunDay) {
                                                startCell = 1;
                                            }
                                            if (startDate > satDay) {
                                                startCell = 337;
                                            }
                                            if (endDate < sunDay) {
                                                endCell = 1;
                                            }
                                            if (endDate > satDay) {
                                                endCell = 337;
                                            }
                                            for (i=0; i<(endCell-startCell); i++) {
                                                var cell = parseInt(startCell) + i; 
                                                //document.getElementById(cell).innerHTML;
                                                document.getElementById(cell).classList.add('selected');
                                            }
                                            
                                            //final 18000000 is needed to offset time difference from UTC
                                            /*startDate.setTime(startDate.getTime() + (1800000 * (parseInt(startTime)-1)) + 18000000);
                                            endDate.setTime(endDate.getTime() + (1800000 * (parseInt(endTime)-1)) + 18000000);
                                            data[0].value = + startDate;
                                            data[2].value = + endDate;*/
                                            
                                            //if (checkConflict(startCell, endCell)) {
                                            for (i=0; i<(endCell-startCell); i++) {
                                                var cell = parseInt(startCell) + i;
                                                if (eventArray[cell-1].numEvents == 0) {
                                                    //document.getElementById(cell).innerHTML = eventName;
                                                    document.getElementById(cell).classList.add('selected1');
                                                    eventArray[cell-1].eventNames[0] = eventName;
                                                    eventArray[cell-1].startTimes[0] = startDate;
                                                    eventArray[cell-1].endTimes[0] = endDate;
                                                    eventArray[cell-1].descriptions[0] = data[5].value;
                                                    eventArray[cell-1].locations[0] = data[6].value;
                                                    eventArray[cell-1].numEvents ++;
                                                }
                                                else {
                                                    document.getElementById(cell).insertAdjacentHTML('afterbegin', eventName+" / ");
                                                    eventArray[cell-1].eventNames[eventArray[cell-1].numEvents] = eventName;
                                                    eventArray[cell-1].startTimes[eventArray[cell-1].numEvents] = startDate;
                                                    eventArray[cell-1].endTimes[eventArray[cell-1].numEvents] = endDate;
                                                    eventArray[cell-1].descriptions[eventArray[cell-1].numEvents] = data[5].value;
                                                    eventArray[cell-1].locations[eventArray[cell-1].numEvents] = data[6].value;
                                                    eventArray[cell-1].numEvents ++;
                                                    document.getElementById(cell).classList.add('selected'+eventArray[cell-1].numEvents);
                                                }
                                            }
                                            //}
                                            //Can be used to post data to external database
                                            $.ajax({
                                                url:'http://localhost/~nolanjelinski/scheduleevent.php',
                                                type:'post',
                                                data: data,
                                                success:function(){
                                                    
                                                    count();
                                                }
                                            });
                                        
                                        }
        </script>
                                    
                                    <script>
                                    //Resets the form to default values, including today's date
                                    function setDefaultForm() {
                                        document.getElementById('Form').reset();
                                        document.getElementById('startDate').valueAsDate = new Date(currentDate);
                                        document.getElementById('endDate').valueAsDate = new Date(currentDate);
                                    }
                                    </script>
                                    
                                    <script>
                                    //Displays the popup form (when the user highlights boxes)
                                    function pdisplayForm() {
                                        var form = document.getElementById("popupForm");
                                        //form.style.display = "block";
                                        //TODO Change to put on date user selected
                                        //document.getElementById('pstartDate').valueAsDate = new Date();
                                        //document.getElementById('pendDate').valueAsDate = new Date();
                                    }
                                    </script>
                                    
                                    <script>
                                    //Hides the popup form
                                    function phideForm() {
                                        var form = document.getElementById("popupForm");
                                        form.style.display = "none";
                                        document.getElementById('pForm').reset();
                                        document.getElementById('pstartDate').valueAsDate = new Date();
                                        document.getElementById('pendDate').valueAsDate = new Date();
                                        for (i=1; i<=336; i++) { 
                                            document.getElementById(i).classList.remove('tempSelected');
                                         }
                                    }
                                    </script>
                                    
                                    <script>
                                    //Submits the popup form, taking the information from it
                                    function pSubForm (){
                                        var form = document.getElementById("popupForm");
                                        form.style.display = "none";
                                        for (i=1; i<=336; i++) { 
                                            document.getElementById(i).classList.remove('tempSelected');
                                         }
                                        
                                        var toDay = window.currentDate;
                                        toDay = new Date(toDay + 18000000);
                                        var currentWeekDay = toDay.getDay();
                                        //Potential problem with remaining time in the day
                                        var sunDay = new Date(toDay - (86400000 * (currentWeekDay+1)));//.setDate(toDay.getDate()-currentWeekDay));
                                        var satDay = new Date(toDay.setDate(toDay.getDate()+(6-currentWeekDay))); //+ (86400000 * (6-currentWeekDay))); 
                                        var data = $('#pForm').serializeArray();
                                        var startTime = data[0].value;
                                        var startDate = data[1].value;
                                        startDate = new Date(startDate);
                                        //The date generated is behind by one day because of time zone conversions, to compensate 1 is added to to move it up 
                                        startDay = (startDate.getDay()+1)%7;
                                        var endTime = data[2].value;
                                        var endDate = data[3].value;
                                        endDate = new Date(endDate);
                                        endDay = (endDate.getDay()+1)%7;
                                        var eventName = data[4].value;
                                        var startCell = parseInt(startTime) + (48 * startDay);
                                        var endCell = parseInt(endTime) + (48 * endDay);
                                        if (startDate < sunDay) {
                                            startCell = 1;
                                        }
                                        if (startDate > satDay) {
                                            startCell = 337;
                                        }
                                        if (endDate < sunDay) {
                                            endCell = 1;
                                        }
                                        if (endDate > satDay) {
                                            endCell = 337;
                                        }
                                        
                                        //final 18000000 is needed to offset time difference from UTC
                                        /*startDate.setTime(startDate.getTime() + (1800000 * (parseInt(startTime)-1)) + 18000000);
                                        endDate.setTime(endDate.getTime() + (1800000 * (parseInt(endTime)-1)) + 18000000);
                                        data[0].value = + startDate;
                                        data[2].value = + endDate;*/
                                        
                                        //if (checkConflict(startCell, endCell)) {
                                        for (i=0; i<(endCell-startCell); i++) {
                                            var cell = parseInt(startCell) + i;
                                            if (eventArray[cell-1].numEvents == 0) {
                                                document.getElementById(cell).innerHTML = eventName;
                                                document.getElementById(cell).classList.add('selected1');
                                                eventArray[cell-1].eventNames[0] = eventName;
                                                eventArray[cell-1].startTimes[0] = startDate;
                                                eventArray[cell-1].endTimes[0] = endDate;
                                                eventArray[cell-1].descriptions[0] = data[5].value;
                                                eventArray[cell-1].locations[0] = data[6].value;
                                                eventArray[cell-1].numEvents ++;
                                            }
                                            else {
                                                document.getElementById(cell).insertAdjacentHTML('afterbegin', eventName+" / ");
                                                eventArray[cell-1].eventNames[eventArray[cell-1].numEvents] = eventName;
                                                eventArray[cell-1].startTimes[eventArray[cell-1].numEvents] = startDate;
                                                eventArray[cell-1].endTimes[eventArray[cell-1].numEvents] = endDate;
                                                eventArray[cell-1].descriptions[eventArray[cell-1].numEvents] = data[5].value;
                                                eventArray[cell-1].locations[eventArray[cell-1].numEvents] = data[6].value;
                                                eventArray[cell-1].numEvents ++;
                                                document.getElementById(cell).classList.add('selected'+eventArray[cell-1].numEvents);
                                            }
                                        }
                                        //}
                                        //Can be used to post data to external database
                                        $.ajax({
                                            url:'http://localhost/~nolanjelinski/insertData.php',
                                            type:'post',
                                            data:data,
                                            success:function(){
                                                //alert("worked");
                                            }
                                        });
                                        
                                    }
                                    </script>
                                    
                                    <script>
                                    //Highlights boxes when the user drags on boxes, when the user finishes opens the popup form with the information from the user's drag
                                    $(function () {
                                    //#TODO change the default date based on selection
                                      var isMouseDown = false;
                                      var firstCell = 0;
                                      var cellColumn = 0;
                                      var lastCell = 0;
                                      var firstCellChanged = false;
                                      var lastCellChanged = false;
                                      var highlighted = false;
                                      var isNotTime = false;
                                      $("#htmlgrid td")
                                        .mousedown(function () {
                                          isMouseDown = true;
                                          firstCell = $(this).attr('id');
                                          firstCell = parseInt(firstCell);
                                          cellColumn = parseInt((firstCell-1)/48);
                                          lastCell = parseInt(firstCell);
                                          if (eventArray[firstCell-1].numEvents != 0) {
                                            highlighted = true;
                                            showDisplay(firstCell);
                                          }
                                          else if (!(firstCell > 0) && !(lastCell < 336)) {
                                            isNotTime = true;
                                          }
                                          else {
                                            $(this).toggleClass("tempSelected");
                                          }
                                          return false; // prevent text selection
                                        })
                                        .mouseover(function () {
                                          if ((isMouseDown) && !(highlighted)) {
                                            var currentCell = parseInt($(this).attr('id'));
                                            if (parseInt((currentCell-1)/48) == cellColumn) {
                                                if (currentCell < firstCell) {
                                                    $(this).addClass("tempSelected");
                                                    firstCell = currentCell;
                                                    firstCellChanged = true;
                                                    lastCellChanged = false;
                                                    for (i=0; i<=(lastCell-firstCell); i++) {
                                                        var cell = parseInt(firstCell) + i; 
                                                        document.getElementById(cell).classList.add('tempSelected');
                                                    }
                                                }
                                                else if((currentCell > firstCell) && (currentCell <= lastCell) && (currentCell-1 == firstCell) && (firstCellChanged)) {
                                                    $("#"+firstCell).removeClass("tempSelected");
                                                    firstCell = currentCell;
                                                    firstCellChanged = true;
                                                    lastCellChanged = false;
                                                }
                                                else if((currentCell >= firstCell) && (currentCell < lastCell) && (currentCell+1 == lastCell) &&  (lastCellChanged)) {
                                                    $("#"+lastCell).removeClass("tempSelected");
                                                    lastCell = currentCell;
                                                    firstCellChanged = false;
                                                    lastCellChanged = true;
                                                }
                                                else if(currentCell > lastCell) {
                                                    $(this).addClass("tempSelected");
                                                    lastCell = currentCell;
                                                    firstCellChanged = false;
                                                    lastCellChanged = true;
                                                    for (i=0; i<=(lastCell-firstCell); i++) {
                                                        var cell = parseInt(firstCell) + i; 
                                                        document.getElementById(cell).classList.add('tempSelected');
                                                    }
                                                }
                                            }
                                          }
                                        });
                                      
                                      $("#htmlgrid td")
                                        .mouseup(function () {
                                          if (!highlighted && !isNotTime) {
                                              var is12 = false;
                                              pdisplayForm();
                                              document.getElementById('pForm').reset();
                                              document.getElementById("pstartTime").value = (firstCell%48);
                                              document.getElementById("pendTime").value = ((lastCell%48)+1);
                                              if (firstCell%48 == 0) {
                                                document.getElementById("pstartTime").value = "48";
                                              }
                                              if (lastCell%48 == 0) {
                                                is12 = true;
                                              }
                                              var toDay = window.currentDate;
                                              toDay = new Date(toDay - 18000000);
                                              var currentWeekDay = toDay.getDay();
                                              var dayDiff = cellColumn - currentWeekDay;
                                              var currentDay = new Date(toDay.setDate(toDay.getDate() + dayDiff));
                                              
                                              document.getElementById('pstartDate').valueAsDate = currentDay;
                                              document.getElementById('pendDate').valueAsDate = currentDay;
                                              if (is12 == true) {
                                                tomorrow = new Date(currentDay.setDate(currentDay.getDate()+1));
                                                document.getElementById('pendDate').valueAsDate = tomorrow;
                                              }
                                              
                                          }
                                          
                                          firstCellChanged = false;
                                          lastCellChanged = false;
                                          isMouseDown = false;
                                          highlighted = false;
                                          isNotTime = false;
                                          firstCell = 0;
                                          cellColumn = 0;
                                          lastCell = 0;
                                        });
                                    });
                                    </script>
                                    
                                    <script>
                                    function clearCalendar() {
                                        for (i=1; i<337; i++) {
                                            var cell = i; 
                                            document.getElementById(cell).innerHTML = "";
                                            document.getElementById(cell).classList.remove('selected');
                                        }
                                        clearEventArray();
                                    }
                                    </script>
                                    
                                    <script>
                                    function prevWeek() {
                                        window.currentDate = new Date(window.currentDate - 604800000);
                                        var currentWeekDay = finalDate.getDay();
                                        if (window.currentDate.getTime() === window.finalDate.getTime()) {
                                            document.getElementById("Today").disabled = true;
                                            document.getElementById("w"+currentWeekDay).style.backgroundColor = "#346bef";
                                            document.getElementById("w"+currentWeekDay).style.color = "white";
                                        }
                                        else {
                                            document.getElementById("Today").disabled = false;
                                            document.getElementById("w"+currentWeekDay).style.backgroundColor = "#E5E5E5";
                                            document.getElementById("w"+currentWeekDay).style.color = "black";
                                        }
                                        loadDate();
                                        clearCalendar();
                                        fillIn();
                                    }
                                    </script>
                                    
                                    <script>
                                    function nextWeek() {
                                        window.currentDate.setTime(window.currentDate.getTime() + 604800000);
                                        var currentWeekDay = finalDate.getDay();
                                        if (window.currentDate.getTime() === window.finalDate.getTime()) {
                                            document.getElementById("Today").disabled = true;
                                            document.getElementById("w"+currentWeekDay).style.backgroundColor = "#346bef";
                                            document.getElementById("w"+currentWeekDay).style.color = "white";
                                        }
                                        else {
                                            document.getElementById("Today").disabled = false;
                                            document.getElementById("w"+currentWeekDay).style.backgroundColor = "#E5E5E5";
                                            document.getElementById("w"+currentWeekDay).style.color = "black";
                                        }
                                        loadDate();
                                        clearCalendar();
                                        fillIn();
                                    }
                                    </script>
                                    
                                    <script>
                                    function resetDate() {
                                        window.currentDate.setTime(window.finalDate.getTime());
                                        var currentWeekDay = finalDate.getDay();
                                        //window.finalDate = new Date();
                                        document.getElementById("Today").disabled = true;
                                        document.getElementById("w"+currentWeekDay).style.backgroundColor = "#346bef";
                                        document.getElementById("w"+currentWeekDay).style.color = "white";
                                        loadDate();
                                        clearCalendar();
                                    }
                                    </script>
                                    
                                    <script>
                                    function checkConflict(startCell, endCell) {
                                        for (i=0; i<(endCell-startCell); i++) {
                                            var cell = parseInt(startCell) + i;
                                            if($('#'+cell).is('.selected')) {
                                                alert("Schedule conflict");
                                                return false;
                                            }
                                        }
                                        return true;
                                    }
                                    </script>
                                    
                                    <script>
                                    function showDisplay(cell) {
                                        var info = document.getElementById("infoDisplay");
                                        info.style.display = "block";
                                        document.getElementById("infoStart").innerHTML = "Start Time: " + eventArray[cell-1].startTimes;
                                        document.getElementById("infoEnd").innerHTML = "End Time: " + eventArray[cell-1].endTimes;
                                        document.getElementById("infoName").innerHTML = "Event Name: " + eventArray[cell-1].eventNames;
                                        document.getElementById("infoDescription").innerHTML = "Description: " + eventArray[cell-1].descriptions;
                                        document.getElementById("infoLocation").innerHTML = "Location: " + eventArray[cell-1].locations;
                                    }
                                    </script>
                                    
                                    <script>
                                    function hideDisplay() {
                                        var info = document.getElementById("infoDisplay");
                                        info.style.display = "none";
                                    }
                                    </script>
                                    
                                    <script>
                                    function loadDates(data) {
                                        //startTime, startDate, endTime, endDate, eventName, eventDescription eventLocation
                                        var toDay = window.currentDate;
                                        toDay = new Date(toDay + 18000000);
                                        var currentWeekDay = toDay.getDay();
                                        var sunDay = new Date(toDay - (86400000 * (currentWeekDay+1)));
                                        var satDay = new Date(toDay.setDate(toDay.getDate()+(6-currentWeekDay)));  
                                        var startTime = data[0].value;
                                        var startDate = data[1].value;
                                        startDate = new Date(startDate);
                                        //The date generated is behind by one day because of time zone conversions, to compensate 1 is added to to move it up 
                                        startDay = (startDate.getDay()+1)%7;
                                        var endTime = data[2].value;
                                        var endDate = data[3].value;
                                        endDate = new Date(endDate);
                                        endDay = (endDate.getDay()+1)%7;
                                        var eventName = data[4].value;
                                        var startCell = (startTime.getHours() * 2) + (statTime.getMinutes() / 30) + (48 * startDay);
                                        var endCell = (endTime.getHours() * 2) + (endTime.getMinutes() / 30) + (48 * endDay);
                                        if (startDate < sunDay) {
                                            startCell = 1;
                                        }
                                        if (startDate > satDay) {
                                            startCell = 337;
                                        }
                                        if (endDate < sunDay) {
                                            endCell = 1;
                                        }
                                        if (endDate > satDay) {
                                            endCell = 337;
                                        }
                                        
                                        for (i=0; i<(endCell-startCell); i++) {
                                            var cell = parseInt(startCell) + i;
                                            if (eventArray[cell-1].numEvents == 0) {
                                                document.getElementById(cell).innerHTML = eventName;
                                                document.getElementById(cell).classList.add('selected');
                                                eventArray[cell-1].eventNames[0] = eventName;
                                                eventArray[cell-1].startTimes[0] = startDate;
                                                eventArray[cell-1].endTimes[0] = endDate;
                                                eventArray[cell-1].descriptions[0] = data[5].value;
                                                eventArray[cell-1].locations[0] = data[6].value;
                                                eventArray[cell-1].numEvents ++;
                                            }
                                            else {
                                                document.getElementById(cell).insertAdjacentHTML('afterbegin', eventName+" / ");
                                                eventArray[cell-1].eventNames[eventArray[cell-1].numEvents] = eventName;
                                                eventArray[cell-1].startTimes[eventArray[cell-1].numEvents] = startDate;
                                                eventArray[cell-1].endTimes[eventArray[cell-1].numEvents] = endDate;
                                                eventArray[cell-1].descriptions[eventArray[cell-1].numEvents] = data[5].value;
                                                eventArray[cell-1].locations[eventArray[cell-1].numEvents] = data[6].value;
                                                eventArray[cell-1].numEvents ++;
                                            }
                                        }
                                    }
                                    </script>
                                    
                                    <script>
                                    function clearEventArray() {
                                        for (i=0; i <336; i++) {
                                            eventArray[i] = {numEvents: 0, eventNames: [], startTimes: [], endTimes: [], locations: [], descriptions: []}
                                        }
                                    }
                                    </script>
                                    
                                    <script>
                                    function submitGroup() {
                                        var form = document.getElementById("groupForm");
                                        form.style.display = "none";
                                        var data = $('#gForm').serializeArray();
                                        //submit group to database
                                    }
                                    </script>
                                    
                                    <script>
                                    function showGroup() {
                                        var form = document.getElementById("groupForm");
                                        form.style.display = "block";
                                    }
                                    </script>

                                    <script>
                                        function colorSpace(numUsers, j, numEvents) 
                                        {
                                            var color = numEvents/numUsers;
                                            color = color * 10;
                                            color = Math.round(color);
                                            if (color > 10)
                                            {
                                                color = 10;
                                            }
                                            document.getElementById(j).classList.add('selected'+color);
                                            //document.getElementById(j).innerHTML = color;
                                        }

                                        function count()
                                        {
                                            var groupn = "<?php echo $_GET['groupName'] ?>";
                                            $.ajax({                                      
                                                    url:'http://localhost/~nolanjelinski/count.php',     
                                                    type: 'GET',
                                                    data: {group: groupn},                                           
                                                    success: function(data)          
                                                    {
                                                        fillIn(data);
                                                    }
                                                });
                                        }

                                        function countEvents(j, results) // fills in with database info
                                        {
                                            var groupName = "<?php echo $_GET['groupName'] ?>";
                                            var username = "<?php echo $_GET['username'] ?>";
                                            var numUsers = results;

                                            $.ajax({                                      
                                                    url:'http://localhost/~nolanjelinski/countEvents.php',     
                                                    type: 'GET',
                                                    data: {cellnum: j, group: groupName, user: username},                                           
                                                    success: function(data)          
                                                    {
                                                        var numEvents = data;

                                                            colorSpace(numUsers, j, numEvents);
                                                            //document.getElementById(j).innerHTML = numEvents;
                                                    }
                                                });
                                        }

                                        function fillIn(results) // needs to call separate function outside of loop
                                        {                       
                                            for (i = 1; i <= 336; i++)
                                            {
                                                countEvents(i, results);
                                            }
                                        }
                                    </script>
                                    
                                </head>
                                
                                <body>
                                    <table id="htmlgrid" class="testgrid">
                                        <tr>
                                            <th >Time</th>
                                            <th id="w0">Sunday</th>
                                            <th id="w1">Monday</th>
                                            <th id="w2">Tuesday</th>
                                            <th id="w3">Wednesday</th>
                                            <th id="w4">Thursday</th>
                                            <th id="w5">Friday</th>
                                            <th id="w6">Saturday</th>
                                        </tr>
                                        <tr id="R1">
                                            <td bgcolor="#E5E5E5">12:00 AM</td>
                                            <td id="1"></td>
                                            <td id="49"></td>
                                            <td id="97"></td>
                                            <td id="145"></td>
                                            <td id="193"></td>
                                            <td id="241"></td>
                                            <td id="289"></td>
                                        </tr>
                                        <tr id="R2">
                                            <td bgcolor="#E5E5E5">12:30 AM</td>
                                            <td id="2"></td>
                                            <td id="50"></td>
                                            <td id="98"></td>
                                            <td id="146"></td>
                                            <td id="194"></td>
                                            <td id="242"></td>
                                            <td id="290"></td>
                                        </tr>
                                        <tr id="R3">
                                            <td bgcolor="#E5E5E5">1:00 AM</td>
                                            <td id="3"></td>
                                            <td id="51"></td>
                                            <td id="99"></td>
                                            <td id="147"></td>
                                            <td id="195"></td>
                                            <td id="243"></td>
                                            <td id="291"></td>
                                        </tr>
                                        <tr id="R4">
                                            <td bgcolor="#E5E5E5">1:30 AM</td>
                                            <td id="4"></td>
                                            <td id="52"></td>
                                            <td id="100"></td>
                                            <td id="148"></td>
                                            <td id="196"></td>
                                            <td id="244"></td>
                                            <td id="292"></td>
                                        </tr>
                                        <tr id="R5">
                                            <td bgcolor="#E5E5E5">2:00 AM</td>
                                            <td id="5"></td>
                                            <td id="53"></td>
                                            <td id="101"></td>
                                            <td id="149"></td>
                                            <td id="197"></td>
                                            <td id="245"></td>
                                            <td id="293"></td>
                                        </tr>
                                        <tr id="R6">
                                            <td bgcolor="#E5E5E5">2:30 AM</td>
                                            <td id="6"></td>
                                            <td id="54"></td>
                                            <td id="102"></td>
                                            <td id="150"></td>
                                            <td id="198"></td>
                                            <td id="246"></td>
                                            <td id="294"></td>
                                        </tr>
                                        <tr id="R7">
                                            <td bgcolor="#E5E5E5">3:00 AM</td>
                                            <td id="7"></td>
                                            <td id="55"></td>
                                            <td id="103"></td>
                                            <td id="151"></td>
                                            <td id="199"></td>
                                            <td id="247"></td>
                                            <td id="295"></td>
                                        </tr>
                                        <tr id="R8">
                                            <td bgcolor="#E5E5E5">3:30 AM</td>
                                            <td id="8"></td>
                                            <td id="56"></td>
                                            <td id="104"></td>
                                            <td id="152"></td>
                                            <td id="200"></td>
                                            <td id="248"></td>
                                            <td id="296"></td>
                                        </tr>
                                        <tr id="R9">
                                            <td bgcolor="#E5E5E5">4:00 AM</td>
                                            <td id="9"></td>
                                            <td id="57"></td>
                                            <td id="105"></td>
                                            <td id="153"></td>
                                            <td id="201"></td>
                                            <td id="249"></td>
                                            <td id="297"></td>
                                        </tr>
                                        <tr id="R10">
                                            <td bgcolor="#E5E5E5">4:30 AM</td>
                                            <td id="10"></td>
                                            <td id="58"></td>
                                            <td id="106"></td>
                                            <td id="154"></td>
                                            <td id="202"></td>
                                            <td id="250"></td>
                                            <td id="298"></td>
                                        </tr>
                                        <tr id="R11">
                                            <td bgcolor="#E5E5E5">5:00 AM</td>
                                            <td id="11"></td>
                                            <td id="59"></td>
                                            <td id="107"></td>
                                            <td id="155"></td>
                                            <td id="203"></td>
                                            <td id="251"></td>
                                            <td id="299"></td>
                                        </tr>
                                        <tr id="R12">
                                            <td bgcolor="#E5E5E5">5:30 AM</td>
                                            <td id="12"></td>
                                            <td id="60"></td>
                                            <td id="108"></td>
                                            <td id="156"></td>
                                            <td id="204"></td>
                                            <td id="252"></td>
                                            <td id="300"></td>
                                        </tr>
                                        <tr id="R13">
                                            <td bgcolor="#E5E5E5">6:00 AM</td>
                                            <td id="13"></td>
                                            <td id="61"></td>
                                            <td id="109"></td>
                                            <td id="157"></td>
                                            <td id="205"></td>
                                            <td id="253"></td>
                                            <td id="301"></td>
                                        </tr>
                                        <tr id="R14">
                                            <td bgcolor="#E5E5E5">6:30 AM</td>
                                            <td id="14"></td>
                                            <td id="62"></td>
                                            <td id="110"></td>
                                            <td id="158"></td>
                                            <td id="206"></td>
                                            <td id="254"></td>
                                            <td id="302"></td>
                                        </tr>
                                        <tr id="R15">
                                            <td bgcolor="#E5E5E5">7:00 AM</td>
                                            <td id="15"></td>
                                            <td id="63"></td>
                                            <td id="111"></td>
                                            <td id="159"></td>
                                            <td id="207"></td>
                                            <td id="255"></td>
                                            <td id="303"></td>
                                        </tr>
                                        <tr id="R16">
                                            <td bgcolor="#E5E5E5">7:30 AM</td>
                                            <td id="16"></td>
                                            <td id="64"></td>
                                            <td id="112"></td>
                                            <td id="160"></td>
                                            <td id="208"></td>
                                            <td id="256"></td>
                                            <td id="304"></td>
                                        </tr>
                                        <tr id="R17">
                                            <td bgcolor="#E5E5E5">8:00 AM</td>
                                            <td id="17"></td>
                                            <td id="65"></td>
                                            <td id="113"></td>
                                            <td id="161"></td>
                                            <td id="209"></td>
                                            <td id="257"></td>
                                            <td id="305"></td>
                                        </tr>
                                        <tr id="R18">
                                            <td bgcolor="#E5E5E5">8:30 AM</td>
                                            <td id="18"></td>
                                            <td id="66"></td>
                                            <td id="114"></td>
                                            <td id="162"></td>
                                            <td id="210"></td>
                                            <td id="258"></td>
                                            <td id="306"></td>
                                        </tr>
                                        <tr id="R19">
                                            <td bgcolor="#E5E5E5">9:00 AM</td>
                                            <td id="19"></td>
                                            <td id="67"></td>
                                            <td id="115"></td>
                                            <td id="163"></td>
                                            <td id="211"></td>
                                            <td id="259"></td>
                                            <td id="307"></td>
                                        </tr>
                                        <tr id="R20">
                                            <td bgcolor="#E5E5E5">9:30 AM</td>
                                            <td id="20"></td>
                                            <td id="68"></td>
                                            <td id="116"></td>
                                            <td id="164"></td>
                                            <td id="212"></td>
                                            <td id="260"></td>
                                            <td id="308"></td>
                                        </tr>
                                        <tr id="R21">
                                            <td bgcolor="#E5E5E5">10:00 AM</td>
                                            <td id="21"></td>
                                            <td id="69"></td>
                                            <td id="117"></td>
                                            <td id="165"></td>
                                            <td id="213"></td>
                                            <td id="261"></td>
                                            <td id="309"></td>
                                        </tr>
                                        <tr id="R22">
                                            <td bgcolor="#E5E5E5">10:30 AM</td>
                                            <td id="22"></td>
                                            <td id="70"></td>
                                            <td id="118"></td>
                                            <td id="166"></td>
                                            <td id="214"></td>
                                            <td id="262"></td>
                                            <td id="310"></td>
                                        </tr>
                                        <tr id="R23">
                                            <td bgcolor="#E5E5E5">11:00 AM</td>
                                            <td id="23"></td>
                                            <td id="71"></td>
                                            <td id="119"></td>
                                            <td id="167"></td>
                                            <td id="215"></td>
                                            <td id="263"></td>
                                            <td id="311"></td>
                                        </tr>
                                        <tr id="R24">
                                            <td bgcolor="#E5E5E5">11:30 AM</td>
                                            <td id="24"></td>
                                            <td id="72"></td>
                                            <td id="120"></td>
                                            <td id="168"></td>
                                            <td id="216"></td>
                                            <td id="264"></td>
                                            <td id="312"></td>
                                        </tr>
                                        <tr id="R25">
                                            <td bgcolor="#E5E5E5">12:00 PM</td>
                                            <td id="25"></td>
                                            <td id="73"></td>
                                            <td id="121"></td>
                                            <td id="169"></td>
                                            <td id="217"></td>
                                            <td id="265"></td>
                                            <td id="313"></td>
                                        </tr>
                                        <tr id="R26">
                                            <td bgcolor="#E5E5E5">12:30 PM</td>
                                            <td id="26"></td>
                                            <td id="74"></td>
                                            <td id="122"></td>
                                            <td id="170"></td>
                                            <td id="218"></td>
                                            <td id="266"></td>
                                            <td id="314"></td>
                                        </tr>
                                        <tr id="R27">
                                            <td bgcolor="#E5E5E5">1:00 PM</td>
                                            <td id="27"></td>
                                            <td id="75"></td>
                                            <td id="123"></td>
                                            <td id="171"></td>
                                            <td id="219"></td>
                                            <td id="267"></td>
                                            <td id="315"></td>
                                        </tr>
                                        <tr id="R28">
                                            <td bgcolor="#E5E5E5">1:30 PM</td>
                                            <td id="28"></td>
                                            <td id="76"></td>
                                            <td id="124"></td>
                                            <td id="172"></td>
                                            <td id="220"></td>
                                            <td id="268"></td>
                                            <td id="316"></td>
                                        </tr>
                                        <tr id="R29">
                                            <td bgcolor="#E5E5E5">2:00 PM</td>
                                            <td id="29"></td>
                                            <td id="77"></td>
                                            <td id="125"></td>
                                            <td id="173"></td>
                                            <td id="221"></td>
                                            <td id="269"></td>
                                            <td id="317"></td>
                                        </tr>
                                        <tr id="R30">
                                            <td bgcolor="#E5E5E5">2:30 PM</td>
                                            <td id="30"></td>
                                            <td id="78"></td>
                                            <td id="126"></td>
                                            <td id="174"></td>
                                            <td id="222"></td>
                                            <td id="270"></td>
                                            <td id="318"></td>
                                        </tr>
                                        <tr id="R31">
                                            <td bgcolor="#E5E5E5">3:00 PM</td>
                                            <td id="31"></td>
                                            <td id="79"></td>
                                            <td id="127"></td>
                                            <td id="175"></td>
                                            <td id="223"></td>
                                            <td id="271"></td>
                                            <td id="319"></td>
                                        </tr>
                                        <tr id="R32">
                                            <td bgcolor="#E5E5E5">3:30 PM</td>
                                            <td id="32"></td>
                                            <td id="80"></td>
                                            <td id="128"></td>
                                            <td id="176"></td>
                                            <td id="224"></td>
                                            <td id="272"></td>
                                            <td id="320"></td>
                                        </tr>
                                        <tr id="R33">
                                            <td bgcolor="#E5E5E5">4:00 PM</td>
                                            <td id="33"></td>
                                            <td id="81"></td>
                                            <td id="129"></td>
                                            <td id="177"></td>
                                            <td id="225"></td>
                                            <td id="273"></td>
                                            <td id="321"></td>
                                        </tr>
                                        <tr id="R34">
                                            <td bgcolor="#E5E5E5">4:30 PM</td>
                                            <td id="34"></td>
                                            <td id="82"></td>
                                            <td id="130"></td>
                                            <td id="178"></td>
                                            <td id="226"></td>
                                            <td id="274"></td>
                                            <td id="322"></td>
                                        </tr>
                                        <tr id="R35">
                                            <td bgcolor="#E5E5E5">5:00 PM</td>
                                            <td id="35"></td>
                                            <td id="83"></td>
                                            <td id="131"></td>
                                            <td id="179"></td>
                                            <td id="227"></td>
                                            <td id="275"></td>
                                            <td id="323"></td>
                                        </tr>
                                        <tr id="R36">
                                            <td bgcolor="#E5E5E5">5:30 PM</td>
                                            <td id="36"></td>
                                            <td id="84"></td>
                                            <td id="132"></td>
                                            <td id="180"></td>
                                            <td id="228"></td>
                                            <td id="276"></td>
                                            <td id="324"></td>
                                        </tr>
                                        <tr id="R37">
                                            <td bgcolor="#E5E5E5">6:00 PM</td>
                                            <td id="37"></td>
                                            <td id="85"></td>
                                            <td id="133"></td>
                                            <td id="181"></td>
                                            <td id="229"></td>
                                            <td id="277"></td>
                                            <td id="325"></td>
                                        </tr>
                                        <tr id="R38">
                                            <td bgcolor="#E5E5E5">6:30 PM</td>
                                            <td id="38"></td>
                                            <td id="86"></td>
                                            <td id="134"></td>
                                            <td id="182"></td>
                                            <td id="230"></td>
                                            <td id="278"></td>
                                            <td id="326"></td>
                                        </tr>
                                        <tr id="R39">
                                            <td bgcolor="#E5E5E5">7:00 PM</td>
                                            <td id="39"></td>
                                            <td id="87"></td>
                                            <td id="135"></td>
                                            <td id="183"></td>
                                            <td id="231"></td>
                                            <td id="279"></td>
                                            <td id="327"></td>
                                        </tr>
                                        <tr id="R40">
                                            <td bgcolor="#E5E5E5">7:30 PM</td>
                                            <td id="40"></td>
                                            <td id="88"></td>
                                            <td id="136"></td>
                                            <td id="184"></td>
                                            <td id="232"></td>
                                            <td id="280"></td>
                                            <td id="328"></td>
                                        </tr>
                                        <tr id="R41">
                                            <td bgcolor="#E5E5E5">8:00 PM</td>
                                            <td id="41"></td>
                                            <td id="89"></td>
                                            <td id="137"></td>
                                            <td id="185"></td>
                                            <td id="233"></td>
                                            <td id="281"></td>
                                            <td id="329"></td>
                                        </tr>
                                        <tr id="R42">
                                            <td bgcolor="#E5E5E5">8:30 PM</td>
                                            <td id="42"></td>
                                            <td id="90"></td>
                                            <td id="138"></td>
                                            <td id="186"></td>
                                            <td id="234"></td>
                                            <td id="282"></td>
                                            <td id="330"></td>
                                        </tr>
                                        <tr id="R43">
                                            <td bgcolor="#E5E5E5">9:00 PM</td>
                                            <td id="43"></td>
                                            <td id="91"></td>
                                            <td id="139"></td>
                                            <td id="187"></td>
                                            <td id="235"></td>
                                            <td id="283"></td>
                                            <td id="331"></td>
                                        </tr>
                                        <tr id="R44">
                                            <td bgcolor="#E5E5E5">9:30 PM</td>
                                            <td id="44"></td>
                                            <td id="92"></td>
                                            <td id="140"></td>
                                            <td id="188"></td>
                                            <td id="236"></td>
                                            <td id="284"></td>
                                            <td id="332"></td>
                                        </tr>
                                        <tr id="R45">
                                            <td bgcolor="#E5E5E5">10:00 PM</td>
                                            <td id="45"></td>
                                            <td id="93"></td>
                                            <td id="141"></td>
                                            <td id="189"></td>
                                            <td id="237"></td>
                                            <td id="285"></td>
                                            <td id="333"></td>
                                        </tr>
                                        <tr id="R46">
                                            <td bgcolor="#E5E5E5">10:30 PM</td>
                                            <td id="46"></td>
                                            <td id="94"></td>
                                            <td id="142"></td>
                                            <td id="190"></td>
                                            <td id="238"></td>
                                            <td id="286"></td>
                                            <td id="334"></td>
                                        </tr>
                                        <tr id="R47">
                                            <td bgcolor="#E5E5E5">11:00 PM</td>
                                            <td id="47"></td>
                                            <td id="95"></td>
                                            <td id="143"></td>
                                            <td id="191"></td>
                                            <td id="239"></td>
                                            <td id="287"></td>
                                            <td id="335"></td>
                                        </tr>
                                        <tr id="R48">
                                            <td bgcolor="#E5E5E5">11:30 PM</td>
                                            <td id="48"></td>
                                            <td id="96"></td>
                                            <td id="144"></td>
                                            <td id="192"></td>
                                            <td id="240"></td>
                                            <td id="288"></td>
                                            <td id="336"></td>
                                        </tr>
                                    </table>         
                            </p>    
                                </body>
                                
                            </html>
                        </div>
                        <!-- MY CALENDAR BODY ENDS -->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.panel-body -->
            </div>
            <p id="lastupdatedtime" align="right" padding-left="0cm" display="inline-block"></p>
            <!-- /.panel -->
        </div>

        <script>
            //currentDate is used to track the date of the calendar, finalDate stays constant to 
                var currentDate = new Date();
                currentDate = new Date(currentDate - 18000000);
                var finalDate = new Date();
                finalDate.setTime(currentDate.getTime());
                var eventArray = [];
                for (i=0; i <336; i++) {
                    eventArray[i]= i; //???
                    //eventArray[i] = {numEvents: 0, eventName: "", startTime: "", endTime: "", location: "", description: ""}
                    eventArray[i] = {numEvents: 0, eventNames: [], startTimes: [], endTimes: [], locations: [], descriptions: []}
                    //change to custom object with all of the event info, and number of events at that time
                }
                
                var toDay = window.currentDate;
                toDay = new Date(toDay - 18000000);
                var currentWeekDay = toDay.getDay();
                var tempDay = toDay;
                document.getElementById("w"+currentWeekDay).style.backgroundColor = "#346bef";
                document.getElementById("w"+currentWeekDay).style.color = "white";
        </script>
 
    </div>

    <script src="./static/lib/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./static/lib/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="./static/js/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="./static/js/raphael.min.js"></script>
    <!-- <script src="./static/js/morris.min.js"></script> -->
    <!-- <script src="./static/js/morris-data.js"></script> -->
    <!-- Custom Theme JavaScript -->
    <script src="./static/js/sb-admin-2.js"></script>
    <!-- added these two -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
    
    function timeConverter(UNIX_timestamp) {
        var a = new Date(UNIX_timestamp * 1000);
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var year = a.getFullYear();
        var month = months[a.getMonth()];
        var date = a.getDate();
        var timestamp = (a.getHours() > 12) ? (a.getHours() - 12 + ':' + a.getMinutes() + ':' + a.getSeconds() + ' PM') : (a.getHours() + ':' + a.getMinutes() + ':' + a.getSeconds() + ' AM');
        var time = date + ' ' + month + ' ' + year + ' ' + timestamp;
        return time;
    }

        // Time Formatter used for current time and last updated time
        var dateFormat = function() {
            var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
                timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
                timezoneClip = /[^-+\dA-Z]/g,
                pad = function(val, len) {
                    val = String(val);
                    len = len || 2;
                    while (val.length < len) val = "0" + val;
                    return val;
                };

            // Regexes and supporting functions are cached through closure
            return function(date, mask, utc) {
                var dF = dateFormat;

                // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
                if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
                    mask = date;
                    date = undefined;
                }

                // Passing date through Date applies Date.parse, if necessary
                date = date ? new Date(date) : new Date;
                if (isNaN(date)) throw SyntaxError("invalid date");

                mask = String(dF.masks[mask] || mask || dF.masks["default"]);

                // Allow setting the utc argument via the mask
                if (mask.slice(0, 4) == "UTC:") {
                    mask = mask.slice(4);
                    utc = true;
                }

                var _ = utc ? "getUTC" : "get",
                    d = date[_ + "Date"](),
                    D = date[_ + "Day"](),
                    m = date[_ + "Month"](),
                    y = date[_ + "FullYear"](),
                    H = date[_ + "Hours"](),
                    M = date[_ + "Minutes"](),
                    s = date[_ + "Seconds"](),
                    L = date[_ + "Milliseconds"](),
                    o = utc ? 0 : date.getTimezoneOffset(),
                    flags = {
                        d: d,
                        dd: pad(d),
                        ddd: dF.i18n.dayNames[D],
                        dddd: dF.i18n.dayNames[D + 7],
                        m: m + 1,
                        mm: pad(m + 1),
                        mmm: dF.i18n.monthNames[m],
                        mmmm: dF.i18n.monthNames[m + 12],
                        yy: String(y).slice(2),
                        yyyy: y,
                        h: H % 12 || 12,
                        hh: pad(H % 12 || 12),
                        H: H,
                        HH: pad(H),
                        M: M,
                        MM: pad(M),
                        s: s,
                        ss: pad(s),
                        l: pad(L, 3),
                        L: pad(L > 99 ? Math.round(L / 10) : L),
                        t: H < 12 ? "a" : "p",
                        tt: H < 12 ? "am" : "pm",
                        T: H < 12 ? "A" : "P",
                        TT: H < 12 ? "AM" : "PM",
                        Z: utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                        o: (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                        S: ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
                    };

                return mask.replace(token, function($0) {
                    return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
                });
            };
        }();

        // Some common format strings
        dateFormat.masks = {
            "default": "ddd mmm dd yyyy HH:MM:ss",
            shortDate: "m/d/yy",
            mediumDate: "mmm d, yyyy",
            longDate: "mmmm d, yyyy",
            fullDate: "dddd, mmmm d, yyyy",
            shortTime: "h:MM TT",
            mediumTime: "h:MM:ss TT",
            longTime: "h:MM:ss TT Z",
            isoDate: "yyyy-mm-dd",
            isoTime: "HH:MM:ss",
            isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
            isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
        };

        // Internationalization strings
        dateFormat.i18n = {
            dayNames: [
                "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
                "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
            ],
            monthNames: [
                "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
                "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
            ]
        };

        // For convenience...
        Date.prototype.format = function(mask, utc) {
            return dateFormat(this, mask, utc);
        };

        //Current Time
        var now = new Date();
        var currtime = dateFormat(now, "dddd, mmmm dS, yyyy, h:MM:ss TT");
        document.getElementById("currenttime").innerHTML =  currtime;

        // Last Updated Time
        var lastupdated = new Date(1499452848577);
        var lastupdatedtime = dateFormat(lastupdated, "dddd, mmmm dS, yyyy, h:MM:ss TT");
        document.getElementById("lastupdatedtime").innerHTML = "Last Updated: " + lastupdatedtime;
    </script>
</body>

</html>
