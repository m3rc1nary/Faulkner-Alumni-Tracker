<?php

/* 
 * Send employer info to database.
 * 
 * @author: Robert Vines
 */

    session_start();
    $session = $_SESSION[role];
    
    switch($session)
    {
        case 'Admin':
            include('UserSession_Admin.php');
            break;
        case 'Department Chair':
            include('UserSession_chair.php');
            break;
        case 'Secretary':
            include('UserSession_sec.php');
            break;
        case 'Dean':
            include('UserSession_Dean.php');
            break;
        default :
            header('location:Login.php');
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
