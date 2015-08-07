<?php
/* 
 * Send university name to database.
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
    
     //data from CreateDepartment form
    $uniName = $_POST['UniName'];
    
    try
    {
    $sql = "INSERT INTO university (UniName) VALUES ('".$uniName."')";
    
    $pdo->exec($sql);
    echo 'yay';
    } 
    catch (Exception $ex) 
    {
        echo "Connection Failed: " . $ex->getMessage();
    }
    
    header("Location: EditUniversity.php");
?>
