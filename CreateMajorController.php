<?php

/* 
 * Send major information to degree table.
 * 
 * @author Robert Vines
 */

    //database connection
    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";

    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
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