<?php

/*
 * Form to edit a major.
 *
 * @author Robert Vined
 */
?>

<html>
    <head>
        <title>Edit Major</title>
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
                <li><a href="CreateDepartment.php">Create Department</a></li>
                <li><a href="EditDepartment.php">Edit Department</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Edit Major</h2>
            <p>Type: <input type="text" name="FirstName"></p>
            <p>Field: <input type="text" name="LastName"></p>
            <input type="submit" value="Change User">
        </div>
    </body>
</html>