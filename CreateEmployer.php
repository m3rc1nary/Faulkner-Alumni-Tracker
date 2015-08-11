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
    </head>
    <body>
        <?php 
            session_start();

            switch($session)
                {
                    case 'Admin':
                        include('AdminHeader.php');
                        break;
                    case 'Department Chair':
                        include('ChairSecHeader.php');
                        break;
                    case 'Secretary':
                        include('ChairSecHeader.php');
                        break;
                    case 'Dean':
                        include('DeanHeader.php');
                        break;
                }              
         ?>
        <div id="body">
            <h2>Create Employer</h2>
            <form method='post' action="CreateEmployerController.php">
                <table id="tablebody">
                    <tr>
                        <th>Employer Name:</th><th><input type="text" name="EmpName"></th>
                    </tr>
                    <tr>
                        <th>Employer Number:</th><th><input type="text" name="EmpNum" placeholder="123-456-7890"></th>
                    </tr>
                    <tr>
                        <th>Employer Company:</th><th><input type="text" name="EmpComp"></th>
                    </tr>
                    <tr>
                        <th>Employer email:</th><th><input type="email" name="EmpEmail"></th>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Create Employer">
            </form>
        </div>
    </body>
</html>
