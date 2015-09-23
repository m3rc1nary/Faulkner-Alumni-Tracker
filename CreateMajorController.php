<?php

/* 
 * Send major information to degree table.
 * 
 * @author Robert Vines
 */

    include('Config.php');
    
    $deptName = $_POST['Dept'];
    $college = $_POST['College'];
    $type = $_POST['Type'];
    $degree = $_POST['Degree'];
 
    $sql = "SELECT * FROM department WHERE DeptName='".$deptName."'";
    $result = $pdo->query($sql);
    $val=$result->fetch();
   
    $deptID = $val['DepartmentID'];
    
    $sql2 = "INSERT INTO degree (Type, Major, College, Department_DepartmentID)
             VALUES ('".$type."','".$degree."','".$college."','".$deptID."')";
    
    $pdo->exec($sql2);
    
    header("Location: EditMajor.php");
?>