<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
            . " WHERE LoginID= EmployeeID=".$employeeId;
    $pdo->query($sql2);           

    header("Location: EditUser.php");
?>