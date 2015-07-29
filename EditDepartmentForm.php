<?php
/* 
 * Create a department name for dropbox
 * 
 * @author: Robert Vines
 */

    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $deptID = $_GET['edit_id'];
    
    $sql="SELECT * FROM department WHERE DepartmentID=".$deptID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $departmentId = $val['DepartmentID'];
    $departmentName = $val['DeptName'];
?>
<html>
    <head>
        <title>Edit Department</title>
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
                <li><a href="EditDepartment.php"><span id="current">Edit Department</span></a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Create Department</h2>
            <form method='post' action='EditDepartmentController.php?edit_dept=<?php echo $deptID ?>'>
                <p>Department Name: <input type="text" name="DeptName" value="<?php echo $departmentName;?>"></p>
                <input type="submit" value="Edit Department">
            </form>
        </div>
    </body>
</html>