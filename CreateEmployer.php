<?php

/* 
 * Form to create an alumni.
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
        case 'Department Chair':
            include('UserSession_chair.php');
            break;
        case 'Secretary':
            include('UserSession_sec.php');
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
        <title>Create Employer</title>
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
                    case 'Department Chair':
                        include('Headers/ChairSecHeader.php');
                        break;
                    case 'Secretary':
                        include('Headers/ChairSecHeader.php');
                        break;
                    case 'Dean':
                        include('Headers/DeanHeader.php');
                        break;
                }              
         ?>
        <div id="body">
            <h2>Create Employer</h2>
            <form method='post' action="CreateEmployerController.php">
                <table id="tablebody">
                    <tr>
                        <td>Employer Name:</td><td><input type="text" name="EmpName"></td>
                    </tr>
                    <tr>
                        <td>Employer Number:</td><td><input type="text" name="EmpNum" placeholder="123-456-7890"></td>
                    </tr>
                    <tr>
                        <td>Employer Company:</td><td><input type="text" name="EmpComp"></td>
                    </tr>
                    <tr>
                        <td>Employer email:</td><td><input type="email" name="EmpEmail"></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Create Employer">
            </form>
        </div>
    </body>
</html>
