<?php

/* 
 * Header/Nav bar for department chair and secretary
 * 
 * @author: Robert Vines
 */
?>
<html>
    <head>
        <title>Faulkner Alumni Tracker</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
    <header>
        <img style="float:left; z-index: 1" src="Images/AlumniTrackerLogo.jpg" alt="Faulkner University Alumni 
             Tracker" id="logo">
        <div id="header"></div>
        <div id="nav">
            <ul>
                <li><a id="user" href="ChairSecHome.php">Home</a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
                <li><a href="EditAlumni.php">Alumni</a></li>
                <li><a id="user" href="Logout.php">Log out</a></li>
            </ul>
        </div>
    </header>