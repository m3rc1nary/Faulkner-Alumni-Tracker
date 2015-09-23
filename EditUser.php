<?php
/*
 * Display Users to edit and delete them.
 *
 * @author Robert Vines
 */
   
    include('Header.php');
?>
<?php
    if(isset($_GET['delete_id']))
    {               
        $employeeId = $_GET['delete_id'];
        
        $sql="DELETE schoolemployee.*, login.*, department_has_schoolemployee.* FROM schoolemployee "
                . "JOIN login "
                . "ON schoolemployee.Login_LoginID=login.LoginID WHERE EmployeeID=".$employeeId;
        $pdo->query($sql);
        
        header("Location: EditUser.php");
    }
?>

        <div id="body">
            <h2>Select User to Edit</h2>
            <p><a href="CreateUser.php"><button id="button" type="submit">Add User</button></a></p>
            <table style="float: left;">
                <thead>
                    <tr id="tableHead">
                        <td>Last Name</td>
                        <td>First Name</td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get info from application
                        $sql2 = "SELECT EmployeeID, FirstName, LastName "
                                . "FROM schoolemployee "
                                . "ORDER BY LastName";
                            
                        $result = $pdo->query($sql2);
                        
                        while($val=$result->fetch()):
                        
                        $employeeId = $val['EmployeeID'];
                        $firstName = $val['FirstName'];
                        $lastName = $val['LastName'];
                        
                    ?>
                    <tr>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $firstName; ?></td>
                        <td><a href="EditUser.php?view=<?php echo $employeeId ?>"><button type="button">View</button></a></td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
           <?php 
            if(isset($_GET['view']))
            {               
                $employeeId = $_GET['view'];

                $sql3="SELECT schoolemployee.EmployeeID, schoolemployee.FirstName, schoolemployee.LastName, "
                        . "schoolemployee.Email, schoolemployee.Role, login.UserName, login.Password, department.DeptName "
                        . "FROM schoolemployee "
                        . "JOIN login "
                        . "ON schoolemployee.Login_LoginID = login.LoginID "
                        . "JOIN department_has_schoolemployee "
                        . "ON schoolemployee.EmployeeID = department_has_schoolemployee.SchoolEmployee_EmployeeID "
                        . "JOIN department "
                        . "ON department_has_schoolemployee.Department_DepartmentID = department.DepartmentID WHERE EmployeeID='".$employeeId."' "
                        . "ORDER BY schoolemployee.LastName";

                $result = $pdo->query($sql3);

                while($val=$result->fetch()):

                    $empID = $val['EmployeeID'];
                    $firstName = $val['FirstName'];
                    $lastName = $val['LastName'];
                    $email = $val['Email'];
                    $role = $val['Role'];
                    $userName = $val['UserName'];
                    $password = $val['Password'];
//                    $dept = array($val['DeptName']);
                    
                    
//                    foreach($dept as $deptName)
//                    {
//                        echo "<option>" . $deptName . "</option>";
//                    }
                    endwhile;
                    ?>
                    <table style="float:right; position: relative;">

                        <tr>
                            <td>Last Name: </td>
                            <td><?php echo $lastName; ?></td>
                        </tr>
                        <tr>
                            <td>First Name: </td>
                            <td><?php echo $firstName; ?></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td>Role: </td>
                            <td><?php echo $role; ?></td>
                        </tr>
                        <tr>
                            <td>Department: </td>
                            <td><?php 
                            $sql4 = "SELECT DeptName FROM department "
                                    . "JOIN department_has_schoolemployee "
                                    . "ON department.DepartmentID = department_has_schoolemployee.Department_DepartmentID "
                                    . "WHERE department_has_schoolemployee.SchoolEmployee_EmployeeID='".$employeeId."' "
                                    . "ORDER BY DeptName";
                            $result = $pdo->query($sql4);

                            while($val=$result->fetch()):
                                
                                    echo "<tr><td></td><td>" . $val['DeptName'] . "</td></tr>";
                                    endwhile;
                                    ?></td>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td><?php echo $userName; ?></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><?php echo $password; ?></td>
                        </tr>
                        <tr><td></td><td><a href="EditUserForm.php?edit_id=<?php echo $empID ?>"><button type="button">Edit</button></a></td></tr>
                        <tr><td></td><td><a href="EditUser.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this user?');"><button type="button">Delete</button></a></td></tr>
                    </table>          

                    <?php  
            }//end if(isset($_GET['view']))
            ?>
        </div>
    </body>
</html>