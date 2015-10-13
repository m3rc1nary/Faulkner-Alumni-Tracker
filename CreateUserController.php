<?php

/* 
 * User controller to store information in the database.
 * 
 * @author: Robert Vines
 */

    include('Config.php');
    
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
    
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

        //security for sql statments
        $fk = $pdo->prepare("SELECT LoginID FROM login WHERE UserName=?");
        $fk->execute(array($userName));
        $loginId = $fk->fetchColumn();

    //insert data into schoolemployee table    
    $sql2="INSERT INTO schoolemployee (FirstName,LastName, "
          . " Email,Role,Login_LoginID) "
          . " VALUES ('".$firstName."', '".$lastName."', '".$email."', '".$role."', "
          ." '".$loginId."')"; 
    $pdo->query($sql2);  
    
    
        //security for sql statments
        $fk = $pdo->prepare("SELECT EmployeeID FROM schoolemployee WHERE Email=?");
        $fk->execute(array($email));
        $empId = $fk->fetchColumn();
        
        
    foreach ($_POST['DeptList'] as $dept)
        {
            $sql3 = "INSERT INTO department_has_schoolemployee (Department_DepartmentID, SchoolEmployee_EmployeeID)"
                    . " VALUES ('".$dept."', '".$empId."') ";
            $pdo->query($sql3);
            echo 'It worked';
            } 
    
    header("Location: EditUser.php");
?>