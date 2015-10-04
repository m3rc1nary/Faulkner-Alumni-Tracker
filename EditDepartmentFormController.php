<?php

/* 
 * sql to edit a specific department. 
 * 
 * @author: Robert Vines
 */
    
    include('Config.php');  
           
    $dept = $_GET['edit_dept'];

    $name = $_POST['DeptName'];

    $sql="UPDATE department "
            . "SET DeptName= '".$name."' WHERE DepartmentID=".$dept;
    $pdo->query($sql);           

    header("Location: EditDepartment.php");
?>