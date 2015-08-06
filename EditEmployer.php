<?php
/* 
 * Choose an employer to edit or delete.
 * 
 * @author: Robert Vines
 */

    include('UserSession_Admin.php');  
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
            </ul>
        </div>
        <div id="body">
            <?php
                if(isset($_GET['delete_id']))
                {               
                    $sql="DELETE FROM employer WHERE EmployerID=".$_GET['delete_id'];
                    $result = $pdo->query($sql);           

                    header("Location: EditEmployer.php");
                }
            ?>
            <h2>Select Employer to Edit</h2>
            <p><a href="CreateEmployer.php"><button id="button">Add Employer</button></a></p>
            <table>
                <tr id="tableHead">
                    <td>Employer Id</td>
                    <td>Employer Name</td>
                    <td>Employer Number</td>
                    <td>Employer Company</td>
                    <td>Employer Email</td>
                    <td> </td>
                    <td> </td>
                </tr>
                <?php
                    //get info from application
                    $pdo = new PDO($connString, $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "SELECT * FROM employer";
                    $result = $pdo->query($sql);
                    
                    while($val=$result->fetch()):
                         
                    $empID = $val['EmployerID'];
                    $empName = $val['EmployerName'];    
                    $empNum = $val['EmployerNum'];
                    $empComp = $val['EmployerComp'];
                    $employerEmail = $val['EmployerEmail'];
                ?>
                <tr id="tablebody">
                    <td><?php echo $empID; ?></td>
                    <td><?php echo $empName; ?></td>
                    <td><?php echo $empNum; ?></td>
                    <td><?php echo $empComp; ?></td>
                    <td><?php echo $employerEmail; ?></td>
                    <td><a href="EditEmployerForm.php?edit_id=<?php echo $empID ?>"><input type="submit" value="Edit"></a></td>
                    <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
                    <?php
                        endwhile;
                    ?>
                </tr>
            </table>
        </div>
    </body>
</html>
