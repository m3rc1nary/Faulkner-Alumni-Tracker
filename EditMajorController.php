<?php

/* 
 * sql to change the information about a major.
 * 
 * @author: Robert Vines
 */

    session_start();
    $session = $_SESSION[role];
    
    switch($session)
    {
        case 'Admin':
            include('UserSession_Admin.php');
            break;
        case 'Department Chair':
            include('UserSession_chair.php');
            break;
        case 'Secretary':
            include('UserSession_sec.php');
            break;
        case 'Dean':
            include('UserSession_Dean.php');
            break;
        default :
            header('location:Login.php');
    }    
    include('Config.php');
    
    $degreeID = $_GET['edit_major'];

    $type = $_POST['Type'];
    $major = $_POST['Major'];
    $college = $_POST['College'];
    $department = $_POST['Dept'];
    
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
            . "SET Type='".$type."', Major='".$major."', College='".$college."', Department_DepartmentID='".$deptID."' "
            . " WHERE DegreeID=".$degreeID;
    $pdo->query($sql2);

    header("Location: EditMajor.php");
?>