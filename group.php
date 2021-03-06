<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Schedule Me</title>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		
		<style>
			body { font-family:'lucida grande', tahoma, verdana, arial, sans-serif; font-size:11px; }
			h1 { font-size: 15px; }
			a { color: #548dc4; text-decoration: none; }
			a:hover { text-decoration: underline; }
			table.testgrid { border-collapse: collapse; border: 1px solid #CCB; width: 800px; }
			table.testgrid td, table.testgrid th { padding: 5px; border: 1px solid #E0E0E0; }
			table.testgrid th { background: #E5E5E5; text-align: left; }
			input.invalid { background: red; color: #FDFDFD; }
			
			td{ 
				height: 20px;
				width: 100px;
				max-width: 100px;
				overflow: hidden;
				text-overflow: ellipsis;
				white-space: nowrap;
			}
			td.selected {
				background-color: red;
			}
			
			td.selected10 {
				background-color: #ff0000;
			}
			
			td.selected9 {
				background-color: #ff6600;
			}
			
			td.selected8 {
				background-color: #ff9933;
			}
			
			td.selected7 {
				background-color: #ffcc00;
			}
			
			td.selected6 {
				background-color: #ffff00;
			}
			
			td.selected5 {
				background-color: #ccff33;
			}
			
			td.selected4 {
				background-color: #99ff33;
			}
			
			td.selected3 {
				background-color: #66ff33;
			}
			
			td.selected2 {
				background-color: #33cc33;
			}
			
			td.selected1 {
				background-color: #00cc00;
			}

			td.selected0 {
				background-color: #00ff00;
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

		</style>
		
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
		</script>
		
		<script>
		//Updates the calendar with the value of currentDate
		function loadDate() {
			weekDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
			var toDay = window.currentDate;
			toDay = new Date(toDay - 18000000);
			var currentWeekDay = toDay.getDay();
			var tempDay = toDay;
			document.getElementById("w" + currentWeekDay).innerHTML = weekDays[toDay.getDay()] + " " + (toDay.getMonth()+1) + "/" + toDay.getDate();
			
			//not sure why both past and future dates can't be found using the same method, but it doesn't so two different methods are used
			for (i=currentWeekDay; i>0; i--) {
				tempDay = new Date(tempDay - 86400000);
				var tempWeekDay = tempDay.getDay();
				document.getElementById("w" + tempWeekDay).innerHTML = weekDays[tempDay.getDay()] + " " + (tempDay.getMonth()+1) + "/" + tempDay.getDate();
			}
			var tempDay = toDay;
			for (i=currentWeekDay; i<6; i++) {
				tempDay.setDate(tempDay.getDate()+1);
				var tempWeekDay = tempDay.getDay();
				document.getElementById("w" + tempWeekDay).innerHTML = weekDays[tempDay.getDay()] + " " + (tempDay.getMonth()+1) + "/" + tempDay.getDate();
			}
		}
		</script>
		
		<script>
		//On page load, gets the dates of the current weekdays and adds them to the table
		window.onload = function() {
			loadDate();
			var results = count();
			
		}
		</script>
		
		<script>

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
		
		<script>
		function colorSpace(numUsers, j, numEvents) {
			var color = numEvents/numUsers;
			color = color * 10;
			color = Math.round(color);
			color = Math.trunc(color);
			document.getElementById(j).classList.add('selected'+color);
			//document.getElementById(j).innerHTML = color;
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
			form.style.display = "block";
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
			if (window.currentDate.getTime() === window.finalDate.getTime()) {
				document.getElementById("Today").disabled = true;
			}
			else {
				document.getElementById("Today").disabled = false;
			}
			loadDate();
			clearCalendar();
			fillIn();
		}
		</script>
		
		<script>
		function nextWeek() {
			window.currentDate.setTime(window.currentDate.getTime() + 604800000);
			if (window.currentDate.getTime() === window.finalDate.getTime()) {
				document.getElementById("Today").disabled = true;
			}
			else {
				document.getElementById("Today").disabled = false;
			}
			loadDate();
			clearCalendar();
			fillIn();
		}
		</script>
		
		<script>
		function resetDate() {
			window.currentDate.setTime(window.finalDate.getTime());
			//window.finalDate = new Date();
			document.getElementById("Today").disabled = true;
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
		
	</head>
	
	<body>
		<h1>Schedule Me</h1>
		<p id="test"></p>
		<p1> 
			<button type="button" onclick="prevWeek()"> < </button>
			<button type="button" onclick="nextWeek()"> > </button>
			<button type="button" onclick="resetDate()" disabled id="Today"> Today </button>
		</p1>
		<table id="htmlgrid" class="testgrid">
			<tr>
				<th>Time</th>
				<th id="w0">Sunday</th>
				<th id="w1">Monday</th>
				<th id="w2">Tuesday</th>
				<th id="w3">Wednesday</th>
				<th id="w4">Thursday</th>
				<th id="w5">Friday</th>
				<th id="w6">Saturday</th>
			</tr>
			<tr id="R1">
				<td>12am</td>
				<td id="1"></td>
				<td id="49"></td>
				<td id="97"></td>
				<td id="145"></td>
				<td id="193"></td>
				<td id="241"></td>
				<td id="289"></td>
			</tr>
			<tr id="R2">
				<td></td>
				<td id="2"></td>
				<td id="50"></td>
				<td id="98"></td>
				<td id="146"></td>
				<td id="194"></td>
				<td id="242"></td>
				<td id="290"></td>
			</tr>
			<tr id="R3">
				<td>1am</td>
				<td id="3"></td>
				<td id="51"></td>
				<td id="99"></td>
				<td id="147"></td>
				<td id="195"></td>
				<td id="243"></td>
				<td id="291"></td>
			</tr>
			<tr id="R4">
				<td></td>
				<td id="4"></td>
				<td id="52"></td>
				<td id="100"></td>
				<td id="148"></td>
				<td id="196"></td>
				<td id="244"></td>
				<td id="292"></td>
			</tr>
			<tr id="R5">
				<td>2am</td>
				<td id="5"></td>
				<td id="53"></td>
				<td id="101"></td>
				<td id="149"></td>
				<td id="197"></td>
				<td id="245"></td>
				<td id="293"></td>
			</tr>
			<tr id="R6">
				<td></td>
				<td id="6"></td>
				<td id="54"></td>
				<td id="102"></td>
				<td id="150"></td>
				<td id="198"></td>
				<td id="246"></td>
				<td id="294"></td>
			</tr>
			<tr id="R7">
				<td>3am</td>
				<td id="7"></td>
				<td id="55"></td>
				<td id="103"></td>
				<td id="151"></td>
				<td id="199"></td>
				<td id="247"></td>
				<td id="295"></td>
			</tr>
			<tr id="R8">
				<td></td>
				<td id="8"></td>
				<td id="56"></td>
				<td id="104"></td>
				<td id="152"></td>
				<td id="200"></td>
				<td id="248"></td>
				<td id="296"></td>
			</tr>
			<tr id="R9">
				<td>4am</td>
				<td id="9"></td>
				<td id="57"></td>
				<td id="105"></td>
				<td id="153"></td>
				<td id="201"></td>
				<td id="249"></td>
				<td id="297"></td>
			</tr>
			<tr id="R10">
				<td></td>
				<td id="10"></td>
				<td id="58"></td>
				<td id="106"></td>
				<td id="154"></td>
				<td id="202"></td>
				<td id="250"></td>
				<td id="298"></td>
			</tr>
			<tr id="R11">
				<td>5am</td>
				<td id="11"></td>
				<td id="59"></td>
				<td id="107"></td>
				<td id="155"></td>
				<td id="203"></td>
				<td id="251"></td>
				<td id="299"></td>
			</tr>
			<tr id="R12">
				<td></td>
				<td id="12"></td>
				<td id="60"></td>
				<td id="108"></td>
				<td id="156"></td>
				<td id="204"></td>
				<td id="252"></td>
				<td id="300"></td>
			</tr>
			<tr id="R13">
				<td>6am</td>
				<td id="13"></td>
				<td id="61"></td>
				<td id="109"></td>
				<td id="157"></td>
				<td id="205"></td>
				<td id="253"></td>
				<td id="301"></td>
			</tr>
			<tr id="R14">
				<td></td>
				<td id="14"></td>
				<td id="62"></td>
				<td id="110"></td>
				<td id="158"></td>
				<td id="206"></td>
				<td id="254"></td>
				<td id="302"></td>
			</tr>
			<tr id="R15">
				<td>7am</td>
				<td id="15"></td>
				<td id="63"></td>
				<td id="111"></td>
				<td id="159"></td>
				<td id="207"></td>
				<td id="255"></td>
				<td id="303"></td>
			</tr>
			<tr id="R16">
				<td></td>
				<td id="16"></td>
				<td id="64"></td>
				<td id="112"></td>
				<td id="160"></td>
				<td id="208"></td>
				<td id="256"></td>
				<td id="304"></td>
			</tr>
			<tr id="R17">
				<td>8am</td>
				<td id="17"></td>
				<td id="65"></td>
				<td id="113"></td>
				<td id="161"></td>
				<td id="209"></td>
				<td id="257"></td>
				<td id="305"></td>
			</tr>
			<tr id="R18">
				<td></td>
				<td id="18"></td>
				<td id="66"></td>
				<td id="114"></td>
				<td id="162"></td>
				<td id="210"></td>
				<td id="258"></td>
				<td id="306"></td>
			</tr>
			<tr id="R19">
				<td>9am</td>
				<td id="19"></td>
				<td id="67"></td>
				<td id="115"></td>
				<td id="163"></td>
				<td id="211"></td>
				<td id="259"></td>
				<td id="307"></td>
			</tr>
			<tr id="R20">
				<td></td>
				<td id="20"></td>
				<td id="68"></td>
				<td id="116"></td>
				<td id="164"></td>
				<td id="212"></td>
				<td id="260"></td>
				<td id="308"></td>
			</tr>
			<tr id="R21">
				<td>10am</td>
				<td id="21"></td>
				<td id="69"></td>
				<td id="117"></td>
				<td id="165"></td>
				<td id="213"></td>
				<td id="261"></td>
				<td id="309"></td>
			</tr>
			<tr id="R22">
				<td></td>
				<td id="22"></td>
				<td id="70"></td>
				<td id="118"></td>
				<td id="166"></td>
				<td id="214"></td>
				<td id="262"></td>
				<td id="310"></td>
			</tr>
			<tr id="R23">
				<td>11am</td>
				<td id="23"></td>
				<td id="71"></td>
				<td id="119"></td>
				<td id="167"></td>
				<td id="215"></td>
				<td id="263"></td>
				<td id="311"></td>
			</tr>
			<tr id="R24">
				<td></td>
				<td id="24"></td>
				<td id="72"></td>
				<td id="120"></td>
				<td id="168"></td>
				<td id="216"></td>
				<td id="264"></td>
				<td id="312"></td>
			</tr>
			<tr id="R25">
				<td>12pm</td>
				<td id="25"></td>
				<td id="73"></td>
				<td id="121"></td>
				<td id="169"></td>
				<td id="217"></td>
				<td id="265"></td>
				<td id="313"></td>
			</tr>
			<tr id="R26">
				<td></td>
				<td id="26"></td>
				<td id="74"></td>
				<td id="122"></td>
				<td id="170"></td>
				<td id="218"></td>
				<td id="266"></td>
				<td id="314"></td>
			</tr>
			<tr id="R27">
				<td>1pm</td>
				<td id="27"></td>
				<td id="75"></td>
				<td id="123"></td>
				<td id="171"></td>
				<td id="219"></td>
				<td id="267"></td>
				<td id="315"></td>
			</tr>
			<tr id="R28">
				<td></td>
				<td id="28"></td>
				<td id="76"></td>
				<td id="124"></td>
				<td id="172"></td>
				<td id="220"></td>
				<td id="268"></td>
				<td id="316"></td>
			</tr>
			<tr id="R29">
				<td>2pm</td>
				<td id="29"></td>
				<td id="77"></td>
				<td id="125"></td>
				<td id="173"></td>
				<td id="221"></td>
				<td id="269"></td>
				<td id="317"></td>
			</tr>
			<tr id="R30">
				<td></td>
				<td id="30"></td>
				<td id="78"></td>
				<td id="126"></td>
				<td id="174"></td>
				<td id="222"></td>
				<td id="270"></td>
				<td id="318"></td>
			</tr>
			<tr id="R31">
				<td>3pm</td>
				<td id="31"></td>
				<td id="79"></td>
				<td id="127"></td>
				<td id="175"></td>
				<td id="223"></td>
				<td id="271"></td>
				<td id="319"></td>
			</tr>
			<tr id="R32">
				<td></td>
				<td id="32"></td>
				<td id="80"></td>
				<td id="128"></td>
				<td id="176"></td>
				<td id="224"></td>
				<td id="272"></td>
				<td id="320"></td>
			</tr>
			<tr id="R33">
				<td>4pm</td>
				<td id="33"></td>
				<td id="81"></td>
				<td id="129"></td>
				<td id="177"></td>
				<td id="225"></td>
				<td id="273"></td>
				<td id="321"></td>
			</tr>
			<tr id="R34">
				<td></td>
				<td id="34"></td>
				<td id="82"></td>
				<td id="130"></td>
				<td id="178"></td>
				<td id="226"></td>
				<td id="274"></td>
				<td id="322"></td>
			</tr>
			<tr id="R35">
				<td>5pm</td>
				<td id="35"></td>
				<td id="83"></td>
				<td id="131"></td>
				<td id="179"></td>
				<td id="227"></td>
				<td id="275"></td>
				<td id="323"></td>
			</tr>
			<tr id="R36">
				<td></td>
				<td id="36"></td>
				<td id="84"></td>
				<td id="132"></td>
				<td id="180"></td>
				<td id="228"></td>
				<td id="276"></td>
				<td id="324"></td>
			</tr>
			<tr id="R37">
				<td>6pm</td>
				<td id="37"></td>
				<td id="85"></td>
				<td id="133"></td>
				<td id="181"></td>
				<td id="229"></td>
				<td id="277"></td>
				<td id="325"></td>
			</tr>
			<tr id="R38">
				<td></td>
				<td id="38"></td>
				<td id="86"></td>
				<td id="134"></td>
				<td id="182"></td>
				<td id="230"></td>
				<td id="278"></td>
				<td id="326"></td>
			</tr>
			<tr id="R39">
				<td>7pm</td>
				<td id="39"></td>
				<td id="87"></td>
				<td id="135"></td>
				<td id="183"></td>
				<td id="231"></td>
				<td id="279"></td>
				<td id="327"></td>
			</tr>
			<tr id="R40">
				<td></td>
				<td id="40"></td>
				<td id="88"></td>
				<td id="136"></td>
				<td id="184"></td>
				<td id="232"></td>
				<td id="280"></td>
				<td id="328"></td>
			</tr>
			<tr id="R41">
				<td>8pm</td>
				<td id="41"></td>
				<td id="89"></td>
				<td id="137"></td>
				<td id="185"></td>
				<td id="233"></td>
				<td id="281"></td>
				<td id="329"></td>
			</tr>
			<tr id="R42">
				<td></td>
				<td id="42"></td>
				<td id="90"></td>
				<td id="138"></td>
				<td id="186"></td>
				<td id="234"></td>
				<td id="282"></td>
				<td id="330"></td>
			</tr>
			<tr id="R43">
				<td>9pm</td>
				<td id="43"></td>
				<td id="91"></td>
				<td id="139"></td>
				<td id="187"></td>
				<td id="235"></td>
				<td id="283"></td>
				<td id="331"></td>
			</tr>
			<tr id="R44">
				<td></td>
				<td id="44"></td>
				<td id="92"></td>
				<td id="140"></td>
				<td id="188"></td>
				<td id="236"></td>
				<td id="284"></td>
				<td id="332"></td>
			</tr>
			<tr id="R45">
				<td>10pm</td>
				<td id="45"></td>
				<td id="93"></td>
				<td id="141"></td>
				<td id="189"></td>
				<td id="237"></td>
				<td id="285"></td>
				<td id="333"></td>
			</tr>
			<tr id="R46">
				<td></td>
				<td id="46"></td>
				<td id="94"></td>
				<td id="142"></td>
				<td id="190"></td>
				<td id="238"></td>
				<td id="286"></td>
				<td id="334"></td>
			</tr>
			<tr id="R47">
				<td>11pm</td>
				<td id="47"></td>
				<td id="95"></td>
				<td id="143"></td>
				<td id="191"></td>
				<td id="239"></td>
				<td id="287"></td>
				<td id="335"></td>
			</tr>
			<tr id="R48">
				<td></td>
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
