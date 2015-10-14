<?php

/* 
 * sql information to change information about a user.
 * 
 * @author: Robert Vines
 */

    include('Config.php');

    $employeeId = $_GET['edit_user'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $role = $_POST['Role'];
    //$deptName = $_POST['DeptName'];
    $userName = $_POST['UserName'];
    $password = $_POST['Password'];
    
    
//    $sql = "SELECT DepartmentID FROM department WHERE DeptName='".$deptName."'";
//    $result = $pdo->query($sql);
//    $val=$result->fetch();
    
//    $deptID = $val['DepartmentID'];
    
    $sql2="UPDATE schoolemployee, login "
            . "SET schoolemployee.FirstName='".$firstName."', schoolemployee.LastName='".$lastName."', "
            . "schoolemployee.Email='".$email."', schoolemployee.Role='".$role."', "
            . "login.UserName='".$userName."', "
            . "login.Password='".$password."' "
            . "WHERE schoolemployee.Login_LoginID = login.LoginID AND EmployeeID='".$employeeId."';";
    $pdo->query($sql2);

    header("Location: /AlumniTracker/View/EditUser.php");
?>