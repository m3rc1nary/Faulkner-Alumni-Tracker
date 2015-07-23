<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
    <head>
        <title>Edit Major</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <img src="Images/AlumniTrackerLogo.jpg" alt="Faulkner University Alumni 
             Tracker" id="logo">
        <div id="header"></div>
        <div id="nav">
            <ul>
                <li><a id="user" href="CreateUser.php">Create User</a></li> 
                <li><a href="EditUser.php">Edit User</a></li>
                <li><a href="CreateMajor.php">Create Major</a></li>
                <li><a href="EditMajor.php"><span id="current">Edit Major</span></a></li>
                <li><a href="CreateDepartment.php">Create Department</a></li>
                <li><a href="EditDepartment.php">Edit Department</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Select Major to Edit</h2>
            <table>
                <tr id="tableHead">
                    <td>Type</td>
                    <td>Field</td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr id="tablebody">
                    <td>Bachelors</td>
                    <td>Computer Science</td>
                    <td><input type="submit" value="Edit"></td>
                    <td><input type="submit" value="Delete"></td>
                </tr>
            </table>
        </div>
    </body>
</html>
