<?php
/* 
 * Home page for an admin
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
?>

<html>
    <head>
        <title>Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <?php 
        
        session_start();
            if($_SESSION[role]=='Admin')
            {
                include('Headers/AdminHeader.php');
            }
            ?>
        <div id="body">
          <h2><?php session_start();
                    $fName = $_SESSION[fName];
                    $lName = $_SESSION[lName];
                    echo 'Hello '. $fName .' '. $lName .','; ?></h2>
          <p align="center">Department: 
              <select name="DeptName">
                  <option> </option>
                    <?php 
                        $sql = "SELECT DeptName FROM department ORDER BY DeptName";
                        $result = $pdo->query($sql);

                        while ($val = $result->fetch()):

                        $deptName = $val['DeptName'];    
                        {
                            echo "<option>" . $deptName . "</option>";
                        }endwhile;
                    ?>
                    </select></p>
              <p align="center">Last Name: <input type="text"></p>
        </div>
    </body>
</html>