<?php
/*
 * To change or delete a user.
 *
 * @author Robert Vines
 */
    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                     
    
    $employeeID = $_GET['edit_id'];
    
    $sql="SELECT schoolemployee.EmployeeId, schoolemployee.FirstName, schoolemployee.LastName,"
          . "schoolemployee.Email, schoolemployee.Role, department.DeptName, login.UserName, login.Password"
          . " FROM schoolemployee "
          . "JOIN department "
          . "ON schoolemployee.Department_DepartmentID = department.DepartmentID "
          . "JOIN login"
          . " ON schoolemployee.Login_LoginID = login.LoginID WHERE EmployeeId=".$employeeID.";";
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
                <li><a id="user" href="CreateUser.php">Create User</a></li>
                <li><a href="EditUser.php"><span id="current">Edit User</span></a></li>
                <li><a href="CreateMajor.php">Create Major</a></li>
                <li><a href="EditMajor.php">Edit Major</a></li>
                <li><a href="CreateDepartment.php">Create Department</a></li>
                <li><a href="EditDepartment.php">Edit Department</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Edit User</h2>
            <form method='post' action='EditUserController.php?edit_user=<?php echo $employeeID ?>'>
                <p>First Name: <input type="text" name="FirstName" value="<?php echo $firstName;?>"></p>
                <p>Last Name: <input type="text" name="LastName" value="<?php echo $lastName;?>"></p>
                <p>Email: <input type="text" name="Email" value="<?php echo $email;?>"></p>
                <p>Role: 
                    <select name="Role">
                        <option><?php echo $role; ?></option>
                        <option>Secretary</option>
                        <option>Department Chair</option>
                        <option>Dean</option>
                    </select></p>
                <p>Department: 
                    <select name="DeptName">
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
                        </select></p>
                <p>User Name: <input type="text" name="UserName" value="<?php echo $userName ;?>"></p>
                <p>Password: <input type="text" name="Password" value="<?php echo $password ;?>"></p>
                <input type="submit" value="Edit User">
            </form>
        </div>
    </body>
</html>