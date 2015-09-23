<?php
/*
 * Display Users to edit and delete them.
 *
 * @author Robert Vines
 */

    include('Header.php');

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

        <div id="body">
            <h2>Select Alumni to Edit</h2>
            <p><a href="CreateAlumni.php"><button id="button" type="submit">Add Alumni</button></a></p>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Degree Type</th>
                        <th>Major</th>
                        <th>Month Graduated</th>
                        <th>Year Graduated</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
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
                    <tr>
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
                </tbody>
            </table>
        </div>
    </body>
</html>