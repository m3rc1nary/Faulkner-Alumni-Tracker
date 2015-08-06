<?php

/* 
 * Send department name to database.
 * 
 * @author: Robert Vines
 */

    include('UserSession_Admin.php');   
    
     //data from CreateDepartment form
    $deptName = $_POST['DeptName'];
    
    $sql="INSERT INTO department (DeptName)
          VALUES ('".$deptName."')";
    
    $pdo->exec($sql);
    
    header("Location: EditDepartment.php");
?>
