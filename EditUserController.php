<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        
    $employeeId = $_GET['edit_user'];

    $sql="Update schoolemployee"
            . "SET "
            . " WHERE EmployeeID=".$employeeId;
    $pdo->query($sql);           

    header("Location: EditUser.php");
?>