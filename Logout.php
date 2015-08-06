<?php

/* 
 * Page to end session and logout
 * 
 * @author: Robert Vines
 */

session_start();
session_destroy();
echo 'You have been logged out. <a href="Login.php">Login Page</a>';

?>