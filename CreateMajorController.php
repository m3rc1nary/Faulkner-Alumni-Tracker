<?php

/* 
 * Send major information to degree table.
 * 
 * @author Robert Vines
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
    
    $deptName = $_POST['Dept'];
    $type = $_POST['Type'];
    $degree = $_POST['Degree'];
 
    $sql = "SELECT * FROM department WHERE DeptName='".$deptName."'";
    $result = $pdo->query($sql);
    $val=$result->fetch();
   
    $deptID = $val['DepartmentID'];
    
    $sql2 = "INSERT INTO degree (Type, Major, Department_DepartmentID)
             VALUES ('".$type."','".$degree."','".$deptID."')";
    
    $pdo->exec($sql2);
    
    header("Location: EditMajor.php");
?>