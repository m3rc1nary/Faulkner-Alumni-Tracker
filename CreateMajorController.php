<?php

/* 
 * Send degree information to database.
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

    $sql = "SELECT DepartmentID FROM department WHERE DeptName='".$deptName."'";
    $pdo->query($sql);
    
    $deptID = $val['DepartmentID'];
    echo $deptID;
    
//    $sql = "SELECT * FROM department WHERE DeptName='".$deptName."'";
//    $pdo->query($sql);
//    
//    $deptN = $val['DeptName'];
//    $deptID = $val['DepartmentID'];
//    
//    echo $deptN;
//    echo $deptName;
//    echo $deptID;
//    echo $type;
//    echo $major;
//    
//    $sql2 = "INSERT INTO degree (Type, Major, Department_DepartmentID)
//             VALUES ('".$type."','".$major."','".$deptID."')";
//    
//    $pdo->exec($sql2);
    
//    header("Location: EditMajor.php");
?>