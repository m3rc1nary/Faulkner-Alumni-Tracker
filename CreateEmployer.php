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
                <table id="tablebody">
                    <tr>
                        <th>Employer Name:</th><th><input type="text" name="EmpName"></th>
                    </tr>
                    <tr>
                        <th>Employer Number:</th><th><input type="text" name="EmpNum" placeholder="123-456-7890"></th>
                    </tr>
                    <tr>
                        <th>Employer Company:</th><th><input type="text" name="EmpComp"></th>
                    </tr>
                    <tr>
                        <th>Employer email:</th><th><input type="email" name="EmpEmail"></th>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Create Employer">
            </form>
        </div>
    </body>
</html>
