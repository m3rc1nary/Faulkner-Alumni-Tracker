<?php
/*
 * To change or delete a user.
 *
 * @author Robert Vines
 */

    include('Headers/Header.php');
    
    $employeeID = $_GET['edit_id'];
    
    $sql="SELECT schoolemployee.EmployeeID, schoolemployee.FirstName, schoolemployee.LastName,"
          . "schoolemployee.Email, schoolemployee.Role, login.UserName, login.Password"
          . " FROM schoolemployee "
          . "JOIN login"
          . " ON schoolemployee.Login_LoginID = login.LoginID WHERE EmployeeID=".$employeeID.";";
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $firstName = $val['FirstName'];
    $lastName = $val['LastName'];
    $email = $val['Email'];
    $role = $val['Role'];
    //$dept = $val['DeptName'];
    $userName = $val['UserName'];
    $password = $val['Password'];
?>
<div id='page'>
        <div id="body">
            <h2>Edit User</h2>
            <form method='post' action='EditUserFormController.php?edit_user=<?php echo $employeeID ?>'>
                <table id="formTable">
                    <tr>
                        <td>First Name:</td><td><input type="text" name="FirstName" value="<?php echo $firstName;?>" /></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td><td><input type="text" name="LastName" value="<?php echo $lastName;?>" /></td>
                    </tr>
                    <tr>
                        <td>Email:</td><td><input type="text" name="Email" value="<?php echo $email;?>" /></td>
                    </tr>
                    <tr>
                        <td>Role:</td> 
                            <td><select name="Role">
                                <option><?php echo $role; ?></option>
                                <option>Admin</option>
                                <option>Dean</option>
                                <option>Department Chair</option>
                                <option>Secretary</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>User Name:</td><td><input type="text" name="UserName" value="<?php echo $userName ;?>" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td><td><input type="text" name="Password" value="<?php echo $password ;?>" /></td>
                    </tr>
                <tr>
                        <td>Department:</td>
                    </tr>
                </table>
                <div id='checkbox'>
                        <?php 
                            $sql = "SELECT DepartmentID, DeptName FROM department ORDER BY DeptName";
                            $result = $pdo->query($sql);

                            while ($val = $result->fetch()):

                            $deptID = $val['DepartmentID'];
                            $deptName = $val['DeptName'];  

                            {
                                echo " <input type='checkbox' name='DeptList[]' value='".$deptID."' />" . $deptName . "<br>";
                            }endwhile;
                            ?>
                </div>
                <br>
                
                <input type="submit" value="Save User" />
            </form>
        </div>
</div>
    </body>
</html>