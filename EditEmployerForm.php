<?php

/* 
 * For to edit an employer.
 * 
 * @author: Robert Vines
 */

    if($_SESSION[role]=='Admin')
    {
        include('UserSession_Admin.php');
    }
    if($_SESSION[role]=='Department Chair')
    {
        include('UserSession_chair.php');
    }
    if($_SESSION[role]=='Secretary')
    {   
        include('UserSession_sec.php');
    }
    if($_SESSION[role]=='Dean')
    {   
        include('UserSession_Dean.php');
    }
    
    include('Config.php');   
    
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
                <li><a id="user" href="AdminHome.php">Home</a></li>
                <li><a href="EditUser.php">User</a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
                <li><a href="EditAlumni.php">Alumni</a></li>
                <li><a id="user" href="Logout.php">Log out</a></li>
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
