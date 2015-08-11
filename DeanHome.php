<?php

/* 
 * Home page for a dean.
 * 
 * @author: Robert Vines
 */
    session_start();
    $session = $_SESSION[role];
    
    switch($session)
    {
        case 'Dean':
            include('UserSession_Dean.php');
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
        <?php include('DeanHeader.php'); ?>
        <div id="body">
          <h2>Hello</h2>
          <p align="center">Department: 
              <select>
                  <option>CSIS</option>
              </select></p>
              <p align="center">Last Name: <input type="text"></p>
        </div>
    </body>
</html>
