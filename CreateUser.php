<?php
/*
 * Form to create a new user.
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

<html>
    <head>
        <title>Create User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
        <style>
            table tr td{
                background-color: white;
            }
        </style>
    </head>
    <body>
        <?php include ('Headers/AdminHeader.php'); ?>
        <div id="body">
            <h2>Create User</h2>
            <form method='post' action='CreateUserController.php'>
                <table>
                    <tr>
                        <td>First Name:</td><td><input type="text" name="FirstName" required></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td><td><input type="text" name="LastName" required></td>
                    </tr>
                    <tr>
                        <th>Email:</th><th><input type="text" name="Email" required></th>
                    </tr>
                    <tr>
                        <td>Role:</td> 
                        <td><select name="Role">
                                <option>Admin</option>
                                <option>Dean</option>
                                <option>Department Chair</option>
                                <option>Secretary</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>User Name:</td><td><input type="text" name="UserName" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td><td><input type="text" name="Password" required></td>
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
                <input type="submit" value="Create User">
            </form> 
        </div>
    </body>
</html>
