<?php

/* 
 * Send major information to degree table.
 * 
 * @author Robert Vines
 */

    include('UserSession_Admin.php');
    
    $deptName = $_POST['Dept']; 
    $type = $_POST['Type'];
    $major = $_POST['Major'];
 
    $sql = "SELECT * FROM department WHERE DeptName='".$deptName."'";
    $result = $pdo->query($sql);
    $val=$result->fetch();
   
    $deptID = $val['DepartmentID'];
    
    $sql2 = "INSERT INTO degree (Type, Major, Department_DepartmentID)
             VALUES ('".$type."','".$major."','".$deptID."')";
    
    $pdo->exec($sql2);
    
    header("Location: EditMajor.php");
?>