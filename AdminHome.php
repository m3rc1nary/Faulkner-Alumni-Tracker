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
            <form method='post' action="AdminHome.php">
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
                <p align="center">Last Name: <input type="text" name="LastName"></p>
                <p align="center"><input type="submit" value="Search"></p>
            </form>
        </div>
        <div>
            <?php
               if(isset($_POST['DeptName']) && !empty($_POST['DeptName']))
               {
                    if( empty($_POST['LastName']) ) 
                    {
                        $sql = "";
                       
                    }
                    
                    if( !empty($_POST['LastName']) ) 
                    {}
                   //select all from that department and order by last name
                   //then something with last name
                   //maybe if last name is null then only have dept as parameter
                   //if last name is not null then has both as parameter
                   //output as a table
               }
            ?>
        </div>
    </body>
</html>