<?php
/*
 * Display Users to edit and delete them.
 *
 * @author Robert Vines
 */

    include('UserSession_Admin.php');

?>
<?php
//    if(isset($_GET['delete_id']))
//    {               
//        $employeeId = $_GET['delete_id'];
//        
//        $sql="DELETE schoolemployee.*, login.* FROM schoolemployee "
//                . "JOIN login "
//                . "ON schoolemployee.Login_LoginID=login.LoginID WHERE EmployeeID=".$employeeId;
//        $pdo->query($sql);
//        
//        header("Location: EditUser.php");
//    }
?>
<html>
    <head>
        <title>Edit Alumni</title>
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
            <h2>Select Alumni to Edit</h2>
            <p><a href="CreateAlumni.php"><button id="button" type="submit">Add Alumni</button></a></p>
            <table>
                <tr id="tableHead">
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Degree Type</td>
                    <td>Major</td>
                    <td>Month Graduated</td>
                    <td>Year Graduated</td>
                    <td> </td>
                    <td> </td>
                </tr>
                <?php
//                    //get info from application
//                        $sql2 = "SELECT schoolemployee.EmployeeID, schoolemployee.FirstName, schoolemployee.LastName,"
//                                . "schoolemployee.Email, schoolemployee.Role, department.DeptName, login.UserName, login.Password"
//                                . " FROM schoolemployee "
//                                . "JOIN department "
//                                . "ON schoolemployee.Department_DepartmentID = department.DepartmentID "
//                                . "JOIN login"
//                                . " ON schoolemployee.Login_LoginID = login.LoginID";
//                        
//                        $result = $pdo->query($sql2);
//                       
//                    while($val=$result->fetch()):
//                    
//                    $employeeId = $val['EmployeeID'];
//                    $firstName = $val['FirstName'];
//                    $lastName = $val['LastName'];
//                    $email = $val['Email'];
//                    $role = $val['Role'];
//                    $deptName = $val['DeptName'];
//                    $userName = $val['UserName'];
//                    $password = $val['Password']; 
                ?>
                <tr id="tablebody">
                    <td><?php //echo $firstName; ?></td>
                    <td><?php //echo $lastName; ?></td>
                    <td><?php //echo $email; ?></td>
                    <td><?php //echo $role; ?></td>
                    <td><?php //echo $deptName; ?></td>
                    <td><?php //echo $userName; ?></td>
                    <td><?php //echo $password; ?></td>
                    <td><a href="EditAlumniForm.php?edit_id=<?php echo $employeeId ?>"><button type="button">Edit</button></a></td>
                    <td><a href="EditAlumni.php?delete_id=<?php echo $employeeId ?>" onclick="return confirm('Are you sure you want to delete this user?');"><button type="button">Delete</button></a></td>
                </tr>
                <?php
                   // endwhile;
                ?>
            </table>
        </div>
    </body>
</html>