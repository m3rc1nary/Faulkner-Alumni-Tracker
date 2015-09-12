<?php
/*
 * Display Users to edit and delete them.
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
?>
<?php
    if(isset($_GET['delete_id']))
    {               
        $employeeId = $_GET['delete_id'];
        
        $sql="DELETE schoolemployee.*, login.* FROM schoolemployee "
                . "JOIN login "
                . "ON schoolemployee.Login_LoginID=login.LoginID WHERE EmployeeID=".$employeeId;
        $pdo->query($sql);
        
        header("Location: EditUser.php");
    }
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
            <h2>Select User to Edit</h2>
            <p><a href="CreateUser.php"><button id="button" type="submit">Add User</button></a></p>
            <table>
                <thead>
                    <tr id="tableHead">
                        <td>Last Name</td>
                        <td>First Name</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td>Department</td>
                        <td>User Name</td>
                        <td>Password</td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get info from application
                            $sql2 = "SELECT schoolemployee.EmployeeID, schoolemployee.FirstName, schoolemployee.LastName,"
                                    . "schoolemployee.Email, schoolemployee.Role, login.UserName, login.Password"
                                    . " FROM schoolemployee "
                                    . "JOIN login"
                                    . " ON schoolemployee.Login_LoginID = login.LoginID "
                                    . "ORDER BY LastName";

                            $result = $pdo->query($sql2);

                        while($val=$result->fetch()):

                        $employeeId = $val['EmployeeID'];
                        $firstName = $val['FirstName'];
                        $lastName = $val['LastName'];
                        $email = $val['Email'];
                        $role = $val['Role'];
                        $userName = $val['UserName'];
                        $password = $val['Password']; 
                    ?>
                    <tr>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $firstName; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $role; ?></td>
                        <td> <select readonly>
                                <option>dept</option>
                                <option>dept</option>
                            <?php 
                            ?></td>
                        <td><?php echo $userName; ?></td>
                        <td><?php echo $password; ?></td>
                        <td><a href="EditUserForm.php?edit_id=<?php echo $employeeId ?>"><button type="button">Edit</button></a></td>
                        <td><a href="EditUser.php?delete_id=<?php echo $employeeId ?>" onclick="return confirm('Are you sure you want to delete this user?');"><button type="button">Delete</button></a></td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>