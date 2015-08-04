<?php

/* 
 *
 * 
 * @author: Robert Vines
 */

    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $employerID = $_GET['edit_id'];
    
    $sql="SELECT * FROM employer WHERE EmployerID=".$employerID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $empID = $val['EmployerID'];
    $empName = $val['EmployerName'];    
    $empNum = $val['EmployerNum'];
    $empComp = $val['EmployerComp'];
    $employerEmail = $val['EmployerEmail'];
?>

<html>
    <head>
        <title>Edit Employer</title>
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
            <form method='post' action='EditEmployerController.php?edit_id=<?php echo $empID ?>'>
                <table id="tablebody">
                    <tr>
                        <th>Employer Name:</th><th><input type="text" name="EmpName" value="<?php echo $empName ?>"></th>
                    </tr>
                    <tr>
                        <th>Employer Number:</th><th><input type="text" name="EmpNum" value="<?php echo $empNum ?>"></th>
                    </tr>
                    <tr>
                        <th>Employer Company:</th><th><input type="text" name="EmpComp" value="<?php echo $empComp ?>"></th>
                    </tr>
                    <tr>
                        <th>Employer email:</th><th><input type="email" name="EmpEmail" value="<?php echo $employerEmail ?>"></th>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save Employer">
            </form>
        </div>
    </body>
</html>
