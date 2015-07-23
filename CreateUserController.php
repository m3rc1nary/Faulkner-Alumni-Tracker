<?php

/* 
 * User controller to store information in the database.
 * 
 * @author: Robert Vines
 */

    //database connection
    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    try
    { 
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected Woo Hoo, Go back and create a department first';
    } 
    catch (Exception $ex) 
    {
        echo "Connection Failed: " . $ex->getMessage();
    }
        
    //data from create user form
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $role = $_POST['Role'];
    $deptName = $_POST['DeptName'];
    $userName = $_POST['UserName'];
    $password = $_POST['Password'];
    
    //post to login table
    $sql="INSERT INTO login (UserName, Password)
          VALUES ('".$userName."','".$password."')";
    $pdo->exec($sql);
   
        //match foreign key from login to school employee
        $fk = $pdo->prepare("SELECT LoginID FROM login WHERE UserName=?");
        $fk->execute(array($userName));
        $loginId = $fk->fetchColumn();
        
        //match foreign key from department to school employee
        $fk2 = $pdo->prepare("SELECT DepartmentID FROM department WHERE DeptName=?");
        $fk2->execute(array($deptName));
        $departmentId = $fk2->fetchColumn();
    
    //insert data into schoolemployee table    
    $sql2="INSERT INTO schoolemployee (FirstName,LastName,
          Email,Role, Login_LoginID, Department_DepartmentID)
          VALUES ('".$firstName."','".$lastName."','".$email."','".$role."',"
            . "'".$loginId."', '".$departmentId."' )";
    
    $pdo->exec($sql2);    
    
    header("Location: EditUser.php");
?>