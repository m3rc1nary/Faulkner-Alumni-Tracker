<?php

/*
 * To create a major to be used in application
 *
 * @author Robert Vines
 */
    //database connection

            include('UserSession_Admin.php');
?>

<html>
    <head>
        <title>Create Degree</title>
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
            </ul>
        </div>
        <div id="body">
            <h2>Create Major</h2>
            <form method='post' action="CreateMajorController.php">
                <table id="tablebody">
                    <tr>
                        <th>Type:</th><th><input type="text" name="Type" placeholder="Bachelors,etc."></th>
                    </tr>
                    <tr>
                        <th>Degree:</th><th><input type="text" name="Degree" placeholder="Computer Science,etc."></th>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <th><select name="Dept">
                                <?php 
                                    $sql = "SELECT DeptName FROM department";
                                    $result = $pdo->query($sql);

                                    while ($val = $result->fetch()):

                                    $deptName = $val['DeptName'];    
                                    {
                                        echo "<option>" . $deptName . "</option>";
                                    }endwhile;
                                ?>
                                </select></th>
                    </tr>
                </table>
                <br>
            <input type="submit" value="Create Major">
            </form>
        </div>
    </body>
</html>
