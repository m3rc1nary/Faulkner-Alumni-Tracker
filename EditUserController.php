<?php

/* 
 * sql information to change information about a user.
 * 
 * @author: Robert Vines
 */

    include ('UserSession_Admin.php');
    include ('Config.php');

    $employeeId = $_GET['edit_user'];
    $firstName = $_POST['FirstName'];
    $lastName = $POST['LastName'];
    $email = $_POST['Email'];
    $role = $_POST['Role'];
    $deptName = $_POST['DeptName'];
    $userName = $_POST['UserName'];
    $password = $_POST['Password'];
    
    $sql = "SELECT DepartmentID FROM department WHERE DeptName=".$deptName;
    $pdo->query($sql);
    
    $deptID = $val['DepartmentID'];
    
    $sql2="Update schoolemployee"
            . " JOIN department ON schoolemployee.Department_DepartmentID = department.DepartmentID"
            . " JOIN login ON schoolemployee.Login_LoginID = login.LoginID "
            . "SET schoolemployee.FirstName='".$firstName."', schoolemployee.LastName='".$lastName."', "
            . "schoolemployee.Email='".$email."', schoolemployee.Role='".$role."',"
            . " schoolemployee.Department_DepartmentID='".$deptID."', login.UserName='".$userName."',"
            . " login.Password='".$password."' "
            . " WHERE EmployeeID=".$employeeId;
    $pdo->query($sql2);           

    header("Location: EditUser.php");
?>