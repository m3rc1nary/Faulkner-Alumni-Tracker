<?php

/* 
 * Session that controls the security for a Dean.
 * 
 * @author: Robert Vines
 */

session_start();

    if($_SESSION[role]!='Dean')
        {
            header('location:Login.php');
            exit();
        }
    include('Config.php');
?>