<?php
 
/* 
 * Send employer info to database.
 * 
 * @author: Robert Vines
 */

    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
      $empID = $_GET['edit_id'];  
     //data from CreateEmployer form
    $empName = $_POST['EmpName'];
    $empNum = $_POST['EmpNum'];
    $empComp = $_POST['EmpComp'];
    $empEmail = $_POST['EmpEmail'];
    
    if($empID==NULL)
        {
        
    
            $sql="INSERT INTO employer (EmployerName, EmployerNum, EmployerComp, EmployerEmail)
                VALUES ('".$empName."', '".$empNum."', '".$empComp."', '".$empEmail."')";
    } else
        {
            $sql="UPDATE employer "
            . "SET EmployerName= '".$empName."', EmployerNum= '".$empNum."', EmployerComp= '".$empComp."', "
            . "EmployerEmail= '".$empEmail."' "
            . "WHERE EmployerID='".$empID."';";
            
        }
    $pdo->exec($sql);
    
    header("Location: /AlumniTracker/View/Employer.php");
?>
