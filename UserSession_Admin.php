<?php

/* 
 * Session that controls admin login security.
 * 
 * @author: Robert Vines
 */

    session_start();

    if($_SESSION[role]!='Admin')
        {
            header('location:Login.php');
            exit();
        }
?>

