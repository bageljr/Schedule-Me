# ScheduleMe
ScheduleMe

Nolan Jelinski - Department of Computing Sciences - Villanova University - Villanova, Pennsylvania - njelinsk@villanova.edu

Matthew O’Neill - Department of Computing Sciences - Villanova University - Villanova, Pennsylvania - moneil32@villanova.edu

Connor Powers - Department of Computing Sciences - Villanova University - Villanova, Pennsylvania - cpower11@villanova.edu

I. Introduction

ScheduleMe is a web application that aids groups in scheduling events. The application allows users to upload their personal schedules, join groups, view group availability, and schedule group events. ScheduleMe uses basic web technologies to display a user’s or group’s schedule and a basic MySQL database to store events, user information, and group information.

II. Background

College students tend to belong to many different clubs, groups, and activities, so it can be hard for a group to find a good time for all group members to meet. In one case, a Villanova basketball manager found it hard to schedule fifteen student managers for daily practice and activities. ScheduleMe was designed to make group scheduling more efficient and pain-free. The user interface is simple to use and the visualization techniques implemented were designed to make the scheduling process efficient.

III. Methodology

A. Front-end Calendar

The front-end calendar operates using an HTML template. The portal makes PHP calls to the database to load a user’s schedule data. It also has page functionality using JavaScript. The login page is a form that checks the user’s information with the database, and if successful, logs the user in and redirects them to their personal schedule. The user’s personal schedule first loads scheduled events from the database. The schedule itself is an HTML table, and it calculates which cell belongs to an event based on the start and end time provided by the database.

When the user schedules an event, it follows a similar procedure by referencing the start and end time, as well as date, to calculate the cells that should be populated. If the event occurs outside of the displayed schedule, then no cells are populated, but the information is still sent to the database. There is also a dictionary that represents each cell in the table. The dictionary loads all of the events and the information about them into its various fields. When an event is deleted, the entries for that event are cleared.

JavaScript is used to calculate the current week that should be displayed on the calendar. When the page is loaded, two variables are created related to time, both of which are initialized to the current time. From this information, it is possible to calculate the calendar date and the day of the week. With this information, the program populates the cell that displays that day of the week and calendar date. The remaining days of the week can be found by referencing this one date. When the user presses either of the change week buttons, one goes to the next week while the other goes to the previous week, and one of the date variables changes to the newly selected week. This is completed by taking the initial date and subtracting the time equal to seven days from it. The other loaded date stays static so that the user can jump back to the current week by pressing the button labeled “today”.

There are two ways to schedule an event. The first is to open up the schedule form and manually select the times and dates, along with the other information about the event. The other is to highlight a range of cells on the schedule itself, which will open a pop-up with the time information already populated. This function works by waiting for the user to click down on the table and keeping track of what cells the user is highlighting, but most importantly the first cell and last cell that are highlighted. It ensures that all of the cells are highlighted on the screen and that there are no blank spaces so the user can see what time period they are scheduling. It also ensures that the user is not going horizontally to other days, but only vertically. It completes this by noting the column of the first cell pressed and then making sure that all other cells are in the same column as well. When the user lifts their mouse, the function sends the information to the form, which the user will now see displayed on the screen, and removes the temporary highlighting on the cells.

The functionality of clicking on the schedule changes if the first cell selected is already populated. This is not intended to prevent users from scheduling multiple events at the same time, but instead it is to allow a user to see metadata about an event, like the description and location, and delete the event if desired. When the user clicks on the table on a populated cell, it acquires a flag in the mouse down function which changes the behavior. The function finds the cell that the user has clicked and pulls the information from the dictionary and loads it in a hidden window. This window is then shown to the user, along with the information inside of it. From this menu, the user has the option to delete the event. If the user selects this, the function finds all cells that touch the current cell and have the same time and date information. Once all cells are found, the event is removed by removing text and deselecting cells. The entries in the dictionary are cleared, and the database is instructed to delete the event with the information given.

Finally, there is also a group option that allows the user to see the groups that they belong. When one of these is selected, it redirects them to the schedule for that group. On the page load for a group, all of the events for the users in the group are found for each cell. Then this number is divided by the total number of people in that group. This fraction is rounded and multiplied by ten to be put on a one to ten scale. This scale creates a spectrum from light green to dark red, which is used to populate the cells with color. This allows the user to visually see what times are the best to schedule group events. The user also has the option to schedule an event from the groups page. When this is done, the event is scheduled for every group member in database.

B. Back-end Database

A MySQL database is used to store the data users enter into their schedules. There are two main tables: “events” and “groups.” Records in the “events” table store information about events, such as location, description and the start and end times. Every time an event is created, it is added to this table and the name of the user who created the event is added to the “username” column of the “event” database. This allows for filtering since the event table can be very large.

The “groups” table consists of rows containing the names of groups and users who are in each group. Therefore, there are several rows with the same name in the “group” field, but different users in the “user” field. Whenever a user submits their schedule to a group, a new record is created assigning that user to a group.

There are a number of PHP scripts that allow the front-end calendar to interact with the database. These pages use AJAX to call the PHP files dynamically, so that when doing something like adding an event to the user’s calendar it automatically appears. When the user’s personal calendar is loaded, the calendar passes to a PHP script the current cell number, and the script calculates the events that are happening at that time period, filtered by the user requesting the data. Since the calendar is just an array, it is easy to traverse the calendar to find the events. The start time and end time are saved as integers from 1 - 48, so modular arithmetic is used in order to find the events for each time. The days of the week are also stored as integers from 0 - 6 in order to assist in selecting the events.

The master group schedule page is populated in a similar way, but instead of selecting specific events for time slots, the script counts the number of events for each time slot belonging to members of a group. It then passes this value to a coloring function that colors the time slot according to the percentage of group members doing something at that time. The coloring scale is done with 10 different colors.

Finally, users can create events for the entire group from this page. In order to schedule an event for the group, users select a time slot and a separate script adds events  at that time and with the event metadata for each user in the same way that users create their own events. This feature adds the event to every group member’s calendar.

IV. Results

ScheduleMe was a positive experience for the entire team. Not only did it help the team members put skills like database programming and web programming to work outside of a classroom environment, but it also taught other invaluable skills. When working on an independent project like this, an important to skill to have is the ability to learn. All of the team members encountered problems that they had never had to solve before. Some of the problems were purely from lack of experience, like working with Git and Trello and working on a software engineering team with many moving parts. As the team got used to assigning work and joining individual tasks together to complete the full software, the software development moved more efficiently.

Some of the other issues were more specific. Setting up a web server proved difficult as several settings on the Mac used to host the code needed to be changed, yet little information was available online for setting up a server on the newest MacOS. Other smaller bugs popped up from time to time, and the team had to employ strong debugging skills in order to find the source of the problem. Also, being that the three team members all worked on separate areas of the project, merging these different parts together involved work and testing in making sure that the back-end and calendar parts still worked correctly after being merged with the front-end work.

This project was ultimately a success as it provided the team with valuable experience in programming, working as a team, and coming up with a plan to accomplish a goal by using software. At the beginning (and even the midpoint) of the development lifecycle, the team was unsure how to complete some of the goals of ScheduleMe, such as the coloring feature, but by the end the team had succeeded in most goals set forth from the beginning.

V. Conclusion

ScheduleMe is a robust application that provides a service not currently offered. There are many potential uses for the application in its current state, and even more uses with further work. It allows users to make their own schedules, join a group with other group members, and compile a group schedule for them that is easy to understand and comprehend. This makes scheduling for groups, especially large groups, much easier compared to any other application. There are also further possibilities, such as scheduling selectively. For example, if there are ten group members but only two are needed at a time, possibly for work shifts, the application could automatically schedule based on availability and other constraints. Even in its current iteration, ScheduleMe is a useful application that is easy to use for personal and group use.

Acknowledgment

The team would like to thank Dr. Ed Kim for his help and guidance throughout this project. With his insight, we challenged oursleves to build a robust application that touches on various aspects of the computer science cirriculum.

References

Welling, L. and Thomson, L. (2013). PHP and MySQL Web development. Upper Saddle River, NJ: Addison-Wesley.
