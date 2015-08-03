<?php

/* 
 *
 * 
 * @author: Robert Vines
 */

?>

<html>
    <head>
        <title>Create Employer</title>
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
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php"><span id="current">Employer</span></a></li>
                <li><a href="EditUniversity.php">University</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Create Employer</h2>
            <form method='post' action="CreateEmployerController.php">
                <p>Employer Name: <input type="text" name="EmpName"></p>
                <p>Employer Number(only numbers): <input type="text" name="EmpNum"></p>
                <p>Employer Company: <input type="text" name="EmpComp"></p>
                <p>Employer email: <input type="email" name="EmpEmail"></p>
                <input type="submit" value="Create Employer">
            </form>
        </div>
    </body>
</html>
