<?php
/*
 * Form to create a new user.
 * 
 * @author Robert Vines
 */
    include('UserSession_Admin.php');

//    $connString = "mysql:host=localhost;dbname=alumnitracker";
//    $user ="root";
//    $pass ="root";
//    
//    $pdo = new PDO($connString, $user, $pass);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<html>
    <head>
        <title>Create User</title>
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
                <li><a id="user" href="EditUser.php"><span id="current">User</span></a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Create User</h2>
            <form method='post' action='CreateUserController.php'>
                <table id="tablebody">
                    <tr>
                        <th>First Name:</th><th><input type="text" name="FirstName" required></th>
                    </tr>
                    <tr>
                        <th>Last Name:</th><th><input type="text" name="LastName" required></th>
                    </tr>
                    <tr>
                        <th>Email:</th><th><input type="text" name="Email" required></th>
                    </tr>
                    <tr>
                        <th>Role:</th> 
                        <th><select name="Role">
                                <option>Admin</option>
                                <option>Secretary</option>
                                <option>Department Chair</option>
                                <option>Dean</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <th><select name="DeptName">
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
                    <tr>
                        <th>User Name:</th><th><input type="text" name="UserName" required></th>
                    </tr>
                    <tr>
                        <th>Password:</th><th><input type="text" name="Password" required></th>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Create User">
            </form>
        </div>
    </body>
</html>
