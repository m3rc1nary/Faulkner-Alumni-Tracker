<?php

/* 
 * sql to edit information about a university.
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
           
    $uniId = $_GET['edit_id'];
    $uniName = $_POST['uniName'];

    $sql="UPDATE university "
         . "SET UniName= '".$uniName."' WHERE UniversityID=".$uniId;
    $pdo->query($sql);           

    header("Location: EditUniversity.php");
?>