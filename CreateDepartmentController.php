<?php

/* 
 * Send department name to database.
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
    
     //data from CreateDepartment form
    $deptName = $_POST['DeptName'];
    
    $sql="INSERT INTO department (DeptName)
          VALUES ('".$deptName."')";
    
    $pdo->exec($sql);
    
    header("Location: EditDepartment.php");
?>
