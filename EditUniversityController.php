<?php

/* 
 * sql to edit information about a university.
 * 
 * @author: Robert Vines
 */
        
    include('UserSession_Admin.php');      
           
    $uniId = $_GET['edit_id'];
    $uniName = $_POST['uniName'];

    $sql="UPDATE university "
         . "SET UniName= '".$uniName."' WHERE UniversityID=".$uniId;
    $pdo->query($sql);           

    header("Location: EditUniversity.php");
?>