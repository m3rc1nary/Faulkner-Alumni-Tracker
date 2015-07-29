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
           
    $dept = $_GET['edit_dept'];

    $name = $_POST['DeptName'];

    $sql="UPDATE department "
            . "SET DeptName= '".$name."' WHERE DepartmentID=".$dept;
    $pdo->query($sql);           

    header("Location: EditDepartment.php");
?>