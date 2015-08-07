<?php

/* 
 * sql to edit the information for an employer.
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

    header("Location: EditEmployer.php");
?>