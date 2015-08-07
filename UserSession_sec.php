<?php

/* 
 * Session that controls the security information for a Secretary
 * 
 * @author: Robert Vines
 */

session_start();

    if($_SESSION[role]!='Secretary')
        {
            header('location:Login.php');
            exit();
        }
    
?>