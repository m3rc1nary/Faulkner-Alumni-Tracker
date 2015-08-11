<?php

/* 
 * sql to edit a specific department. 
 * 
 * @author: Robert Vines
 */

    isession_start();
    $session = $_SESSION[role];
    
    switch($session)
    {
        case 'Admin':
            include('UserSession_Admin.php');
            break;
        case 'Dean':
            include('UserSession_Dean.php');
            break;
        default :
            header('location:Login.php');
    }    
    include('Config.php');
    
    include('Config.php');  
           
    $dept = $_GET['edit_dept'];

    $name = $_POST['DeptName'];

    $sql="UPDATE department "
            . "SET DeptName= '".$name."' WHERE DepartmentID=".$dept;
    $pdo->query($sql);           

    header("Location: EditDepartment.php");
?>