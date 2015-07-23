<?php

/* 
 * show major information to be edited or deleted
 * 
 * @author: Robert Vines
 */

    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
                <li><a href="EditMajor.php"><span id="current">Edit Major</span></a></li>
                <li><a href="CreateDepartment.php">Create Department</a></li>
                <li><a href="EditDepartment.php">Edit Department</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Select Major to Edit</h2>
            <table>
                <tr id="tableHead">
                    <td>Type</td>
                    <td>Major</td>
                    <td>Department</td>
                    <td> </td>
                    <td> </td>
                </tr>
                <?php
                    $sql = "SELECT degree.DegreeID, degree.Type, degree.Major, department.DeptName"
                            . " FROM degree "
                            . "JOIN department "
                            . "ON degree.Department_DepartmentID = department.DepartmentID ";
                    $result = $pdo->query($sql);
                       
                    while($val=$result->fetch()):
                    
                    $degreeID = $val['DegreeID'];
                    $degreeType = $val['Type'];
                    $degreeMajor = $val['Major'];
                    $deptName = $val['DeptName'];
                ?>
                <tr id="tablebody">
                    <td><?php echo $degreeType; ?></td>
                    <td><?php echo $degreeMajor; ?></td>
                    <td><?php echo $deptName; ?></td>
                    <td><a href="EditMajorForm.php?edit_id=<?php echo $degreeID ?>"><button type="button">Edit</button></a></td>
                    <td><input type="submit" value="Delete"></td>
                </tr>
                <?php
                    endwhile;
                ?>
            </table>
        </div>
    </body>
</html>
