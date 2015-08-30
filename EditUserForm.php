<?php
/*
 * To change or delete a user.
 *
 * @author Robert Vines
 */

    session_start();
    $session = $_SESSION[role];
    
    switch($session)
    {
        case 'Admin':
            include('UserSession_Admin.php');
            break;
        default :
            header('location:Login.php');
    }    
    include('Config.php');
    
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
<html>
    <head>
        <title>Edit User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <?php include('Headers/AdminHeader.php'); ?>
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
                                <option>Admin</option>
                                <option>Dean</option>
                                <option>Department Chair</option>
                                <option>Secretary</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Department:</th> 
                        <th><select name="DeptName">
                                <option><?php echo $dept; ?></option>
                                <?php 
                                    $sql = "SELECT DeptName FROM department ORDER BY DeptName";
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