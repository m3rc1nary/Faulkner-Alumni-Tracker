<?php

/* 
 * 
 * 
 * @author: Robert Vines
 */

            include('UserSession_Admin.php');  
           
    $dept = $_GET['edit_dept'];

    $name = $_POST['DeptName'];

    $sql="UPDATE department "
            . "SET DeptName= '".$name."' WHERE DepartmentID=".$dept;
    $pdo->query($sql);           

    header("Location: EditDepartment.php");
?>