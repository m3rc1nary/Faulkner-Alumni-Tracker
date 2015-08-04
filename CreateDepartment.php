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
                <li><a id="user" href="EditUser.php">User</a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditDepartment.php"><span id="current">Department</span></a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Create Department</h2>
            <form method='post' action="CreateDepartmentController.php">
                <table id="tablebody">
                    <tr>
                        <th>Department Name:</th><th><input type="text" name="DeptName"></th>
                    <tr>
                </table>
                <br>
                <input type="submit" value="Create Department">
            </form>
        </div>
    </body>
</html>
