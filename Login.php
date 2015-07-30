<?php

/*
 * Login page
 * 
 * @author Robert Vines
 */
?>

<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <img src="Images/AlumniTrackerLogo.jpg" alt="Faulkner University Alumni 
             Tracker" id="logo">
        <div id="header"></div>
        <div id="page">
            <div id="loginBox">
                <form method="post" action="CheckLogin.php">
                    <p id='loginHeader'>Enter User Name and Password to Login</p>
                    <p id="loginText">User Name:
                        <input type="text" name="UserName"></p>
                    <p id="loginText">Password:
                        <input type="password" name="Password"></p>
                    <p id="loginText"><input type="submit" value="Sign In"></p>
                </form>
            </div>
        </div>
    </body>
</html>
