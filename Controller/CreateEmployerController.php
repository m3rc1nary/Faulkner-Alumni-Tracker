<?php

/* 
 * Send employer info to database.
 * 
 * @author: Robert Vines
 */

    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
        
     //data from CreateEmployer form
    $empName = $_POST['EmpName'];
    $empNum = $_POST['EmpNum'];
    $empComp = $_POST['EmpComp'];
    $empEmail = $_POST['EmpEmail'];
    
    $sql="INSERT INTO employer (EmployerName, EmployerNum, EmployerComp, EmployerEmail)
          VALUES ('".$empName."', '".$empNum."', '".$empComp."', '".$empEmail."')";
    
    
    $pdo->exec($sql);
    
    header("Location: /AlumniTracker/View/Employer.php");
?>
