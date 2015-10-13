<?php

/* 
 * 
 * 
 * @author: Robert Vines 
 */

    session_start();
    $session = $_SESSION[role];
    
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
        default :
            header('location:Login.php');
            exit();
    }    
    include('Config.php');

?>