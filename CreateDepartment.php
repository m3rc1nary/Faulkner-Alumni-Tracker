<?php

/* 
 * Create a department name for dropbox
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
        <title>Create Department</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
        <style>
            table tr td{
                background-color: white;
            }
        </style>
    </head>
    <body>
        <?php 
            session_start();

            switch($session)
                {
                    case 'Admin':
                        include('Headers/AdminHeader.php');
                        break;
                    case 'Dean':
                        include('Headers/DeanHeader.php');
                        break;
                }              
         ?>
        <div id="body">
            <h2>Create Department</h2>
            <form method='post' action="CreateDepartmentController.php">
                <table id="tablebody">
                    <tr>
                        <td>Department Name:</td><td><input type="text" name="DeptName"></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Create Department">
            </form>
        </div>
    </body>
</html>
