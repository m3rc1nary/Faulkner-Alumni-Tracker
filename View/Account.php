<?php
/*
 * Display Accounts to edit and delete them.
 *
 * @author Robert Vines
 */
   
    include('Header.php');
?>
<script type="text/javascript">
    $(document).ready(function ()) 
        {
            $('#information').hide();
       });
</script>

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
        
        header("Location: Account.php");
    }
?>
<div id='page'>
    <h1>ACCOUNT</h1>  
    <div id="body">
        <p><a href="CreateAccount.php"><button id="button" type="submit">Add Account</button></a></p>
        
        <!------ Show Selected Employee Information ----------------------------------->
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
            <table id="information">
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Username</th>
                </tr>
                <tr>
                    <td><?php echo $lastName; ?></td>
                    <td><?php echo $firstName; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $role; ?></td>
                    <td><?php echo $userName; ?></td>
                </tr>
                <td><b>Departments: </b></td>
                    <td colspan="5" rowspan=""> 
                        <?php 
                            $sql4 = "SELECT DeptName FROM department "
                                    . "JOIN department_has_schoolemployee "
                                    . "ON department.DepartmentID = department_has_schoolemployee.Department_DepartmentID "
                                    . "WHERE department_has_schoolemployee.SchoolEmployee_EmployeeID='".$employeeId."' "
                                    . "ORDER BY DeptName";
                            $result = $pdo->query($sql4);

                            while($val=$result->fetch()):

                                echo $val['DeptName'] . ", ";
                                endwhile;
                                ?></td>
                        
            </table> 
            <a href="EditAccount.php?edit_account=<?php echo $empID ?>"><button type="button">Edit</button></a>
            <a href="Account.php?delete_account=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this Account?');"><button type="button">Delete</button></a>
            <br>
            <?php  
            }//end if(isset($_GET['view']))
            ?>
            <br>
    
<!-------- Show all Accounts -------------------------------------------------->  
        <table>
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
                    <td><a href="Account.php?view=<?php echo $employeeId ?>"><button type="button">View</button></a></td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>