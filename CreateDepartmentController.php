<?php

/* 
 * Send department name to database.
 * 
 * @author: Robert Vines
 */

    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    try
    { 
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected Woo Hoo';
    } 
    catch (Exception $ex) 
    {
        echo "Connection Failed: " . $ex->getMessage();
    }
    
     //data from CreateDepartment form
    $deptName = $_POST['DeptName'];
    
    $sql="INSERT INTO department (DeptName)
          VALUES ('".$deptName."')";
    
    $pdo->exec($sql);
    
    header("Location: EditDepartment.php");
?>
