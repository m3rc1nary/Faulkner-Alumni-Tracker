<?php

/* 
 * Send department name to database.
 * 
 * @author: Robert Vines
 */

    include('Config.php');  
    
     //data from CreateDepartment form
    $deptName = $_POST['DeptName'];
    
    $sql="INSERT INTO department (DeptName)
          VALUES ('".$deptName."')";
    
    $pdo->exec($sql);
    
    header("Location: /AlumniTracker/View/EditDepartment.php");
?>
