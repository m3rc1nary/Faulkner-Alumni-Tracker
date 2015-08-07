<?php

/* 
 * sql to edit a specific department. 
 * 
 * @author: Robert Vines
 */

    if($_SESSION[role]=='Admin')
    {
        include('UserSession_Admin.php');
    }
    if($_SESSION[role]=='Dean')
    {   
        include('UserSession_Dean.php');
    }
    
    include('Config.php');  
           
    $dept = $_GET['edit_dept'];

    $name = $_POST['DeptName'];

    $sql="UPDATE department "
            . "SET DeptName= '".$name."' WHERE DepartmentID=".$dept;
    $pdo->query($sql);           

    header("Location: EditDepartment.php");
?>