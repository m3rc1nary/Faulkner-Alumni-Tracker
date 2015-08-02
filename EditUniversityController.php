<?php

/* 
 * 
 * 
 * @author: Robert Vines
 */
        
    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
    $uniId = $_GET['edit_id'];
    $uniName = $_POST['uniName'];

    $sql="UPDATE university "
            . "SET UniName= '".$uniName."' WHERE UniversityId=".$uniId;
    $pdo->query($sql);           

    header("Location: EditUniversity.php");
?>