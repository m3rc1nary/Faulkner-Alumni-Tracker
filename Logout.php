<?php

/* 
 * Page to end session and logout
 * 
 * @author: Robert Vines
 */

session_start();
session_destroy();
include ('Headers/PlainHeader.php');
echo '<br><br><br><br><br><br><br>';
echo 'You have been logged out. <a href="Login.php"><font color="blue">Login Page</font></a>';
?>