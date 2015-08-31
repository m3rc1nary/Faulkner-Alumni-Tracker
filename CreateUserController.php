<?php

/* 
 * User controller to store information in the database.
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
        default :
            header('location:Login.php');
    }    
    include('Config.php');
    
    //data from create user form
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $role = $_POST['Role'];
    $userName = $_POST['UserName'];
    $password = $_POST['Password'];
    
    if(isset($_POST['submit']))
    {
        //in here you get games array
        $myDept = $_POST['DeptList'];  
    }
    
    //post to login table
    $sql="INSERT INTO login (UserName, Password)
          VALUES ('".$userName."', '".$password."')";
    $pdo->query($sql);

        //match foreign key from login to school employee
        $fk = $pdo->prepare("SELECT LoginID FROM login WHERE UserName=?");
        $fk->execute(array($userName));
        $loginId = $fk->fetchColumn();

        //match foreign key from department to school employee
//        $fk2 = $pdo->prepare("SELECT DepartmentID FROM department WHERE DeptName=?");
//        $fk2->execute(array($deptName));
//        $departmentId = $fk2->fetchColumn();

    //insert data into schoolemployee table    
    $sql2="INSERT INTO schoolemployee (FirstName,LastName, "
          . " Email,Role,Login_LoginID) "
          . " VALUES ('".$firstName."', '".$lastName."', '".$email."', '".$role."', "
          ." '".$loginId."')"; 
    $pdo->query($sql2);  
    
    header("Location: EditUser.php");
?>