<?php
/*
 * Display Accounts to edit and delete them.
 *
 * @author Robert Vines
 */
   
    include('Header.php');
?>
<?php
    if(isset($_GET['delete_account']))
    {               
        $employeeId = $_GET['delete_account'];
        
        $sql="DELETE FROM schoolemployee, login, department_has_schoolemployee "
                . "JOIN department_has_schoolemployee "
                . "ON schoolemployee.EmployeeID = department_has_schoolemployee.SchoolEmployee_EmployeeID "
                . "JOIN login "
                . "ON schoolemployee.Login_LoginID = login.LoginID "
                . "WHERE schoolemployee.EmployeeID = '".$employeeId."'; ";
        $pdo->query($sql);
        
        header("Location: EditAccount.php");
    }
?>
<div id='page'>
        <div id="body">
            <h2>Select Account to Edit</h2>
            <p><a href="CreateAccount.php"><button id="button" type="submit">Add Account</button></a></p>
            <table class="column1">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th> </th>
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
                        <td><a href="EditAccount.php?view=<?php echo $employeeId ?>"><button type="button">View</button></a></td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        <div>
           <?php
            if(isset($_GET['view']))
            {               
                $employeeId = $_GET['view'];

                $sql3="SELECT schoolemployee.EmployeeID, schoolemployee.FirstName, schoolemployee.LastName, "
                        . "schoolemployee.Email, schoolemployee.Role, login.UserName, login.Password "
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

                    endwhile;
                    ?>
            
            <table class="column2">

                        <tr>
                            <th colspan="2">Personal Info</th>
                        </tr>
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
                            <th colspan="2">Departments</th>
                        </tr>
                        
                            <?php 
                            $sql4 = "SELECT DeptName FROM department "
                                    . "JOIN department_has_schoolemployee "
                                    . "ON department.DepartmentID = department_has_schoolemployee.Department_DepartmentID "
                                    . "WHERE department_has_schoolemployee.SchoolEmployee_EmployeeID='".$employeeId."' "
                                    . "ORDER BY DeptName";
                            $result = $pdo->query($sql4);

                            while($val=$result->fetch()):
                                
                                    echo "<tr><td>" . $val['DeptName'] . "</td><td></td></tr>";
                                    endwhile;
                                    ?>
                        
                        <tr>
                            <th colspan="2">Login Info</th>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td><?php echo $userName; ?></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><?php echo $password; ?></td>
                        </tr>
                        <tr><td><a href="EditAccountForm.php?edit_account=<?php echo $empID ?>"><button type="button">Edit</button></a></td>
                            <td><a href="EditAccount.php?delete_account=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this Account?');"><button type="button">Delete</button></a></td></tr>
                    </table>          

                    <?php  
            }//end if(isset($_GET['view']))
            ?>
        </div>
        </div>
</div>
    </body>
</html>