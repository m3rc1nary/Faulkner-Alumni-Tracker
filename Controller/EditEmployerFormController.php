<?php

/* 
 * sql to edit the information for an employer.
 * 
 * @author: Robert Vines
 */

    include('/Config.php');
           
    $empID = $_GET['edit_id'];

    $empName = $_POST['EmpName'];
    $empNum = $_POST['EmpNum'];
    $empComp = $_POST['EmpComp'];
    $empEmail = $_POST['EmpEmail'];

    $sql="UPDATE employer "
            . "SET EmployerName= '".$empName."', EmployerNum= '".$empNum."', EmployerComp= '".$empComp."', "
            . "EmployerEmail= '".$empEmail."' "
            . "WHERE EmployerID='".$empID."';";
    $pdo->query($sql);           

    header("Location: /AlumniTracker/View/EditEmployer.php");
?>