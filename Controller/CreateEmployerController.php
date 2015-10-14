<?php

/* 
 * Send employer info to database.
 * 
 * @author: Robert Vines
 */

    include('Config.php');
        
     //data from CreateDepartment form
    $empName = $_POST['EmpName'];
    $empNum = $_POST['EmpNum'];
    $empComp = $_POST['EmpComp'];
    $empEmail = $_POST['EmpEmail'];
    
    $sql="INSERT INTO employer (EmployerName, EmployerNum, EmployerComp, EmployerEmail)
          VALUES ('".$empName."', '".$empNum."', '".$empComp."', '".$empEmail."')";
    
    $pdo->exec($sql);
    
    header("Location: /AlumniTracker/View/EditEmployer.php");
?>
