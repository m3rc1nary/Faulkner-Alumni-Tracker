<?php
/* 
 * Choose a department name to edit or delete.
 * 
 * @author: Robert Vines
 */

    include('UserSession_Admin.php');  
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
            <?php
                if(isset($_GET['delete_id']))
                {               
                    $sql="DELETE FROM department WHERE DepartmentID=".$_GET['delete_id'];
                    $result = $pdo->query($sql);           

                    header("Location: EditDepartment.php");
                }
            ?>
            <h2>Select Department to Edit</h2>
            <p><a href="CreateDepartment.php"><button id="button">Add Department</button></a></p>
            <table>
                <tr id="tableHead">
                    <td>Department Id</td>
                    <td>Department Name</td>
                    <td> </td>
                    <td> </td>
                </tr>
                <?php
                    //get info from application
                    $pdo = new PDO($connString, $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "SELECT * FROM department";
                    $result = $pdo->query($sql);
                    
                    while($val=$result->fetch()):
                         
                    $deptId= $val['DepartmentID'];
                    $deptName= $val['DeptName'];                  
                ?>
                <tr id="tablebody">
                    <td><?php echo $deptId; ?></td>
                    <td><?php echo $deptName; ?></td>
                    <td><a href="EditDepartmentForm.php?edit_id=<?php echo $deptId ?>"><input type="submit" value="Edit"></a></td>
                    <td><a href="EditDepartment.php?delete_id=<?php echo $deptId ?>" onclick="return confirm('Are you sure you want to delete this department?');"><input type="submit" value="Delete"></a></td>
                    <?php
                        endwhile;
                    ?>
                </tr>
            </table>
        </div>
    </body>
</html>