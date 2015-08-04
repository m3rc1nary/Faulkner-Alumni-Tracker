<?php
/*
 * To change or delete a user.
 *
 * @author Robert Vines
 */
    include('UserSession_Admin.php');
//    $connString = "mysql:host=localhost;dbname=alumnitracker";
//    $user ="root";
//    $pass ="root";
//    
//    $pdo = new PDO($connString, $user, $pass);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                     
    
    $employeeID = $_GET['edit_id'];
    
    $sql="SELECT schoolemployee.EmployeeID, schoolemployee.FirstName, schoolemployee.LastName,"
          . "schoolemployee.Email, schoolemployee.Role, department.DeptName, login.UserName, login.Password"
          . " FROM schoolemployee "
          . "JOIN department "
          . "ON schoolemployee.Department_DepartmentID = department.DepartmentID "
          . "JOIN login"
          . " ON schoolemployee.Login_LoginID = login.LoginID WHERE EmployeeID=".$employeeID.";";
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $firstName = $val['FirstName'];
    $lastName = $val['LastName'];
    $email = $val['Email'];
    $role = $val['Role'];
    $dept = $val['DeptName'];
    $userName = $val['UserName'];
    $password = $val['Password'];
?>
<html>
    <head>
        <title>Edit User</title>
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
                <li><a id="user" href="EditUser.php"><span id="current">User</span></a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Edit User</h2>
            <form method='post' action='EditUserController.php?edit_user=<?php echo $employeeID ?>'>
                <table id="tablebody">
                    <tr>
                        <th>First Name:</th><th><input type="text" name="FirstName" value="<?php echo $firstName;?>"></th>
                    </tr>
                    <tr>
                        <th>Last Name:</th><th><input type="text" name="LastName" value="<?php echo $lastName;?>"></th>
                    </tr>
                    <tr>
                        <th>Email:</th><th><input type="text" name="Email" value="<?php echo $email;?>"></th>
                    </tr>
                    <tr>
                        <th>Role:</th> 
                            <th><select name="Role">
                                <option><?php echo $role; ?></option>
                                <option>Secretary</option>
                                <option>Department Chair</option>
                                <option>Dean</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Department:</th> 
                        <th><select name="DeptName">
                                <option><?php echo $dept; ?></option>
                                <?php 
                                    $sql = "SELECT DeptName FROM department";
                                    $result = $pdo->query($sql);

                                    while ($val = $result->fetch()):

                                    $deptName = $val['DeptName'];    
                                    {
                                        echo "<option>" . $deptName . "</option>";
                                    }endwhile;
                                ?>
                            </select></th>
                    </tr>
                    <tr>
                        <th>User Name:</th><th><input type="text" name="UserName" value="<?php echo $userName ;?>"></th>
                    </tr>
                    <tr>
                        <th>Password:</th><th><input type="text" name="Password" value="<?php echo $password ;?>"></th>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save User">
            </form>
        </div>
    </body>
</html>