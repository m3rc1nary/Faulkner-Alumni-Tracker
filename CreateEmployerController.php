<?php

/* 
 * Send employer info to database.
 * 
 * @author: Robert Vines
 */

    if($_SESSION[role]=='Admin')
    {
        include('UserSession_Admin.php');
    }
    if($_SESSION[role]=='Department Chair')
    {
        include('UserSession_chair.php');
    }
    if($_SESSION[role]=='Secretary')
    {   
        include('UserSession_sec.php');
    }
    if($_SESSION[role]=='Dean')
    {   
        include('UserSession_Dean.php');
    }
    
    include('Config.php');   
        
     //data from CreateDepartment form
    $empName = $_POST['EmpName'];
    $empNum = $_POST['EmpNum'];
    $empComp = $_POST['EmpComp'];
    $empEmail = $_POST['EmpEmail'];
    
    $sql="INSERT INTO employer (EmployerName, EmployerNum, EmployerComp, EmployerEmail)
          VALUES ('".$empName."', '".$empNum."', '".$empComp."', '".$empEmail."')";
    
    $pdo->exec($sql);
    
    header("Location: EditEmployer.php");
?>
