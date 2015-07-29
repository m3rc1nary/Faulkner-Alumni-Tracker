<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $degreeID = $_GET['edit_major'];

    $type = $_POST['Type'];
    $major = $_POST['Major'];
    $department = $_POST['Dept'];
    
    echo $type;
    echo $major;
    echo $department;
    
    try
    { 
    $sql="SELECT DepartmentID FROM department WHERE DeptName='".$department."' ";
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $deptID = $val['DepartmentID'];
     echo $deptID;
    } 
    catch (Exception $ex) 
    {
        echo "Connection Failed: " . $ex->getMessage();
    }
   
    $sql2="UPDATE degree "
            . "SET Type='".$type."', Major='".$major."', Department_DepartmentID='".$deptID."' "
            . " WHERE DegreeID=".$degreeID;
    $pdo->query($sql2);

    header("Location: EditMajor.php");
?>