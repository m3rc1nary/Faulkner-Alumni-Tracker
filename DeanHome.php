<?php

/* 
 * Home page for a dean.
 * 
 * @author: Robert Vines
 */
    include('UserSession_Dean.php');
?>

<html>
    <head>
        <title>Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <img src="Images/AlumniTrackerLogo.jpg" alt="Faulkner University Alumni 
             Tracker" id="logo">
        <div id="header"></div>
        <div id="nav">
            <ul>
                <li><a id="user" href="AdminHome.php">Home</a></li>
                <li><a href="EditUser.php">User</a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
                <li><a href="EditAlumni.php">Alumni</a></li>
                <li><a id="user" href="Logout.php">Log out</a></li>
            </ul>
        </div>
        <div id="body">
          <h2>Hello</h2>
          <p align="center">Department: 
              <select>
                  <option>CSIS</option>
              </select></p>
              <p align="center">Last Name: <input type="text"></p>
        </div>
    </body>
</html>
