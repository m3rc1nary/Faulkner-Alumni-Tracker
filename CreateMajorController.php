<?php

/* 
 * Send major information to degree table.
 * 
 * @author Robert Vines
 */

    include('UserSession_Admin.php');
    
    $deptName = $_POST['Dept'];
    $type = $_POST['Type'];
    $degree = $_POST['Degree'];
 
    $sql = "SELECT * FROM department WHERE DeptName='".$deptName."'";
    $result = $pdo->query($sql);
    $val=$result->fetch();
   
    $deptID = $val['DepartmentID'];
    
    $sql2 = "INSERT INTO degree (Type, Major, Department_DepartmentID)
             VALUES ('".$type."','".$degree."','".$deptID."')";
    
    $pdo->exec($sql2);
    
    header("Location: EditMajor.php");
?>