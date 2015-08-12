<?php

/* 
 * sql information to change information about a user.
 * 
 * @author: Robert Vines
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

    $employeeId = $_GET['edit_user'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $role = $_POST['Role'];
    $deptName = $_POST['DeptName'];
    $userName = $_POST['UserName'];
    $password = $_POST['Password'];
    
    
    $sql = "SELECT DepartmentID FROM department WHERE DeptName='".$deptName."'";
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $deptID = $val['DepartmentID'];
    
    $sql2="Update schoolemployee, login "
            . "SET schoolemployee.FirstName='".$firstName."', schoolemployee.LastName='".$lastName."', "
            . "schoolemployee.Email='".$email."', schoolemployee.Role='".$role."', "
            . "schoolemployee.Department_DepartmentID='".$deptID."', login.UserName='".$userName."', "
            . "login.Password='".$password."' "
            . "WHERE schoolemployee.Login_LoginID = login.LoginID AND EmployeeID='".$employeeId."';";
    $pdo->query($sql2);

    header("Location: EditUser.php");
?>