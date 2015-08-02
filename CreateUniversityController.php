<?php
/* 
 * Send university name to database.
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
    $uniName = $_POST['UniName'];
    
    $sql="INSERT INTO university (UniName)
          VALUES ('".$uniName."')";
    
    $pdo->exec($sql);
    
    header("Location: EditUniversity.php");
?>
