<?php

/* 
 * Create a department name for dropbox
 * 
 * @author: Robert Vines
 */
?>

<html>
    <head>
        <title>Create Department</title>
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
                <li><a id="user" href="CreateUser.php">Create User</a></li> 
                <li><a href="EditUser.php">Edit User</a></li>
                <li><a href="CreateMajor.php">Create Major</a></li>
                <li><a href="EditMajor.php">Edit Major</a></li>
                <li><a href="CreateDepartment.php"><span id="current">Create Department</span></a></li>
                <li><a href="EditDepartment.php">Edit Department</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Create Department</h2>
            <form method='post' action="CreateDepartmentController.php">
                <p>Department Name: <input type="text" name="DeptName"></p>
                <input type="submit" value="Create Department">
            </form>
        </div>
    </body>
</html>
