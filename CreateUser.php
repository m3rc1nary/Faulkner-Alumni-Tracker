<?php
/*
 * Form to create a new user.
 * 
 * @author Robert Vines
 */

    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
            <form method='post' action="CreateUserController.php">
                <p>First Name: <input type="text" name="FirstName" required></p>
                <p>Last Name: <input type="text" name="LastName" required></p>
                <p>Email: <input type="text" name="Email" required></p>
                <p>Role: 
                    <select name="Role">
                        <option>Admin</option>
                        <option>Secretary</option>
                        <option>Department Chair</option>
                        <option>Dean</option>
                    </select></p>
                <p>Department:
                    <select name="DeptName">
                    <?php 
                        $sql = "SELECT DeptName FROM department";
                        $result = $pdo->query($sql);
                        
                        while ($val = $result->fetch()):
                        
                        $deptName = $val['DeptName'];    
                        {
                            echo "<option>" . $deptName . "</option>";
                        }endwhile;
                    ?>
                    </select>
                <p>User Name: <input type="text" name="UserName" required></p>
                <p>Password: <input type="text" name="Password" required></p>
                <input type="submit" value="Create User">
            </form>
        </div>
    </body>
</html>
