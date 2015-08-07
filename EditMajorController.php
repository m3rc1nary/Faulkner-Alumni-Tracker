<?php

/* 
 * sql to change the information about a major.
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
    
    $degreeID = $_GET['edit_major'];

    $type = $_POST['Type'];
    $major = $_POST['Major'];
    $department = $_POST['Dept'];
    
    echo $type;
    echo $major;
    echo $department;
    
    try
    { 
    $sql="SELECT DepartmentID FROM department WHERE DeptName='".$department."' ";
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $deptID = $val['DepartmentID'];
     echo $deptID;
    } 
    catch (Exception $ex) 
    {
        echo "Connection Failed: " . $ex->getMessage();
    }
   
    $sql2="UPDATE degree "
            . "SET Type='".$type."', Major='".$major."', Department_DepartmentID='".$deptID."' "
            . " WHERE DegreeID=".$degreeID;
    $pdo->query($sql2);

    header("Location: EditMajor.php");
?>