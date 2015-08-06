<?php

/* 
 * Session that controls the security of a department chair.
 * 
 * @author: Robert Vines
 */

session_start();

    if($_SESSION[role]!='Department Chair')
        {
            header('location:Login.php');
            exit();
        }
    include('Config.php');
?>
